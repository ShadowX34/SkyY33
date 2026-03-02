<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы - Владимирский АСК ДОСААФ России</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
    <style>
        /* БАЗОВЫЕ СТИЛИ, ШАПКА И ПОДВАЛ */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', 'Arial', sans-serif; }
        :root { --primary: #216DBD; --primary-dark: #1a5a9e; --secondary: #ffc107; --light: #f8f9fa; --dark: #212529; --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); }
        body { padding-top: 90px; background-color: #f8f9fa; color: #333; line-height: 1.6; }
        
        header { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); position: fixed; width: 100%; top: 0; z-index: 1000; padding: 0 5%; }
        .header-container { display: flex; justify-content: space-between; align-items: center; max-width: 1920px; margin: 0 auto; height: 80px; }
        .logo-container { display: flex; align-items: center; gap: 15px; }
        .logo { height: 60px; width: 60px; border-radius: 50%; overflow: hidden; transition: var(--transition); background: url('images/Лого2.png') center/cover no-repeat; }
        .logo:hover { transform: scale(1.05); box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); }
        .company-name { color: white; font-weight: 700; font-size: 1rem; letter-spacing: 0.5px; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); max-width: 200px; line-height: 1.3; }
        
        .nav-container { display: flex; align-items: center; }
        .nav-menu { display: flex; list-style: none; margin-right: 30px; transition: var(--transition); }
        .nav-item { position: relative; margin: 0 12px; }
        .nav-link { color: rgba(255, 255, 255, 0.9); text-decoration: none; font-weight: 500; font-size: 1rem; padding: 28px 5px; display: block; position: relative; transition: var(--transition); letter-spacing: 0.3px; }
        .nav-link:hover { color: var(--secondary); }
        .nav-link::after { content: ''; position: absolute; bottom: 20px; left: 0; width: 0; height: 2px; background: var(--secondary); transition: var(--transition); }
        .nav-link:hover::after { width: 100%; }
        
        /* ВЫПАДАЮЩЕЕ МЕНЮ */
        .nav-item.dropdown { position: relative !important; }
        ul.dropdown-child { display: none; position: absolute; top: 100%; left: 0; background: var(--primary-dark); min-width: 220px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); z-index: 2000; padding: 0; margin: 0; border-radius: 0 0 8px 8px; }
        .nav-item.dropdown:hover ul.dropdown-child { display: block; }
        ul.dropdown-child li { list-style: none !important; margin: 0; }
        ul.dropdown-child li a { color: white !important; padding: 15px 20px !important; text-decoration: none !important; display: block !important; font-size: 0.95rem; font-weight: 500; border-bottom: 1px solid rgba(255, 255, 255, 0.05); transition: all 0.3s ease; }
        ul.dropdown-child li:last-child a { border-bottom: none; }
        ul.dropdown-child li a:hover { background: var(--secondary) !important; color: var(--dark) !important; padding-left: 25px !important; }
        .drop-icon { font-size: 0.8em; margin-left: 5px; transition: transform 0.3s ease; }
        .nav-item.dropdown:hover .drop-icon { transform: rotate(180deg); }
        
        .phone-container { display: flex; align-items: center; background: rgba(255, 255, 255, 0.15); border-radius: 30px; padding: 8px 20px; transition: var(--transition); backdrop-filter: blur(4px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .phone-container:hover { background: rgba(255, 255, 255, 0.25); transform: translateY(-2px); }
        .phone-icon { color: var(--secondary); margin-right: 10px; font-size: 1.2rem; }
        .phone-link { color: white; font-weight: 700; font-size: 1.1rem; text-decoration: none; letter-spacing: 0.5px; transition: var(--transition); }
        .phone-link:hover { color: var(--secondary); text-shadow: 0 0 8px rgba(255, 193, 7, 0.4); }
        .hamburger { display: none; cursor: pointer; }

        @media (max-width: 992px) {
            .nav-menu { position: fixed; top: 70px; left: 0; width: 100%; height: calc(100vh - 70px); background: linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%); flex-direction: column; align-items: center; justify-content: flex-start; padding-top: 30px; transform: translateX(-100%); opacity: 0; transition: transform 0.4s ease, opacity 0.3s ease; z-index: 999; overflow-y: auto; }
            .nav-menu.active { transform: translateX(0); opacity: 1; }
            .nav-item { margin: 15px 0; width: 100%; text-align: center; }
            .nav-link { padding: 15px 0; font-size: 1.2rem; }
            .hamburger { display: flex; flex-direction: column; justify-content: center; align-items: center; width: 30px; height: 30px; transition: var(--transition); }
            .hamburger span { display: block; width: 30px; height: 3px; background: white; margin: 4px 0; transition: var(--transition); }
            .hamburger.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
            .hamburger.active span:nth-child(2) { opacity: 0; }
            .hamburger.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
            ul.dropdown-child { position: static; display: none; background: rgba(0, 0, 0, 0.15); box-shadow: none; width: 100%; }
            .nav-item.dropdown:hover ul.dropdown-child, .nav-item.dropdown:active ul.dropdown-child { display: block; }
        }
        @media (max-width: 576px) { .company-name { display: none; } }

        /* СТИЛИ СТРАНИЦЫ ОТЗЫВЫ */
        .reviews-page { max-width: 1000px; margin: 40px auto; padding: 0 20px; text-align: center; }
        .page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 50px; text-transform: uppercase; position: relative; padding-bottom: 20px; }
        .page-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--secondary); }

        /* Карусель отзывов */
        .slider-container { position: relative; max-width: 553px; margin: 0 auto 50px; background: white; padding: 10px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .slider-img { width: 100%; height: auto; aspect-ratio: 533 / 300; object-fit: cover; border-radius: 10px; display: block; background: #f0f0f0; cursor: pointer; transition: 0.3s; }
        .slider-img:hover { opacity: 0.9; }
        .slider-btn { position: absolute; top: 50%; transform: translateY(-50%); background: var(--primary); color: white; border: none; width: 50px; height: 50px; border-radius: 50%; font-size: 20px; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(0,0,0,0.2); display: flex; justify-content: center; align-items: center; z-index: 10; }
        .slider-btn:hover { background: var(--secondary); color: var(--dark); transform: translateY(-50%) scale(1.1); }
        .prev-btn { left: -25px; }
        .next-btn { right: -25px; }
        .slider-counter { position: absolute; bottom: -35px; left: 50%; transform: translateX(-50%); font-weight: 600; color: #666; font-size: 1.1rem; }

        /* Подсказка для клика */
        .click-hint { font-size: 0.9rem; color: var(--primary); margin-top: -30px; margin-bottom: 30px; font-weight: 500; display: block; }

        /* Текст отзыва */
        .review-text-block { background: white; padding: 40px; border-radius: 15px; border-left: 5px solid var(--secondary); margin-bottom: 50px; font-size: 1.15rem; font-style: italic; line-height: 1.8; color: #444; position: relative; box-shadow: 0 5px 20px rgba(0,0,0,0.05); text-align: left; }
        .review-text-block::before { content: '\201C'; font-size: 6rem; color: var(--primary); opacity: 0.1; position: absolute; top: -10px; left: 20px; font-family: Georgia, serif; line-height: 1; }

        /* Нижние фото с благодарностью */
        .gratitude-photos { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px; }
        .gratitude-img { width: 100%; height: 220px; object-fit: cover; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; cursor: pointer; background: #eee; }
        .gratitude-img:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.2); }

        /* ЛАЙТБОКС С ПОДПИСЬЮ (Увеличение фото) */
        .lightbox { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); }
        .lightbox.open { display: flex; justify-content: center; align-items: center; }
        .lightbox-inner { position: relative; width: 95%; max-width: 1200px; display: flex; flex-direction: column; align-items: center; }
        .lightbox img { width: 100%; max-height: 85vh; border-radius: 8px; box-shadow: 0 0 30px rgba(0,0,0,0.5); object-fit: contain; }
        .lightbox-caption { color: white; margin-top: 20px; font-size: 1.2rem; text-align: center; line-height: 1.5; padding: 0 15px; }
        .lightbox-close { position: absolute; top: -40px; right: 0; color: white; font-size: 35px; background: none; border: none; cursor: pointer; transition: 0.3s; z-index: 2001; }
        .lightbox-close:hover { color: var(--secondary); transform: scale(1.1); }

       @media (max-width: 768px) {
            .slider-img { height: auto; } /* Убрали фиксированную высоту, теперь она подстраивается сама */
            .slider-btn { width: 40px; height: 40px; font-size: 16px; }
            .prev-btn { left: -10px; }
            .next-btn { right: -10px; }
            .gratitude-photos { grid-template-columns: repeat(2, 1fr); }
            .review-text-block { padding: 30px 20px; font-size: 1.05rem; }
            .lightbox img { max-height: 75vh; } /* Сделали высоту чуть больше для телефонов */
            .lightbox-caption { font-size: 1rem; }
            .lightbox-close { top: -45px; right: 5px; }
        }

        /* ПОДВАЛ */
        .footer { background-color: var(--primary-dark); color: white; padding: 60px 10% 30px; position: relative; margin-top: 50px;}
        .footer-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 50px; max-width: 1400px; margin: 0 auto; }
        .footer-logo { margin-bottom: 20px; display: flex; align-items: center; gap: 15px; }
        .footer-logo-img { height: 60px; width: 60px; border-radius: 50%; }
        .footer-logo-text { font-size: 1.2rem; font-weight: 700; max-width: 200px; line-height: 1.3; }
        .footer-about { font-size: 0.95rem; line-height: 1.7; margin-bottom: 20px; opacity: 0.9; }
        .footer-copyright { font-size: 0.9rem; opacity: 0.7; margin-top: 30px; }
        .footer-section-title { font-size: 1.5rem; font-weight: 700; margin-bottom: 25px; position: relative; padding-bottom: 15px; text-transform: uppercase; }
        .footer-section-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 50px; height: 3px; background: var(--secondary); }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: white; text-decoration: none; transition: var(--transition); opacity: 0.9; font-size: 1rem; }
        .footer-links a:hover { color: var(--secondary); opacity: 1; padding-left: 5px; }
        .footer-contact-item { display: flex; align-items: flex-start; margin-bottom: 20px; }
        .footer-contact-icon { color: var(--secondary); margin-right: 15px; font-size: 1.2rem; margin-top: 3px; }
        .footer-contact-text { font-size: 1rem; line-height: 1.6; opacity: 0.9; }
        .footer-contact-text a { color: white; text-decoration: none; transition: var(--transition); }
        .footer-contact-text a:hover { color: var(--secondary); }
        .footer-map { height: 300px; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); position: relative; }
        .footer-map iframe { width: 100%; height: 100%; border: none; }
        .footer-bottom { text-align: center; margin-top: 60px; padding-top: 30px; border-top: 1px solid rgba(255, 255, 255, 0.1); font-size: 0.9rem; opacity: 0.7; }
        .footer-socials{margin-top:25px;margin-bottom:25px}.socials-title{font-size:1rem;font-weight:600;margin-bottom:15px;color:white;opacity:.9}.social-icons{display:flex;gap:15px}.social-icon{display:flex;align-items:center;justify-content:center;width:40px;height:40px;background:rgba(255,255,255,.1);color:white;border-radius:50%;text-decoration:none;font-size:1.2rem;transition:var(--transition);border:1px solid rgba(255,255,255,.05)}.social-icon:hover{background:var(--secondary);color:var(--dark);transform:translateY(-5px);box-shadow:0 5px 15px rgba(255,193,7,.4);border-color:var(--secondary)}
        @media (max-width: 992px) { .footer-container { grid-template-columns: 1fr 1fr; gap: 40px; } .footer-map { grid-column: span 2; } }
        @media (max-width: 768px) { .footer-container { grid-template-columns: 1fr; gap: 30px; } .footer-map { grid-column: span 1; height: 250px; } .footer-section-title { font-size: 1.3rem; margin-bottom: 20px; } }
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

        <div class="slider-container">
            <button class="slider-btn prev-btn" id="prevReview" aria-label="Предыдущее фото"><i class="fas fa-chevron-left"></i></button>
            <img src="images/reviews/1.png" alt="Отзыв клиента" class="slider-img" id="sliderImage" onerror="this.src='images/reviews/'">
            <button class="slider-btn next-btn" id="nextReview" aria-label="Следующее фото"><i class="fas fa-chevron-right"></i></button>
            <div class="slider-counter" id="sliderCounter">1 / 25</div>
        </div>
        

        <div class="review-text-block">
            "Если вы еще не прыгали с парашютом, то многое потеряли. Это незабываемые впечатления, крутой подарок и красота нереальная! Прыгали с сыном в разные дни. Фото абсолютно разные! По поводу страшно или нет... С нашими инструкторами бояться нечего!!! Очень внимательные и ответственные! С ними можно все!!!"
        </div>

        <div class="gratitude-photos">
            <img src="images/reviews/11.jpg" alt="Благодарность 1" class="gratitude-img" onerror="this.src='images/Лого2.png'" data-caption="Владимирская региональная общественная организация «Военно-патриотический клуб «Пересвет» выражает благодарность коллективу НОУ «Владимирский АСК ДОСААФ России» руководитель Трынов
Вячеслав Владимирович за высокий уровень взаимодействия и большой вклад в развитие военно-патриотического воспитания молодежи">
            <img src="images/reviews/22.jpg" alt="Благодарность 2" class="gratitude-img" onerror="this.src='images/Лого2.png'" data-caption="Благодарность выражается НОУ «Владимирский АСК ДОСААФ России» за весомый вклад в дело
патриотического воспитания молодежи, оказания помощи и поддержки в выполнении программы
парашютных прыжков, юнармейцам МО ВВПОД «Юнармия» Петушинского района Владимирской области.">
            <img src="images/reviews/33.jpeg" alt="Благодарность 3" class="gratitude-img" onerror="this.src='images/Лого2.png'" data-caption="МБУ ДО «ЦДОД» имени Героя Российской Федерации Владимира Вячеславовича Селиверстова выражает
благодарность НОУ «Владимирский АСК ДОСААФ России» за многолетнее сотрудничество в подготовке
воспитанников Центра в рядах Вооруженных Сил Российской Федерации, ежегодную качественную и
безопасную организацию учебно-тренировочных прыжков с парашютом.">
            <img src="images/reviews/44.jpg" alt="Благодарность 4" class="gratitude-img" onerror="this.src='images/Лого2.png'" data-caption="Благодарность Коллективу «НОУ Владимирский АСК ДОСААФ России» за проведение ознакомительных, учебно-
тренировочных прыжков с инвалидами-участниками проекта «Мы летаем, значит мы живем» РССИ, реализуемого при
поддержке фонда президентских грантов, за качественную и безопасную организацию прыжков с парашютом в 2018-
2021 г.г.">
        </div>
    </main>

    <div class="lightbox" id="lightbox">
        <div class="lightbox-inner">
            <button class="lightbox-close" id="lightboxClose"><i class="fas fa-times"></i></button>
            <img src="images/reviews/1.png" alt="Увеличенное фото" id="lightboxImg">
            <div class="lightbox-caption" id="lightboxCaption">Здесь будет текст отзыва...</div>
        </div>
    </div>

    <!-- Подвал -->

    <<footer class="footer">
        <div class="footer-container">
            <!-- Колонка 1: О клубе -->
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="images/Лого2.png" alt="Логотип" class="footer-logo-img">
                    <div class="footer-logo-text">Владимирский АСК ДОСААФ России</div>
                </div>
                <p class="footer-about">Владимирский аэроклуб был основан в 1934 году. С тех пор мы подготовили множество летчиков, парашютистов и механиков, среди которых более 200 мастеров спорта СССР и России.</p>
                
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Бургер меню
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                navMenu.classList.toggle('active');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });

            // ==========================================
            // 2. ДАННЫЕ СЛАЙДЕРА (ФОТО + ТЕКСТ)
            // ==========================================
            // Впиши сюда точные названия твоих файлов (включая .jpg, .png и т.д.)
            // и нужный текст для каждой фотографии.
            const reviewsData = [
                { file: "1.png", text: "Если вы еще не прыгали с парашютом, то многое потеряли. Это незабываемые впечатления, крутой подарок и красота нереальная! Прыгали с сыном в разные дни. Фото абсолютно разные! По поводу страшно или нет... С нашими инструкторами бояться нечего!!! Очень внимательные и ответственные! С ними можно все!!!" },
                { file: "2.png", text: "Даааа!!!! Я это сделала! одиночный прыжок!!! Представь, летишь с парашютом и думаешь: а вдруг не раскроется? Страшно. Дышать трудно. Сердце между лопаток. А все равно восторг. Бац! Раскрылся. И снова счастье. И сердце опять бьется. Вот пока не раскрылся - страсть, а когда раскрылся - любовь. Спасибо вам Прыжки с парашютом во Владимире это любовь" },
                { file: "3.png", text: "Это был незабываемый день. Это так здорово , это ни с чем не сравнимо , и не стоит рядом ! Спасибо вам за слаженную работу и за мои эмоции )" },
                { file: "4.png", text: "Это было незабываемо" },
                { file: "5.png", text: "С детства очень хотелось, долго не решалась - и вот наконец-то. Это такой кайф, особенно свободное падение. ) было мало - хочу ещё!" },
                { file: "6.png", text: "Исполнилась моя давняя мечта! Я к ней очень долго шла Очень боюсь высоты Очень рекомендую vlad-sky.ru. Всё доступно и понятно объясняют. Вам смогут предоставить для прыжка всё. Даже костюм и берцы. Ребята знают своё дело." },
                { file: "7.png", text: "Долго думала что подарить мужу на 35, сказал что попала в самую точку! С Днём Рождения наш дорогой и любимый" },
                { file: "8.png", text: "Мечты сбываются на высоте 3000 метров 25 секунд свободного падения, от которых захватывает дух и пропадает вера в происходящее. Это было невероятно! Отдельное спасибо инструктору Дмитрию, который с первых же секунд знакомства вселил уверенность и помог забыть про страх Планирую ли прыгать еще? Обязательно! P.S. : спина не болит и даже грыжу не добила )" },
                { file: "9.png", text: "Есть только одна проблема- прыжки это заразно!!! Многие говорили, что второй раз страшнее прыгать) ничего подобного))) Невероятно крутое ощущение! Хочется ещё раз, снова и снова переживать этот восторг! Ну а свободное падение -это просто чистый кайф Когда приземляешься, становится очень грустно ((( что это так быстро закончилось. Повторила бы я ещё?) Однозначно ДА!!!" },
                { file: "10.png", text: "Чистый восторг! Это было незабываемо!" },
                { file: "11.png", text: "Спонтанно и очень круто." },
                { file: "12.png", text: "Первый прыжок, высота 3 км. Эмоций не передать, их море! Я в шоке и диком восторге, оно того стоит! Супер!!! Владимирский АСК ДОСААФ России инструкторы Денис и Рома спасибо огромное от нашей семьи! Вы лучшие!!!" },
                { file: "13.png", text: "Это была моя давняя мечта. Благодарю за предоставленную возможность кайфануть от всей души. Никогда ничего не бойтесь" },
                { file: "14.png", text: "Мой первый прыжок!!! Это незабываемо!!! Высота 2800 метров 40 секунд свободного падения со скоростью 208 км/ч Это нечто невообразимое!!! Повторила бы я этот прыжок? Однозначно ДА!!!!!!" },
                { file: "15.png", text: "Это было круто!!! Мечта сбылась!!!" },
                { file: "16.png", text: "Команда клуба очень здоровская. Добродушная и отзывчивая. С пониманием относятся и позитивом относятся к тому, кто прыгает в первый раз. Да, думаю, и не только кто в первый. ВЫ КРУТЫЕ! Мечты должны сбываться, это невероятно круто! Я готова прыгнуть не раз!" },
                { file: "17.png", text: "Всё было на высоте Это лучшее чувство в жизни, с которым ничто не сравнится Не стоит боятся прыжка, стоит боятся, что так и не попробуешь прыгнуть Самое удивительное, что в момент прыжка страха нет вообще и уже в этот момент ты понимаешь, что хочешь ещё Всё организовано на уровне, опытные инструктора и операторы Спасибо вам за эти непередаваемые эмоции До скорой встречи" },
                { file: "18.png", text: "Это конечно было нереально) Все как во сне)!!!!! Хочу ещё)!!!! Всем советую) Инструктора большие молодцы)!" },
                { file: "19.png", text: "Прыгали 2 августа 2020 . Прыжок с инструктором, Олегом, он очень позитивный и приятный человек. Дочка в восторге от прыжка, куча эмоций. Обязательно заказывайте съёмку, фото и видео отличного качества. Ждите нас еще))" },
                { file: "20.png", text: "13 июня 2020 состоялся прыжок в тандеме с инструктором. Вся команда очень позитивная без лишнего официоза! Попадая на территорию волнение уходит и остаётся только ожидание прыжка! Эмоции не с чем не сравнимые Спасибо за организацию и положительные эмоции" },
                { file: "21.png", text: "Лучший шаг в бездну в моей жизни. Вся команда ребят просто супер. Огромное спасибо за такую возможность" },
                { file: "22.png", text: "Оставляю и наш отзыв! Сегодня муж совершил свой первый прыжок в тандеме! Море эмоций, море позитива! Очень опытные инструкторы!!!!!Всё на высшем уровне! Поддерживают, настраивают!!Выражаем ОГРОМНУЮ БЛАГОДАРНОСТЬ всему коллективу! Здоровья, удачи и голубого неба! Всего самого светлого и доброго! Спасибо большое!" },
                { file: "23.png", text: "Спасибо Вам, за не забываемые эмоции!!!!! Наш первый прыжок совершился(до сих пор поверить не можем, что сделали это). Спасибо Денису и Дмитрию за колоссальную поддержку!!! Спасибо, за мягкое приземление))) Здоровья и удачи Вам, ребята, Вы профи в своём деле) семья Щукиных получила кайф и крутые эмоции)))" },
                { file: "24.png", text: "Огромнейшее спасибо всей команде!!!!!! Это просто супер-мега-профессионалы!!! Не передать словами, как я им благодарна, что помогли победить себя! Для меня это было совершенно спонтанное решение при паническом страхе высоты. Очень поддерживали и на земле, и в самолете всей командой!!! Не давали уходить в себя и паниковать. Просто супер-психологи! Ребята, вам всем огромнейшее спасибо!!!!!!!!!!!!" },
                { file: "25.png", text: "Команда! Спасибо за шквал эмоций, позитив и профессионализм, которые мы получаем с Вами!!! Я в восторге от первого прыжка с инструктором Олегом! Фото, видеосъемка - огоньСпасибооооооо" }
            ];

            let currentIndex = 0; // Начинаем с первой картинки
            const sliderImg = document.getElementById('sliderImage');
            const counter = document.getElementById('sliderCounter');
            const imagePath = 'images/reviews/'; // Путь к папке с фото

            // Функция обновления картинки в слайдере
            function updateSlider() {
                sliderImg.src = imagePath + reviewsData[currentIndex].file;
                counter.textContent = `${currentIndex + 1} / ${reviewsData.length}`;
            }

            // Кнопки влево-вправо
            document.getElementById('prevReview').addEventListener('click', () => {
                currentIndex = currentIndex > 0 ? currentIndex - 1 : reviewsData.length - 1;
                updateSlider();
            });

            document.getElementById('nextReview').addEventListener('click', () => {
                currentIndex = currentIndex < reviewsData.length - 1 ? currentIndex + 1 : 0;
                updateSlider();
            });

            // Запускаем первую картинку при загрузке страницы
            updateSlider();

            // ==========================================
            // 3. ЛОГИКА ЛАЙТБОКСА (Увеличение фото)
            // ==========================================
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            const lightboxCaption = document.getElementById('lightboxCaption');
            
            // Открытие из слайдера
            sliderImg.addEventListener('click', () => {
                lightboxImg.src = sliderImg.src;
                // Берем текст из нашего списка по текущему индексу
                lightboxCaption.textContent = reviewsData[currentIndex].text;
                lightbox.classList.add('open');
                document.body.style.overflow = 'hidden';
            });

            // Открытие из нижних 4 фото благодарности
            const gratitudeImgs = document.querySelectorAll('.gratitude-img');
            gratitudeImgs.forEach(img => {
                img.addEventListener('click', () => {
                    lightboxImg.src = img.src;
                    lightboxCaption.textContent = img.getAttribute('data-caption') || "";
                    lightbox.classList.add('open');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Закрытие лайтбокса
            function closeLightbox() {
                lightbox.classList.remove('open');
                document.body.style.overflow = '';
            }

            document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) closeLightbox();
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && lightbox.classList.contains('open')) closeLightbox();
            });
        });
    </script>

    <a href="https://wa.me/+79190234000 ?text=3дравствуйте!" class="whatsapp-float" target="_blank" title="Написать в WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        /* 
           ПЛАВАЮЩАЯ КНОПКА WHATSAPP
           */
        .whatsapp-float {
            position: fixed;           
            width: 60px;               
            height: 60px;              
            bottom: 30px;             
            right: 30px;               
            background-color: #25d366; 
            color: #FFF;
            border-radius: 50px;       
            text-align: center;
            font-size: 35px;           
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); 
            z-index: 9999;             
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            animation: pulse-wa 2s infinite; 
        }

        /* Эффект при наведении курсора */
        .whatsapp-float:hover {
            background-color: #128C7E; 
            color: white;
            transform: scale(1.1);     
            animation: none;           
            box-shadow: 0 6px 15px rgba(37, 211, 102, 0.5);
        }

        /* Анимация пульсации для привлечения внимания */
        @keyframes pulse-wa {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* Уменьшаем кнопку на мобильных телефонах, чтобы не мешала читать текст */
        @media (max-width: 768px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
                bottom: 20px;
                right: 20px;
                font-size: 30px;
            }
        }
    </style>
</body>
</html>