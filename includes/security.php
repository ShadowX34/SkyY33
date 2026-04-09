<?php
// security.php — Централизованная защита (DoS + DDoS)
if (session_status() === PHP_SESSION_NONE) session_start();

// ─────────────────────────────────────────────
// КОНФИГУРАЦИЯ
// ─────────────────────────────────────────────
$RATE_LIMIT     = 7;   // макс запросов в $RATE_WINDOW секунд (DoS)
$RATE_WINDOW    = 5;   // окно подсчета (сек)
$BLOCK_DURATION = 10;  // бан (сек) при превышении DoS-лимита

$DDOS_LIMIT     = 30;  // макс запросов с 1 IP за $DDOS_WINDOW сек (DDoS)
$DDOS_WINDOW    = 10;  // окно подсчета для IP-счетчика
$IP_FILE        = __DIR__ . '/../tmp/ip_requests.json'; // Файл хранения данных об IP

$current_time = time();
$current_uri  = $_SERVER['REQUEST_URI'] ?? '/';
$client_ip    = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$client_ip    = trim(explode(',', $client_ip)[0]); // Берём только первый IP (если несколько)

// ─────────────────────────────────────────────
// СЛОЙ 1: Фильтр по User-Agent (мгновенный)
// ─────────────────────────────────────────────
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Блокировка пустых User-Agent
if (trim($ua) === '') {
    header("HTTP/1.0 403 Forbidden");
    exit("403 Access Denied");
}

// Черный список популярных инструментов для атак и грубого перебора
$ua_blacklist = ['sqlmap', 'nikto', 'nmap', 'masscan', 'python-requests/2.', 'python-urllib', 'curl/7.', 'go-http-client', 'DirBuster', 'WPScan'];
$ua_lower = strtolower($ua);
foreach ($ua_blacklist as $bad_ua) {
    if (stripos($ua_lower, strtolower($bad_ua)) !== false) {
        header("HTTP/1.0 403 Forbidden");
        exit("403 Access Denied");
    }
}

// ─────────────────────────────────────────────
// СЛУЖЕБНЫЕ СТРАНИЦЫ (не применяем лимиты)
// ─────────────────────────────────────────────
$excluded = ['blocked.php', 'challenge.php', 'verify_challenge.php'];
$is_excluded = false;
foreach ($excluded as $ex) {
    if (strpos($current_uri, $ex) !== false) { $is_excluded = true; break; }
}

// ─────────────────────────────────────────────
// СЛОЙ 2: DDoS-защита (Глобальный IP-счетчик)
// ─────────────────────────────────────────────
if (!$is_excluded) {

    // Whitelist: не трогаем поисковики и системы мониторинга
    $bot_whitelist = ['googlebot', 'yandexbot', 'bingbot', 'uptimerobot'];
    $is_trusted_bot = false;
    foreach ($bot_whitelist as $bot) {
        if (stripos($ua_lower, $bot) !== false) { $is_trusted_bot = true; break; }
    }

    if (!$is_trusted_bot) {
        // Создаём папку tmp если нет
        $tmp_dir = __DIR__ . '/../tmp';
        if (!is_dir($tmp_dir)) mkdir($tmp_dir, 0755, true);

        // Читаем текущий файл с данными
        $ip_data = [];
        if (file_exists($IP_FILE)) {
            $raw = file_get_contents($IP_FILE);
            $ip_data = json_decode($raw, true) ?? [];
        }

        // Очищаем устаревшие записи для текущего IP
        if (isset($ip_data[$client_ip])) {
            $ip_data[$client_ip] = array_values(array_filter(
                $ip_data[$client_ip],
                fn($ts) => ($current_time - $ts) <= $DDOS_WINDOW
            ));
        } else {
            $ip_data[$client_ip] = [];
        }

        // Записываем текущий запрос
        $ip_data[$client_ip][] = $current_time;

        // Переодически очищаем старые IP из файла (раз в ~100 запросов)
        if (rand(1, 100) === 1) {
            foreach ($ip_data as $ip => $timestamps) {
                $ip_data[$ip] = array_values(array_filter(
                    $timestamps,
                    fn($ts) => ($current_time - $ts) <= $DDOS_WINDOW
                ));
                if (empty($ip_data[$ip])) unset($ip_data[$ip]);
            }
        }

        // Сохраняем файл
        file_put_contents($IP_FILE, json_encode($ip_data), LOCK_EX);

        // Если IP превысил DDoS-порог — отправляем на JS-Challenge
        if (count($ip_data[$client_ip]) > $DDOS_LIMIT) {
            if (!isset($_SESSION['js_challenge_passed']) || $_SESSION['js_challenge_passed'] !== true) {
                $back = urlencode($current_uri);
                header("Location: /Sky/challenge.php?back={$back}");
                exit;
            }
        }
    }
}

// ─────────────────────────────────────────────
// СЛОЙ 3: DoS-защита (Сессионный Rate-Limiter)
// ─────────────────────────────────────────────
if (!$is_excluded) {

    if (!isset($_SESSION['request_history']) || !is_array($_SESSION['request_history'])) {
        $_SESSION['request_history'] = [];
    }

    // Проверка: не заблокирован ли уже пользователь?
    if (isset($_SESSION['blocked_until'])) {
        if ($current_time < $_SESSION['blocked_until']) {
            header("Location: /Sky/blocked.php");
            exit;
        } else {
            // Бан истек
            unset($_SESSION['blocked_until']);
            $_SESSION['request_history'] = [];
        }
    }

    // Добавляем текущий запрос и очищаем старые
    $_SESSION['request_history'][] = $current_time;
    $_SESSION['request_history'] = array_values(array_filter(
        $_SESSION['request_history'],
        fn($ts) => ($current_time - $ts) <= $RATE_WINDOW
    ));

    // Проверка лимита
    if (count($_SESSION['request_history']) > $RATE_LIMIT) {
        $_SESSION['blocked_until'] = $current_time + $BLOCK_DURATION;
        header("Location: /Sky/blocked.php");
        exit;
    }
}
?>
