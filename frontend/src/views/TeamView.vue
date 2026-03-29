<script setup>
import { ref } from 'vue'
import Lightbox from '../components/Lightbox.vue'

// Данные команды
const leadership = [
  { id: 1, name: 'Иванов Иван', role: 'Начальник аэроклуба', photo: '/images/Team/1.png' },
  { id: 2, name: 'Петрова Анна', role: 'Главный администратор', photo: '/images/Team/2.png' }
]

const tandemInstructors = [
  { id: 3, name: 'Смирнов Алексей', role: 'Тандем-инструктор', photo: '/images/Team/3.png' },
  { id: 4, name: 'Козлов Дмитрий', role: 'Тандем-инструктор', photo: '/images/Team/4.png' },
  { id: 5, name: 'Морозов Сергей', role: 'Воздушный оператор', photo: '/images/Team/5.png' },
  { id: 6, name: 'Волков Игорь', role: 'Тандем-инструктор', photo: '/images/Team/6.png' },
  { id: 7, name: 'Соколов Павел', role: 'Воздушный оператор', photo: '/images/Team/7.png' }
]

const pdpInstructors = [
  { id: 8, name: 'Лебедев Максим', role: 'Старший инструктор ПДП', photo: '/images/Team/8.png' }
]

// Собираем все фото для лайтбокса по порядку
const allImages = [
  ...leadership.map(m => m.photo),
  ...tandemInstructors.map(m => m.photo),
  ...pdpInstructors.map(m => m.photo)
]

const isLightboxOpen = ref(false)
const currentImageIndex = ref(0)

const openLightbox = (photoUrl) => {
  const index = allImages.indexOf(photoUrl)
  if (index !== -1) {
    currentImageIndex.value = index
    isLightboxOpen.value = true
  }
}
</script>

<template>
  <main class="team-page">
    <h1 class="page-title">КОМАНДА</h1>

    <div class="team-section">
      <h2 class="section-title">Руководство / Администрация</h2>
      <div class="team-grid grid-2">
        <div 
          v-for="member in leadership" 
          :key="member.id" 
          class="team-member" 
          @click="openLightbox(member.photo)"
        >
          <img :src="member.photo" :alt="member.name" class="member-photo">
          <h3 class="member-name">{{ member.name }}</h3>
          <p class="member-role">{{ member.role }}</p>
        </div>
      </div>
    </div>

    <div class="team-section">
      <h2 class="section-title">Тандем-инструкторы / Операторы</h2>
      <div class="team-grid grid-5">
        <div 
          v-for="member in tandemInstructors" 
          :key="member.id" 
          class="team-member" 
          @click="openLightbox(member.photo)"
        >
          <img :src="member.photo" :alt="member.name" class="member-photo">
          <h3 class="member-name">{{ member.name }}</h3>
          <p class="member-role">{{ member.role }}</p>
        </div>
      </div>
    </div>

    <div class="team-section">
      <h2 class="section-title">Инструкторы по подготовке к первому прыжку</h2>
      <div class="team-grid grid-1">
        <div 
          v-for="member in pdpInstructors" 
          :key="member.id" 
          class="team-member" 
          @click="openLightbox(member.photo)"
        >
          <img :src="member.photo" :alt="member.name" class="member-photo">
          <h3 class="member-name">{{ member.name }}</h3>
          <p class="member-role">{{ member.role }}</p>
        </div>
      </div>
    </div>

    <Lightbox 
      :is-open="isLightboxOpen" 
      :images="allImages"
      v-model:current-index="currentImageIndex"
      @close="isLightboxOpen = false"
    />
  </main>
</template>

<style scoped>
.team-page { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
.page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 50px; text-align: center; position: relative; padding-bottom: 20px; text-transform: uppercase; text-shadow: none; }
.page-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--secondary); }

.team-section { margin-bottom: 60px; }
.section-title { font-size: 2rem; color: var(--primary); margin-bottom: 30px; text-align: center; font-weight: 700; text-shadow: none; }

.team-grid { display: grid; gap: 30px; justify-content: center; }
.grid-2 { grid-template-columns: repeat(auto-fit, minmax(300px, 400px)); }
.grid-5 { grid-template-columns: repeat(auto-fit, minmax(200px, 300px)); }
.grid-1 { grid-template-columns: minmax(300px, 400px); }

.team-member { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: var(--transition); cursor: pointer; text-align: center; padding-bottom: 20px; }
.team-member:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.2); }
.member-photo { width: 100%; height: 350px; object-fit: cover; border-bottom: 4px solid var(--secondary); display: block; }
.member-name { font-size: 1.3rem; font-weight: 700; color: var(--primary-dark); margin: 15px 0 5px; }
.member-role { color: #666; font-size: 1rem; }
</style>
