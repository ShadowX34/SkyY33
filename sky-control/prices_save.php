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
