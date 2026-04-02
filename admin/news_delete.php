<?php
require 'auth.php';
require '../includes/db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $pdo->prepare("DELETE FROM news WHERE id=?")->execute([(int)$_POST['id']]);
}
header('Location: news.php?msg=deleted'); exit;
