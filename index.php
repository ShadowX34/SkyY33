<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Владимирский АСК ДОСААФ России - Прыжки с парашютом</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
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
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    

    <!-- Блок 1 -->

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">МЕЧТАЕТЕ</h1>
            <h2 class="hero-subtitle">О НЕБЕ?</h2>
            <p class="hero-text">В нашем аэроклубе Вы можете сделать шаг навстречу своей мечте! Насладитесь свободой и незабываемым чувством полета при прыжке с парашютом или полетав на самолете!</p>
            <div class="hero-buttons">
                <a href="certificates.php" class="hero-btn btn-primary">ХОЧУ ПРЫГНУТЬ!</a>
                <!-- <a href="#" class="hero-btn btn-secondary">СНИМАЙ! КАЖЕТСЯ</a> -->
            </div>
        </div>
    </section>

    <script>
        // Анимация при скролле
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                header.style.boxShadow = '0 6px 25px rgba(0, 0, 0, 0.2)';
                header.style.background = 'linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%)';
            } else {
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
                header.style.background = 'linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%)';
            }
        });

        // Мобильное меню
        document.querySelector('.hamburger').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.nav-menu').classList.toggle('mobile-active');
        });
    </script>

    <!-- Блок 2 -->

   <section class="services-section">
        <div class="section-header">
            <h2 class="sections-title">НАШИ УСЛУГИ</h2>
            <h3 class="sections-subtitle"></h3>
        </div>
        
        <div class="services-grid">
            <!-- Услуга 1 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б1.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Ознакомительный полёт</h3>
                    <div class="service-price">4 000 ₽</div>
                    <ul class="service-features">
                        <li>15-20 минут в воздухе с инструктором</li>
                        <li>Обзорная экскурсия по аэродрому</li>
                        <li>Возможность попробовать управление самолётом</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 2 -->
            <div class="service-card">
                <div class="service-image" style="background-image: url('images/б2.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Самостоятельный прыжок</h3>
                    <div class="service-price">8 500 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 800-900 метров</li>
                        <li>Полная предварительная подготовка</li>
                        <li>Круглый купол с управлением</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 3 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б3.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме с инструктором</h3>
                    <div class="service-price">12 000 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>50 секунд свободного падения</li>
                        <li>Профессиональный инструктор</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 4 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б4.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме с оператором и GoPro</h3>
                    <div class="service-price">16 500 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>Профессиональная съёмка на GoPro</li>
                        <li>Видео и фото материалы</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 5 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б5.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме с фото-видеосъёмкой</h3>
                    <div class="service-price">18 000 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>Профессиональная фото и видеосъёмка</li>
                        <li>Обработанные материалы на память</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 6 -->
            <div class="service-card">
                <div class="service-image" style="background-image: url('images/б6.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме со съёмкой на GoPro</h3>
                    <div class="service-price">17 500 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>Съёмка на камеру GoPro</li>
                        <li>Видео в Full HD качестве</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Блок 3 -->
<section class="promo-section">

   <div class="promo-bg-image" style="background-image: url('images/фон1.png')"></div>
    
    <!-- Декоративные элементы -->
    <div class="promo-decor decor-1"></div>
    <div class="promo-decor decor-2"></div>
    
    <div class="section-header">
        <h2 class="section-title">АКЦИИ И СПЕЦПРЕДЛОЖЕНИЯ</h2>
        <h3 class="section-subtitle">ЭКОНОМЬТЕ НА ВПЕЧАТЛЕНИЯХ</h3>
    </div>
    
    <div class="promo-container">
        <div class="promo-row">
            <!-- Акция 1 -->
            <div class="promo-card">
                <div class="promo-badge">-10%</div>
                <div class="promo-image" style="background-image: url('images/скидка.webp');"></div>
                <div class="promo-content">
                    <h3 class="promo-title">ДЕНЬ РОЖДЕНИЯ - СКИДКА 10%</h3>
                    <p class="promo-text">Предъяви паспорт и получи скидку 10% в свой день рождения!</p>
                    <ul class="promo-features">
                        <li>Действует в течение 3 дней до и после дня рождения</li>
                        <li>Распространяется на все виды прыжков</li>
                        <li>Не суммируется с другими акциями</li>
                        <li>Дополнительные привилегии</li>
                    </ul>
                    <a href="stocks.php" class="promo-btn">Получить скидку</a>
                </div>
            </div>
            
            <!-- Акция 2 -->
            <div class="promo-card">
                <div class="promo-badge">-500₽</div>
                <div class="promo-image" style="background-image: url('images/скидка2.webp');"></div>
                <div class="promo-content">
                    <h3 class="promo-title">СКИДКА 500₽ В БУДНИЙ ДЕНЬ</h3>
                    <p class="promo-text">Специальное предложение для тех, кто может прыгать в будни!</p>
                    <ul class="promo-features">
                        <li>Действует по четвергам в дни проведения прыжков</li>
                        <li>Не распространяется на выходные и праздники</li>
                        <li>При покупке сертификата скидка фиксируется</li>
                         <li>Дополнительные привилегии</li>
                    </ul>
                    <a href="stocks.php" class="promo-btn">Записаться в будний день</a>
                </div>
            </div>
            
            <!-- Акция 3 -->
            <div class="promo-card">
                <div class="promo-badge">-5%</div>
                <div class="promo-image" style="background-image: url('https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="promo-content">
                    <h3 class="promo-title">«ПРИВЕДИ ДРУГА» - 5% СКИДКА</h3>
                    <p class="promo-text">Приводите друзей и получайте скидку за каждого!</p>
                    <ul class="promo-features">
                        <li>5% скидка за каждого приведённого друга</li>
                        <li>Максимальная скидка - 20%</li>
                        <li>Друзья тоже получают скидку 5%</li>
                        <li>Скидка действует на следующий прыжок</li>
                    </ul>
                    <a href="stocks.php" class="promo-btn">Участвовать в акции</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок 3 О нас -->

 <section class="about-section">
        <!-- Декоративный элемент -->
        <div class="about-decor decor-1"></div>
        
        <div class="about-container">
            <div class="about-content">
                <h2 class="section-titles">О НАС</h2>
                <p class="about-text">
                    Владимирский аэроклуб был основан в <strong>1934 году</strong>. С тех пор он подготовил множество летчиков, парашютистов и механиков, среди которых более <strong>200 мастеров спорта СССР и России</strong>.
                </p>
                
                <p class="about-text">
                    В <strong>2010 году</strong> наш аэроклуб был реорганизован в Негосударственное образовательное учреждение «Владимирский аэроклуб РОСТО», а в <strong>2011 году</strong> переименован во «Владимирский авиационно-спортивный клуб ДОСААФ России».
                </p>
                
                <p class="about-text">
                    <strong>С тех пор мы активно развиваемся и помогаем Вам покорять небо!</strong>
                </p>
                
                <div class="about-highlights">
                    <div class="highlight-item">
                        <div class="highlight-number">85+</div>
                        <div class="highlight-text">Лет успешной работы в авиационной сфере</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-number">200+</div>
                        <div class="highlight-text">Мастеров спорта подготовлено</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-number">10 000+</div>
                        <div class="highlight-text">Прыжков с парашютом ежегодно</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-number">50+</div>
                        <div class="highlight-text">Профессиональных инструкторов</div>
                    </div>
                </div>
                
                <a href="about.php" class="about-btn">ПОДРОБНЕЕ О НАС</a>
            </div>
            
            <div class="about-images">
                <!-- Основное изображение -->
                <img src="images/АН-2_1.jpg" alt="Владимирский аэроклуб" class="main-image">
                
                <!-- Дополнительные изображения -->
                <img src="images/АН-2.jpg" alt="История аэроклуба" class="secondary-image image-1">
                <img src="images/АН-2_2.jpg" alt="Наши достижения" class="secondary-image image-2">
            </div>
        </div>
    </section>

    <!-- Блок 4 Новости -->

  <section class="news-section">
        <!-- Декоративные элементы -->
        <div class="news-decor decor-1"></div>
        
        <div class="section-header">
            <h2 class="section-tit">НОВОСТИ КЛУБА</h2>
        </div>
        
        <div class="news-grid">
            <!-- Новость 1 -->
            <a href="News.php" class="news-card">
                <div class="news-image" style="background-image: url('images/New\ Year.webp');">
                    <div class="news-content">
                        <div class="news-date">5 декабря 2024</div>
                        <h3 class="news-title">НОВОГОДНИЕ СКИДКИ НА ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</h3>
                        <p class="news-excerpt">Зима — это по-настоящему волшебное время, когда всё вокруг превращается в сказку...</p>
                        
                    </div>
                </div>
            </a>

            <!-- Новость 2 -->
            <a href="News.php" class="news-card">
                <div class="news-image" style="background-image: url('images/News.jpg');">
                    <div class="news-content">
                        <div class="news-date">18 апреля 2023</div>
                        <h3 class="news-title">ОТКРЫТИЕ СЕЗОНА 2023</h3>
                        <p class="news-excerpt">Старт нового сезона прыжков с парашютом! Уже 21 апреля мы открываем сезон...</p>
                        
                    </div>
                </div>
            </a>
            
            <!-- Новость 3 -->
            <a href="News.php" class="news-card">
                <div class="news-image" style="background-image: url('images/News2.jpg');">
                    <div class="news-content">
                        <div class="news-date">9 апреля 2024</div>
                        <h3 class="news-title">ОТКРЫТИЕ СЕЗОНА 2024</h3>
                        <p class="news-excerpt">Старт нового сезона прыжков с парашютом! Уже 15 апреля мы открываем сезон...</p>
                        
                    </div>
                </div>
            </a>
            
            <!-- Новость 4 -->
            <a href="News.php" class="news-card">
                <div class="news-image" style="background-image: url('images/Парашутист.jpg');">
                    <div class="news-content">
                        <div class="news-date">8 сентября 2022</div>
                        <h3 class="news-title">ЛЮБОВЬ И СТИХИЯ: ВЛАДИМИРСКИЕ СЕМЬИ РАССКАЗАЛИ СВОИ ИСТОРИИ</h3>
                        <p class="news-excerpt">Семейные пары во Владимирском регионе не только тушят огонь, но и покоряют небо вместе...</p>
                        
                    </div>
                </div>
            </a>
        </div>
        
        <a href="News.php" class="all-news-btn">БОЛЬШЕ НОВОСТЕЙ</a>
    </section>
    </section>

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
            
            <!-- Колонка 2: Навигация -->
           <div class="footer-col">
                <h3 class="footer-section-title">Информация</h3>
                <ul class="footer-links">
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="prices.php">Цены</a></li>
                    <li><a href="certificates.php">Подарочные сертификаты</a></li>
                    <li><a href="gallery.php">Галерея</a></li>
                    <li><a href="News.php">Новости</a></li>
                    <li><a href="stocks.php">Акции</a></li>
                    <li><a href="contacts.php">Контакты</a></li>
                </ul>
            </div>
            
            <!-- Колонка 3: Контакты -->
            <div class="footer-col">
                <h3 class="footer-section-title">Контакты</h3>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt footer-contact-icon"></i>
                    <div class="footer-contact-text">
                        Владимирская область, Суздальский район,<br>
                        аэродром "Сокол"
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone-alt footer-contact-icon"></i>
                    <div class="footer-contact-text">
                        <a href="tel:+79190234000">8 (919) 023-40-00</a>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope footer-contact-icon"></i>
                    <div class="footer-contact-text">
                        <a href="mailto:info@ask-dosaaf.ru">info@ask-dosaaf.ru</a>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-clock footer-contact-icon"></i>
                    <div class="footer-contact-text">
                        Пн-Пт: 9:00 - 18:00<br>
                        Сб-Вс: 10:00 - 16:00
                    </div>
                </div>
            </div>
            
            <!-- Колонка 4: Карта -->
            <div class="footer-col">
                <h3 class="footer-section-title">Схема проезда</h3>
                <div class="footer-map">
                    <iframe  src="https://yandex.ru/map-widget/v1/?ll=40.583509%2C56.249510&masstransit%5BstopId%5D=1543209455&mode=masstransit&tab=overview&z=17.95" frameborder="0"></iframe>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            Негосударственное образовательное учреждение «Владимирский авиационно-спортивный клуб ДОСААФ России»
        </div>
    </footer>

     <script>
    // Рабочее бургер-меню
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        
        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            
            // Блокировка скролла при открытом меню
            if (navMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        
        // Закрытие меню при клике на ссылку
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    });
</script>

<style>
* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', 'Arial', sans-serif;
        }

        :root {
            --primary: #216DBD;
            --primary-dark: #1a5a9e;
            --secondary: #ffc107;
            --light: #f8f9fa;
            --dark: #212529;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 0 5%;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1920px;
            margin: 0 auto;
            height: 80px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            overflow: hidden;
            
            transition: var(--transition);
            background: url('https://example.com/logo.jpg') center/cover no-repeat;
            
        }

        .logo:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

       

        .company-name {
            color: white;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            max-width: 200px;
            line-height: 1.3;
        }

        .nav-container {
            display: flex;
            align-items: center;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin-right: 30px;
            transition: var(--transition);
        }

        
.dropdown {
    position: relative;
}

.dropdown-child {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: var(--primary-dark);
    min-width: 220px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 1001;
    border-radius: 0 0 8px 8px;
    overflow: hidden;
    list-style: none;
    padding: 0;
    margin: 0;
}

.dropdown:hover .dropdown-child {
    display: block;
    animation: fadeIn 0.3s ease;
}

.dropdown-child li a {
    color: white;
    padding: 15px 20px;
    text-decoration: none;
    display: block;
    transition: var(--transition);
    font-size: 0.95rem;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

.dropdown-child li:last-child a {
    border-bottom: none;
}

.dropdown-child li a:hover {
    background: var(--secondary);
    color: var(--dark);
    padding-left: 25px;
}

.drop-icon {
    font-size: 0.8em;
    margin-left: 5px;
    transition: var(--transition);
}

.dropdown:hover .drop-icon {
    transform: rotate(180deg);
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Для мобильного меню */
@media (max-width: 992px) {
    .dropdown-child {
        position: static;
        display: none;
        background: rgba(0,0,0,0.1);
        box-shadow: none;
        width: 100%;
    }
    .dropdown.active .dropdown-child {
        display: block;
    }
}

        .nav-item {
            position: relative;
            margin: 0 12px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            padding: 28px 5px;
            display: block;
            position: relative;
            transition: var(--transition);
            letter-spacing: 0.3px;
        }

        .nav-link:hover {
            color: var(--secondary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary);
            transition: var(--transition);
        }

        .nav-link:hover::after {
            width: 100%;
        }
        

        .phone-container {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 30px;
            padding: 8px 20px;
            transition: var(--transition);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .phone-container:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .phone-icon {
            color: var(--secondary);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .phone-link {
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            letter-spacing: 0.5px;
            transition: var(--transition);
        }

        .phone-link:hover {
            color: var(--secondary);
            text-shadow: 0 0 8px rgba(255, 193, 7, 0.4);
        }

        .hamburger {
            display: none;
            cursor: pointer;
        }
        

        /* Анимации и медиа-запросы */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .phone-link:hover {
            animation: pulse 1.5s infinite;
        }

        @media (max-width: 1200px) {
            .nav-menu {
                margin-right: 15px;
            }
            
            .nav-item {
                margin: 0 8px;
            }
            
            .nav-link {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 992px) {
    .nav-menu {
        position: fixed;
        top: 70px;
        left: 0;
        width: 100%;
        height: calc(100vh - 70px);
        background: linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%);
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 30px;
        transform: translateX(-100%);
        opacity: 0;
        transition: transform 0.4s ease, opacity 0.3s ease;
        z-index: 999;
        overflow-y: auto;
    }

    .logo-container {
        gap: 0;
    }

    .phone-container {
        margin-right: 10px;
    }
    
    .nav-menu.active {
        transform: translateX(0);
        opacity: 1;
    }
    
    .nav-item {
        margin: 15px 0;
        width: 100%;
        text-align: center;
    }
    
    .nav-link {
        padding: 15px 0;
        font-size: 1.2rem;
    }
    
    .nav-link::after {
        bottom: 10px;
    }
    
    .hamburger {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        transition: var(--transition);
    }
    
    .hamburger span {
        display: block;
        width: 30px;
        height: 3px;
        background: white;
        margin: 4px 0;
        transition: var(--transition);
        transform-origin: center;
    }
    
    .hamburger.active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }
    
    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }
    
    .hamburger.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }

    @media (max-width: 576px) {
    .company-name {
        display: none;
    }
}
}



        /* Блок 1 */

         /* Первый блок - герой */
        .hero-section {
            height: 100vh;
            min-height: 700px;
            background: 
                linear-gradient(rgba(33, 109, 189, 0.7), rgba(25, 134, 250, 0.685)),
                url('images/Гл фон.webp') center/cover no-repeat;
            display: flex;
            align-items: center;
            padding: 0 10%;
            margin-top: 80px; /* Учитываем высоту шапки */
            position: relative;
            overflow: hidden;
            color: white;
        }

        .hero-content {
            max-width: 800px;
            z-index: 2;
            position: relative;
        }

        .hero-title {
            font-size: 5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
            line-height: 1.3;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .hero-text {
            font-size: 1.2rem;
            line-height: 1.7;
            margin-bottom: 3rem;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .hero-btn {
            display: inline-block;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.1rem;
            transition: var(--transition);
            text-decoration: none;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: var(--secondary);
            color: var(--dark);
            border: 2px solid var(--secondary);
        }

        .btn-primary:hover {
            background-color: transparent;
            color: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Анимация фона */
        @keyframes zoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .hero-section:hover {
            animation: zoom 20s infinite alternate ease-in-out;
        }

        /* Адаптивность */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 4rem;
            }
            .hero-subtitle {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 0 5%;
                text-align: center;
                justify-content: center;
            }
            .hero-content {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .hero-title {
                font-size: 3rem;
            }
            .hero-subtitle {
                font-size: 1.5rem;
            }
            .hero-text {
                font-size: 1rem;
            }
            .hero-buttons {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.3rem;
            }
            .hero-btn {
                padding: 12px 25px;
                font-size: 1rem;
                width: 100%;
            }
            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }
        }

        /* Блок 2 */

        /* Секция "Наши услуги" */
        .services-section {
            padding: 100px 10%;
            background-color: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
        }

        .sections-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sections-subtitle {
            font-size: 1.5rem;
            color: var(--primary-dark);
            font-weight: 500;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .sections-subtitle::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 40px;
        }

        .service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .service-image {
            height: 250px;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .service-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            
        }

        .service-content {
            padding: 30px;
        }

        .service-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .service-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
        }

        .service-price {
            display: inline-block;
            background-color: var(--secondary);
            color: var(--dark);
            font-weight: 700;
            padding: 8px 20px;
            border-radius: 30px;
            margin-bottom: 20px;
            font-size: 1.3rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .service-features {
            list-style: none;
            margin-bottom: 25px;
        }

        .service-features li {
            padding: 8px 0;
            position: relative;
            padding-left: 25px;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .service-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--secondary);
            font-weight: bold;
        }

        .service-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 2px solid var(--primary);
        }

        .service-btn:hover {
            background-color: transparent;
            color: var(--primary);
        }

        /* Адаптивность */
        @media (max-width: 992px) {
            .services-section {
                padding: 80px 5%;
            }
            
            .section-title {
                font-size: 2.4rem;
            }
            
            .section-subtitle {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .services-section {
                padding: 60px 15px;
            }
            
            .service-content {
                padding: 20px;
            }
            
            .service-title {
                font-size: 1.5rem;
            }
            
            .service-price {
                font-size: 1.1rem;
            }
        }

/* Блок 3 */

/* Секция акций */
.promo-section {
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.promo-bg-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    z-index: 0;
}

.section-header {
    text-align: center;
    margin-bottom: 70px;
    position: relative;
    z-index: 2;
}

.section-title {
    font-size: 2.8rem;
    font-weight: 800;
    color: white;
    text-shadow: 0 0 10px #000;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.section-subtitle {
    font-size: 1.5rem;
    color: white;
    font-weight: 500;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
    text-shadow: 0 0 10px #000;
}

.section-subtitle::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--secondary);
}

.promo-container {
    padding-right: 1200px;
    width: 100%;
    overflow-x: auto;
    padding-bottom: 20px;
    -webkit-overflow-scrolling: touch; /* Для плавного скролла на iOS */
}

.promo-row {
    display: flex;
    flex-wrap: nowrap;
    gap: 30px;
    padding: 0 10%;
    position: relative;
    z-index: 2;
    width: max-content;
    margin: 0 auto;
}

.promo-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: var(--transition);
    position: relative;
    border: 1px solid rgba(0, 0, 0, 0.05);
    width: 350px;
    flex-shrink: 0;
}

.promo-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}


.promo-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: var(--secondary);
    color: var(--dark);
    font-weight: 700;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 1.1rem;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    z-index: 3;
}

.promo-image {
    height: 200px;
    width: 100%;
    background-size: cover;
    background-position: center;
    position: relative;
}

.promo-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.4) 100%);
}

.promo-content {
    padding: 30px;
}

.promo-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 15px;
    line-height: 1.3;
}

.promo-text {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 20px;
    color: #555;
}

.promo-features {
    list-style: none;
    margin-bottom: 25px;
}

.promo-features li {
    padding: 8px 0;
    position: relative;
    padding-left: 30px;
    font-size: 1rem;
    line-height: 1.5;
}

.promo-features li::before {
    content: '•';
    position: absolute;
    left: 10px;
    color: var(--secondary);
    font-weight: bold;
    font-size: 1.5rem;
    line-height: 1;
}

.promo-btn {
    display: inline-block;
    padding: 12px 30px;
    background-color: var(--primary);
    color: white;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
    border: 2px solid var(--primary);
    text-align: center;
    width: 100%;
}

.promo-btn:hover {
    background-color: transparent;
    color: var(--primary);
}

/* Декоративные элементы */
.promo-decor {
    position: absolute;
    opacity: 0.05;
    z-index: 1;
}

.decor-1 {
    top: 10%;
    left: 5%;
    width: 200px;
    height: 200px;
    background: var(--primary);
    border-radius: 50%;
}

.decor-2 {
    bottom: 10%;
    right: 5%;
    width: 150px;
    height: 150px;
    background: var(--secondary);
    border-radius: 50%;
}

/* Адаптивность */
@media (max-width: 1200px) {
    .promo-section {
        padding: 80px 0;
    }
    
    .promo-row {
        padding: 0 7%;
    }
}

@media (max-width: 992px) {
    .section-title {
        font-size: 2.4rem;
    }
    
    .section-subtitle {
        font-size: 1.3rem;
    }
    
    .promo-row {
        padding: 0 5%;
    }
}

@media (max-width: 768px) {

    .section-title {
        font-size: 1.5rem;
    }
    
    .promo-content {
        padding: 25px;
    }
    
    .promo-row {
        padding: 0 20px;
    }
    
    .promo-card {
        width: 300px;
    }
}

@media (max-width: 576px) {
    .promo-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
    }
    
    .promo-title {
        font-size: 1.5rem;
    }
    
    .promo-badge {
        font-size: 0.9rem;
        padding: 5px 15px;
    }
    
    .promo-card {
        width: 280px;
    }
    
    .promo-row {
        padding: 0 15px;
    }
}

/* Блок 3 О нас */

/* Секция "О нас" */
        .about-section {
            padding: 100px 10%;
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        .about-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .about-content {
            position: relative;
            z-index: 2;
        }

        .section-titles {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 30px;
        }

        .about-text strong {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .about-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin: 40px 0;
        }

        .highlight-item {
            background: rgba(33, 109, 189, 0.05);
            border-left: 4px solid var(--secondary);
            padding: 20px;
            border-radius: 0 8px 8px 0;
        }

        .highlight-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 10px;
        }

        .highlight-text {
            font-size: 1rem;
            color: #555;
        }

        .about-btn {
            display: inline-block;
            padding: 15px 40px;
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 2px solid var(--primary);
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .about-btn:hover {
            background-color: transparent;
            color: var(--primary);
        }

        .about-images {
            position: relative;
            height: 100%;
        }

        .main-image {
            width: 100%;
            height: 500px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 2;
        }

        .secondary-image {
            position: absolute;
            width: 60%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .image-1 {
            bottom: -30px;
            left: -30px;
            border: 5px solid white;
        }

        .image-2 {
            top: -30px;
            right: -30px;
            border: 5px solid white;
        }

        /* Декоративные элементы */
        .about-decor {
            position: absolute;
            opacity: 0.05;
            z-index: 1;
        }

        .decor-1 {
            top: 10%;
            right: 5%;
            width: 300px;
            height: 300px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* Адаптивность */
        @media (max-width: 1200px) {
            .about-container {
                gap: 40px;
            }
            
            .about-highlights {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .about-container {
                grid-template-columns: 1fr;
            }
            
            .about-images {
                height: 500px;
                margin-top: 50px;
            }
            
            .section-title {
                font-size: 2.4rem;
            }
        }

        @media (max-width: 768px) {
            .about-section {
                padding: 80px 5%;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .main-image {
                height: 400px;
            }
            
            .secondary-image {
                height: 250px;
            }
        }

        @media (max-width: 576px) {
            .about-section {
                padding: 60px 15px;
            }
            
            .about-images {
                height: 350px;
            }
            
            .main-image {
                height: 300px;
            }
            
            .secondary-image {
                height: 180px;
                width: 50%;
            }
            
            .about-btn {
                width: 100%;
                text-align: center;
            }
        }

        /* Блок 4 Новости */
        
/* Секция новостей */
        .news-section {
            padding: 100px 10%;
            background-color: var(--light);
            position: relative;
            overflow: hidden;
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
            position: relative;
            z-index: 2;
        }

        .section-tit {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
            position: relative;
            z-index: 2;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            position: relative;
            height: 400px;
            display: block;
            text-decoration: none;
            color: white;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .news-image {
            height: 100%;
            width: 110%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .news-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 100%);
            transition: var(--transition);
        }

        .news-card:hover .news-image::after {
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 100%);
        }

        .news-content {
            text-decoration: none;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            z-index: 2;
        }

        .news-date {
            background: var(--secondary);
            color: var(--dark);
            font-weight: 700;
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 15px;
        }

        .news-title {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.4;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .news-excerpt {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 10px;
            opacity: 0.9;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .read-more {
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            font-weight: 600;
            
            transition: var(--transition);
        }

        .news-card:hover .read-more {
            color: var(--secondary);
        }

        .all-news-btn {
            display: block;
            width: 300px;
            margin: 0 auto;
            padding: 15px 40px;
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 2px solid var(--primary);
            text-align: center;
            font-size: 1.1rem;
        }

        .all-news-btn:hover {
            background-color: transparent;
            color: var(--primary);
            transform: translateY(-3px);
        }

        /* Декоративные элементы */
        .news-decor {
            position: absolute;
            opacity: 0.05;
            z-index: 1;
        }

        .decor-1 {
            top: 10%;
            right: 5%;
            width: 250px;
            height: 250px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* Адаптивность */
        @media (max-width: 1200px) {
            .news-section {
                padding: 80px 7%;
            }
        }

        @media (max-width: 992px) {
            .section-title {
                font-size: 2.4rem;
            }
            
            .news-grid {
                gap: 25px;
            }
            
            .news-card {
                height: 350px;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .news-grid {
                grid-template-columns: 1fr;
            }
            
            .all-news-btn {
                width: 100%;
                max-width: 300px;
            }
            
            .news-content {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .news-section {
                padding: 60px 15px;
            }
            
            .section-header {
                margin-bottom: 40px;
            }
            
            .news-card {
                height: 300px;
            }
            
            .news-title {
                font-size: 1.4rem;
            }
        }

        /* Подвал */

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

        /* =========================================
           СОЦИАЛЬНЫЕ СЕТИ В ПОДВАЛЕ
           ========================================= */
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
<script src="js/transitions.js"></script>
</body>
</html>