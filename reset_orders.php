<?php
/**
 * Скрипт очистки и сброса счетчика заказов
 * 
 * ВНИМАНИЕ: Запустите этот файл один раз (открыв в браузере),
 * чтобы полностью удалить тестовые заказы и сбросить нумерацию на 1.
 * После выполнения ОБЯЗАТЕЛЬНО удалите этот файл с сервера в целях безопасности!
 */

require 'includes/db_connect.php';

try {
    // Очищаем таблицу и сбрасываем счетчик автоинкремента на 1 одним запросом
    $pdo->exec("TRUNCATE TABLE certificate_orders");
    
    echo "<div style='font-family: Arial, sans-serif; max-width: 500px; margin: 50px auto; padding: 30px; border: 1px solid #d4edda; border-radius: 8px; background-color: #d4edda; color: #155724; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>";
    echo "<h2 style='margin-top:0;'>Успешно!</h2>";
    echo "<p>Таблица заказов полностью очищена, а нумерация сброшена.</p>";
    echo "<p>Теперь все новые заказы будут начинаться с <strong>№ 1</strong>.</p>";
    echo "<strong style='color: #721c24;'>ВАЖНО: Пожалуйста, удалите файл <u>reset_orders.php</u> с сервера прямо сейчас!</strong>";
    echo "</div>";
    
} catch (PDOException $e) {
    echo "<div style='font-family: Arial, sans-serif; max-width: 500px; margin: 50px auto; padding: 30px; border: 1px solid #f8d7da; border-radius: 8px; background-color: #f8d7da; color: #721c24; text-align: center;'>";
    echo "<h2 style='margin-top:0;'>Ошибка!</h2>";
    echo "<p>Не удалось выполнить сброс: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "</div>";
}
?>
