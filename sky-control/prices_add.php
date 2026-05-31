<?php
// sky-control/prices_add.php
require 'auth.php';
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: prices.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$category = trim($_POST['category'] ?? 'jumps');
$unit = trim($_POST['unit'] ?? '1');
$price = floatval($_POST['price'] ?? 0);
$description = isset($_POST['description']) ? trim($_POST['description']) : null;
$image = isset($_POST['image']) ? trim($_POST['image']) : null;

if (empty($name) || $price < 0) {
    header('Location: prices.php?msg=error');
    exit;
}

try {
    // Получаем максимальный sort_order для данной категории, чтобы вставить в конец
    $stmt = $pdo->prepare("SELECT MAX(sort_order) FROM prices WHERE category = ?");
    $stmt->execute([$category]);
    $maxSort = (int)$stmt->fetchColumn();
    $sortOrder = $maxSort + 10;
    
    // Вставляем новую запись
    $stmtInsert = $pdo->prepare(
        "INSERT INTO prices (category, service_name, unit, price, description, image, sort_order) 
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $stmtInsert->execute([$category, $name, $unit, $price, $description, $image, $sortOrder]);
    
    header('Location: prices.php?msg=success');
    exit;
} catch (PDOException $e) {
    header('Location: prices.php?msg=error');
    exit;
}
?>
