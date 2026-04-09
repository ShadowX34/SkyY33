<?php
// verify_challenge.php — AJAX-эндпоинт для верификации JS-токена
if (session_status() === PHP_SESSION_NONE) session_start();

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$submitted_token = $input['token'] ?? '';

// Проверяем токен и что он не устарел (не старше 30 секунд)
if (
    isset($_SESSION['pending_challenge_token']) &&
    isset($_SESSION['challenge_issued_at']) &&
    $submitted_token === $_SESSION['pending_challenge_token'] &&
    (time() - $_SESSION['challenge_issued_at']) < 30
) {
    // Проверка пройдена!
    $_SESSION['js_challenge_passed'] = true;
    unset($_SESSION['pending_challenge_token']);
    unset($_SESSION['challenge_issued_at']);

    echo json_encode(['ok' => true]);
} else {
    echo json_encode(['ok' => false, 'error' => 'Invalid or expired token']);
}
?>
