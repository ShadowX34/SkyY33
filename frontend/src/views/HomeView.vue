<template>
  <!-- Блок 1: Герой -->
  <section class="hero-section">
    <div class="hero-content">
      <h1 class="hero-title">МЕЧТАЕТЕ</h1>
      <h2 class="hero-subtitle">О НЕБЕ?</h2>
      <p class="hero-text">В нашем аэроклубе Вы можете сделать шаг навстречу своей мечте! Насладитесь свободой и незабываемым чувством полета при прыжке с парашютом или полетав на самолете!</p>
      <div class="hero-buttons">
        <RouterLink to="/certificates" class="hero-btn btn-primary">ХОЧУ ПРЫГНУТЬ!</RouterLink>
      </div>
    </div>
  </section>

  <!-- Блок 2: Услуги -->
  <section class="services-section">
    <div class="section-header">
      <h2 class="sections-title">НАШИ УСЛУГИ</h2>
      <h3 class="sections-subtitle"></h3>
    </div>
    <div class="services-grid">
      <div v-for="service in services" :key="service.title" class="service-card">
        <div class="service-image" :style="`background-image: url('${service.img}');`"></div>
        <div class="service-content">
          <h3 class="service-title">{{ service.title }}</h3>
          <div class="service-price">{{ service.price }}</div>
          <ul class="service-features">
            <li v-for="f in service.features" :key="f">{{ f }}</li>
          </ul>
          <RouterLink to="/certificates" class="service-btn">Подробнее</RouterLink>
        </div>
      </div>
    </div>
  </section>

  <!-- Блок 3: Акции -->
  <section class="promo-section">
    <div class="promo-bg-image" style="background-image: url('/images/фон1.png')"></div>
    <div class="promo-decor decor-1"></div>
    <div class="promo-decor decor-2"></div>
    <div class="section-header">
      <h2 class="section-title">АКЦИИ И СПЕЦПРЕДЛОЖЕНИЯ</h2>
      <h3 class="section-subtitle">ЭКОНОМЬТЕ НА ВПЕЧАТЛЕНИЯХ</h3>
    </div>
    <div class="promo-container">
      <div class="promo-row">
        <div class="promo-card">
          <div class="promo-badge">-10%</div>
          <div class="promo-image" style="background-image: url('/images/скидка.webp');"></div>
          <div class="promo-content">
            <h3 class="promo-title">ДЕНЬ РОЖДЕНИЯ - СКИДКА 10%</h3>
            <p class="promo-text">Предъяви паспорт и получи скидку 10% в свой день рождения!</p>
            <ul class="promo-features">
              <li>Действует в течение 3 дней до и после дня рождения</li>
              <li>Распространяется на все виды прыжков</li>
              <li>Не суммируется с другими акциями</li>
              <li>Дополнительные привилегии</li>
            </ul>
            <RouterLink to="/stocks" class="promo-btn">Получить скидку</RouterLink>
          </div>
        </div>
        <div class="promo-card">
          <div class="promo-badge">-500₽</div>
          <div class="promo-image" style="background-image: url('/images/скидка2.webp');"></div>
          <div class="promo-content">
            <h3 class="promo-title">СКИДКА 500₽ В БУДНИЙ ДЕНЬ</h3>
            <p class="promo-text">Специальное предложение для тех, кто может прыгать в будни!</p>
            <ul class="promo-features">
              <li>Действует по четвергам в дни проведения прыжков</li>
              <li>Не распространяется на выходные и праздники</li>
              <li>При покупке сертификата скидка фиксируется</li>
              <li>Дополнительные привилегии</li>
            </ul>
            <RouterLink to="/stocks" class="promo-btn">Записаться в будний день</RouterLink>
          </div>
        </div>
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
            <RouterLink to="/stocks" class="promo-btn">Участвовать в акции</RouterLink>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Блок 4: О нас -->
  <section class="about-section">
    <div class="about-decor decor-1"></div>
    <div class="about-container">
      <div class="about-content">
        <h2 class="section-titles">О НАС</h2>
        <p class="about-text">Владимирский аэроклуб был основан в <strong>1934 году</strong>. С тех пор он подготовил множество летчиков, парашютистов и механиков, среди которых более <strong>200 мастеров спорта СССР и России</strong>.</p>
        <p class="about-text">В <strong>2010 году</strong> наш аэроклуб был реорганизован в Негосударственное образовательное учреждение «Владимирский аэроклуб РОСТО», а в <strong>2011 году</strong> переименован во «Владимирский авиационно-спортивный клуб ДОСААФ России».</p>
        <p class="about-text"><strong>С тех пор мы активно развиваемся и помогаем Вам покорять небо!</strong></p>
        <div class="about-highlights">
          <div class="highlight-item"><div class="highlight-number">85+</div><div class="highlight-text">Лет успешной работы в авиационной сфере</div></div>
          <div class="highlight-item"><div class="highlight-number">200+</div><div class="highlight-text">Мастеров спорта подготовлено</div></div>
          <div class="highlight-item"><div class="highlight-number">10 000+</div><div class="highlight-text">Прыжков с парашютом ежегодно</div></div>
          <div class="highlight-item"><div class="highlight-number">50+</div><div class="highlight-text">Профессиональных инструкторов</div></div>
        </div>
        <RouterLink to="/about" class="about-btn">ПОДРОБНЕЕ О НАС</RouterLink>
      </div>
      <div class="about-images">
        <img src="/images/АН-2_1.jpg" alt="Владимирский аэроклуб" class="main-image">
        <img src="/images/АН-2.jpg" alt="История аэроклуба" class="secondary-image image-1">
        <img src="/images/АН-2_2.jpg" alt="Наши достижения" class="secondary-image image-2">
      </div>
    </div>
  </section>

  <!-- Блок 5: Новости -->
  <section class="news-section">
    <div class="news-decor decor-1"></div>
    <div class="section-header">
      <h2 class="section-tit">НОВОСТИ КЛУБА</h2>
    </div>
    <div class="news-grid">
      <RouterLink to="/news" class="news-card">
        <div class="news-image" style="background-image: url('/images/New Year.webp');">
          <div class="news-content">
            <div class="news-date">5 декабря 2024</div>
            <h3 class="news-title">НОВОГОДНИЕ СКИДКИ НА ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</h3>
            <p class="news-excerpt">Зима — это по-настоящему волшебное время, когда всё вокруг превращается в сказку...</p>
          </div>
        </div>
      </RouterLink>
      <RouterLink to="/news" class="news-card">
        <div class="news-image" style="background-image: url('/images/News.jpg');">
          <div class="news-content">
            <div class="news-date">18 апреля 2023</div>
            <h3 class="news-title">ОТКРЫТИЕ СЕЗОНА 2023</h3>
            <p class="news-excerpt">Старт нового сезона прыжков с парашютом! Уже 21 апреля мы открываем сезон...</p>
          </div>
        </div>
      </RouterLink>
      <RouterLink to="/news" class="news-card">
        <div class="news-image" style="background-image: url('/images/News2.jpg');">
          <div class="news-content">
            <div class="news-date">9 апреля 2024</div>
            <h3 class="news-title">ОТКРЫТИЕ СЕЗОНА 2024</h3>
            <p class="news-excerpt">Старт нового сезона прыжков с парашютом! Уже 15 апреля мы открываем сезон...</p>
          </div>
        </div>
      </RouterLink>
      <RouterLink to="/news" class="news-card">
        <div class="news-image" style="background-image: url('/images/Парашутист.jpg');">
          <div class="news-content">
            <div class="news-date">8 сентября 2022</div>
            <h3 class="news-title">ЛЮБОВЬ И СТИХИЯ: ВЛАДИМИРСКИЕ СЕМЬИ РАССКАЗАЛИ СВОИ ИСТОРИИ</h3>
            <p class="news-excerpt">Семейные пары во Владимирском регионе не только тушат огонь, но и покоряют небо вместе...</p>
          </div>
        </div>
      </RouterLink>
    </div>
    <RouterLink to="/news" class="all-news-btn">БОЛЬШЕ НОВОСТЕЙ</RouterLink>
  </section>
</template>

<script setup lang="ts">
const services = [
  { title: 'Ознакомительный полёт', price: '4 000 ₽', img: '/images/б1.webp', features: ['15-20 минут в воздухе с инструктором', 'Обзорная экскурсия по аэродрому', 'Возможность попробовать управление самолётом'] },
  { title: 'Самостоятельный прыжок', price: '8 500 ₽', img: '/images/б2.webp', features: ['Прыжок с высоты 800-900 метров', 'Полная предварительная подготовка', 'Круглый купол с управлением'] },
  { title: 'Прыжок в тандеме с инструктором', price: '12 000 ₽', img: '/images/б3.webp', features: ['Прыжок с высоты 4000 метров', '50 секунд свободного падения', 'Профессиональный инструктор'] },
  { title: 'Прыжок в тандеме с оператором и GoPro', price: '16 500 ₽', img: '/images/б4.webp', features: ['Прыжок с высоты 4000 метров', 'Профессиональная съёмка на GoPro', 'Видео и фото материалы'] },
  { title: 'Прыжок в тандеме с фото-видеосъёмкой', price: '18 000 ₽', img: '/images/б5.webp', features: ['Прыжок с высоты 4000 метров', 'Профессиональная фото и видеосъёмка', 'Обработанные материалы на память'] },
  { title: 'Прыжок в тандеме со съёмкой на GoPro', price: '17 500 ₽', img: '/images/б6.webp', features: ['Прыжок с высоты 4000 метров', 'Съёмка на камеру GoPro', 'Видео в Full HD качестве'] },
]
</script>
