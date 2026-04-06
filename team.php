<?php
$pageCss = 'team.css';
require_once 'includes/header.php';
?>



<main class="team-page">
    <h1 class="page-title">КОМАНДА</h1>

    <div class="team-section">
        <h2 class="section-title">Руководство / Администрация</h2>
        <div class="team-grid grid-2">
            <div class="team-member" data-src="images/Team/1.png">
                <img src="images/Team/1.png" alt="Руководитель 1" class="member-photo">
                <h3 class="member-name">Вячеслав Трынов</h3>
                <p class="member-role">Начальник аэроклуба</p>
            </div>
            <div class="team-member" data-src="images/Team/2.png">
                <img src="images/Team/2.png" alt="Руководитель 2" class="member-photo">
                <h3 class="member-name">Роман Сидоров</h3>
                <p class="member-role">Главный администратор</p>
            </div>
        </div>
    </div>

    <div class="team-section">
        <h2 class="section-title">Тандем-инструкторы / Операторы</h2>
        <div class="team-grid grid-5">
            <div class="team-member" data-src="images/Team/3.png">
                <img src="images/Team/3.png" alt="Инструктор 1" class="member-photo">
                <h3 class="member-name">Дмитрий Пудов</h3>
                <p class="member-role">Тандем-инструктор</p>
            </div>
            <div class="team-member" data-src="images/Team/4.png">
                <img src="images/Team/4.png" alt="Инструктор 2" class="member-photo">
                <h3 class="member-name">Дмитрий Овчаренко</h3>
                <p class="member-role">Тандем-инструктор</p>
            </div>
            <div class="team-member" data-src="images/Team/5.png">
                <img src="images/Team/5.png" alt="Инструктор 3" class="member-photo">
                <h3 class="member-name">Олег Кудашев</h3>
                <p class="member-role">Воздушный оператор</p>
            </div>
            <div class="team-member" data-src="images/Team/6.png">
                <img src="images/Team/6.png" alt="Инструктор 4" class="member-photo">
                <h3 class="member-name">Денис Токарев</h3>
                <p class="member-role">Тандем-инструктор</p>
            </div>
            <div class="team-member" data-src="images/Team/7.png">
                <img src="images/Team/7.png" alt="Инструктор 5" class="member-photo">
                <h3 class="member-name">Арсений Ушаков</h3>
                <p class="member-role">Воздушный оператор</p>
            </div>
        </div>
    </div>

    <div class="team-section">
        <h2 class="section-title">Инструкторы по подготовке к первому прыжку</h2>
        <div class="team-grid grid-1">
            <div class="team-member" data-src="images/Team/8.png">
                <img src="images/Team/8.png" alt="Инструктор" class="member-photo">
                <h3 class="member-name">Роман Герасимов</h3>
                <p class="member-role">Старший инструктор ПДП</p>
            </div>
        </div>
    </div>
</main>

<!-- Лайтбокс -->
<div id="lightbox" class="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">×</button>
    <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">❮</button>
    <div class="lightbox-inner">
        <img id="lightbox-img" src="" alt="Увеличенное фото">
    </div>
    <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">❯</button>
</div>

<script>
    const teamMembers = document.querySelectorAll('.team-member');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    let currentImages = [];
    let currentIndex = 0;

    teamMembers.forEach(member => {
        member.addEventListener('click', function () {
            currentImages = Array.from(teamMembers).map(el => el.getAttribute('data-src'));
            currentIndex = currentImages.indexOf(this.getAttribute('data-src'));
            showLightbox();
        });
    });

    function showLightbox() {
        if (currentImages.length === 0) return;
        lightboxImg.src = currentImages[currentIndex];
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    function changeImage(direction) {
        currentIndex += direction;
        if (currentIndex < 0) currentIndex = currentImages.length - 1;
        if (currentIndex >= currentImages.length) currentIndex = 0;
        lightboxImg.src = currentImages[currentIndex];
    }

    lightbox.addEventListener('click', function (e) {
        if (e.target === lightbox || e.target.classList.contains('lightbox-inner')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') changeImage(-1);
        if (e.key === 'ArrowRight') changeImage(1);
    });
</script>

<?php require_once 'includes/footer.php'; ?>