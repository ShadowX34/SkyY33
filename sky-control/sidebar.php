<?php $cur = basename($_SERVER['PHP_SELF']); ?>
<!-- Кнопка мобильного меню (бургер) -->
<button class="mobile-toggle-btn" id="mobileToggleBtn" aria-label="Открыть меню">
    <i class="fas fa-bars"></i>
</button>

<!-- Затемнение контента при открытом меню -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

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
        <a href="prices.php" class="<?= $cur==='prices.php'?'active':'' ?>">
            <i class="fas fa-ruble-sign"></i><span>Цены и услуги</span>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.getElementById('mobileToggleBtn');
    const overlay = document.getElementById('sidebarOverlay');
    
    if (toggleBtn && sidebar && overlay) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
            
            // Меняем иконку (бургер / крестик)
            const icon = toggleBtn.querySelector('i');
            if (sidebar.classList.contains('open')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        });
        
        // Закрытие при клике по затемнению
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            toggleBtn.querySelector('i').className = 'fas fa-bars';
        });
        
        // Закрытие при клике по ссылкам меню (на мобилках)
        const sidebarLinks = sidebar.querySelectorAll('.sidebar-nav a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('show');
                    toggleBtn.querySelector('i').className = 'fas fa-bars';
                }
            });
        });
    }
});
</script>
