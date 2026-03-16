<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Команда - Владимирский АСК ДОСААФ России</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
    <style>
        /* БАЗОВЫЕ СТИЛИ */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        :root { --primary: #216DBD; --primary-dark: #1a5a9e; --secondary: #ffc107; --light: #f8f9fa; --dark: #212529; --transition: all 0.4s ease; }
        body { padding-top: 90px; background-color: #f8f9fa; color: #333; line-height: 1.6; }
        header { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); position: fixed; width: 100%; top: 0; z-index: 1000; padding: 0 5%; }
        .header-container { display: flex; justify-content: space-between; align-items: center; max-width: 1920px; margin: 0 auto; height: 80px; }
        .logo-container { display: flex; align-items: center; gap: 15px; }
        .logo { height: 60px; width: 60px; border-radius: 50%; background: url('images/Лого2.png') center/cover no-repeat; transition: var(--transition); }
        .logo:hover { transform: scale(1.05); }
        .company-name { color: white; font-weight: 700; font-size: 1rem; line-height: 1.3; }
        .nav-container { display: flex; align-items: center; }
        .nav-menu { display: flex; list-style: none; margin-right: 30px; }
        .nav-item { margin: 0 12px; position: relative; }
        .nav-link { color: rgba(255, 255, 255, 0.9); text-decoration: none; font-weight: 500; font-size: 1rem; padding: 28px 5px; display: block; transition: var(--transition); }
        .nav-link:hover { color: var(--secondary); }
        
        /* ВЫПАДАЮЩЕЕ МЕНЮ */
        .dropdown { position: relative; }
        .dropdown-child { display: none; position: absolute; top: 100%; left: 0; background: var(--primary-dark); min-width: 220px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); z-index: 1001; border-radius: 0 0 8px 8px; overflow: hidden; list-style: none; padding: 0; margin: 0; }
        .dropdown:hover .dropdown-child { display: block; animation: fadeIn 0.3s ease; }
        .dropdown-child li a { color: white; padding: 15px 20px; text-decoration: none; display: block; transition: var(--transition); font-size: 0.95rem; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .dropdown-child li:last-child a { border-bottom: none; }
        .dropdown-child li a:hover { background: var(--secondary); color: var(--dark); padding-left: 25px; }
        .drop-icon { font-size: 0.8em; margin-left: 5px; transition: var(--transition); }
        .dropdown:hover .drop-icon { transform: rotate(180deg); }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

        .phone-container { display: flex; align-items: center; background: rgba(255, 255, 255, 0.15); border-radius: 30px; padding: 8px 20px; border: 1px solid rgba(255, 255, 255, 0.2); }
        .phone-icon { color: var(--secondary); margin-right: 10px; }
        .phone-link { color: white; font-weight: 700; text-decoration: none; }
        .hamburger { display: none; cursor: pointer; }

        /* СТИЛИ СТРАНИЦЫ КОМАНДА */
        .team-page { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
        .page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 50px; text-align: center; position: relative; padding-bottom: 20px; text-transform: uppercase; }
        .page-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--secondary); }
        
        .team-section { margin-bottom: 60px; }
        .section-title { font-size: 2rem; color: var(--primary); margin-bottom: 30px; text-align: center; font-weight: 700; }
        
        .team-grid { display: grid; gap: 30px; justify-content: center; }
        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(300px, 400px)); }
        .grid-5 { grid-template-columns: repeat(auto-fit, minmax(200px, 300px)); }
        .grid-1 { grid-template-columns: minmax(300px, 400px); }
        
        .team-member { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: var(--transition); cursor: pointer; text-align: center; padding-bottom: 20px; }
        .team-member:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.2); }
        .member-photo { width: 100%; height: 350px; object-fit: cover; border-bottom: 4px solid var(--secondary); }
        .member-name { font-size: 1.3rem; font-weight: 700; color: var(--primary-dark); margin: 15px 0 5px; }
        .member-role { color: #666; font-size: 1rem; }

        /* ЛАЙТБОКС (из галереи) */
        .lightbox { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.9); }
        .lightbox.open { display: flex; justify-content: center; align-items: center; }
        .lightbox-inner { position: relative; width: 90%; max-width: 1000px; max-height: 90vh; display: flex; justify-content: center; align-items: center; }
        .lightbox img { max-width: 100%; max-height: 90vh; border-radius: 5px; box-shadow: 0 0 30px rgba(0,0,0,0.5); object-fit: contain; }
        .lightbox-close { position: absolute; top: -40px; right: 0; color: white; font-size: 30px; background: none; border: none; cursor: pointer; transition: 0.3s; }
        .lightbox-close:hover { color: var(--secondary); transform: scale(1.1); }
        .lightbox-nav { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.2); color: white; border: none; width: 50px; height: 50px; border-radius: 50%; font-size: 20px; cursor: pointer; transition: 0.3s; display: flex; justify-content: center; align-items: center; }
        .lightbox-nav:hover { background: var(--secondary); color: var(--dark); }
        .lightbox-prev { left: -60px; }
        .lightbox-next { right: -60px; }

        @media (max-width: 768px) {
            .lightbox-prev { left: 10px; }
            .lightbox-next { right: 10px; }
            .lightbox-close { top: 10px; right: 10px; }
            .hamburger { display: block; }
            .nav-menu { display: none; } 
        }
        
        /* Подвал стили опущены для компактности, скопируй из своих файлов */
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

    <main class="team-page">
        <h1 class="page-title">КОМАНДА</h1>

        <div class="team-section">
            <h2 class="section-title">Руководство / Администрация</h2>
            <div class="team-grid grid-2">
                <div class="team-member" data-src="images/Team/1.png">
                    <img src="images/Team/1.png" alt="Руководитель 1" class="member-photo">
                    <h3 class="member-name">Иванов Иван</h3>
                    <p class="member-role">Начальник аэроклуба</p>
                </div>
                <div class="team-member" data-src="images/Team/2.png">
                    <img src="images/Team/2.png" alt="Руководитель 2" class="member-photo">
                    <h3 class="member-name">Петрова Анна</h3>
                    <p class="member-role">Главный администратор</p>
                </div>
            </div>
        </div>

        <div class="team-section">
            <h2 class="section-title">Тандем-инструкторы / Операторы</h2>
            <div class="team-grid grid-5">
                <div class="team-member" data-src="images/Team/3.png">
                    <img src="images/Team/3.png" alt="Инструктор 1" class="member-photo">
                    <h3 class="member-name">Смирнов Алексей</h3>
                    <p class="member-role">Тандем-инструктор</p>
                </div>
                <div class="team-member" data-src="images/Team/4.png">
                    <img src="images/Team/4.png" alt="Инструктор 2" class="member-photo">
                    <h3 class="member-name">Козлов Дмитрий</h3>
                    <p class="member-role">Тандем-инструктор</p>
                </div>
                <div class="team-member" data-src="images/Team/5.png">
                    <img src="images/Team/5.png" alt="Инструктор 3" class="member-photo">
                    <h3 class="member-name">Морозов Сергей</h3>
                    <p class="member-role">Воздушный оператор</p>
                </div>
                <div class="team-member" data-src="images/Team/6.png">
                    <img src="images/Team/6.png" alt="Инструктор 4" class="member-photo">
                    <h3 class="member-name">Волков Игорь</h3>
                    <p class="member-role">Тандем-инструктор</p>
                </div>
                <div class="team-member" data-src="images/Team/7.png">
                    <img src="images/Team/7.png" alt="Инструктор 5" class="member-photo">
                    <h3 class="member-name">Соколов Павел</h3>
                    <p class="member-role">Воздушный оператор</p>
                </div>
            </div>
        </div>

        <div class="team-section">
            <h2 class="section-title">Инструкторы по подготовке к первому прыжку</h2>
            <div class="team-grid grid-1">
                <div class="team-member" data-src="images/Team/8.png">
                    <img src="images/Team/8.png" alt="Инструктор" class="member-photo">
                    <h3 class="member-name">Лебедев Максим</h3>
                    <p class="member-role">Старший инструктор ПДП</p>
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
    
<style>
     /* Подвал сайта */
        .footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 60px 10% 30px;
            position: relative;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-logo {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .footer-logo-img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            
        }

        .footer-logo-text {
            font-size: 1.2rem;
            font-weight: 700;
            max-width: 200px;
            line-height: 1.3;
        }

        .footer-about {
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .footer-copyright {
            font-size: 0.9rem;
            opacity: 0.7;
            margin-top: 30px;
        }

        .footer-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
            text-transform: uppercase;
        }

        .footer-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
            opacity: 0.9;
            font-size: 1rem;
        }

        .footer-links a:hover {
            color: var(--secondary);
            opacity: 1;
            padding-left: 5px;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .footer-contact-icon {
            color: var(--secondary);
            margin-right: 15px;
            font-size: 1.2rem;
            margin-top: 3px;
        }

        .footer-contact-text {
            font-size: 1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .footer-contact-text a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-contact-text a:hover {
            color: var(--secondary);
        }

        .footer-map {
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .footer-map iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* 
           СОЦИАЛЬНЫЕ СЕТИ В ПОДВАЛЕ
           */
        .footer-socials {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .socials-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: white;
            opacity: 0.9;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2rem;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Эффект при наведении */
        .social-icon:hover {
            background: var(--secondary); /* Желтый цвет */
            color: var(--dark); /* Темный цвет иконки */
            transform: translateY(-5px); /* Легкое подпрыгивание вверх */
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4); /* Желтое свечение */
            border-color: var(--secondary);
        }

        /* Адаптивность */
        @media (max-width: 1200px) {
            .footer {
                padding: 50px 7% 25px;
            }
        }

        @media (max-width: 992px) {
            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }
            
            .footer-map {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .footer-map {
                grid-column: span 1;
                height: 250px;
            }
            
            .footer-section-title {
                font-size: 1.3rem;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .footer {
                padding: 40px 15px 20px;
            }
            
            .footer-map {
                height: 200px;
            }
        }</style>

    <div class="lightbox" id="lightbox">
        <div class="lightbox-inner">
            <button class="lightbox-close" id="lightboxClose"><i class="fas fa-times"></i></button>
            <button class="lightbox-nav lightbox-prev" id="lightboxPrev"><i class="fas fa-chevron-left"></i></button>
            <img src="" alt="Фото команды" id="lightboxImg">
            <button class="lightbox-nav lightbox-next" id="lightboxNext"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <script>
        // Скрипт лайтбокса для команды
        document.addEventListener('DOMContentLoaded', () => {
            const teamMembers = document.querySelectorAll('.team-member');
            const photos = Array.from(teamMembers).map(member => member.getAttribute('data-src'));
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            let currentIndex = 0;

            teamMembers.forEach((member, index) => {
                member.addEventListener('click', () => {
                    currentIndex = index;
                    openLightbox();
                });
            });

            function openLightbox() {
                lightboxImg.src = photos[currentIndex];
                lightbox.classList.add('open');
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                lightbox.classList.remove('open');
                document.body.style.overflow = '';
            }

            document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
            lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });

            document.getElementById('lightboxPrev').addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + photos.length) % photos.length;
                lightboxImg.src = photos[currentIndex];
            });

            document.getElementById('lightboxNext').addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % photos.length;
                lightboxImg.src = photos[currentIndex];
            });

            document.addEventListener('keydown', (e) => {
                if (!lightbox.classList.contains('open')) return;
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowLeft') document.getElementById('lightboxPrev').click();
                if (e.key === 'ArrowRight') document.getElementById('lightboxNext').click();
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
            animation: pulse-wa 2s infinite; /* Анимация пульсации */
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
<script src="js/transitions.js"></script>
</body>
</html>