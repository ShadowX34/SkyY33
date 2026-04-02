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
    <div class="news-container" style="max-width: 800px; margin: 0 auto; padding: 0 15px;">
        <div style="background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); padding: 40px;">
            <?php if ($news['image']): ?>
            <div style="border-radius: 10px; overflow: hidden; margin-bottom: 30px;">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" style="width: 100%; height: auto; max-height: 400px; object-fit: cover; display: block;">
            </div>
            <?php endif; ?>
            
            <h1 style="font-size: 2.2rem; color: #1a5a9e; margin-bottom: 20px; text-transform: uppercase; font-weight: 700;"><?= htmlspecialchars($news['title']) ?></h1>
            
            <?php if ($news['pub_date']): ?>
                <div style="font-size: 1rem; color: #888; margin-bottom: 30px; font-weight: bold;">
                    <?= date('j F Y', strtotime($news['pub_date'])) ?>
                </div>
            <?php endif; ?>
            
            <?php if ($news['excerpt']): ?>
                <div style="font-size: 1.15rem; line-height: 1.8; color: #444; margin-bottom: 40px;">
                    <?= nl2br(htmlspecialchars($news['excerpt'])) ?>
                </div>
            <?php endif; ?>
            
            <a href="news.php" style="display: inline-block; background-color: #216DBD; color: white; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: opacity 0.3s;" onmouseover="this.style.opacity=0.8" onmouseout="this.style.opacity=1">← Вернуться ко всем новостям</a>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
