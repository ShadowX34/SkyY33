<template>
  <header>
    <div class="header-container">
      <div class="logo-container">
        <RouterLink to="/"><img src="/images/Лого2.png" class="logo" alt="Логотип"></RouterLink>
        <div class="company-name">Владимирский АСК ДОСААФ России<br><span style="font-size:0.9rem;">Прыжки с парашютом</span></div>
      </div>

      <div class="nav-container">
        <ul class="nav-menu" :class="{ active: menuOpen }">
          <li class="nav-item dropdown" :class="{ active: aboutOpen }">
            <RouterLink to="/about" class="nav-link" @click="toggleAbout">
              О нас <i class="fas fa-chevron-down drop-icon"></i>
            </RouterLink>
            <ul class="dropdown-child">
              <li><RouterLink to="/team" @click="closeMenu">Команда</RouterLink></li>
              <li><RouterLink to="/reviews" @click="closeMenu">Отзывы</RouterLink></li>
              <li><RouterLink to="/faq" @click="closeMenu">Вопрос-ответ</RouterLink></li>
            </ul>
          </li>
          <li class="nav-item"><RouterLink to="/certificates" class="nav-link" @click="closeMenu">Подарочные сертификаты</RouterLink></li>
          <li class="nav-item"><RouterLink to="/prices" class="nav-link" @click="closeMenu">Цены</RouterLink></li>
          <li class="nav-item"><RouterLink to="/gallery" class="nav-link" @click="closeMenu">Галерея</RouterLink></li>
          <li class="nav-item"><RouterLink to="/news" class="nav-link" @click="closeMenu">Новости</RouterLink></li>
          <li class="nav-item"><RouterLink to="/stocks" class="nav-link" @click="closeMenu">Акции</RouterLink></li>
          <li class="nav-item"><RouterLink to="/contacts" class="nav-link" @click="closeMenu">Контакты</RouterLink></li>
        </ul>

        <div class="phone-container">
          <i class="fas fa-phone-alt phone-icon"></i>
          <a href="tel:89190234000" class="phone-link">8 919 023 40 00</a>
        </div>

        <div class="hamburger" :class="{ active: menuOpen }" @click="toggleMenu">
          <span></span><span></span><span></span>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'

const menuOpen = ref(false)
const aboutOpen = ref(false)

function toggleMenu() {
  menuOpen.value = !menuOpen.value
  document.body.style.overflow = menuOpen.value ? 'hidden' : ''
}

function closeMenu() {
  menuOpen.value = false
  document.body.style.overflow = ''
}

function toggleAbout() {
  aboutOpen.value = !aboutOpen.value
}

// Header scroll shadow
function handleScroll() {
  const header = document.querySelector('header') as HTMLElement
  if (!header) return
  if (window.scrollY > 20) {
    header.style.boxShadow = '0 6px 25px rgba(0, 0, 0, 0.2)'
    header.style.background = 'linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%)'
  } else {
    header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)'
    header.style.background = 'linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%)'
  }
}

onMounted(() => window.addEventListener('scroll', handleScroll))
onUnmounted(() => window.removeEventListener('scroll', handleScroll))
</script>
