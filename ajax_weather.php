<?php
// ajax_weather.php
require_once 'includes/security.php'; // Защита от спама запросами
header('Content-Type: application/json');

// Подключаем логику анализа
require_once 'includes/flight_status.php';

// Получаем актуальный статус
$status = getFlightStatus();

// Возвращаем JSON для фронтенда
echo json_encode($status);
?>
