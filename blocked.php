<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$countdown = 0;
if (isset($_SESSION['blocked_until'])) {
    $countdown = $_SESSION['blocked_until'] - time();
}

// Если бан истек - отправляем обратно на главную
if ($countdown <= 0) {
    if (isset($_SESSION['blocked_until'])) unset($_SESSION['blocked_until']);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доступ ограничен</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0b1a2a;
            color: #fff;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        h1 {
            color: #ff3333;
            margin-top: 0;
            font-size: 2rem;
        }
        .timer {
            font-size: 3rem;
            font-weight: 800;
            margin: 20px 0;
            color: #ffa502;
        }
        p {
            color: #b0c4de;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>429</h1>
    <h2>Слишком много запросов</h2>
    <p>Мы зафиксировали подозрительно высокую активность. В целях безопасности доступ временно приостановлен.</p>
    
    <div class="timer" id="countdown"><?= $countdown ?></div>
    <p>секунд до разблокировки</p>
</div>

<script>
    let secondsLeft = <?= $countdown ?>;
    const timerElement = document.getElementById('countdown');
    
    const interval = setInterval(() => {
        secondsLeft--;
        if (secondsLeft <= 0) {
            clearInterval(interval);
            timerElement.innerHTML = "0";
            window.location.href = 'index.php'; // Возврат на сайт
        } else {
            timerElement.innerHTML = secondsLeft;
        }
    }, 1000);
</script>

</body>
</html>
