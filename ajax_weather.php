<?php
// Подключаем скрипт защиты (проверка реферера, защита от спама/ботов)
require_once 'includes/security.php'; 

// Устанавливаем заголовок Content-Type, чтобы браузер понимал, что мы отдаем данные в формате JSON
header('Content-Type: application/json');

// Подключаем файл с функцией расчета летной годности
require_once 'includes/flight_status.php';

// Запускаем расчет актуального статуса погоды
$status = getFlightStatus();

// Кодируем массив с данными погоды в формат JSON и выводим его (это ответ для JavaScript на фронтенде)
echo json_encode($status);
?>
