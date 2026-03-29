<template>
  <main class="news-page">
    <h1 class="page-title">НОВОСТИ</h1>
    <div class="news-grid">
      <div v-if="loading" style="text-align:center;padding:40px;grid-column:1/-1">Загрузка...</div>
      <p v-else-if="news.length === 0" style="text-align:center;color:#888;padding:40px 0;grid-column:1/-1">Новости не найдены</p>
      <div v-for="n in news" :key="n.id" class="news-card">
        <div class="news-image" :style="`background-image: url('/uploads/news/${n.image}');`">
          <span v-if="n.tag" class="news-tag">{{ n.tag }}</span>
        </div>
        <div class="news-content">
          <span class="news-date">{{ n.pub_date ? formatDate(n.pub_date) : '' }}</span>
          <h2 class="news-title">{{ n.title }}</h2>
          <p class="news-excerpt">{{ n.excerpt }}</p>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import api from '../api'

const news = ref<any[]>([])
const loading = ref(true)

function formatDate(dateStr: string) {
  return new Date(dateStr).toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', year: 'numeric' })
}

onMounted(async () => {
  try {
    const res = await api.get('/news')
    news.value = res.data.data
  } catch (e) {
    console.error(e)
  } finally {
    loading.value = false
  }
})
</script>
