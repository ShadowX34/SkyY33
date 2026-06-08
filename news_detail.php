<?php
require 'includes/db_connect.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM news WHERE id = ? AND is_active = 1");
$stmt->execute([$id]);
$news = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$news) {
    header('Location: news.php');
    exit;
}

$pageCss = 'news.css';
$pageTitle = $news['title'];
require_once 'includes/header.php';
?>

<main class="news-page" style="min-height: 40vh; margin-top: 120px; position: relative; z-index: 10;">
    <div class="news-detail-container">
        <div class="news-detail-card">
            <?php if ($news['image']): ?>
            <div class="news-detail-img-wrapper">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
            </div>
            <?php endif; ?>
            
            <h1 class="news-detail-title"><?= htmlspecialchars($news['title']) ?></h1>
            
            <?php if ($news['pub_date']): 
                $m = [1=>'января',2=>'февраля',3=>'марта',4=>'апреля',5=>'мая',6=>'июня',7=>'июля',8=>'августа',9=>'сентября',10=>'октября',11=>'ноября',12=>'декабря'];
                $ts = strtotime($news['pub_date']);
            ?>
                <div class="news-detail-date">
                    <?= date('j', $ts) . ' ' . $m[(int)date('n', $ts)] . ' ' . date('Y', $ts) ?>
                </div>
            <?php endif; ?>
            
            <?php if ($news['excerpt']): ?>
                <div class="news-detail-content">
                    <?= nl2br(htmlspecialchars($news['excerpt'])) ?>
                </div>
            <?php endif; ?>
            
            <a href="news.php" class="news-detail-back-btn">← Вернуться ко всем новостям</a>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
