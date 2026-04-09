<?php
require 'auth.php';
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: reviews.php'); exit; }

$id          = (int)($_POST['id'] ?? 0);
$type        = in_array($_POST['type'] ?? '', ['slider','gratitude']) ? $_POST['type'] : 'slider';
$review_text = trim($_POST['review_text'] ?? '');
$caption     = trim($_POST['caption'] ?? '');
$author_name = trim($_POST['author_name'] ?? '');
$sort_order  = (int)($_POST['sort_order'] ?? 0);
$is_active   = isset($_POST['is_active']) ? 1 : 0;

// Текущее изображение при редактировании
$image = '';
if ($id > 0) {
    $stmt = $pdo->prepare("SELECT image FROM reviews WHERE id=?");
    $stmt->execute([$id]);
    $image = $stmt->fetchColumn() ?: '';
}

if (!empty($_FILES['image']['name'])) {
    $allowed = ['jpg','jpeg','png','webp','gif','jpeg'];
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed) || !getimagesize($_FILES['image']['tmp_name'])) {
        header('Location: reviews.php?msg=error'); exit;
    }
    $filename = 'review_' . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], '../images/reviews/' . $filename);
    $image = $filename;
} elseif ($id === 0) {
    header('Location: reviews.php?msg=error'); exit;
}

if ($id > 0) {
    $stmt = $pdo->prepare("UPDATE reviews SET type=?,image=?,author_name=?,review_text=?,caption=?,sort_order=?,is_active=? WHERE id=?");
    $stmt->execute([$type,$image,$author_name,$review_text,$caption,$sort_order,$is_active,$id]);
} else {
    $stmt = $pdo->prepare("INSERT INTO reviews (type,image,author_name,review_text,caption,sort_order,is_active) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$type,$image,$author_name,$review_text,$caption,$sort_order,$is_active]);
}
header('Location: reviews.php?msg=saved'); exit;
