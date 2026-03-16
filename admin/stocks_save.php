<?php
require 'auth.php';
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: stocks.php'); exit; }

$id          = (int)($_POST['id'] ?? 0);
$title       = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$tag         = trim($_POST['tag'] ?? '');
$price_label = trim($_POST['price_label'] ?? '');
$detail_text = trim($_POST['detail_text'] ?? '');
$pub_date    = $_POST['pub_date'] ?: null;
$sort_order  = (int)($_POST['sort_order'] ?? 0);
$is_active   = isset($_POST['is_active']) ? 1 : 0;

if (!$title) { header('Location: stocks.php?msg=error'); exit; }

if ($id > 0) {
    $stmt = $pdo->prepare("UPDATE stocks SET title=?,description=?,tag=?,price_label=?,detail_text=?,pub_date=?,sort_order=?,is_active=? WHERE id=?");
    $stmt->execute([$title,$description,$tag,$price_label,$detail_text,$pub_date,$sort_order,$is_active,$id]);
} else {
    $stmt = $pdo->prepare("INSERT INTO stocks (title,description,tag,price_label,detail_text,pub_date,sort_order,is_active) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->execute([$title,$description,$tag,$price_label,$detail_text,$pub_date,$sort_order,$is_active]);
}
header('Location: stocks.php?msg=saved'); exit;
