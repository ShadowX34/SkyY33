<script setup>
import { ref, onMounted } from 'vue'
import { useApi } from '../composables/useApi'

const { get } = useApi()
const newsItems = ref([])
const loading = ref(true)

const fetchNews = async () => {
  try {
    const response = await get('/news')
    // Фильтруем (только активные) и сортируем как в оригинале (sort_order ASC, id DESC)
    newsItems.value = (response.data || [])
      .filter(n => n.is_active)
      .sort((a, b) => a.sort_order - b.sort_order || b.id - a.id)
  } catch (err) {
    console.error('Ошибка при загрузке новостей:', err)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchNews()
})

const formatDate = (dateString) => {
  if (!dateString) return ''
  const date = new Date(dateString)
  return new Intl.DateTimeFormat('ru-RU', { 
    day: 'numeric', 
    month: 'long', 
    year: 'numeric' 
  }).format(date)
}
</script>

<template>
  <main class="news-page">
    <h1 class="page-title">НОВОСТИ</h1>
    
    <div v-if="loading" class="loading-state">
      Загрузка новостей...
    </div>

    <div v-else-if="newsItems.length === 0" class="empty-state">
      Новости не найдены
    </div>

    <div v-else class="news-grid">
      <div v-for="item in newsItems" :key="item.id" class="news-card">
        <div class="news-image" :style="{ backgroundImage: `url(/images/${item.image})` }">
          <span v-if="item.tag" class="news-tag">{{ item.tag }}</span>
        </div>
        <div class="news-content">
          <span class="news-date">{{ formatDate(item.pub_date) }}</span>
          <h2 class="news-title">{{ item.title }}</h2>
          <p class="news-excerpt">{{ item.excerpt }}</p>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>
.news-page {
  max-width: 1200px;
  margin: 40px auto;
  padding: 0 20px;
}

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

.loading-state, .empty-state {
  text-align: center;
  color: #888;
  padding: 40px 0;
  font-size: 1.1rem;
}

.news-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

.news-card {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  transition: var(--transition);
}

.news-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.news-image {
  height: 200px;
  width: 100%;
  background-size: cover;
  background-position: center;
  position: relative;
}

.news-tag {
  position: absolute;
  top: 15px;
  left: 15px;
  background: var(--secondary);
  color: var(--dark);
  font-weight: 700;
  padding: 5px 15px;
  border-radius: 30px;
  font-size: 0.9rem;
  z-index: 2;
}

.news-content {
  padding: 25px;
}

.news-date {
  color: #888;
  font-size: 0.9rem;
  margin-bottom: 10px;
  display: block;
}

.news-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary-dark);
  margin-bottom: 15px;
  line-height: 1.3;
}

.news-excerpt {
  font-size: 1rem;
  line-height: 1.7;
  color: #555;
}

@media (max-width: 768px) {
  .news-grid {
    grid-template-columns: 1fr;
  }
}
</style>
