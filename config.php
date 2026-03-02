<?php
// Настройки для локального сервера (XAMPP)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // Стандартный пользователь XAMPP
define('DB_PASS', '');          // Пустой пароль по умолчанию в XAMPP
define('DB_NAME', 'ask_dosaaf_db');

header('Content-Type: application/json');

// Создаем соединение
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Проверяем соединение
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Устанавливаем кодировку
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die(json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]));
}
?>