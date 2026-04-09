<?php
require 'auth.php';
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: news.php'); exit; }

$id          = (int)($_POST['id'] ?? 0);
$title       = trim($_POST['title'] ?? '');
$excerpt     = trim($_POST['excerpt'] ?? '');
$tag         = trim($_POST['tag'] ?? '');
$pub_date    = $_POST['pub_date'] ?: date('Y-m-d');
$sort_order  = (int)($_POST['sort_order'] ?? 0);
$is_active   = isset($_POST['is_active']) ? 1 : 0;

if (!$title) { header('Location: news.php?msg=error'); exit; }

// Загрузка изображения
$image = $id > 0 ? ($pdo->prepare("SELECT image FROM news WHERE id=?") ?: null) : null;
if ($id > 0) {
    $stmt = $pdo->prepare("SELECT image FROM news WHERE id=?");
    $stmt->execute([$id]);
    $image = $stmt->fetchColumn() ?: '';
}

if (!empty($_FILES['image']['name'])) {
    $allowed = ['jpg','jpeg','png','webp','gif'];
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed) || !getimagesize($_FILES['image']['tmp_name'])) {
        header('Location: news.php?msg=error'); exit;
    }
    $filename = 'news_' . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $filename);
    $image = $filename;
} elseif ($id === 0) {
    header('Location: news.php?msg=error'); exit;
}

if ($id > 0) {
    $stmt = $pdo->prepare("UPDATE news SET title=?,excerpt=?,tag=?,image=?,pub_date=?,sort_order=?,is_active=? WHERE id=?");
    $stmt->execute([$title,$excerpt,$tag,$image,$pub_date,$sort_order,$is_active,$id]);
} else {
    $stmt = $pdo->prepare("INSERT INTO news (title,excerpt,tag,image,pub_date,sort_order,is_active) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$title,$excerpt,$tag,$image,$pub_date,$sort_order,$is_active]);
}
header('Location: news.php?msg=saved'); exit;
