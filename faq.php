<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вопрос-ответ - Владимирский АСК ДОСААФ России</title>
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
        
        /* ВЫПАДАЮЩЕЕ МЕНЮ (ЖЕЛЕЗОБЕТОННОЕ) */
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

        /* СТИЛИ СТРАНИЦЫ ВОПРОС-ОТВЕТ */
        .faq-page { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 50px; text-align: center; position: relative; padding-bottom: 20px; text-transform: uppercase; }
        .page-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--secondary); }

        .faq-container { display: flex; flex-direction: column; gap: 15px; }
        .faq-item { background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); overflow: hidden; transition: var(--transition); border: 1px solid #eee; }
        .faq-item.active { box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-color: var(--primary); }
        
        .faq-question { width: 100%; text-align: left; padding: 20px 25px; background: none; border: none; font-size: 1.2rem; font-weight: 600; color: var(--primary-dark); cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: 0.3s; font-family: 'Montserrat', sans-serif;}
        .faq-question:hover { color: var(--primary); }
        .faq-icon { color: var(--secondary); font-size: 1.2rem; transition: transform 0.3s ease; }
        .faq-item.active .faq-icon { transform: rotate(45deg); }
        
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out; background: #fdfdfd; }
        .faq-answer-inner { padding: 0 25px 25px; color: #444; font-size: 1.05rem; line-height: 1.7; }
        .faq-answer-inner ul { margin-left: 20px; margin-top: 10px; }
        .faq-answer-inner li { margin-bottom: 8px; }

        .doc-link { color: var(--primary); font-weight: 600; text-decoration: underline; text-underline-offset: 3px; }
        .doc-link:hover { color: var(--secondary); }

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
                <a href="index.php"><img src="images/Лого2.png" class="logo"></a>
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

    <main class="faq-page">
        <h1 class="page-title">ВОПРОС-ОТВЕТ</h1>

        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question">1. Что нужно взять с собой для прыжка? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <ul>
                            <li>Документ, удостоверяющий личность (паспорт или водительское удостоверение);</li>
                            <li>Письменное разрешение от родителей для несовершеннолетних;</li>
                        </ul>
                        <p style="margin-top: 10px;"><strong>Для самостоятельного прыжка также необходимо взять с собой:</strong></p>
                        <ul>
                            <li>Берцы / кроссовки на толстой подошве + 2 эластичных бинта (по 1,5 метра на каждую ногу);</li>
                            <li>Удобную одежду, полностью закрывающую руки и ноги (её должно быть не жалко, так как она может испачкаться или порваться).</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">2. Можно ли снимать происходящее на камеру? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Начинающим парашютистам любая съемка в воздухе запрещена. Если Вы хотите запечатлеть свой первый прыжок, мы можем предложить Вам следующие варианты:</p>
                        <ul>
                            <li>Фото- и видеосъемка тандема воздушным оператором;</li>
                            <li>Видеосъемка тандема инструктором на камеру GoPro;</li>
                            <li>Съемка с камеры, установленной на крыле самолета.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">3. Обязательно ли прыгать первый раз вместе с инструктором? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Нет. Первый прыжок можно совершить самостоятельно на десантном парашюте с принудительным раскрытием.</div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">4. Если мне нет 18 лет, могу ли я прыгнуть с парашютом? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Прыжки в тандеме разрешены с 8 лет, самостоятельные – с 14. С собой необходимо иметь письменное разрешение от родителей. Бланк разрешения можно найти на нашем сайте в разделе <a href="docs/blank.pdf" download class="doc-link">«материалы»</a>.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">5. Когда осуществляются прыжки? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Наш аэроклуб работает по выходным с апреля по октябрь, в зависимости от погодных условий. Более актуальную информацию Вы можете получить по телефону: +7 (919) 023-40-00, или написав нам в социальных сетях.</div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">6. Прыгал в армии с Д-6 (Д-10), можно ли мне сразу одному с 3000 м.? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Армейские прыжки являются подготовкой к боевому десантированию, цель которого – доставка личного состава к месту выполнения боевой задачи. Такие прыжки не предусматривают навыков, необходимых для совершения спортивных затяжных прыжков.</p>
                        <p style="margin-top: 10px;">Так что, сколько бы у Вас не было прыжков в армии, обучение придётся проходить с самого начала. Тем не менее, любой опыт – это, несомненно, плюс).</p>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">7. А что если парашют не раскроется? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Наши парашюты укладывают только опытные укладчики, прошедшие специальную подготовку и регулярно подтверждающие свою квалификацию. Тем не менее для каждого начинающего парашютиста предусмотрен также запасной парашют со страхующим прибором.</div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">8. Можно ли прыгнуть в тандеме вместе со своей второй половинкой? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Совершить прыжок в тандеме можно только в компании опытного инструктора, способного обеспечивать Вашу безопасность на протяжении всего прыжка. Но вы можете прыгнуть в одном взлёте каждый со своим инструктором.</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Подвал -->

    <footer class="footer">
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
                    <iframe src="https://yandex.ru/map-widget/v1/?ll=40.583509%2C56.249510&masstransit%5BstopId%5D=1543209455&mode=masstransit&tab=overview&z=17.95" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-bottom">Негосударственное образовательное учреждение «Владимирский авиационно-спортивный клуб ДОСААФ России»</div>
    </footer>

    <script>
        // Бургер меню
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                navMenu.classList.toggle('active');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });

            // Скрипт для аккордеона FAQ
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const button = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');

                button.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');

                    // Закрываем все остальные открытые вопросы
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.faq-answer').style.maxHeight = null;
                    });

                    // Если текущий был закрыт - открываем
                    if (!isActive) {
                        item.classList.add('active');
                        answer.style.maxHeight = answer.scrollHeight + "px";
                    }
                });
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