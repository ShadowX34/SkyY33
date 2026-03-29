<?php
require 'db_connect.php';

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
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы - Владимирский АСК ДОСААФ России</title>
    <meta name="description" content="Отзывы клиентов Владимирского авиационно-спортивного клуба ДОСААФ России о прыжках с парашютом">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
    <style>
        /* === СБРОС И БАЗОВЫЕ === */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', 'Arial', sans-serif; }
        :root {
            --primary: #216DBD;
            --primary-dark: #1a5a9e;
            --secondary: #ffc107;
            --light: #f8f9fa;
            --dark: #212529;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        body { padding-top: 90px; background-color: #f4f6fb; color: #333; line-height: 1.6; }

        /* === ШАПКА === */
        header { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); box-shadow: 0 4px 20px rgba(0,0,0,0.15); position: fixed; width: 100%; top: 0; z-index: 1000; padding: 0 5%; }
        .header-container { display: flex; justify-content: space-between; align-items: center; max-width: 1920px; margin: 0 auto; height: 80px; }
        .logo-container { display: flex; align-items: center; gap: 15px; }
        .logo { height: 60px; width: 60px; border-radius: 50%; overflow: hidden; transition: var(--transition); background: url('images/Лого2.png') center/cover no-repeat; }
        .logo:hover { transform: scale(1.05); box-shadow: 0 5px 15px rgba(0,0,0,0.3); }
        .company-name { color: white; font-weight: 700; font-size: 1rem; max-width: 200px; line-height: 1.3; }
        .nav-container { display: flex; align-items: center; }
        .nav-menu { display: flex; list-style: none; margin-right: 30px; transition: var(--transition); }
        .nav-item { position: relative; margin: 0 12px; }
        .nav-link { color: rgba(255,255,255,0.9); text-decoration: none; font-weight: 500; font-size: 1rem; padding: 28px 5px; display: block; position: relative; transition: var(--transition); }
        .nav-link:hover { color: var(--secondary); }
        .nav-link::after { content: ''; position: absolute; bottom: 20px; left: 0; width: 0; height: 2px; background: var(--secondary); transition: var(--transition); }
        .nav-link:hover::after { width: 100%; }
        /* Дропдаун */
        .nav-item.dropdown { position: relative !important; }
        ul.dropdown-child { display: none; position: absolute; top: 100%; left: 0; background: var(--primary-dark); min-width: 220px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); z-index: 2000; padding: 0; margin: 0; border-radius: 0 0 8px 8px; }
        .nav-item.dropdown:hover ul.dropdown-child { display: block; animation: fadeIn 0.3s ease; }
        ul.dropdown-child li { list-style: none !important; margin: 0; }
        ul.dropdown-child li a { color: white !important; padding: 15px 20px !important; text-decoration: none !important; display: block !important; font-size: 0.95rem; font-weight: 500; border-bottom: 1px solid rgba(255,255,255,0.05); transition: all 0.3s ease; }
        ul.dropdown-child li:last-child a { border-bottom: none; }
        ul.dropdown-child li a:hover { background: var(--secondary) !important; color: var(--dark) !important; padding-left: 25px !important; }
        .drop-icon { font-size: 0.8em; margin-left: 5px; transition: transform 0.3s ease; }
        .nav-item.dropdown:hover .drop-icon { transform: rotate(180deg); }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        .phone-container { display: flex; align-items: center; background: rgba(255,255,255,0.15); border-radius: 30px; padding: 8px 20px; transition: var(--transition); backdrop-filter: blur(4px); border: 1px solid rgba(255,255,255,0.2); }
        .phone-container:hover { background: rgba(255,255,255,0.25); transform: translateY(-2px); }
        .phone-icon { color: var(--secondary); margin-right: 10px; font-size: 1.2rem; }
        .phone-link { color: white; font-weight: 700; font-size: 1.1rem; text-decoration: none; }
        .phone-link:hover { color: var(--secondary); }
        .hamburger { display: none; cursor: pointer; }
        @media (max-width: 992px) {
            .nav-menu { position: fixed; top: 70px; left: 0; width: 100%; height: calc(100vh - 70px); background: linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%); flex-direction: column; align-items: center; justify-content: flex-start; padding-top: 30px; transform: translateX(-100%); opacity: 0; transition: transform 0.4s ease, opacity 0.3s ease; z-index: 999; overflow-y: auto; }
            .nav-menu.active { transform: translateX(0); opacity: 1; }
            .nav-item { margin: 15px 0; width: 100%; text-align: center; }
            .nav-link { padding: 15px 0; font-size: 1.2rem; }
            .hamburger { display: flex; flex-direction: column; justify-content: center; align-items: center; width: 30px; height: 30px; }
            .hamburger span { display: block; width: 30px; height: 3px; background: white; margin: 4px 0; transition: var(--transition); }
            .hamburger.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
            .hamburger.active span:nth-child(2) { opacity: 0; }
            .hamburger.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
            ul.dropdown-child { position: static; display: none; background: rgba(0,0,0,0.15); box-shadow: none; width: 100%; }
            .nav-item.dropdown:hover ul.dropdown-child { display: block; }
        }
        @media (max-width: 576px) { .company-name { display: none; } }

        /* === СТРАНИЦА ОТЗЫВОВ === */
        .reviews-page { max-width: 1100px; margin: 40px auto; padding: 0 30px; text-align: center; }

        .page-title {
            font-size: 2.4rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            padding-bottom: 20px;
            text-shadow: none;
        }
        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }

        /* === КАРТОЧКА ОТЗЫВА === */
        .review-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(33, 109, 189, 0.10);
            display: flex;
            align-items: center;
            gap: 50px;
            padding: 45px 55px;
            margin-bottom: 35px;
            text-align: left;
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.3s;
        }
        .review-card:hover { box-shadow: 0 12px 50px rgba(33, 109, 189, 0.15); }

        /* Жёлтая полоска слева */
        .review-card::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 6px;
            background: var(--secondary);
        }

        /* Круглое фото */
        .review-photo-wrap {
            flex-shrink: 0;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--secondary);
            box-shadow: 0 6px 24px rgba(0,0,0,0.13);
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .review-photo-wrap:hover { transform: scale(1.05); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .review-photo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Тело отзыва */
        .review-body { flex: 1; }
        .review-author-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-dark);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 18px;
            text-shadow: none;
        }
        .review-quote {
            font-size: 1.05rem;
            line-height: 1.85;
            color: #555;
            font-style: italic;
            position: relative;
            padding-left: 24px;
        }
        .review-quote::before {
            content: '\201C';
            font-size: 5rem;
            color: var(--primary);
            opacity: 0.12;
            position: absolute;
            left: -8px;
            top: -20px;
            font-family: Georgia, serif;
            line-height: 1;
        }

        /* === НАВИГАЦИЯ === */
        .slider-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
            margin-bottom: 70px;
        }
        .slider-btn {
            background: var(--primary);
            color: white;
            border: none;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 14px rgba(33, 109, 189, 0.25);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .slider-btn:hover { background: var(--secondary); color: var(--dark); transform: scale(1.1); }
        .slider-counter {
            font-weight: 600;
            color: #888;
            font-size: 1.05rem;
            min-width: 90px;
            text-align: center;
        }

        /* === БЛАГОДАРСТВЕННЫЕ ПИСЬМА === */
        .section-subtitle {
            font-size: 1.9rem;
            font-weight: 700;
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 16px;
            text-shadow: none;
        }
        .section-subtitle::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .gratitude-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-bottom: 50px;
        }
        .gratitude-item {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .gratitude-item:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.15); }
        .gratitude-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        /* === ЛАЙТБОКС === */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 3000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.92);
            justify-content: center;
            align-items: center;
        }
        .lightbox.open { display: flex; }
        .lightbox-inner {
            position: relative;
            width: 95%;
            max-width: 1000px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .lightbox img {
            width: 100%;
            max-height: 85vh;
            border-radius: 10px;
            box-shadow: 0 0 40px rgba(0,0,0,0.5);
            object-fit: contain;
        }
        .lightbox-caption {
            color: white;
            margin-top: 18px;
            font-size: 1.05rem;
            text-align: center;
            line-height: 1.6;
            padding: 0 15px;
            opacity: 0.9;
            max-width: 800px;
        }
        .lightbox-close {
            position: absolute;
            top: -48px;
            right: 0;
            color: white;
            font-size: 36px;
            background: none;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            z-index: 3001;
        }
        .lightbox-close:hover { color: var(--secondary); transform: scale(1.1); }

        /* === АДАПТИВ === */
        @media (max-width: 900px) {
            .review-card { flex-direction: column; text-align: center; padding: 30px 25px; gap: 25px; }
            .review-card::before { width: 100%; height: 5px; top: 0; left: 0; bottom: auto; }
            .review-quote { padding-left: 0; }
            .review-quote::before { display: none; }
            .review-photo-wrap { width: 130px; height: 130px; }
            .gratitude-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 500px) {
            .page-title { font-size: 1.8rem; }
            .gratitude-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
            .gratitude-img { height: 160px; }
            .slider-btn { width: 44px; height: 44px; font-size: 16px; }
        }

        /* === ПОДВАЛ === */
        .footer { background-color: var(--primary-dark); color: white; padding: 60px 10% 30px; position: relative; margin-top: 50px; }
        .footer-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 50px; max-width: 1400px; margin: 0 auto; }
        .footer-logo { margin-bottom: 20px; display: flex; align-items: center; gap: 15px; }
        .footer-logo-img { height: 60px; width: 60px; border-radius: 50%; }
        .footer-logo-text { font-size: 1.2rem; font-weight: 700; max-width: 200px; line-height: 1.3; }
        .footer-about { font-size: 0.95rem; line-height: 1.7; margin-bottom: 20px; opacity: 0.9; }
        .footer-copyright { font-size: 0.9rem; opacity: 0.7; margin-top: 30px; }
        .footer-section-title { font-size: 1.4rem; font-weight: 700; margin-bottom: 25px; position: relative; padding-bottom: 15px; text-transform: uppercase; }
        .footer-section-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background: var(--secondary); }
        .footer-contact-item { display: flex; align-items: flex-start; margin-bottom: 18px; }
        .footer-contact-icon { color: var(--secondary); margin-right: 15px; font-size: 1.2rem; margin-top: 3px; }
        .footer-contact-text { font-size: 0.97rem; line-height: 1.6; opacity: 0.9; }
        .footer-contact-text a { color: white; text-decoration: none; transition: var(--transition); }
        .footer-contact-text a:hover { color: var(--secondary); }
        .footer-map { height: 280px; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .footer-map iframe { width: 100%; height: 100%; border: none; }
        .footer-bottom { text-align: center; margin-top: 60px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.9rem; opacity: 0.7; }
        .footer-socials { margin-top: 25px; margin-bottom: 25px; }
        .socials-title { font-size: 1rem; font-weight: 600; margin-bottom: 15px; opacity: 0.9; }
        .social-icons { display: flex; gap: 15px; }
        .social-icon { display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; border-radius: 50%; text-decoration: none; font-size: 1.2rem; transition: var(--transition); border: 1px solid rgba(255,255,255,0.05); }
        .social-icon:hover { background: var(--secondary); color: var(--dark); transform: translateY(-5px); box-shadow: 0 5px 15px rgba(255,193,7,0.4); }
        @media (max-width: 992px) { .footer-container { grid-template-columns: 1fr 1fr; } .footer-map { grid-column: span 2; } }
        @media (max-width: 768px) { .footer-container { grid-template-columns: 1fr; } .footer-map { grid-column: span 1; height: 230px; } }
    </style>
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo-container">
            <a href="index.php"><img src="images/Лого2.png" class="logo" alt="Логотип"></a>
            <div class="company-name">Владимирский АСК ДОСААФ России<br><span style="font-size:0.9rem;">Прыжки с парашютом</span></div>
        </div>
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item dropdown">
                    <a href="about.php" class="nav-link">О нас <i class="fas fa-chevron-down drop-icon"></i></a>
                    <ul class="dropdown-child">
                        <li><a href="team.php">Команда</a></li>
                        <li><a href="reviews.php">Отзывы</a></li>
                        <li><a href="faq.php">Вопрос-ответ</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="certificates.php" class="nav-link">Подарочные сертификаты</a></li>
                <li class="nav-item"><a href="prices.php" class="nav-link">Цены</a></li>
                <li class="nav-item"><a href="gallery.php" class="nav-link">Галерея</a></li>
                <li class="nav-item"><a href="News.php" class="nav-link">Новости</a></li>
                <li class="nav-item"><a href="stocks.php" class="nav-link">Акции</a></li>
                <li class="nav-item"><a href="contacts.php" class="nav-link">Контакты</a></li>
            </ul>
            <div class="phone-container">
                <i class="fas fa-phone-alt phone-icon"></i>
                <a href="tel:89190234000" class="phone-link">8 919 023 40 00</a>
            </div>
            <div class="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>
</header>

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
<footer class="footer">
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-logo">
                <img src="images/Лого2.png" alt="Логотип" class="footer-logo-img">
                <div class="footer-logo-text">Владимирский АСК ДОСААФ России</div>
            </div>
            <p class="footer-about">Владимирский аэроклуб был основан в 1934 году. С тех пор мы подготовили множество летчиков, парашютистов и механиков.</p>
            <div class="footer-socials">
                <h4 class="socials-title">Мы в социальных сетях:</h4>
                <div class="social-icons">
                    <a href="https://vk.com/dz_vladimir" class="social-icon" target="_blank" title="ВКонтакте"><i class="fab fa-vk"></i></a>
                    <a href="https://t.me/vladskydive" class="social-icon" target="_blank" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
                    <a href="https://www.instagram.com/skydive_vladimir" class="social-icon" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/?_r=1" class="social-icon" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div class="footer-copyright">© 2026 Владимирский АСК ДОСААФ России. Все права защищены.</div>
        </div>
        <div class="footer-col">
            <h3 class="footer-section-title">Контакты</h3>
            <div class="footer-contact-item">
                <i class="fas fa-map-marker-alt footer-contact-icon"></i>
                <div class="footer-contact-text">Владимирская область, Суздальский район,<br>аэродром "Сокол"</div>
            </div>
            <div class="footer-contact-item">
                <i class="fas fa-phone-alt footer-contact-icon"></i>
                <div class="footer-contact-text"><a href="tel:+79190234000">8 (919) 023-40-00</a></div>
            </div>
            <div class="footer-contact-item">
                <i class="fas fa-envelope footer-contact-icon"></i>
                <div class="footer-contact-text"><a href="mailto:info@ask-dosaaf.ru">info@ask-dosaaf.ru</a></div>
            </div>
            <div class="footer-contact-item">
                <i class="fas fa-clock footer-contact-icon"></i>
                <div class="footer-contact-text">Пн-Пт: 9:00 - 18:00<br>Сб-Вс: 10:00 - 16:00</div>
            </div>
        </div>
        <div class="footer-col">
            <h3 class="footer-section-title">Схема проезда</h3>
            <div class="footer-map">
                <iframe src="https://yandex.ru/map-widget/v1/?ll=40.583509%2C56.249510&masstransit%5BstopId%5D=1543209455&mode=masstransit&tab=overview&z=17.95" frameborder="0" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <div class="footer-bottom">Негосударственное образовательное учреждение «Владимирский авиационно-спортивный клуб ДОСААФ России»</div>
</footer>

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
<script src="js/transitions.js"></script>
</body>
</html>