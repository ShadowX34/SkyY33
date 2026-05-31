<?php
// sky-control/prices_delete.php
require 'auth.php';
require '../includes/db_connect.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: prices.php');
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM prices WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: prices.php?msg=success');
    exit;
} catch (PDOException $e) {
    header('Location: prices.php?msg=error');
    exit;
}
?>
