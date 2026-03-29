<script setup>
import { ref, onMounted, computed, onUnmounted } from 'vue'
import { useApi } from '../composables/useApi'
import Lightbox from '../components/Lightbox.vue'

const { get } = useApi()

const sliders = ref([])
const gratitudes = ref([])

const currentIndex = ref(0)
const sliderTransitionName = ref('slide-right') // для направления анимации

// Статический массив имён авторов (как было в PHP)
const authorNames = {
  '1.png': 'Елена Григорьева',
  '2.png': 'Мария Соколова',
  '3.png': 'Алексей Новиков',
  '4.png': 'Сергей Орлов',
  '5.png': 'Ольга Захарова',
  '6.png': 'Ирина Козлова',
  '7.png': 'Светлана Морозова',
  '8.png': 'Дмитрий Волков',
  '9.png': 'Анна Лебедева',
  '10.png': 'Павел Смирнов',
  '11.png': 'Кирилл Фёдоров',
  '12.png': 'Наталья Петрова',
  '13.png': 'Виктория Иванова',
  '14.png': 'Александр Попов',
  '15.png': 'Юлия Семёнова',
  '16.png': 'Михаил Кузнецов',
  '17.png': 'Татьяна Белова',
  '18.png': 'Анастасия Яковлева',
  '19.png': 'Роман Громов',
  '20.png': 'Екатерина Тихонова',
  '21.png': 'Вадим Никитин',
  '22.png': 'Алина Степанова',
  '23.png': 'Константин Разумов',
  '24.png': 'Людмила Сорокина',
  '25.png': 'Евгений Пономарёв'
}

// Загрузка данных
const fetchReviews = async () => {
  try {
    const response = await get('/reviews')
    const allReviews = response.data || []
    
    // Фильтруем и маппим данные
    sliders.value = allReviews
      .filter(r => r.type === 'slider' && r.is_active)
      .sort((a, b) => a.sort_order - b.sort_order || a.id - b.id)
      .map(r => ({
        ...r,
        author_name: authorNames[r.image] || 'Наш клиент',
        imageUrl: `/images/reviews/${r.image}`
      }))

    gratitudes.value = allReviews
      .filter(r => r.type === 'gratitude' && r.is_active)
      .sort((a, b) => a.sort_order - b.sort_order || a.id - b.id)
      .map(r => ({
        ...r,
        imageUrl: `/images/reviews/${r.image}`
      }))

    // Дефолтные данные, если БД пуста
    if (sliders.value.length === 0) {
      sliders.value = [
        { imageUrl: '/images/reviews/1.png', author_name: 'Елена Григорьева', review_text: 'Если вы еще не прыгали с парашютом, то многое потеряли. Это незабываемые впечатления, крутой подарок и красота нереальная! Прыгали с сыном в разные дни. Фото абсолютно разные! С нашими инструкторами бояться нечего!!! Очень внимательные и ответственные!' },
        { imageUrl: '/images/reviews/2.png', author_name: 'Мария Соколова', review_text: 'Даааа!!!! Я это сделала! Представь, летишь с парашютом и думаешь: а вдруг не раскроется? Страшно. Дышать трудно. Сердце между лопаток. А все равно восторг. Раскрылся — и снова счастье.' }
      ]
    }
    
    if (gratitudes.value.length === 0) {
      gratitudes.value = [
        { imageUrl: '/images/reviews/11.jpg', caption: 'Благодарность Владимирскому АСК ДОСААФ России за высокий уровень взаимодействия' },
        { imageUrl: '/images/reviews/22.jpg', caption: 'Благодарность за вклад в патриотическое воспитание молодежи' },
        { imageUrl: '/images/reviews/33.jpeg', caption: 'Благодарность за многолетнее сотрудничество' },
        { imageUrl: '/images/reviews/44.jpg', caption: 'Благодарность за проведение прыжков с инвалидами' }
      ]
    }

  } catch (err) {
    console.error('Ошибка загрузки отзывов:', err)
  }
}

onMounted(() => {
  fetchReviews()
  window.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleKeydown)
})

// Навигация слайдера
const nextReview = () => {
  if (sliders.value.length === 0) return
  sliderTransitionName.value = 'slide-left'
  currentIndex.value = (currentIndex.value + 1) % sliders.value.length
}

const prevReview = () => {
  if (sliders.value.length === 0) return
  sliderTransitionName.value = 'slide-right'
  currentIndex.value = (currentIndex.value - 1 + sliders.value.length) % sliders.value.length
}

const handleKeydown = (e) => {
  if (isLightboxOpen.value) return
  if (e.key === 'ArrowLeft') prevReview()
  if (e.key === 'ArrowRight') nextReview()
}

const currentReview = computed(() => sliders.value[currentIndex.value] || {})

// Логика лайтбокса
const isLightboxOpen = ref(false)
const lightboxImages = ref([])
const lightboxIndex = ref(0)
const lightboxCaption = ref('')

const openLightboxSingle = (imageUrl, caption = '') => {
  lightboxImages.value = [imageUrl]
  lightboxIndex.value = 0
  lightboxCaption.value = caption
  isLightboxOpen.value = true
}

const openLightboxGallery = (index) => {
  lightboxImages.value = gratitudes.value.map(g => g.imageUrl)
  lightboxIndex.value = index
  lightboxCaption.value = gratitudes.value[index]?.caption || ''
  isLightboxOpen.value = true
}

// Отслеживаем смену картинки в Лайтбоксе для обновления подписи
const handleLightboxUpdate = (newIndex) => {
  lightboxIndex.value = newIndex
  if (lightboxImages.value.length > 1) { // Если это галерея благодарностей
     lightboxCaption.value = gratitudes.value[newIndex]?.caption || ''
  }
}
</script>

<template>
  <main class="reviews-page">
    <h1 class="page-title">ОТЗЫВЫ НАШИХ КЛИЕНТОВ</h1>

    <!-- КАРТОЧКА ОТЗЫВА (СЛАЙДЕР) -->
    <div class="slider-container" v-if="sliders.value?.length !== 0">
      <transition :name="sliderTransitionName" mode="out-in">
        <div :key="currentIndex" class="review-card">
          <div class="review-photo-wrap" @click="openLightboxSingle(currentReview.imageUrl, currentReview.author_name)">
            <img :src="currentReview.imageUrl" :alt="currentReview.author_name" class="review-photo-img" @error="$event.target.src='/images/Лого2.png'">
          </div>
          <div class="review-body">
            <div class="review-author-name">{{ currentReview.author_name }}</div>
            <div class="review-quote">{{ currentReview.review_text }}</div>
          </div>
        </div>
      </transition>
    </div>

    <!-- НАВИГАЦИЯ -->
    <div class="slider-nav" v-if="sliders.value?.length !== 0">
      <button class="slider-btn" @click="prevReview" aria-label="Предыдущий отзыв">
        <i class="fas fa-chevron-left"></i>
      </button>
      <div class="slider-counter">{{ currentIndex + 1 }} / {{ sliders.length }}</div>
      <button class="slider-btn" @click="nextReview" aria-label="Следующий отзыв">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>

    <!-- БЛАГОДАРСТВЕННЫЕ ПИСЬМА -->
    <h2 class="section-subtitle">Благодарственные письма</h2>
    <div class="gratitude-grid">
      <div 
        v-for="(gratitude, index) in gratitudes" 
        :key="index"
        class="gratitude-item"
        @click="openLightboxGallery(index)"
      >
        <img :src="gratitude.imageUrl" :alt="'Благодарность ' + (index + 1)" class="gratitude-img" @error="$event.target.src='/images/Лого2.png'">
      </div>
    </div>
    
    <!-- Переиспользуемый Lightbox -->
    <Lightbox 
      :is-open="isLightboxOpen" 
      :images="lightboxImages"
      v-model:current-index="lightboxIndex"
      @update:currentIndex="handleLightboxUpdate"
      @close="isLightboxOpen = false"
    />
    
    <!-- Подпись поверх стандартного лайтбокса -->
    <div v-if="isLightboxOpen && lightboxCaption" class="lightbox-custom-caption">
      {{ lightboxCaption }}
    </div>

  </main>
</template>

<style scoped>
.reviews-page { max-width: 1100px; margin: 40px auto; padding: 0 30px; text-align: center; }

.page-title {
  font-size: 2.4rem;
  font-weight: 700;
  color: var(--primary-dark);
  margin-bottom: 50px;
  text-transform: uppercase;
  letter-spacing: 1px;
  position: relative;
  padding-bottom: 20px;
  text-shadow: none;
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
  border-radius: 2px;
}

.slider-container {
  position: relative;
  min-height: 280px; /* Чтобы не прыгал контент при анимации */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* === КАРТОЧКА ОТЗЫВА === */
.review-card {
  background: white;
  border-radius: 20px;
  box-shadow: 0 8px 40px rgba(33, 109, 189, 0.10);
  display: flex;
  align-items: center;
  gap: 50px;
  padding: 45px 55px;
  margin-bottom: 35px;
  text-align: left;
  position: relative;
  overflow: hidden;
  transition: box-shadow 0.3s;
  width: 100%;
}
.review-card:hover { box-shadow: 0 12px 50px rgba(33, 109, 189, 0.15); }

/* Жёлтая полоска слева */
.review-card::before {
  content: '';
  position: absolute;
  left: 0; top: 0; bottom: 0;
  width: 6px;
  background: var(--secondary);
}

/* Круглое фото */
.review-photo-wrap {
  flex-shrink: 0;
  width: 170px;
  height: 170px;
  border-radius: 50%;
  overflow: hidden;
  border: 5px solid var(--secondary);
  box-shadow: 0 6px 24px rgba(0,0,0,0.13);
  cursor: pointer;
  transition: transform 0.3s, box-shadow 0.3s;
}
.review-photo-wrap:hover { transform: scale(1.05); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
.review-photo-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* Тело отзыва */
.review-body { flex: 1; }
.review-author-name {
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--primary-dark);
  text-transform: uppercase;
  letter-spacing: 1.5px;
  margin-bottom: 18px;
  text-shadow: none;
}
.review-quote {
  font-size: 1.05rem;
  line-height: 1.85;
  color: #555;
  font-style: italic;
  position: relative;
  padding-left: 24px;
}
.review-quote::before {
  content: '\201C';
  font-size: 5rem;
  color: var(--primary);
  opacity: 0.12;
  position: absolute;
  left: -8px;
  top: -20px;
  font-family: Georgia, serif;
  line-height: 1;
}

/* === НАВИГАЦИЯ === */
.slider-nav {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 25px;
  margin-bottom: 70px;
}
.slider-btn {
  background: var(--primary);
  color: white;
  border: none;
  width: 54px;
  height: 54px;
  border-radius: 50%;
  font-size: 18px;
  cursor: pointer;
  transition: 0.3s;
  box-shadow: 0 4px 14px rgba(33, 109, 189, 0.25);
  display: flex;
  justify-content: center;
  align-items: center;
}
.slider-btn:hover { background: var(--secondary); color: var(--dark); transform: scale(1.1); }
.slider-counter {
  font-weight: 600;
  color: #888;
  font-size: 1.05rem;
  min-width: 90px;
  text-align: center;
}

/* === БЛАГОДАРСТВЕННЫЕ ПИСЬМА === */
.section-subtitle {
  font-size: 1.9rem;
  font-weight: 700;
  color: var(--primary);
  text-align: center;
  margin-bottom: 30px;
  position: relative;
  padding-bottom: 16px;
  text-shadow: none;
}
.section-subtitle::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 3px;
  background: var(--secondary);
  border-radius: 2px;
}

.gratitude-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 22px;
  margin-bottom: 50px;
}
.gratitude-item {
  background: white;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 5px 20px rgba(0,0,0,0.08);
  cursor: pointer;
  transition: transform 0.3s, box-shadow 0.3s;
}
.gratitude-item:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.15); }
.gratitude-img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  display: block;
}

.lightbox-custom-caption {
  position: fixed;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  color: white;
  font-size: 1.1rem;
  text-align: center;
  line-height: 1.6;
  padding: 10px 20px;
  background: rgba(0,0,0,0.6);
  border-radius: 8px;
  z-index: 3005;
  max-width: 800px;
  pointer-events: none;
}

/* === АНИМАЦИИ СЛАЙДЕРА === */
.slide-left-enter-active,
.slide-left-leave-active,
.slide-right-enter-active,
.slide-right-leave-active {
  transition: all 0.3s ease;
}

.slide-left-enter-from { opacity: 0; transform: translateX(80px); }
.slide-left-leave-to { opacity: 0; transform: translateX(-80px); }

.slide-right-enter-from { opacity: 0; transform: translateX(-80px); }
.slide-right-leave-to { opacity: 0; transform: translateX(80px); }

/* === АДАПТИВ === */
@media (max-width: 900px) {
  .review-card { flex-direction: column; text-align: center; padding: 30px 25px; gap: 25px; }
  .review-card::before { width: 100%; height: 5px; top: 0; left: 0; bottom: auto; }
  .review-quote { padding-left: 0; }
  .review-quote::before { display: none; }
  .review-photo-wrap { width: 130px; height: 130px; }
  .gratitude-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 500px) {
  .page-title { font-size: 1.8rem; }
  .gratitude-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
  .gratitude-img { height: 160px; }
  .slider-btn { width: 44px; height: 44px; font-size: 16px; }
}
</style>
