<template>
  <footer class="footer">
    <div class="footer-container">
      <!-- Колонка 1: О клубе -->
      <div class="footer-col">
        <div class="footer-logo">
          <img src="/images/Лого2.png" alt="Логотип" class="footer-logo-img">
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

      <!-- Колонка 4: Карта -->
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
</template>

<script setup lang="ts">
</script>
