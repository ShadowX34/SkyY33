<?php
require 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Получаем и валидируем данные
$certificateName  = trim($_POST['certificateName'] ?? '');
$certificatePrice = floatval($_POST['certificatePrice'] ?? 0);
$fullName         = trim($_POST['fullName'] ?? '');
$phone            = trim($_POST['phone'] ?? '');
$email            = trim($_POST['email'] ?? '');
$comment          = trim($_POST['comment'] ?? '');

$errors = [];
if (empty($fullName))                         $errors[] = 'ФИО обязательно для заполнения';
if (empty($phone))                            $errors[] = 'Телефон обязателен для заполнения';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Некорректный email';
if (empty($certificateName))                  $errors[] = 'Не указан сертификат';
if ($certificatePrice <= 0)                   $errors[] = 'Неверная цена сертификата';

if (!empty($errors)) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO certificate_orders (certificate_name, certificate_price, full_name, phone, email, comment)
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->execute([$certificateName, $certificatePrice, $fullName, $phone, $email, $comment]);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Заказ успешно сохранён! ID: ' . $pdo->lastInsertId()]);

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Ошибка базы данных: ' . $e->getMessage()]);
}
?>
