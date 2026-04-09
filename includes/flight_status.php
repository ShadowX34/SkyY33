<?php
// includes/flight_status.php
require_once __DIR__ . '/config.php';

function getFlightStatus() {
    global $openweathermap_api_key, $lat, $lon, $use_mock_data;

    $wind_speed = 0;
    $clouds = 0;
    $visibility = 10000;
    $weather_desc = 'ясно';

    if (!$use_mock_data) {
        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&units=metric&lang=ru&appid={$openweathermap_api_key}";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200 && $response) {
            $data = json_decode($response, true);
            if (isset($data['wind']['speed'])) $wind_speed = $data['wind']['speed'];
            if (isset($data['clouds']['all'])) $clouds = $data['clouds']['all'];
            if (isset($data['visibility'])) $visibility = $data['visibility'];
            if (isset($data['weather'][0]['description'])) $weather_desc = $data['weather'][0]['description'];
            
            // Получаем код погоды (ID) для точного анализа осадков
            // https://openweathermap.org/weather-conditions
            $weather_id = isset($data['weather'][0]['id']) ? $data['weather'][0]['id'] : 800;
        } else {
            $use_mock_data = true;
        }
    }

    if ($use_mock_data) {
        $wind_speed = rand(2, 6) + (rand(0, 9) / 10);
        $clouds = rand(10, 60);
        $visibility = rand(8000, 10000); 
        $weather_desc = 'переменная облачность (демо)';
        $weather_id = 800; // Ясно
    }

    // Алгоритм "Интеллектуального анализа" (Строгий режим)
    $score = 100;
    
    // 1. Осадки - самый важный фактор
    // Коды 2xx (Гроза), 3xx (Морось), 5xx (Дождь), 6xx (Снег)
    if ($weather_id < 700) {
        $score -= 60; // Штраф за любые осадки
    } elseif ($weather_id >= 701 && $weather_id <= 781) {
        $score -= 40; // Туман, мгла, пепел и т.д.
    }

    // 2. Ветер (Для парашютистов 7-8 м/с уже предел для новичков)
    if ($wind_speed > 2) {
        // Каждый метр после 2 м/с отнимает 10 баллов
        $score -= ($wind_speed - 2) * 12; 
    }
    
    // 3. Облачность (Плотные облака мешают визуальному ориентированию)
    if ($clouds > 50) {
        $score -= ($clouds - 50) * 0.5;
    }

    // 4. Видимость
    if ($visibility < 8000) {
        $score -= (8000 - $visibility) / 100;
    }

    $score = max(0, min(100, (int)$score));

    // Мапинг процентов на угол стрелки (-90 это 0%, 0 это 50%, 90 это 100%)
    if ($score >= 80) {
        $verdict = 'Идеальные условия! Подходит для новичков и профи.';
        $status_color = '#00ff88'; // Яркий неоновый зеленый
        $bg_color = 'rgba(0, 51, 27, 0.7)'; // Темно-зеленая подложка
        $angle = 60 + (($score - 80) / 20 * 30); // 60 to 90
        $tips = 'Совет: Не забудьте взять солнцезащитные очки и экшен-камеру для крутых кадров!';
    } elseif ($score >= 60) {
        $verdict = 'Хорошие условия. Возможны небольшие ограничения.';
        $status_color = '#ffd700'; // Яркий золотой
        $bg_color = 'rgba(51, 43, 0, 0.7)'; // Темно-золотая/коричневая подложка
        $angle = 0 + (($score - 60) / 20 * 60); // 0 to 60
        if ($wind_speed > 4) {
            $tips = 'Совет: Ветер ощутимый. Слушайте инструктора внимательно при приземлении.';
        } else {
            $tips = 'Совет: Отличный день для прыжка в тандеме.';
        }
    } elseif ($score >= 40) {
        $verdict = 'Условия на грани. Только для спортсменов.';
        $status_color = '#ff9f43'; // Яркий оранжевый
        $bg_color = 'rgba(51, 26, 0, 0.7)'; // Темно-оранжевая подложка
        $angle = -60 + (($score - 40) / 20 * 60); // -60 to 0
        $tips = 'Совет: Прыжки для перворазников могут быть перенесены. Уточните у администратора.';
    } else {
         $verdict = 'Полеты приостановлены по метеоусловиям.';
         $status_color = '#ff3333'; // Максимально яркий красный
         $bg_color = 'rgba(51, 0, 0, 0.7)'; // Бордовая подложка
         $angle = -90 + (($score) / 40 * 30); // -90 to -60
         $tips = 'Совет: Безопасность превыше всего! Позвоните нам, чтобы перенести запись.';
    }

    return [
        'score' => $score,
        'verdict' => $verdict,
        'tips' => $tips,
        'status_color' => $status_color,
        'bg_color' => $bg_color,
        'angle' => $angle,
        'wind' => round($wind_speed, 1),
        'clouds' => $clouds,
        'desc' => mb_ucfirst($weather_desc)
    ];
}

// Помощник для большой буквы
function mb_ucfirst($str) {
    if (empty($str)) return $str;
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc . mb_substr($str, 1);
}
?>
