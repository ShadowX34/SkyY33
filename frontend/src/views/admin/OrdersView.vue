<template>
  <AdminLayout>
    <h1 class="admin-title">Заказы сертификатов</h1>
    <div class="table-wrapper">
      <table class="admin-table">
        <thead>
          <tr><th>ID</th><th>Сертификат</th><th>Покупатель</th><th>Телефон</th><th>Email</th><th>Сумма</th><th>Комментарий</th><th>Статус</th><th>Дата</th></tr>
        </thead>
        <tbody>
          <tr v-for="o in orders" :key="o.id">
            <td>#{{ o.id }}</td>
            <td>{{ o.certificate_name }}</td>
            <td>{{ o.full_name }}</td>
            <td>{{ o.phone }}</td>
            <td>{{ o.email }}</td>
            <td>{{ o.certificate_price }} ₽</td>
            <td>{{ o.comment || '—' }}</td>
            <td>
              <select :value="o.status" @change="changeStatus(o.id, ($event.target as HTMLSelectElement).value)" class="status-select">
                <option value="pending">Новый</option>
                <option value="processed">Обработан</option>
                <option value="completed">Выполнен</option>
                <option value="cancelled">Отменён</option>
              </select>
            </td>
            <td>{{ formatDate(o.order_date) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AdminLayout from '../../components/AdminLayout.vue'
import api from '../../api'

const orders = ref<any[]>([])

function formatDate(d: string) { return new Date(d).toLocaleDateString('ru-RU') }

async function changeStatus(id: number, status: string) {
  await api.patch(`/admin/orders/${id}`, { status })
  const o = orders.value.find(x => x.id === id)
  if (o) o.status = status
}

onMounted(async () => {
  const res = await api.get('/admin/orders')
  orders.value = res.data.data
})
</script>

<style scoped>
.admin-title { font-size: 2rem; color: #1a5a9e; margin-bottom: 30px; }
.table-wrapper { overflow-x: auto; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table th, .admin-table td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem; }
.admin-table th { background: #f8f9fa; font-weight: 600; color: #555; }
.status-select { padding: 6px 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.85rem; cursor: pointer; }
</style>
