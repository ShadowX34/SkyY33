<template>
  <AdminLayout>
    <div class="admin-header">
      <h1 class="admin-title">Акции</h1>
      <button class="btn-add" @click="openForm()"><i class="fas fa-plus"></i> Добавить акцию</button>
    </div>

    <div class="table-wrapper">
      <table class="admin-table">
        <thead>
          <tr><th>ID</th><th>Название</th><th>Тег</th><th>Дата</th><th>Активна</th><th>Действия</th></tr>
        </thead>
        <tbody>
          <tr v-for="s in stocks" :key="s.id">
            <td>{{ s.id }}</td>
            <td>{{ s.title }}</td>
            <td>{{ s.tag || '—' }}</td>
            <td>{{ s.pub_date ? formatDate(s.pub_date) : '—' }}</td>
            <td>{{ s.is_active ? '✅' : '❌' }}</td>
            <td>
              <button class="btn-edit" @click="openForm(s)"><i class="fas fa-edit"></i></button>
              <button class="btn-delete" @click="deleteItem(s.id)"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Модалка -->
    <div v-if="showModal" class="modal-overlay" @click.self="showModal=false">
      <div class="modal">
        <h2>{{ form.id ? 'Редактировать акцию' : 'Новая акция' }}</h2>
        <form @submit.prevent="saveItem">
          <label>Название *<input v-model="form.title" required></label>
          <label>Описание<textarea v-model="form.description"></textarea></label>
          <label>Тег<input v-model="form.tag"></label>
          <label>Цена<input v-model="form.price_label"></label>
          <label>Детали<input v-model="form.detail_text"></label>
          <label>Дата публикации<input v-model="form.pub_date" type="date"></label>
          <label class="checkbox-label"><input type="checkbox" v-model="form.is_active"> Активна</label>
          <label>Порядок сортировки<input v-model="form.sort_order" type="number"></label>
          <div class="modal-actions">
            <button type="submit" class="btn-save">Сохранить</button>
            <button type="button" class="btn-cancel" @click="showModal=false">Отмена</button>
          </div>
        </form>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { ref, onMounted, reactive } from 'vue'
import AdminLayout from '../../components/AdminLayout.vue'
import api from '../../api'

const stocks = ref<any[]>([])
const showModal = ref(false)
const form = reactive<any>({ id: null, title: '', description: '', tag: '', price_label: '', detail_text: '', pub_date: '', is_active: true, sort_order: 0 })

function formatDate(d: string) { return new Date(d).toLocaleDateString('ru-RU') }

function openForm(item?: any) {
  if (item) Object.assign(form, { ...item, pub_date: item.pub_date ? item.pub_date.slice(0,10) : '' })
  else Object.assign(form, { id: null, title: '', description: '', tag: '', price_label: '', detail_text: '', pub_date: '', is_active: true, sort_order: 0 })
  showModal.value = true
}

async function saveItem() {
  if (form.id) {
    await api.put(`/admin/stocks/${form.id}`, form)
  } else {
    await api.post('/admin/stocks', form)
  }
  showModal.value = false
  await load()
}

async function deleteItem(id: number) {
  if (!confirm('Удалить акцию?')) return
  await api.delete(`/admin/stocks/${id}`)
  await load()
}

async function load() {
  const res = await api.get('/admin/stocks')
  stocks.value = res.data.data
}

onMounted(load)
</script>

<style scoped>
.admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.admin-title { font-size: 2rem; color: #1a5a9e; }
.btn-add { background: #216DBD; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-size: 0.95rem; }
.table-wrapper { overflow-x: auto; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table th, .admin-table td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem; }
.admin-table th { background: #f8f9fa; font-weight: 600; }
.btn-edit { background: #e8f0fe; color: #216DBD; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; margin-right: 5px; }
.btn-delete { background: #fde8e8; color: #e53935; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; }
.modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 1000; }
.modal { background: white; border-radius: 15px; padding: 30px; width: 100%; max-width: 500px; max-height: 90vh; overflow-y: auto; }
.modal h2 { margin-bottom: 20px; color: #1a5a9e; }
.modal label { display: block; margin-bottom: 15px; font-weight: 600; font-size: 0.9rem; color: #444; }
.modal input, .modal textarea { display: block; width: 100%; margin-top: 5px; padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.95rem; }
.modal textarea { min-height: 80px; resize: vertical; }
.checkbox-label { display: flex; align-items: center; gap: 10px; font-weight: 600; }
.checkbox-label input { width: auto; display: inline; }
.modal-actions { display: flex; gap: 10px; margin-top: 20px; }
.btn-save { background: #216DBD; color: white; border: none; padding: 10px 24px; border-radius: 8px; cursor: pointer; font-size: 0.95rem; }
.btn-cancel { background: #f0f0f0; color: #555; border: none; padding: 10px 24px; border-radius: 8px; cursor: pointer; }
</style>
