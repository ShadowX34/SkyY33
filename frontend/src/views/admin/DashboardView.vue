<template>
  <AdminLayout>
    <h1 class="admin-title">Дашборд</h1>
    <div v-if="loading" class="loading">Загрузка...</div>
    <template v-else>
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
          <div class="stat-info">
            <div class="stat-number">{{ stats.ordersTotal }}</div>
            <div class="stat-label">Всего заказов</div>
          </div>
        </div>
        <div class="stat-card warning">
          <div class="stat-icon"><i class="fas fa-clock"></i></div>
          <div class="stat-info">
            <div class="stat-number">{{ stats.ordersNew }}</div>
            <div class="stat-label">Новых заказов</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon"><i class="fas fa-tags"></i></div>
          <div class="stat-info">
            <div class="stat-number">{{ stats.stocksCount }}</div>
            <div class="stat-label">Акций</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
          <div class="stat-info">
            <div class="stat-number">{{ stats.newsCount }}</div>
            <div class="stat-label">Новостей</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon"><i class="fas fa-images"></i></div>
          <div class="stat-info">
            <div class="stat-number">{{ stats.photosCount }}</div>
            <div class="stat-label">Фото в галерее</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon"><i class="fas fa-star"></i></div>
          <div class="stat-info">
            <div class="stat-number">{{ stats.reviewsCount }}</div>
            <div class="stat-label">Отзывов</div>
          </div>
        </div>
      </div>

      <h2 class="section-title">Последние заказы</h2>
      <div class="table-wrapper">
        <table class="admin-table">
          <thead>
            <tr><th>ID</th><th>Сертификат</th><th>Покупатель</th><th>Телефон</th><th>Сумма</th><th>Статус</th><th>Дата</th></tr>
          </thead>
          <tbody>
            <tr v-for="o in latestOrders" :key="o.id">
              <td>#{{ o.id }}</td>
              <td>{{ o.certificate_name }}</td>
              <td>{{ o.full_name }}</td>
              <td>{{ o.phone }}</td>
              <td>{{ o.certificate_price }} ₽</td>
              <td><span :class="`status-badge status-${o.status}`">{{ statusLabel(o.status) }}</span></td>
              <td>{{ formatDate(o.order_date) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
  </AdminLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AdminLayout from '../../components/AdminLayout.vue'
import api from '../../api'

const loading = ref(true)
const stats = ref<any>({})
const latestOrders = ref<any[]>([])

const statusLabels: Record<string, string> = {
  pending: 'Новый', processed: 'Обработан', completed: 'Выполнен', cancelled: 'Отменён'
}
function statusLabel(s: string) { return statusLabels[s] || s }
function formatDate(d: string) { return new Date(d).toLocaleDateString('ru-RU') }

onMounted(async () => {
  try {
    const res = await api.get('/admin/dashboard')
    stats.value = res.data.data.stats
    latestOrders.value = res.data.data.latestOrders
  } finally {
    loading.value = false
  }
})
</script>

<style scoped>
.admin-title { font-size: 2rem; color: #1a5a9e; margin-bottom: 30px; }
.loading { padding: 40px; text-align: center; color: #888; }
.stats-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px; }
.stat-card { background: white; border-radius: 15px; padding: 25px; display: flex; align-items: center; gap: 20px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
.stat-card.warning .stat-icon { background: #fff3cd; color: #f59e0b; }
.stat-icon { width: 60px; height: 60px; background: #e8f0fe; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #216DBD; }
.stat-number { font-size: 2rem; font-weight: 700; color: #1a5a9e; }
.stat-label { color: #888; font-size: 0.9rem; }
.section-title { font-size: 1.4rem; color: #1a5a9e; margin-bottom: 20px; }
.table-wrapper { overflow-x: auto; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table th, .admin-table td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #f0f0f0; font-size: 0.95rem; }
.admin-table th { background: #f8f9fa; font-weight: 600; color: #555; }
.status-badge { padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; }
.status-pending { background: #fff3cd; color: #f59e0b; }
.status-processed { background: #d1ecf1; color: #0c5460; }
.status-completed { background: #d4edda; color: #155724; }
.status-cancelled { background: #f8d7da; color: #721c24; }
</style>
