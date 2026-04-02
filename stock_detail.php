<?php
require 'includes/db_connect.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM stocks WHERE id = ? AND is_active = 1");
$stmt->execute([$id]);
$stock = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$stock) {
    header('Location: stocks.php');
    exit;
}

$pageCss = 'stocks.css'; 
$pageTitle = $stock['title'];
require_once 'includes/header.php';
?>

<main class="stocks-page" style="min-height: 40vh; margin-top: 120px; position: relative; z-index: 10;">
    <div style="max-width: 800px; margin: 0 auto; padding: 0 15px;">
        <div style="background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); padding: 40px;">
            <h1 style="font-size: 2.2rem; color: #1a5a9e; margin-bottom: 30px; text-transform: uppercase; font-weight: 700;"><?= htmlspecialchars($stock['title']) ?></h1>
            
            <?php if ($stock['description']): ?>
                <div style="font-size: 1.15rem; line-height: 1.8; color: #444; margin-bottom: 40px;">
                    <?= nl2br(htmlspecialchars($stock['description'])) ?>
                </div>
            <?php endif; ?>
            
            <a href="stocks.php" style="display: inline-block; background-color: #216DBD; color: white; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: opacity 0.3s;" onmouseover="this.style.opacity=0.8" onmouseout="this.style.opacity=1">← Вернуться ко всем акциям</a>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
