<?php
require 'auth.php';
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['images'])) {
    header('Location: gallery.php'); exit;
}

$allowedImages = ['jpg','jpeg','png','webp'];
$allowedVideos = ['mp4','webm','ogg','mov','avi'];
$uploaded = 0;

foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
    if ($_FILES['images']['error'][$i] !== UPLOAD_ERR_OK) continue;

    $ext = strtolower(pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION));
    $isImage = in_array($ext, $allowedImages);
    $isVideo = in_array($ext, $allowedVideos);

    if (!$isImage && !$isVideo) continue;
    if ($isImage && !getimagesize($tmp)) continue;
    if ($_FILES['images']['size'][$i] > 50 * 1024 * 1024) continue; // 50MB max

    $filename = 'gallery_' . uniqid() . '.' . $ext;
    if (move_uploaded_file($tmp, '../images/gallery/' . $filename)) {
        @chmod('../images/gallery/' . $filename, 0644); // Обеспечиваем права доступа 0644 (чтение для всех)
        $pdo->prepare("INSERT INTO gallery_photos (filename) VALUES (?)")->execute([$filename]);
        $uploaded++;
    }
}

header('Location: gallery.php?msg=' . ($uploaded > 0 ? 'uploaded' : 'error')); exit;
