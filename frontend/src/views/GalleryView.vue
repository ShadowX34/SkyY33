<script setup>
import { ref, computed, onMounted } from 'vue'
import { useApi } from '../composables/useApi'
import Lightbox from '../components/Lightbox.vue'

const { get } = useApi()

const API_PHOTOS = ref([])

// Стандартные (старые) фотографии
const DEFAULT_PHOTOS = Array.from({ length: 328 }, (_, i) => `/${i + 1}.jpg`)

// Объединяем старые и новые фото (новые в начале, чтобы было логично, ну или можно в конце)
const ALL_PHOTOS = computed(() => {
  return [
    ...API_PHOTOS.value.map(p => `/${p.filename}`), // С базы
    ...DEFAULT_PHOTOS
  ]
})

// Настройки пагинации
const PHOTOS_PER_PAGE = 24
const currentPage = ref(1)

const totalPages = computed(() => Math.ceil(ALL_PHOTOS.value.length / PHOTOS_PER_PAGE))

const currentPagePhotos = computed(() => {
  const start = (currentPage.value - 1) * PHOTOS_PER_PAGE
  return ALL_PHOTOS.value.slice(start, start + PHOTOS_PER_PAGE)
})

// Изменение страницы
const goToPage = (page) => {
  if (page < 1 || page > totalPages.value) return
  currentPage.value = page
  
  if (page !== 1) {
    document.querySelector('.page-title')?.scrollIntoView({ behavior: 'smooth', block: 'start' })
  }
}

// Лайтбокс
const isLightboxOpen = ref(false)
const lightboxIndex = ref(0)
const lightboxImages = ref([])

const openLightbox = (indexInPage) => {
  // Нам нужно передать в лайтбокс все картинки текущей страницы
  // и правильный индекс. Для наглядности можно передать вообще ALL_PHOTOS, 
  // но чтобы не грузить лишнее, передадим ALL_PHOTOS и вычислим глобальный индекс
  const globalIndex = (currentPage.value - 1) * PHOTOS_PER_PAGE + indexInPage
  
  // Добавляем к пути общий префикс папки галереи (как в API и в старых скриптах)
  lightboxImages.value = ALL_PHOTOS.value.map(src => `/images/gallery${src}`)
  lightboxIndex.value = globalIndex
  isLightboxOpen.value = true
}

// Загружаем фотки добавленные админом
const fetchAdminPhotos = async () => {
  try {
    const res = await get('/gallery')
    API_PHOTOS.value = res.data || []
  } catch (err) {
    console.error('Ошибка загрузки галереи:', err)
  }
}

onMounted(() => {
  fetchAdminPhotos()
})
</script>

<template>
  <main class="gallery-page">
    <h1 class="page-title">ГАЛЕРЕЯ</h1>

    <!-- Сетка фотографий -->
    <div class="photo-grid">
      <div 
        v-for="(src, idx) in currentPagePhotos" 
        :key="src"
        class="photo-item"
        @click="openLightbox(idx)"
      >
        <img :src="'/images/gallery' + src" :alt="'Фото ' + (idx + 1)" loading="lazy">
      </div>
    </div>

    <!-- Пагинация -->
    <nav class="gallery-pagination" v-if="totalPages > 1">
      <button 
        class="page-btn arrow" 
        :disabled="currentPage === 1"
        :style="{ opacity: currentPage === 1 ? '0.4' : '1' }"
        @click="goToPage(currentPage - 1)"
      >
        <i class="fas fa-chevron-left"></i>
      </button>
      
      <button 
        v-for="page in totalPages" 
        :key="page"
        class="page-btn"
        :class="{ active: page === currentPage }"
        @click="goToPage(page)"
      >
        {{ page }}
      </button>

      <button 
        class="page-btn arrow" 
        :disabled="currentPage === totalPages"
        :style="{ opacity: currentPage === totalPages ? '0.4' : '1' }"
        @click="goToPage(currentPage + 1)"
      >
        <i class="fas fa-chevron-right"></i>
      </button>
    </nav>

    <div class="section-divider"></div>

    <!-- ===== ВИДЕО ===== -->
    <h2 class="video-section-title">ВИДЕО</h2>

    <div class="video-grid">
      <!-- 2024 -->
      <div class="video-card">
        <div class="video-year">2022</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/ZKb-3bqPpvQ" title="Видео 2024 - 1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2022</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/G4-eBddF4Xo" title="Видео 2024 - 2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2022</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/N6MBwWyoxs4" title="Видео 2024 - 3" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      
      <!-- 2023 -->
      <div class="video-card">
        <div class="video-year">2022</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/pE1s0u3yS2A" title="Видео 2023 - 1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2021</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/Iuxp6tCWA6A" title="Видео 2023 - 2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2021</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/-3lxkTTXc1Q" title="Видео 2023 - 3" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>

      <!-- 2022 -->
      <div class="video-card">
        <div class="video-year">2021</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/sXaws0VfiwM" title="Видео 2022 - 1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2021</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/OJiq3GQcbZQ" title="Видео 2022 - 2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2020</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/jnwGj5PE_b8" title="Видео 2022 - 3" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>

      <!-- 2021 -->
      <div class="video-card">
        <div class="video-year">2020</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/Fn3rI7Tnr4U" title="Видео 2021 - 1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
      <div class="video-card">
        <div class="video-year">2019</div>
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/PnB6G9mAqDs" title="Видео 2021 - 2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
    </div>

    <!-- Переиспользуемый Lightbox -->
    <Lightbox 
      :is-open="isLightboxOpen" 
      :images="lightboxImages"
      v-model:current-index="lightboxIndex"
      @close="isLightboxOpen = false"
    />

  </main>
</template>

<style scoped>
.gallery-page { max-width: 1300px; margin: 40px auto; padding: 0 20px 60px; }

.page-title {
  font-size: 2.8rem;
  color: var(--primary-dark);
  margin-bottom: 40px;
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

/* ===== ФОТО-СЕТКА ===== */
.photo-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 30px; }
.photo-item { position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 4/3; background: #dde6f0; cursor: pointer; box-shadow: 0 3px 10px rgba(0,0,0,0.12); transition: var(--transition); }
.photo-item:hover { transform: scale(1.03); box-shadow: 0 8px 25px rgba(0,0,0,0.2); z-index: 2; }
.photo-item img { width: 100%; height: 100%; object-fit: cover; display: block; transition: var(--transition); }

/* ===== ПАГИНАЦИЯ ===== */
.gallery-pagination { display: flex; justify-content: center; align-items: center; gap: 8px; margin: 35px 0 55px; flex-wrap: wrap; }
.page-btn { width: 42px; height: 42px; border: 2px solid var(--primary); border-radius: 8px; background: white; color: var(--primary); font-weight: 700; font-size: 0.95rem; cursor: pointer; transition: var(--transition); display: flex; align-items: center; justify-content: center; }
.page-btn:hover { background: var(--primary); color: white; transform: translateY(-2px); box-shadow: 0 5px 12px rgba(33, 109, 189, 0.35); }
.page-btn.active { background: var(--primary); color: white; box-shadow: 0 5px 15px rgba(33, 109, 189, 0.4); pointer-events: none; }
.page-btn.arrow { border-color: var(--primary-dark); color: var(--primary-dark); }
.page-btn.arrow:hover { background: var(--primary-dark); color: white; }

/* РАЗДЕЛИТЕЛЬ */
.section-divider { height: 3px; background: linear-gradient(90deg, transparent, var(--secondary), transparent); margin: 50px 0; border-radius: 2px; }

/* ===== ВИДЕО ===== */
.video-section-title { font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 40px; text-align: center; position: relative; padding-bottom: 20px; font-weight: 700; }
.video-section-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60px; height: 4px; background: var(--secondary); }

.video-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 20px; }
.video-card { display: flex; flex-direction: column; gap: 0; }
.video-year { text-align: center; font-size: 1.1rem; font-weight: 700; color: var(--primary-dark); background: var(--secondary); padding: 6px 18px; border-radius: 8px 8px 0 0; letter-spacing: 0.5px; width: fit-content; margin: 0 auto; min-width: 80px; }
.video-wrapper { border-radius: 0 12px 12px 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.15); transition: var(--transition); position: relative; aspect-ratio: 16/9; background: #000; }
.video-card .video-year { border-radius: 8px 8px 0 0; }
.video-wrapper:hover { transform: translateY(-5px); box-shadow: 0 12px 35px rgba(0,0,0,0.22); }
.video-wrapper iframe { width: 100%; height: 100%; border: none; display: block; }

@media (max-width: 1100px) { .photo-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 768px) { .photo-grid, .video-grid { grid-template-columns: repeat(2, 1fr); } .page-title { font-size: 2rem; } }
@media (max-width: 576px) { .photo-grid { grid-template-columns: repeat(2, 1fr); gap: 8px; } .video-grid { grid-template-columns: 1fr; } }
</style>
