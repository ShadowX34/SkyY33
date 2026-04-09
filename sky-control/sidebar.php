<?php $cur = basename($_SERVER['PHP_SELF']); ?>
<div class="sidebar">
    <div class="sidebar-logo">
        <img src="../images/Лого2.png" alt="Лого">
        <h2>АСК ДОСААФ<br>Панель управления</h2>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section-title">Главное</div>
        <a href="index.php" class="<?= $cur==='index.php'?'active':'' ?>">
            <i class="fas fa-tachometer-alt"></i><span>Дашборд</span>
        </a>
        <a href="orders.php" class="<?= $cur==='orders.php'?'active':'' ?>">
            <i class="fas fa-shopping-cart"></i><span>Заказы</span>
        </a>
        <div class="nav-section-title">Контент</div>
        <a href="news.php" class="<?= $cur==='news.php'?'active':'' ?>">
            <i class="fas fa-newspaper"></i><span>Новости</span>
        </a>
        <a href="stocks.php" class="<?= $cur==='stocks.php'?'active':'' ?>">
            <i class="fas fa-tag"></i><span>Акции</span>
        </a>
        <a href="gallery.php" class="<?= $cur==='gallery.php'?'active':'' ?>">
            <i class="fas fa-images"></i><span>Галерея</span>
        </a>
        <a href="reviews.php" class="<?= $cur==='reviews.php'?'active':'' ?>">
            <i class="fas fa-star"></i><span>Отзывы</span>
        </a>
        <div class="nav-section-title">Сайт</div>
        <a href="../index.php" target="_blank">
            <i class="fas fa-external-link-alt"></i><span>На сайт</span>
        </a>
    </nav>
    <div class="sidebar-footer">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Выйти</span></a>
    </div>
</div>
