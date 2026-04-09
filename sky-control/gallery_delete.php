<?php
require 'auth.php';
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['filename'])) {
    $id       = (int)$_POST['id'];
    $filename = basename($_POST['filename']); // защита от path traversal
    $path     = '../images/gallery/' . $filename;

    $pdo->prepare("DELETE FROM gallery_photos WHERE id=?")->execute([$id]);
    if (file_exists($path)) @unlink($path);
}
header('Location: gallery.php?msg=deleted'); exit;
