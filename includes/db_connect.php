<?php
// Устанавливаем часовой пояс Москвы для всех функций даты в PHP
date_default_timezone_set('Europe/Moscow');

// Адрес сервера базы данных (обычно localhost при локальной разработке)
$host = 'localhost';
// Имя базы данных, к которой мы подключаемся
$dbname = 'ask_dosaaf_db';
// Имя пользователя базы данных (в XAMPP по умолчанию root)
$username = 'root';
// Пароль пользователя базы данных (в XAMPP по умолчанию пустой)
$password = '';

try {
    // Создаем объект PDO для подключения к базе данных MySQL с кодировкой UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Устанавливаем часовой пояс соединения с базой данных на Московское время (+03:00)
    $pdo->exec("SET time_zone = '+03:00'");
    
    // Настраиваем режим вывода ошибок: выбрасывать исключения (PDOException) в случае ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Устанавливаем режим выборки данных по умолчанию как ассоциативный массив (ключи - названия колонок)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Глобальная оптимизация
} catch (PDOException $e) {
    // Если при подключении произошла ошибка, прерываем выполнение скрипта и выводим сообщение
    die("Ошибка подключения: " . $e->getMessage());
}
?>