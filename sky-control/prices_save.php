<?php
// sky-control/prices_save.php
require 'auth.php';
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['services']) || !is_array($_POST['services'])) {
    header('Location: prices.php');
    exit;
}

try {
    // Начинаем транзакцию для безопасности обновлений (все сохраняется или ничего)
    $pdo->beginTransaction();
    
    // Подготавливаем запрос на обновление
    $stmt = $pdo->prepare("UPDATE prices SET service_name = ?, unit = ?, price = ?, description = ? WHERE id = ?");
    $stmtImage = $pdo->prepare("UPDATE prices SET image = ? WHERE id = ?");
    
    foreach ($_POST['services'] as $id => $data) {
        $id = (int)$id;
        $name = trim($data['name'] ?? '');
        $unit = trim($data['unit'] ?? '1');
        $price = floatval($data['price'] ?? 0);
        $description = isset($data['description']) ? trim($data['description']) : null;
        
        // Базовая валидация: имя не должно быть пустым, а цена не должна быть отрицательной
        if (empty($name) || $price < 0) {
            throw new Exception("Невалидные данные для услуги ID: " . $id);
        }
        
        $stmt->execute([$name, $unit, $price, $description, $id]);

        $fileKey = "image_" . $id;
        if (!empty($_FILES[$fileKey]['name'])) {
            $allowed = ['jpg','jpeg','png','webp','gif'];
            $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
            if (in_array($ext, $allowed) && getimagesize($_FILES[$fileKey]['tmp_name'])) {
                $filename = 'cert_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], '../images/' . $filename)) {
                    @chmod('../images/' . $filename, 0644);
                    $stmtImage->execute(['images/' . $filename, $id]);
                } else {
                    throw new Exception("Ошибка загрузки файла изображения для ID: " . $id);
                }
            } else {
                throw new Exception("Недопустимый формат файла изображения для ID: " . $id);
            }
        }
    }
    
    // Подтверждаем транзакцию
    $pdo->commit();
    
    header('Location: prices.php?msg=success');
    exit;
} catch (Exception $e) {
    // Откатываем изменения в случае ошибки
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    
    header('Location: prices.php?msg=error');
    exit;
}
?>
