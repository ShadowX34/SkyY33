<?php
require 'includes/db_connect.php';
$stocks = $pdo->query("SELECT * FROM stocks WHERE is_active=1 ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);

$pageCss = 'stocks.css';
require_once 'includes/header.php';
?>
    <!-- Основной контент страницы акций -->
    <main class="stocks-page" style="position: relative; z-index: 10;">
        <h1 class="page-title">АКЦИИ</h1>
        
        <div class="stocks-container">
            <?php foreach ($stocks as $s): ?>
            <div class="stock-card">
                <!-- Картинка слева -->
                <div class="stock-card-image">
                    <?php 
                    $stImg = $s['image'] ?: 'images/stocks/скидка.webp';
                    if ($s['image'] && !preg_match('/^(http|images\/)/i', $s['image'])) $stImg = 'images/' . $s['image'];
                    ?>
                    <img src="<?= htmlspecialchars($stImg) ?>"
                         alt="<?= htmlspecialchars($s['title']) ?>"
                         onerror="this.style.display='none';this.parentElement.querySelector('.stock-card-image-placeholder').style.display='flex';">
                    <div class="stock-card-image-placeholder" style="display:none"><i class="fas fa-tag"></i></div>
                    <?php if ($s['tag']): ?><span class="stock-badge"><?= htmlspecialchars($s['tag']) ?></span><?php endif; ?>
                </div>
                <!-- Контент справа -->
                <div class="stock-card-body">
                
                    <h2 class="stock-title"><?= htmlspecialchars($s['title']) ?></h2>
                    <?php if ($s['description']): ?>
                    <p class="stock-description"><?= htmlspecialchars($s['description']) ?></p>
                    <?php endif; ?>
                    <a href="stock_detail.php?id=<?= $s['id'] ?>" class="stock-btn">Подробнее</a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($stocks)): ?>
            <p style="text-align:center;color:#888;padding:40px 0">Акции не найдены</p>
            <?php endif; ?>
        </div>
    </main>

    <a href="https://wa.me/+79190234000?text=Здравствуйте!" class="whatsapp-float" target="_blank" title="Написать в WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

<?php require_once 'includes/footer.php'; ?>
