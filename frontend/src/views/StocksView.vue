<template>
  <main class="stocks-page">
    <h1 class="page-title">АКЦИИ</h1>
    <div class="stocks-container">
      <div v-if="loading" style="text-align:center;padding:40px">Загрузка...</div>
      <p v-else-if="stocks.length === 0" style="text-align:center;color:#888;padding:40px 0">Акции не найдены</p>
      <div v-for="s in stocks" :key="s.id" class="stock-card">
        <div v-if="s.tag || s.pub_date" class="stock-header">
          <div v-if="s.tag" class="stock-tag">{{ s.tag }}</div>
          <div v-if="s.pub_date" class="stock-date">{{ formatDate(s.pub_date) }}</div>
        </div>
        <div class="stock-content">
          <div v-if="s.price_label" class="stock-price">{{ s.price_label }}</div>
          <div v-if="s.detail_text" class="stock-details">
            <span class="stock-detail">{{ s.detail_text }}</span>
          </div>
          <h2 class="stock-title">{{ s.title }}</h2>
          <p v-if="s.description" class="stock-description">{{ s.description }}</p>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import api from '../api'

const stocks = ref<any[]>([])
const loading = ref(true)

function formatDate(dateStr: string) {
  return new Date(dateStr).toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', year: 'numeric' })
}

onMounted(async () => {
  try {
    const res = await api.get('/stocks')
    stocks.value = res.data.data
  } catch (e) {
    console.error(e)
  } finally {
    loading.value = false
  }
})
</script>
