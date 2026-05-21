<?php
// Подключаем скрипт подключения к базе данных
require 'includes/db_connect.php';

// Проверяем, что запрос был отправлен методом POST (метод отправки форм)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Если метод не POST, возвращаем JSON-сообщение об ошибке и прекращаем работу
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Получаем и валидируем (очищаем) пришедшие из формы POST-данные
// trim() удаляет лишние пробелы в начале и в конце строки
$certificateName  = trim($_POST['certificateName'] ?? '');
// floatval() преобразует значение в число с плавающей точкой для безопасности
$certificatePrice = floatval($_POST['certificatePrice'] ?? 0);
$fullName         = trim($_POST['fullName'] ?? '');
$phone            = trim($_POST['phone'] ?? '');
$email            = trim($_POST['email'] ?? '');
$comment          = trim($_POST['comment'] ?? '');

// Инициализируем массив для хранения возможных ошибок заполнения формы
$errors = [];
if (empty($fullName))                         $errors[] = 'ФИО обязательно для заполнения';
if (empty($phone))                            $errors[] = 'Телефон обязателен для заполнения';
// filter_var() с флагом FILTER_VALIDATE_EMAIL проверяет корректность формата почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Некорректный email';
if (empty($certificateName))                  $errors[] = 'Не указан сертификат';
if ($certificatePrice <= 0)                   $errors[] = 'Неверная цена сертификата';

// Если есть хоть одна ошибка валидации
if (!empty($errors)) {
    // Указываем браузеру формат ответа JSON
    header('Content-Type: application/json');
    // Объединяем ошибки в одну строку через запятую и возвращаем клиенту
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

try {
    // Подготавливаем безопасный SQL-запрос (Prepared Statement)
    // Символы "?" используются как плейсхолдеры для предотвращения SQL-инъекций
    $stmt = $pdo->prepare(
        "INSERT INTO certificate_orders (certificate_name, certificate_price, full_name, phone, email, comment)
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    // Выполняем запрос, передавая реальные отфильтрованные данные вместо знаков "?"
    $stmt->execute([$certificateName, $certificatePrice, $fullName, $phone, $email, $comment]);

    header('Content-Type: application/json');
    // Возвращаем успех и ID последней вставленной записи в БД ($pdo->lastInsertId())
    echo json_encode(['success' => true, 'message' => 'Заказ успешно сохранён! ID: ' . $pdo->lastInsertId()]);

} catch (PDOException $e) {
    header('Content-Type: application/json');
    // Если произошла ошибка при работе с БД, ловим её и отдаем JSON с описанием ошибки
    echo json_encode(['success' => false, 'message' => 'Ошибка базы данных: ' . $e->getMessage()]);
}
?>
