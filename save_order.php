<?php
require 'config.php';

// Включаем вывод ошибок для отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Получаем и очищаем данные
$certificateName = $conn->real_escape_string($_POST['certificateName'] ?? '');
$certificatePrice = floatval($_POST['certificatePrice'] ?? 0);
$fullName = $conn->real_escape_string($_POST['fullName'] ?? '');
$phone = $conn->real_escape_string($_POST['phone'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$comment = $conn->real_escape_string($_POST['comment'] ?? '');

// Валидация данных
$errors = [];
if (empty($fullName)) $errors[] = "ФИО обязательно для заполнения";
if (empty($phone)) $errors[] = "Телефон обязателен для заполнения";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Некорректный email";
if (empty($certificateName)) $errors[] = "Не указан сертификат";
if ($certificatePrice <= 0) $errors[] = "Неверная цена сертификата";

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Подготовка и выполнение запроса
try {
    $stmt = $conn->prepare("INSERT INTO certificate_orders (
        certificate_name, 
        certificate_price, 
        full_name, 
        phone, 
        email, 
        comment
    ) VALUES (?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param(
        "sdssss", 
        $certificateName, 
        $certificatePrice, 
        $fullName, 
        $phone, 
        $email, 
        $comment
    );
    
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    
    echo json_encode([
        'success' => true, 
        'message' => 'Заказ успешно сохранен! ID: ' . $stmt->insert_id
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false, 
        'message' => 'Database error: ' . $e->getMessage()
    ]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>