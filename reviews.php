<?php
require 'includes/db_connect.php';

// Статический массив имён авторов (не требует изменений БД)
$authorNames = [
    '1.png'  => 'Елена Григорьева',
    '2.png'  => 'Мария Соколова',
    '3.png'  => 'Алексей Новиков',
    '4.png'  => 'Сергей Орлов',
    '5.png'  => 'Ольга Захарова',
    '6.png'  => 'Ирина Козлова',
    '7.png'  => 'Светлана Морозова',
    '8.png'  => 'Дмитрий Волков',
    '9.png'  => 'Анна Лебедева',
    '10.png' => 'Павел Смирнов',
    '11.png' => 'Кирилл Фёдоров',
    '12.png' => 'Наталья Петрова',
    '13.png' => 'Виктория Иванова',
    '14.png' => 'Александр Попов',
    '15.png' => 'Юлия Семёнова',
    '16.png' => 'Михаил Кузнецов',
    '17.png' => 'Татьяна Белова',
    '18.png' => 'Анастасия Яковлева',
    '19.png' => 'Роман Громов',
    '20.png' => 'Екатерина Тихонова',
    '21.png' => 'Вадим Никитин',
    '22.png' => 'Алина Степанова',
    '23.png' => 'Константин Разумов',
    '24.png' => 'Людмила Сорокина',
    '25.png' => 'Евгений Пономарёв',
];

try {
    $sliders    = $pdo->query("SELECT image, review_text FROM reviews WHERE type='slider' AND is_active=1 ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
    $gratitudes = $pdo->query("SELECT image, caption FROM reviews WHERE type='gratitude' AND is_active=1 ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $sliders = [];
    $gratitudes = [];
}

if (empty($sliders)) {
    $sliders = [
        ['image'=>'1.png',  'review_text'=>'Если вы еще не прыгали с парашютом, то многое потеряли. Это незабываемые впечатления, крутой подарок и красота нереальная! Прыгали с сыном в разные дни. Фото абсолютно разные! С нашими инструкторами бояться нечего!!! Очень внимательные и ответственные!'],
        ['image'=>'2.png',  'review_text'=>'Даааа!!!! Я это сделала! Представь, летишь с парашютом и думаешь: а вдруг не раскроется? Страшно. Дышать трудно. Сердце между лопаток. А все равно восторг. Раскрылся — и снова счастье.'],
        ['image'=>'3.png',  'review_text'=>'Это был незабываемый день. Это так здорово, это ни с чем не сравнимо! Спасибо вам за слаженную работу и за мои эмоции!'],
        ['image'=>'4.png',  'review_text'=>'Это было незабываемо.'],
        ['image'=>'5.png',  'review_text'=>'С детства очень хотелось, долго не решалась — и вот наконец-то. Это такой кайф, особенно свободное падение. Было мало — хочу ещё!'],
    ];
}
if (empty($gratitudes)) {
    $gratitudes = [
        ['image'=>'11.jpg','caption'=>'Благодарность Владимирскому АСК ДОСААФ России за высокий уровень взаимодействия'],
        ['image'=>'22.jpg','caption'=>'Благодарность за вклад в патриотическое воспитание молодежи'],
        ['image'=>'33.jpeg','caption'=>'Благодарность за многолетнее сотрудничество'],
        ['image'=>'44.jpg','caption'=>'Благодарность за проведение прыжков с инвалидами'],
    ];
}

// Добавляем имя автора к каждому отзыву
foreach ($sliders as &$s) {
    $s['author_name'] = $authorNames[$s['image']] ?? 'Наш клиент';
}
unset($s);

$slidersJson    = json_encode(array_values($sliders),    JSON_UNESCAPED_UNICODE);
$gratitudesJson = json_encode(array_values($gratitudes), JSON_UNESCAPED_UNICODE);
?>
<?php
$pageCss = 'reviews.css';
require_once 'includes/header.php';
?>


<main class="reviews-page">
    <h1 class="page-title">ОТЗЫВЫ НАШИХ КЛИЕНТОВ</h1>

    <!-- КАРТОЧКА ОТЗЫВА -->
    <div class="review-card" id="reviewCard">
        <div class="review-photo-wrap" id="reviewPhotoWrap">
            <img src="" alt="Фото автора" class="review-photo-img" id="reviewPhoto">
        </div>
        <div class="review-body">
            <div class="review-author-name" id="reviewAuthor"></div>
            <div class="review-quote" id="reviewQuote"></div>
        </div>
    </div>

    <!-- НАВИГАЦИЯ -->
    <div class="slider-nav">
        <button class="slider-btn" id="prevReview" aria-label="Предыдущий отзыв">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="slider-counter" id="sliderCounter">1 / <?= count($sliders) ?></div>
        <button class="slider-btn" id="nextReview" aria-label="Следующий отзыв">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <!-- БЛАГОДАРСТВЕННЫЕ ПИСЬМА -->
    <h2 class="section-subtitle">Благодарственные письма</h2>
    <div class="gratitude-grid">
        <?php foreach ($gratitudes as $i => $g): ?>
        <div class="gratitude-item"
             data-src="images/reviews/<?= htmlspecialchars($g['image']) ?>"
             data-caption="<?= htmlspecialchars($g['caption'] ?? '') ?>">
            <img src="images/reviews/<?= htmlspecialchars($g['image']) ?>"
                 alt="Благодарность <?= $i + 1 ?>"
                 class="gratitude-img"
                 onerror="this.src='images/Лого2.png'">
        </div>
        <?php endforeach; ?>
    </div>
</main>

<!-- ЛАЙТБОКС -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-inner">
        <button class="lightbox-close" id="lightboxClose"><i class="fas fa-times"></i></button>
        <img src="" alt="Увеличенное фото" id="lightboxImg">
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>
</div>

<!-- ПОДВАЛ -->


<a href="https://wa.me/+79190234000?text=Здравствуйте!" class="whatsapp-float" target="_blank" title="Написать в WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>
<style>
    .whatsapp-float { position: fixed; width: 60px; height: 60px; bottom: 30px; right: 30px; background-color: #25d366; color: #FFF; border-radius: 50px; text-align: center; font-size: 35px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); z-index: 9999; display: flex; justify-content: center; align-items: center; text-decoration: none; transition: all 0.3s ease; animation: pulse-wa 2s infinite; }
    .whatsapp-float:hover { background-color: #128C7E; transform: scale(1.1); animation: none; }
    @keyframes pulse-wa { 0% { box-shadow: 0 0 0 0 rgba(37,211,102,0.7); } 70% { box-shadow: 0 0 0 15px rgba(37,211,102,0); } 100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); } }
    @media (max-width: 768px) { .whatsapp-float { width: 50px; height: 50px; bottom: 20px; right: 20px; font-size: 30px; } }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // === БУРГЕР МЕНЮ ===
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });
    }

    // === СЛАЙДЕР ОТЗЫВОВ ===
    const reviewsData = <?= $slidersJson ?>;
    let currentIndex = 0;
    const imgPath = 'images/reviews/';

    const reviewPhoto  = document.getElementById('reviewPhoto');
    const reviewAuthor = document.getElementById('reviewAuthor');
    const reviewQuote  = document.getElementById('reviewQuote');
    const counter      = document.getElementById('sliderCounter');
    const card         = document.getElementById('reviewCard');

    function showReview(idx, dir) {
        // Анимация слайда
        card.style.transition = 'none';
        card.style.opacity = '0';
        card.style.transform = 'translateX(' + (dir > 0 ? '40px' : '-40px') + ')';

        setTimeout(() => {
            const r = reviewsData[idx];
            reviewPhoto.src  = imgPath + r.image;
            reviewPhoto.alt  = r.author_name || 'Наш клиент';
            reviewAuthor.textContent = r.author_name || 'Наш клиент';
            reviewQuote.textContent  = r.review_text || '';
            counter.textContent = `${idx + 1} / ${reviewsData.length}`;

            card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateX(0)';
        }, 180);
    }

    // Инициализация (без анимации)
    const r0 = reviewsData[0];
    reviewPhoto.src  = imgPath + r0.image;
    reviewPhoto.alt  = r0.author_name || 'Наш клиент';
    reviewAuthor.textContent = r0.author_name || 'Наш клиент';
    reviewQuote.textContent  = r0.review_text || '';
    counter.textContent = `1 / ${reviewsData.length}`;

    document.getElementById('prevReview').addEventListener('click', () => {
        currentIndex = currentIndex > 0 ? currentIndex - 1 : reviewsData.length - 1;
        showReview(currentIndex, -1);
    });
    document.getElementById('nextReview').addEventListener('click', () => {
        currentIndex = currentIndex < reviewsData.length - 1 ? currentIndex + 1 : 0;
        showReview(currentIndex, 1);
    });

    // Клавиатурная навигация
    document.addEventListener('keydown', (e) => {
        if (lightbox.classList.contains('open')) return;
        if (e.key === 'ArrowLeft') document.getElementById('prevReview').click();
        if (e.key === 'ArrowRight') document.getElementById('nextReview').click();
    });

    // === ЛАЙТБОКС ===
    const lightbox        = document.getElementById('lightbox');
    const lightboxImg     = document.getElementById('lightboxImg');
    const lightboxCaption = document.getElementById('lightboxCaption');

    function openLightbox(src, caption) {
        lightboxImg.src = src;
        lightboxCaption.textContent = caption || '';
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    // Клик по фото автора отзыва
    document.getElementById('reviewPhotoWrap').addEventListener('click', () => {
        openLightbox(reviewPhoto.src, reviewAuthor.textContent);
    });

    // Клик по благодарностям
    document.querySelectorAll('.gratitude-item').forEach(item => {
        item.addEventListener('click', () => {
            openLightbox(item.dataset.src, item.dataset.caption);
        });
    });

    document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.classList.contains('open')) closeLightbox();
    });
});
</script>



<?php require_once 'includes/footer.php'; ?>
