<script setup>
import { ref, onMounted } from 'vue'
import { useApi } from '../composables/useApi'

const { get } = useApi()
const stocks = ref([])
const loading = ref(true)

const fetchStocks = async () => {
  try {
    const response = await get('/stocks')
    // Фильтруем активные и сортируем как в оригинале (sort_order ASC, id ASC)
    stocks.value = (response.data || [])
      .filter(s => s.is_active)
      .sort((a, b) => a.sort_order - b.sort_order || a.id - b.id)
  } catch (err) {
    console.error('Ошибка при загрузке акций:', err)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchStocks()
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
  <main class="stocks-page">
    <h1 class="page-title">АКЦИИ</h1>
    
    <div v-if="loading" class="loading-state">
      Загрузка акций...
    </div>

    <div v-else-if="stocks.length === 0" class="empty-state">
      Акции не найдены
    </div>

    <div v-else class="stocks-container">
      <div v-for="stock in stocks" :key="stock.id" class="stock-card">
        
        <div v-if="stock.tag || stock.pub_date" class="stock-header">
          <div v-if="stock.tag" class="stock-tag">{{ stock.tag }}</div>
          <div v-if="stock.pub_date" class="stock-date">{{ formatDate(stock.pub_date) }}</div>
        </div>
        
        <div class="stock-content">
          <div v-if="stock.price_label" class="stock-price">{{ stock.price_label }}</div>
          
          <div v-if="stock.detail_text" class="stock-details">
            <span class="stock-detail">{{ stock.detail_text }}</span>
          </div>
          
          <h2 class="stock-title">{{ stock.title }}</h2>
          <p v-if="stock.description" class="stock-description">{{ stock.description }}</p>
        </div>

      </div>
    </div>
  </main>
</template>

<style scoped>
.stocks-page {
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

.stocks-container {
  display: flex;
  flex-direction: column;
  gap: 30px;
  margin-bottom: 50px;
}

.stock-card {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  transition: var(--transition);
  border-left: 5px solid var(--secondary);
}

.stock-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.stock-header {
  background-color: var(--primary);
  color: white;
  padding: 15px 25px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.stock-tag {
  font-size: 1.2rem;
  font-weight: 700;
  text-transform: uppercase;
}

.stock-date {
  font-size: 0.9rem;
  opacity: 0.9;
}

.stock-content {
  padding: 25px;
}

.stock-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary-dark);
  margin-bottom: 15px;
  text-transform: uppercase;
}

.stock-description {
  font-size: 1rem;
  line-height: 1.7;
  margin-bottom: 20px;
  color: #555;
}

.stock-price {
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--primary);
  margin: 15px 0;
}

.stock-details {
  display: flex;
  gap: 20px;
  margin-bottom: 15px;
}

.stock-detail {
  background-color: #f0f7ff;
  padding: 8px 15px;
  border-radius: 30px;
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--primary-dark);
}
</style>
