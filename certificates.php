<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Владимирский АСК ДОСААФ России - Прыжки с парашютом</title>
    <link rel="stylesheet" href="css/certificates.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
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
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Подарочные сертификаты -->

   <!-- Основной контент страницы -->
    <main class="certificates-page">
        <h1 class="page-title">ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</h1>
        <p class="page-description">
            Подарите незабываемые эмоции и яркие впечатления своим близким! Наши сертификаты - это идеальный подарок для тех, кто любит экстрим и новые ощущения.
        </p>
        
        <div class="certificates-grid">
            <!-- Сертификат 1 -->
            <div class="certificate-card">
                <div class="certificate-image" style="background-image: url('images/б1.webp');">
                    <div class="certificate-price">4000₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title">ОЗНАКОМИТЕЛЬНЫЙ ПОЛЕТ</h2>
                    <p class="certificate-description">
                        Никак не можешь решиться на прыжок с парашютом, а адреналина всё равно хочется? Тогда полёт на самолете - идеальный вариант для первого знакомства с небом!
                    </p>
                    <button class="certificate-btn order-btn" data-certificate="ОЗНАКОМИТЕЛЬНЫЙ ПОЛЕТ" data-price="4000">Заказать</button>
                </div>
            </div>
            
            <!-- Сертификат 2 -->
            <div class="certificate-card">
                <div class="certificate-image" style="background-image: url('images/б2.webp');">
                    <div class="certificate-price">12000₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title">ПРЫЖОК В ТАНДЕМЕ С ИНСТРУКТОРОМ</h2>
                    <p class="certificate-description">
                        Прыжок в тандеме с инструктором - это отличный способ познакомиться с небом, ощутить весь спектр эмоций от свободного падения и мягкого приземления под куполом парашюта.
                    </p>
                    <button class="certificate-btn order-btn" data-certificate="ПРЫЖОК В ТАНДЕМЕ С ИНСТРУКТОРОМ" data-price="12000">Заказать</button>
                </div>
            </div>
            
            <!-- Сертификат 3 -->
            <div class="certificate-card">
                <div class="certificate-image" style="background-image: url('images/б3.webp');">
                    <div class="certificate-price">8500₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title">САМОСТОЯТЕЛЬНЫЙ ПРЫЖОК</h2>
                    <p class="certificate-description">
                        Самостоятельный прыжок с парашютом - это отличный способ осуществить свою мечту, прикоснуться к небу и почувствовать себя настоящим парашютистом.
                    </p>
                    <button class="certificate-btn order-btn" data-certificate="САМОСТОЯТЕЛЬНЫЙ ПРЫЖОК" data-price="8500">Заказать</button>
                </div>
            </div>
            
            <!-- Сертификат 4 -->
            <div class="certificate-card">
                <div class="certificate-image" style="background-image: url('images/б4.webp');">
                    <div class="certificate-price">18000₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title">ПРЫЖОК В ТАНДЕМЕ С ФОТО-ВИДЕОСЪЁМКОЙ</h2>
                    <p class="certificate-description">
                        Запечатлейте свой прыжок на память! Профессиональная фото и видео съемка позволят вам переживать эти незабываемые моменты снова и снова.
                    </p>
                    <button class="certificate-btn order-btn" data-certificate="ПРЫЖОК В ТАНДЕМЕ С ФОТО-ВИДЕОСЪЁМКОЙ" data-price="18000">Заказать</button>
                </div>
            </div>
            
            <!-- Сертификат 5 -->
            <div class="certificate-card">
                <div class="certificate-image" style="background-image: url('images/б5.webp');">
                    <div class="certificate-price">16500₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title">ПРЫЖОК В ТАНДЕМЕ С ОПЕРАТОРОМ И GOPRO</h2>
                    <p class="certificate-description">
                        Экстремальная съемка вашего прыжка на камеру GoPro с разных ракурсов. Вы получите динамичное видео в высоком качестве, которым сможете поделиться с друзьями.
                    </p>
                    <button class="certificate-btn order-btn" data-certificate="ПРЫЖОК В ТАНДЕМЕ С ОПЕРАТОРОМ И GOPRO" data-price="16500">Заказать</button>
                </div>
            </div>
            
            <!-- Сертификат 6 -->
            <div class="certificate-card">
                <div class="certificate-image" style="background-image: url('images/б6.webp');">
                    <div class="certificate-price">17500₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title">ПРЫЖОК В ТАНДЕМЕ С СЪЁМКОЙ НА GOPRO</h2>
                    <p class="certificate-description">
                        Давно мечтаете покорить воздушную стихию? Но никак не можете решиться на отчаянный шаг в «пропасть». Прыжок с оператором - это безопасно и незабываемо!
                    </p>
                    <button class="certificate-btn order-btn" data-certificate="ПРЫЖОК В ТАНДЕМЕ С СЪЁМКОЙ НА GOPRO" data-price="17500">Заказать</button>
                </div>
            </div>
        </div>
        
        <!-- Дополнительная информация -->
        <div class="info-section">
            <h2 class="info-title">Как это работает?</h2>
            <p class="info-text">
                Выберите сертификат, оплатите онлайн или в нашем офисе, и мы доставим его любым удобным способом. 
                Получатель сможет самостоятельно записаться на удобную дату и время для прохождения выбранной программы.
            </p>
            <a href="#" class="info-btn">Купить сертификат</a>
        </div>
    </main>

    <!-- Модальное окно заказа -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="form-title">Оформление заказа</h2>
            <form class="order-form" id="orderForm">
                <div class="selected-certificate">
                    <p id="selectedCertificateText"></p>
                    <p id="selectedCertificatePrice"></p>
                </div>
                
                <div class="form-group">
                    <label for="fullName">ФИО:</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Телефон:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="comment">Комментарий:</label>
                    <textarea id="comment" name="comment" rows="3"></textarea>
                </div>
                
                <input type="hidden" id="certificateName" name="certificateName">
                <input type="hidden" id="certificatePrice" name="certificatePrice">
                
                <button type="submit" class="form-submit">Отправить заявку</button>
            </form>
        </div>
    </div>

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
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        const modal = document.getElementById('orderModal'); // Декларируем modal здесь
        const orderBtns = document.querySelectorAll('.order-btn');
        const closeBtn = document.querySelector('.close');
        const selectedCertText = document.getElementById('selectedCertificateText');
        const selectedCertPrice = document.getElementById('selectedCertificatePrice');
        const certNameInput = document.getElementById('certificateName');
        const certPriceInput = document.getElementById('certificatePrice');
        const orderForm = document.getElementById('orderForm');

        // Бургер-меню
        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            
            if (navMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Модальное окно - открытие
        orderBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const certificate = this.getAttribute('data-certificate');
                const price = this.getAttribute('data-price');
                
                selectedCertText.textContent = certificate;
                selectedCertPrice.textContent = price + '₽';
                certNameInput.value = certificate;
                certPriceInput.value = price;
                
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            });
        });

        // Модальное окно - закрытие
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        });

        // Закрытие при клике вне модального окна
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        });

        // Валидация формы перед отправкой
        function validateForm() {
            const fullName = document.getElementById('fullName').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            
            if (!fullName.trim()) {
                alert('Пожалуйста, введите ваше ФИО');
                return false;
            }
            
            if (!phone.trim()) {
                alert('Пожалуйста, введите ваш телефон');
                return false;
            }
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Пожалуйста, введите корректный email');
                return false;
            }
            
            return true;
        }

        // Обработка формы заказа
        orderForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                return;
            }
            
            // Показываем индикатор загрузки
            const submitBtn = this.querySelector('[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Отправка...';
            
            // Собираем данные формы
            const formData = new URLSearchParams();
            formData.append('certificateName', document.getElementById('certificateName').value);
            formData.append('certificatePrice', document.getElementById('certificatePrice').value);
            formData.append('fullName', document.getElementById('fullName').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('comment', document.getElementById('comment').value);
            
            // Отправляем данные
            fetch('save_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Ошибка сети');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    orderForm.reset();
                    modal.style.display = 'none'; // Теперь modal определена
                    document.body.style.overflow = '';
                    
                    if (data.order_id) {
                        console.log('Номер вашего заказа: ' + data.order_id);
                    }
                } else {
                    throw new Error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ошибка при отправке заказа: ' + error.message);
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
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

         body {
            padding-top: 90px;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
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
            background: url('images/Лого2.png') center/cover no-repeat;
            
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

/* Подарочные сертификаты */

/* Основной контент */
        .certificates-page {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-title {
            font-size: 2.8rem;
            color: var(--primary-dark);
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 20px;
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
        }

        .page-description {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 50px;
            font-size: 1.1rem;
            color: var(--gray);
        }

        .certificates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .certificate-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .certificate-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .certificate-image {
            height: 250px;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .certificate-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
           
        }

        .certificate-price {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--secondary);
            color: var(--dark);
            font-weight: 700;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 1.3rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .certificate-content {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .certificate-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .certificate-description {
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 25px;
            color: #555;
            flex-grow: 1;
        }

        .certificate-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            text-align: center;
            align-self: flex-start;
        }

        .certificate-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
        }

        /* Блок дополнительной информации */
        .info-section {
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), 
                         url('https://images.unsplash.com/photo-1518633945839-8b6310925b68?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            padding: 50px;
            border-radius: 15px;
            margin: 60px 0;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .info-title {
            font-size: 2rem;
            color: var(--primary-dark);
            margin-bottom: 20px;
        }

        .info-text {
            max-width: 800px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
        }

        .info-btn {
            display: inline-block;
            padding: 15px 40px;
            background-color: var(--secondary);
            color: var(--dark);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            transition: var(--transition);
            font-size: 1.1rem;
            border: 2px solid var(--secondary);
        }

        .info-btn:hover {
            background-color: transparent;
            color: var(--dark);
            transform: translateY(-3px);
        }

        /* Стили для модальных окон */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            overflow-y: auto;
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.3);
            width: 90%;
            max-width: 600px;
            position: relative;
            animation: modalopen 0.4s;
        }
        
        @keyframes modalopen {
            from {opacity: 0; transform: translateY(-50px);}
            to {opacity: 1; transform: translateY(0);}
        }
        
        .close {
            position: absolute;
            right: 25px;
            top: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .close:hover {
            color: #333;
            transform: rotate(90deg);
        }
        
        .form-title {
            color: var(--primary-dark);
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.8rem;
        }
        
        .order-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group label {
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(33, 109, 189, 0.2);
        }
        
        .form-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .form-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .selected-certificate {
            background-color: #f0f7ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary);
        }
        
        .selected-certificate p {
            margin: 0;
            font-weight: 600;
            color: var(--primary-dark);
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
<script src="js/transitions.js"></script>
</body>
</html>