<?php
require 'auth.php';
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['images'])) {
    header('Location: gallery.php'); exit;
}

$allowed = ['jpg','jpeg','png','webp'];
$uploaded = 0;

foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
    if ($_FILES['images']['error'][$i] !== UPLOAD_ERR_OK) continue;
    if (!getimagesize($tmp)) continue;

    $ext = strtolower(pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) continue;
    if ($_FILES['images']['size'][$i] > 15 * 1024 * 1024) continue; // 15MB max

    $filename = 'gallery_' . uniqid() . '.' . $ext;
    if (move_uploaded_file($tmp, '../images/gallery/' . $filename)) {
        $pdo->prepare("INSERT INTO gallery_photos (filename) VALUES (?)")->execute([$filename]);
        $uploaded++;
    }
}

header('Location: gallery.php?msg=' . ($uploaded > 0 ? 'uploaded' : 'error')); exit;
