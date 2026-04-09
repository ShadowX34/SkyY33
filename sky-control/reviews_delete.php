<?php
require 'auth.php';
require '../includes/db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $pdo->prepare("DELETE FROM reviews WHERE id=?")->execute([(int)$_POST['id']]);
}
header('Location: reviews.php?msg=deleted'); exit;
