<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const isMenuOpen = ref(false)

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
  if (isMenuOpen.value) {
    document.body.classList.add('no-scroll')
  } else {
    document.body.classList.remove('no-scroll')
  }
}

const closeMenu = () => {
  isMenuOpen.value = false
  document.body.classList.remove('no-scroll')
}
</script>

<template>
  <header>
    <div class="header-container">
      <div class="logo-container">
        <RouterLink to="/" @click="closeMenu">
          <img src="/images/Лого2.png" class="logo" alt="Логотип">
        </RouterLink>
        <div class="company-name">
          Владимирский АСК ДОСААФ России<br>
          <span style="font-size:0.9rem;">Прыжки с парашютом</span>
        </div>
      </div>

      <div class="nav-container">
        <ul class="nav-menu" :class="{ 'active': isMenuOpen }">
          <li class="nav-item dropdown">
            <RouterLink to="/about" class="nav-link" @click="closeMenu">О нас <i class="fas fa-chevron-down drop-icon"></i></RouterLink>
            <ul class="dropdown-child">
              <li><RouterLink to="/team" @click="closeMenu">Команда</RouterLink></li>
              <li><RouterLink to="/reviews" @click="closeMenu">Отзывы</RouterLink></li>
              <li><RouterLink to="/faq" @click="closeMenu">Вопрос-ответ</RouterLink></li>
            </ul>
          </li>
          <li class="nav-item">
            <RouterLink to="/certificates" class="nav-link" @click="closeMenu">Подарочные сертификаты</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink to="/prices" class="nav-link" @click="closeMenu">Цены</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink to="/gallery" class="nav-link" @click="closeMenu">Галерея</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink to="/news" class="nav-link" @click="closeMenu">Новости</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink to="/stocks" class="nav-link" @click="closeMenu">Акции</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink to="/contacts" class="nav-link" @click="closeMenu">Контакты</RouterLink>
          </li>
        </ul>

        <div class="phone-container">
          <i class="fas fa-phone-alt phone-icon"></i>
          <a href="tel:89190234000" class="phone-link">8 919 023 40 00</a>
        </div>

        <div class="hamburger" :class="{ 'active': isMenuOpen }" @click="toggleMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>
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
  transition: var(--transition);
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

/* Ссылка активна (router-link-active ставится автоматически Vue Router) */
.nav-link.router-link-active {
  color: var(--secondary);
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

.nav-link:hover::after,
.nav-link.router-link-active::after {
  width: 100%;
}

/* ВЫПАДАЮЩЕЕ МЕНЮ */
.nav-item.dropdown {
  position: relative !important;
}

ul.dropdown-child {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: var(--primary-dark);
  min-width: 220px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  z-index: 2000;
  padding: 0;
  margin: 0;
  border-radius: 0 0 8px 8px;
}

.nav-item.dropdown:hover ul.dropdown-child {
  display: block;
}

ul.dropdown-child li {
  list-style: none !important;
  margin: 0;
}

ul.dropdown-child li a {
  color: white !important;
  padding: 15px 20px !important;
  text-decoration: none !important;
  display: block !important;
  font-size: 0.95rem;
  font-weight: 500;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  transition: all 0.3s ease;
}

ul.dropdown-child li:last-child a {
  border-bottom: none;
}

ul.dropdown-child li a:hover,
ul.dropdown-child li a.router-link-active {
  background: var(--secondary) !important;
  color: var(--dark) !important;
  padding-left: 25px !important;
}

.drop-icon {
  font-size: 0.8em;
  margin-left: 5px;
  transition: transform 0.3s ease;
}

.nav-item.dropdown:hover .drop-icon {
  transform: rotate(180deg);
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
  
  .hamburger {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 30px;
    height: 30px;
    transition: var(--transition);
    margin-left: 15px;
  }
  
  .hamburger span {
    display: block;
    width: 30px;
    height: 3px;
    background: white;
    margin: 4px 0;
    transition: var(--transition);
  }
  
  .hamburger.active span:nth-child(1) {
    transform: translateY(11px) rotate(45deg);
  }
  
  .hamburger.active span:nth-child(2) {
    opacity: 0;
  }
  
  .hamburger.active span:nth-child(3) {
    transform: translateY(-11px) rotate(-45deg);
  }
  
  ul.dropdown-child {
    position: static;
    display: none;
    background: rgba(0, 0, 0, 0.15);
    box-shadow: none;
    width: 100%;
  }
  
  .nav-item.dropdown:hover ul.dropdown-child,
  .nav-item.dropdown:active ul.dropdown-child {
    display: block;
  }
}

@media (max-width: 576px) {
  .company-name {
    display: none;
  }
}
</style>
