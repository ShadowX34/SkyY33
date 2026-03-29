<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <footer class="footer">
    <div class="footer-container">
      <!-- Колонка 1: О клубе -->
      <div class="footer-col">
        <div class="footer-logo">
          <img src="/images/Лого2.png" alt="Логотип" class="footer-logo-img">
          <div class="footer-logo-text">Владимирский АСК ДОСААФ России</div>
        </div>
        <p class="footer-about">
          Владимирский аэроклуб был основан в 1934 году. С тех пор мы подготовили множество летчиков,
          парашютистов и механиков, среди которых более 200 мастеров спорта СССР и России.
        </p>

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
          <li><RouterLink to="/about">О нас</RouterLink></li>
          <li><RouterLink to="/prices">Цены</RouterLink></li>
          <li><RouterLink to="/certificates">Подарочные сертификаты</RouterLink></li>
          <li><RouterLink to="/gallery">Галерея</RouterLink></li>
          <li><RouterLink to="/news">Новости</RouterLink></li>
          <li><RouterLink to="/stocks">Акции</RouterLink></li>
          <li><RouterLink to="/contacts">Контакты</RouterLink></li>
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
          <iframe src="https://yandex.ru/map-widget/v1/?ll=40.583509%2C56.249510&masstransit%5BstopId%5D=1543209455&mode=masstransit&tab=overview&z=17.95" frameborder="0"></iframe>
        </div>
      </div>
    </div>
    <div class="footer-bottom">Негосударственное образовательное учреждение «Владимирский авиационно-спортивный клуб ДОСААФ России»</div>
  </footer>
</template>

<style scoped>
.footer {
  background-color: var(--primary-dark);
  color: white;
  padding: 60px 10% 30px;
  position: relative;
  /* margin-top: 50px; будет задаваться в страницах, которым нужен отступ */
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

.social-icon:hover {
  background: var(--secondary);
  color: var(--dark);
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
  border-color: var(--secondary);
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
</style>
