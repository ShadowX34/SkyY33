<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Владимирский АСК ДОСААФ России - Галерея</title>
    <link rel="stylesheet" href="css/gallery.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
</head>
<body>

    <!-- ===== ШАПКА ===== -->
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="index.php"><img src="images/Лого2.png" class="logo" alt="Логотип"></a>
                <div class="company-name">Владимирский АСК ДОСААФ России<br><span style="font-size:0.9rem;">Прыжки с парашютом</span></div>
            </div>

            <div class="nav-container">
                <ul class="nav-menu">
                    <li class="nav-item"><a href="about.php" class="nav-link">О нас</a></li>
                    <li class="nav-item"><a href="certificates.php" class="nav-link">Подарочные сертификаты</a></li>
                    <li class="nav-item"><a href="prices.php" class="nav-link">Цены</a></li>
                    <li class="nav-item"><a href="gallery.php" class="nav-link active">Галерея</a></li>
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

    <!-- ===== ОСНОВНОЙ КОНТЕНТ ===== -->
    <main class="gallery-page">

        <h1 class="page-title">ГАЛЕРЕЯ</h1>

        <!-- Сетка фотографий (динамически подставляется JS) -->
        <div class="photo-grid" id="photoGrid">
             <!-- Заполняется через JavaScript -->
        </div>

        <!-- Пагинация -->
        <nav class="gallery-pagination" id="pagination">
            <!-- Заполняется через JavaScript -->
        </nav>

        <!-- Разделитель -->
        <div class="section-divider"></div>

        <!-- ===== ВИДЕО ===== -->
        <h2 class="video-section-title">ВИДЕО</h2>


        <!-- Ряд 1 -->
        <div class="video-grid">
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/ZKb-3bqPpvQ"
                        title="Видео 2024 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/G4-eBddF4Xo"
                        title="Видео 2024 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/N6MBwWyoxs4"
                        title="Видео 2024 - 3"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Ряд 2 -->
        <div class="video-grid" style="margin-top:30px;">
            <div class="video-card">
                <div class="video-year">2022</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/pE1s0u3yS2A"
                        title="Видео 2023 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/Iuxp6tCWA6A"
                        title="Видео 2023 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/-3lxkTTXc1Q"
                        title="Видео 2023 - 3"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Ряд 3 -->
        <div class="video-grid" style="margin-top:30px;">
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/sXaws0VfiwM"
                        title="Видео 2022 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2021</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/OJiq3GQcbZQ"
                        title="Видео 2022 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2020</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/jnwGj5PE_b8"
                        title="Видео 2022 - 3"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Ряд 4 -->
        <div class="video-grid" style="margin-top:30px;">
            <div class="video-card">
                <div class="video-year">2020</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/Fn3rI7Tnr4U"
                        title="Видео 2021 - 1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            <div class="video-card">
                <div class="video-year">2019</div>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/PnB6G9mAqDs"
                        title="Видео 2021 - 2"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>

    </main>

    <!-- ===== ПОДВАЛ ===== -->
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

            <div class="footer-col">
                <h3 class="footer-section-title">Контакты</h3>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt footer-contact-icon"></i>
                    <div class="footer-contact-text">
                        Владимирская область, Суздальский район,<br>аэродром «Сокол»
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
                        Пн–Пт: 9:00 – 18:00<br>Сб–Вс: 10:00 – 16:00
                    </div>
                </div>
            </div>

            <div class="footer-col">
                <h3 class="footer-section-title">Схема проезда</h3>
                <div class="footer-map">
                    <iframe src="https://yandex.ru/map-widget/v1/?ll=40.583509%2C56.249510&masstransit%5BstopId%5D=1543209455&mode=masstransit&tab=overview&z=17.95" frameborder="0"></iframe>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            Негосударственное образовательное учреждение «Владимирский авиационно-спортивный клуб ДОСААФ России»
        </div>
    </footer>

    <!-- ===== ЛАЙТБОКС ===== -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-inner">
            <button class="lightbox-close" id="lightboxClose"><i class="fas fa-times"></i></button>
            <button class="lightbox-nav lightbox-prev" id="lightboxPrev"><i class="fas fa-chevron-left"></i></button>
            <img src="" alt="Фото" id="lightboxImg">
            <button class="lightbox-nav lightbox-next" id="lightboxNext"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <script>

    const TOTAL_PAGES = 14;
    const PHOTOS_PER_PAGE_DEFAULT = 24; // 6 рядов × 4
    const PHOTOS_PAGE_14 = 9;

    const PHOTOS = [];


for (let i = 1; i <= 328; i++) {
    PHOTOS.push(`images/gallery/${i}.jpg`);
}

    // ЛОГИКА ПАГИНАЦИИ

    let currentPage = 1;
    let lightboxIndex = 0;
    let currentPagePhotos = [];

    function getPhotosForPage(page) {
        if (page <= 13) {
            const start = (page - 1) * PHOTOS_PER_PAGE_DEFAULT;
            return PHOTOS.slice(start, start + PHOTOS_PER_PAGE_DEFAULT);
        } else {
            return PHOTOS.slice(13 * PHOTOS_PER_PAGE_DEFAULT);
        }
    }

    function renderGrid(page) {
        const grid = document.getElementById('photoGrid');
        currentPagePhotos = getPhotosForPage(page);
        grid.innerHTML = '';

        currentPagePhotos.forEach((src, idx) => {
            const item = document.createElement('div');
            item.className = 'photo-item';
            item.innerHTML = `
                <div class="photo-placeholder">
                    <i class="fas fa-image"></i>
                    <span>${src.split('/').pop()}</span>
                </div>`;
           
            const img = new Image();
            img.onload = () => {
                item.innerHTML = `<img src="${src}" alt="Фото ${idx + 1}" loading="lazy">`;
                item.querySelector('img').addEventListener('click', () => openLightbox(idx));
            };
            img.onerror = () => { /* placeholder остаётся */ };
            img.src = src;

            item.addEventListener('click', () => openLightbox(idx));
            grid.appendChild(item);
        });

        // Плавный скролл к галерее
        if (page !== 1) {
            document.querySelector('.page-title').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function renderPagination(activePage) {
        const nav = document.getElementById('pagination');
        nav.innerHTML = '';

        // Кнопка «назад»
        const prev = document.createElement('button');
        prev.className = 'page-btn arrow';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prev.disabled = activePage === 1;
        prev.style.opacity = activePage === 1 ? '0.4' : '1';
        prev.addEventListener('click', () => { if (currentPage > 1) goToPage(currentPage - 1); });
        nav.appendChild(prev);

        for (let i = 1; i <= TOTAL_PAGES; i++) {
            const btn = document.createElement('button');
            btn.className = 'page-btn' + (i === activePage ? ' active' : '');
            btn.textContent = i;
            btn.addEventListener('click', () => goToPage(i));
            nav.appendChild(btn);
        }

        // Кнопка «вперёд»
        const next = document.createElement('button');
        next.className = 'page-btn arrow';
        next.innerHTML = '<i class="fas fa-chevron-right"></i>';
        next.disabled = activePage === TOTAL_PAGES;
        next.style.opacity = activePage === TOTAL_PAGES ? '0.4' : '1';
        next.addEventListener('click', () => { if (currentPage < TOTAL_PAGES) goToPage(currentPage + 1); });
        nav.appendChild(next);
    }

    function goToPage(page) {
        currentPage = page;
        renderGrid(page);
        renderPagination(page);
    }

    // ЛАЙТБОКС 
    function openLightbox(idx) {
        lightboxIndex = idx;
        const src = currentPagePhotos[idx];
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });

    document.getElementById('lightboxPrev').addEventListener('click', () => {
        lightboxIndex = (lightboxIndex - 1 + currentPagePhotos.length) % currentPagePhotos.length;
        document.getElementById('lightboxImg').src = currentPagePhotos[lightboxIndex];
    });

    document.getElementById('lightboxNext').addEventListener('click', () => {
        lightboxIndex = (lightboxIndex + 1) % currentPagePhotos.length;
        document.getElementById('lightboxImg').src = currentPagePhotos[lightboxIndex];
    });

    document.addEventListener('keydown', (e) => {
        if (!document.getElementById('lightbox').classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') document.getElementById('lightboxPrev').click();
        if (e.key === 'ArrowRight') document.getElementById('lightboxNext').click();
    });

    // БУРГЕР-МЕНЮ

    document.addEventListener('DOMContentLoaded', function () {
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');

        hamburger.addEventListener('click', function () {
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Инициализация галереи
        goToPage(1);
    });
    </script>

    <style>
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
    </style>

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
