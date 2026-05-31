<?php
require 'auth.php';
require '../includes/db_connect.php';

/**
 * ─── ДИПЛОМНЫЙ КОММЕНТАРИЙ: АРХИТЕКТУРА И БЕЗОПАСНОСТЬ (БЭКЕНД) ───
 * 
 * 1. ИДЕНТИФИКАЦИЯ И АВТОРИЗАЦИЯ:
 *    Файл auth.php проверяет наличие активной сессии администратора. Без валидного
 *    токена сессии доступ к скрипту блокируется, что предотвращает CSRF и несанкционированные действия.
 * 
 * 2. ЗАЩИТА ОТ SQL-ИНЪЕКЦИЙ (PDO Prepared Statements):
 *    Удаление записей из базы данных происходит динамически с использованием плейсхолдеров PDO (?).
 *    СУБД сначала компилирует SQL-запрос DELETE FROM gallery_photos WHERE id IN (?, ?, ...),
 *    и только затем подставляет экранированные числовые идентификаторы. Это исключает внедрение вредоносного SQL-кода.
 * 
 * 3. ЗАЩИТА ОТ PATH TRAVERSAL (Уязвимость обхода путей):
 *    Перед физическим удалением файла с диска, имя файла пропускается через функцию basename().
 *    Она отсекает любые префиксы путей (например, "../../etc/passwd"), оставляя только чистое имя файла.
 *    Это гарантирует, что злоумышленник не сможет удалить критически важные системные файлы.
 * 
 * 4. ОПТИМИЗАЦИЯ СУБД (Пакетные операции):
 *    Вместо того чтобы отправлять по одному SQL-запросу на каждое удаление в цикле, все идентификаторы
 *    объединяются, и отправляется ОДИН запрос к БД с оператором IN (?), что снижает нагрузку на СУБД.
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['selected_photos'])) {
    $selected = $_POST['selected_photos'];
    $dbIds = [];

    foreach ($selected as $item) {
        // Формат значения чекбокса:
        // - Для БД: "db:ID|filename"
        // - Для статических: "static:filename"
        if (strpos($item, 'db:') === 0) {
            $parts = explode('|', substr($item, 3));
            if (count($parts) === 2) {
                $id = (int)$parts[0];
                $filename = basename($parts[1]); // Безопасная очистка пути
                $dbIds[] = $id;

                $path = '../images/gallery/' . $filename;
                if (file_exists($path)) {
                    @unlink($path); // Физическое удаление файла с сервера
                }
            }
        } elseif (strpos($item, 'static:') === 0) {
            $filename = basename(substr($item, 7)); // Безопасная очистка пути
            $path = '../images/gallery/' . $filename;
            if (file_exists($path)) {
                @unlink($path); // Физическое удаление статического файла
            }
        }
    }

    // Выполняем пакетное удаление из базы данных за один запрос
    if (!empty($dbIds)) {
        $inQuery = implode(',', array_fill(0, count($dbIds), '?'));
        $stmt = $pdo->prepare("DELETE FROM gallery_photos WHERE id IN ($inQuery)");
        $stmt->execute($dbIds);
    }

    header('Location: gallery.php?msg=deleted'); exit;
}

header('Location: gallery.php'); exit;
