<?php
// challenge.php — Экран проверки браузера (JS-Challenge)
if (session_status() === PHP_SESSION_NONE) session_start();

// Если пользователь уже прошел проверку — не мешаем ему
if (isset($_SESSION['js_challenge_passed']) && $_SESSION['js_challenge_passed'] === true) {
    $redirect = isset($_GET['back']) ? urldecode($_GET['back']) : '/Sky/index.php';
    header('Location: ' . $redirect);
    exit;
}

// Генерируем уникальный токен, который JS должен будет "доставить" обратно
$token = hash('sha256', session_id() . time() . 'sky_ddos_shield');
$_SESSION['pending_challenge_token'] = $token;
$_SESSION['challenge_issued_at'] = time();

// Страница, на которую вернуть пользователя после проверки
$back = isset($_GET['back']) ? urlencode($_GET['back']) : urlencode('/Sky/index.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка безопасности — Владимирский АСК ДОСААФ</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: linear-gradient(135deg, #0b1a2a 0%, #1a3a5c 100%);
            color: #fff;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        /* Анимированный фоновый градиент */
        body::before {
            content: '';
            position: fixed;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(ellipse at center, rgba(29, 107, 201, 0.15) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(1.1); opacity: 1; }
        }

        .container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.05);
            padding: 50px 40px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 440px;
            width: 90%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
        }

        /* Кольцевой спиннер */
        .spinner-ring {
            width: 70px;
            height: 70px;
            border: 4px solid rgba(255, 255, 255, 0.15);
            border-top-color: #1d6bc9;
            border-radius: 50%;
            animation: spin 0.9s linear infinite;
            margin: 0 auto 25px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        h2 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        p {
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
            margin-top: 25px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #1d6bc9, #00c6ff);
            border-radius: 4px;
            transition: width 2s linear; /* 2 секунды — как и просил */
        }

        .status-text {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.4);
            margin-top: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="spinner-ring"></div>
    <h2>Проверка безопасности</h2>
    <p>Пожалуйста, подождите несколько секунд.<br>Мы проверяем ваш браузер.</p>

    <div class="progress-bar">
        <div class="progress-fill" id="progress"></div>
    </div>
    <p class="status-text" id="status-text">Инициализация проверки...</p>
</div>

<script>
    // Запускаем прогресс-бар сразу при загрузке
    window.onload = function() {
        const progress = document.getElementById('progress');
        const statusText = document.getElementById('status-text');

        // Запускаем анимацию прогресс-бара на 2 секунды
        setTimeout(() => { progress.style.width = '100%'; }, 50);

        setTimeout(() => {
            statusText.textContent = 'Проверка...'
        }, 700);

        setTimeout(() => {
            statusText.textContent = 'Браузер проверен. Переход...';
            progress.style.background = '#00ff88';
        }, 1800);

        // Через 2 секунды делаем запрос с токеном (подтверждаем, что JS работает)
        setTimeout(() => {
            fetch('/Sky/verify_challenge.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ token: '<?= $token ?>' })
            })
            .then(r => r.json())
            .then(data => {
                if (data.ok) {
                    window.location.href = decodeURIComponent('<?= $back ?>');
                }
            });
        }, 2000);
    };
</script>

</body>
</html>
