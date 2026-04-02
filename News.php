<?php
require 'includes/db_connect.php';
$newsItems = $pdo->query("SELECT * FROM news WHERE is_active=1 ORDER BY sort_order ASC, id DESC")->fetchAll(PDO::FETCH_ASSOC);

$pageCss = 'news.css';
require_once 'includes/header.php';
?>

     <!-- Основной контент страницы -->
    <main class="news-page">
        <h1 class="page-title">НОВОСТИ</h1>
        
        <div class="news-grid">
            <?php foreach ($newsItems as $n): ?>
            <div class="news-card">
                <!-- Картинка слева -->
                <div class="news-card-image">
                    <?php if ($n['image']): ?>
                        <img src="<?= htmlspecialchars($n['image']) ?>" alt="<?= htmlspecialchars($n['title']) ?>">
                        <?php if ($n['tag']): ?><span class="news-tag"><?= htmlspecialchars($n['tag']) ?></span><?php endif; ?>
                    <?php else: ?>
                        <div class="news-card-image-placeholder"><i class="fas fa-newspaper"></i></div>
                    <?php endif; ?>
                </div>
                <!-- Контент справа -->
                <div class="news-card-body">
                    <?php if ($n['pub_date']): ?>
                    <span class="news-date">
                        <i class="far fa-calendar-alt"></i>
                        <?= date('j F Y', strtotime($n['pub_date'])) ?>
                    </span>
                    <?php endif; ?>
                    <h2 class="news-title"><?= htmlspecialchars($n['title']) ?></h2>
                    <p class="news-excerpt"><?= htmlspecialchars($n['excerpt']) ?></p>
                    <a href="news_detail.php?id=<?= $n['id'] ?>" class="news-btn">Подробнее</a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($newsItems)): ?>
            <p style="text-align:center;color:#888;padding:40px 0">Новости не найдены</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Подвал -->
    
<?php require_once 'includes/footer.php'; ?>
