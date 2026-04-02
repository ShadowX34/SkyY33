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
                    <li><a href="news.php">Новости</a></li>
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

    <a href="https://wa.me/+79190234000 ?text=3дравствуйте!" class="whatsapp-float" target="_blank" title="Написать в WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

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
            link.addEventListener('click', function(e) {
                // Если ширина окна для мобильного меню и это выпадающий список
                if (window.innerWidth <= 992 && this.parentElement.classList.contains('dropdown')) {
                    e.preventDefault(); // Предотвращаем переход по ссылке
                    e.stopPropagation(); // Блокируем скрипт плавного перехода, который повешен на document
                    this.parentElement.classList.toggle('active');
                    return; // Не закрываем всё меню
                }

                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    });
    </script>
    <script src="js/transitions.js?v=1.2"></script>
</body>
</html>
