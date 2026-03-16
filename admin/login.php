<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php'); exit;
}

define('ADMIN_USER', 'admin');
// Пароль: sky2024 — смените через password_hash() для продакшн
define('ADMIN_PASS_HASH', '$2y$10$VKMFf38nfVrmYuV64S1g5eW4C0tYbd2fvq5t6KnUnXIWehcJV90hq');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username'] ?? '');
    $pass = $_POST['password'] ?? '';
    if ($user === ADMIN_USER && password_verify($pass, ADMIN_PASS_HASH)) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $user;
        header('Location: index.php'); exit;
    }
    $error = 'Неверный логин или пароль';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Вход — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="login-page">
    <div class="login-card">
        <img src="../images/Лого2.png" alt="Логотип">
        <h1>Панель управления</h1>
        <p>Владимирский АСК ДОСААФ</p>
        <?php if ($error): ?>
        <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="username" required autofocus placeholder="admin">
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:10px">
                <i class="fas fa-sign-in-alt"></i> Войти
            </button>
        </form>
    </div>
</div>
</body>
</html>
