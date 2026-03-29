<script setup>
import { onMounted } from 'vue'

onMounted(() => {
  // Анимация при скролле главной страницы, если нужно менять хедер
  // В нашем App.vue хедер уже есть, но если нужно менять его фон при скролле именно на главной:
  const handleScroll = () => {
    const header = document.querySelector('.header') // предполагаем, что у хедера класс header из App.vue
    if (header) {
      if (window.scrollY > 20) {
        header.style.boxShadow = '0 6px 25px rgba(0, 0, 0, 0.2)'
        header.style.background = 'linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%)'
      } else {
        header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)'
        header.style.background = 'linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%)'
      }
    }
  }

  window.addEventListener('scroll', handleScroll)
  // Инициализация при монтировании
  handleScroll()

  return () => {
    window.removeEventListener('scroll', handleScroll)
  }
})
</script>

<template>
  <div class="home-page">
    <!-- Блок 1: Главный экран -->
    <section class="hero-section">
      <div class="hero-content">
        <h1 class="hero-title">МЕЧТАЕТЕ</h1>
        <h2 class="hero-subtitle">О НЕБЕ?</h2>
        <p class="hero-text">В нашем аэроклубе Вы можете сделать шаг навстречу своей мечте! Насладитесь свободой и незабываемым чувством полета при прыжке с парашютом или полетав на самолете!</p>
        <div class="hero-buttons">
          <router-link to="/certificates" class="hero-btn btn-primary">ХОЧУ ПРЫГНУТЬ!</router-link>
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
        <div class="service-card">
          <div class="service-image" style="background-image: url('/images/б1.webp');"></div>
          <div class="service-content">
            <h3 class="service-title">Ознакомительный полёт</h3>
            <div class="service-price">4 000 ₽</div>
            <ul class="service-features">
              <li>15-20 минут в воздухе с инструктором</li>
              <li>Обзорная экскурсия по аэродрому</li>
              <li>Возможность попробовать управление самолётом</li>
            </ul>
            <router-link to="/certificates" class="service-btn">Подробнее</router-link>
          </div>
        </div>
        
        <div class="service-card">
          <div class="service-image" style="background-image: url('/images/б2.webp');"></div>
          <div class="service-content">
            <h3 class="service-title">Самостоятельный прыжок</h3>
            <div class="service-price">8 500 ₽</div>
            <ul class="service-features">
              <li>Прыжок с высоты 800-900 метров</li>
              <li>Полная предварительная подготовка</li>
              <li>Круглый купол с управлением</li>
            </ul>
            <router-link to="/certificates" class="service-btn">Подробнее</router-link>
          </div>
        </div>
        
        <div class="service-card">
           <div class="service-image" style="background-image: url('/images/б3.webp');"></div>
          <div class="service-content">
            <h3 class="service-title">Прыжок в тандеме с инструктором</h3>
            <div class="service-price">12 000 ₽</div>
            <ul class="service-features">
              <li>Прыжок с высоты 4000 метров</li>
              <li>50 секунд свободного падения</li>
              <li>Профессиональный инструктор</li>
            </ul>
            <router-link to="/certificates" class="service-btn">Подробнее</router-link>
          </div>
        </div>
        
        <div class="service-card">
           <div class="service-image" style="background-image: url('/images/б4.webp');"></div>
          <div class="service-content">
            <h3 class="service-title">Прыжок в тандеме с оператором и GoPro</h3>
            <div class="service-price">16 500 ₽</div>
            <ul class="service-features">
              <li>Прыжок с высоты 4000 метров</li>
              <li>Профессиональная съёмка на GoPro</li>
              <li>Видео и фото материалы</li>
            </ul>
            <router-link to="/certificates" class="service-btn">Подробнее</router-link>
          </div>
        </div>
        
        <div class="service-card">
           <div class="service-image" style="background-image: url('/images/б5.webp');"></div>
          <div class="service-content">
            <h3 class="service-title">Прыжок в тандеме с фото-видеосъёмкой</h3>
            <div class="service-price">18 000 ₽</div>
            <ul class="service-features">
              <li>Прыжок с высоты 4000 метров</li>
              <li>Профессиональная фото и видеосъёмка</li>
              <li>Обработанные материалы на память</li>
            </ul>
            <router-link to="/certificates" class="service-btn">Подробнее</router-link>
          </div>
        </div>
        
        <div class="service-card">
          <div class="service-image" style="background-image: url('/images/б6.webp');"></div>
          <div class="service-content">
            <h3 class="service-title">Прыжок в тандеме со съёмкой на GoPro</h3>
            <div class="service-price">17 500 ₽</div>
            <ul class="service-features">
              <li>Прыжок с высоты 4000 метров</li>
              <li>Съёмка на камеру GoPro</li>
              <li>Видео в Full HD качестве</li>
            </ul>
            <router-link to="/certificates" class="service-btn">Подробнее</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Блок 3: Акции -->
    <section class="promo-section">
      <div class="promo-bg-image" style="background-image: url('/images/фон1.png')"></div>
      
      <!-- Декоративные элементы -->
      <div class="promo-decor decor-1"></div>
      <div class="promo-decor decor-2"></div>
      
      <div class="section-headers">
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
              <router-link to="/stocks" class="promo-btn">Получить скидку</router-link>
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
              <router-link to="/stocks" class="promo-btn">Записаться в будний день</router-link>
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
              <router-link to="/stocks" class="promo-btn">Участвовать в акции</router-link>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Блок 4: О нас -->
    <section class="about-section">
      <div class="about-decor about-decor-1"></div>
      
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
          
          <router-link to="/about" class="about-btn">ПОДРОБНЕЕ О НАС</router-link>
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
      <div class="news-decor news-decor-1"></div>
      
      <div class="section-headers">
        <h2 class="section-tit">НОВОСТИ КЛУБА</h2>
      </div>
      
      <div class="news-grid">
        <router-link to="/news" class="news-card">
          <div class="news-image" style="background-image: url('/images/New Year.webp');">
            <div class="news-content">
              <div class="news-date">5 декабря 2024</div>
              <h3 class="news-title">НОВОГОДНИЕ СКИДКИ НА ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</h3>
              <p class="news-excerpt">Зима — это по-настоящему волшебное время, когда всё вокруг превращается в сказку...</p>
            </div>
          </div>
        </router-link>

        <router-link to="/news" class="news-card">
          <div class="news-image" style="background-image: url('/images/News.jpg');">
            <div class="news-content">
              <div class="news-date">18 апреля 2023</div>
              <h3 class="news-title">ОТКРЫТИЕ СЕЗОНА 2023</h3>
              <p class="news-excerpt">Старт нового сезона прыжков с парашютом! Уже 21 апреля мы открываем сезон...</p>
            </div>
          </div>
        </router-link>
        
        <router-link to="/news" class="news-card">
          <div class="news-image" style="background-image: url('/images/News2.jpg');">
            <div class="news-content">
              <div class="news-date">9 апреля 2024</div>
              <h3 class="news-title">ОТКРЫТИЕ СЕЗОНА 2024</h3>
              <p class="news-excerpt">Старт нового сезона прыжков с парашютом! Уже 15 апреля мы открываем сезон...</p>
            </div>
          </div>
        </router-link>
        
        <router-link to="/news" class="news-card">
          <div class="news-image" style="background-image: url('/images/Парашутист.jpg');">
            <div class="news-content">
              <div class="news-date">8 сентября 2022</div>
              <h3 class="news-title">ЛЮБОВЬ И СТИХИЯ: ВЛАДИМИРСКИЕ СЕМЬИ РАССКАЗАЛИ СВОИ ИСТОРИИ</h3>
              <p class="news-excerpt">Семейные пары во Владимирском регионе не только тушят огонь, но и покоряют небо вместе...</p>
            </div>
          </div>
        </router-link>
      </div>
      
      <router-link to="/news" class="all-news-btn">БОЛЬШЕ НОВОСТЕЙ</router-link>
    </section>
  </div>
</template>

<style scoped>
/* Герой */
.hero-section {
  height: 100vh;
  min-height: 700px;
  background: 
    linear-gradient(rgba(33, 109, 189, 0.7), rgba(25, 134, 250, 0.685)),
    url('/images/Гл\ фон.webp') center/cover no-repeat;
  display: flex;
  align-items: center;
  padding: 0 10%;
  margin-top: -80px; /* Компентсация хедера, чтобы фон был под ним */
  padding-top: 80px;
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

/* Услуги */
.services-section {
  padding: 100px 10%;
  background-color: white;
}

.section-header {
  text-align: center;
  margin-bottom: 70px;
}
.section-headers {
  text-align: center;
  margin-bottom: 70px;
  position: relative;
  z-index: 2;
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
  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
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

/* Акции */
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
  width: 100%;
  padding: 0 5%;
}

.promo-row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  position: relative;
  z-index: 2;
  max-width: 1200px;
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
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary);
  margin-bottom: 15px;
  line-height: 1.3;
}

.promo-text {
  font-size: 1rem;
  line-height: 1.5;
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
  padding-left: 20px;
  font-size: 0.95rem;
  line-height: 1.4;
}

.promo-features li::before {
  content: '•';
  position: absolute;
  left: 0;
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
  box-sizing: border-box;
}

.promo-btn:hover {
  background-color: transparent;
  color: var(--primary);
}

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

/* О нас */
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

.about-decor {
  position: absolute;
  opacity: 0.05;
  z-index: 1;
}

.about-decor-1 {
  top: 10%;
  right: 5%;
  width: 300px;
  height: 300px;
  background: var(--primary);
  border-radius: 50%;
}

/* Новости */
.news-section {
  padding: 100px 10%;
  background-color: var(--light);
  position: relative;
  overflow: hidden;
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
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
  width: 100%;
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
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 15px;
  line-height: 1.4;
  text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
}

.news-excerpt {
  font-size: 1rem;
  line-height: 1.5;
  margin-bottom: 10px;
  opacity: 0.9;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
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

.news-decor {
  position: absolute;
  opacity: 0.05;
  z-index: 1;
}

.news-decor-1 {
  top: 10%;
  right: 5%;
  width: 250px;
  height: 250px;
  background: var(--primary);
  border-radius: 50%;
}

@media (max-width: 1200px) {
  .hero-title { font-size: 4rem; }
  .hero-subtitle { font-size: 1.8rem; }
  .about-container { gap: 40px; }
  .about-highlights { grid-template-columns: 1fr; }
}

@media (max-width: 992px) {
  .services-grid { grid-template-columns: 1fr 1fr; }
  .about-container { grid-template-columns: 1fr; }
  .about-images { height: 500px; margin-top: 50px; }
  .news-grid { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 768px) {
  .hero-title { font-size: 3rem; }
  .hero-subtitle { font-size: 1.5rem; }
  .hero-content { align-items: center; text-align: center;}
  .services-grid { grid-template-columns: 1fr; }
  .promo-card { width: 100%; max-width: 350px;}
  .main-image { height: 400px; }
  .secondary-image { height: 250px; }
  .news-grid { grid-template-columns: 1fr; }
  .all-news-btn { width: 100%; max-width: 300px; }
}

@media (max-width: 576px) {
  .hero-title { font-size: 2.5rem; }
  .about-images { height: 350px; }
  .main-image { height: 300px; }
  .secondary-image { height: 180px; width: 50%; }
  .about-btn { width: 100%; text-align: center; }
  .news-card { height: 300px; }
  .news-title { font-size: 1.2rem; }
}
</style>
