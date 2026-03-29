<template>
  <AdminLayout>
    <div class="admin-header">
      <h1 class="admin-title">Отзывы</h1>
      <button class="btn-add" @click="openForm()"><i class="fas fa-plus"></i> Добавить</button>
    </div>
    <div class="table-wrapper">
      <table class="admin-table">
        <thead><tr><th>ID</th><th>Тип</th><th>Фото</th><th>Текст/Подпись</th><th>Активен</th><th></th></tr></thead>
        <tbody>
          <tr v-for="r in reviews" :key="r.id">
            <td>{{ r.id }}</td>
            <td><span :class="`type-badge type-${r.type}`">{{ r.type }}</span></td>
            <td><img v-if="r.image" :src="`/uploads/reviews/${r.image}`" style="height:50px;border-radius:6px;"></td>
            <td style="max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ r.review_text || r.caption || '—' }}</td>
            <td>{{ r.is_active ? '✅' : '❌' }}</td>
            <td>
              <button class="btn-edit" @click="openForm(r)"><i class="fas fa-edit"></i></button>
              <button class="btn-delete" @click="deleteItem(r.id)"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-if="showModal" class="modal-overlay" @click.self="showModal=false">
      <div class="modal">
        <h2>{{ editId ? 'Редактировать' : 'Новый отзыв' }}</h2>
        <form @submit.prevent="saveItem">
          <label>Тип
            <select v-model="form.type">
              <option value="slider">Слайдер</option>
              <option value="gratitude">Благодарность</option>
            </select>
          </label>
          <label>Фото<input type="file" @change="onFile" accept="image/*"></label>
          <label v-if="form.type==='slider'">Текст отзыва<textarea v-model="form.review_text"></textarea></label>
          <label v-if="form.type==='gratitude'">Подпись<textarea v-model="form.caption"></textarea></label>
          <label>Порядок<input v-model="form.sort_order" type="number"></label>
          <label class="checkbox-label"><input type="checkbox" v-model="form.is_active"> Активен</label>
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

const reviews = ref<any[]>([])
const showModal = ref(false)
const editId = ref<number | null>(null)
const form = reactive<any>({ type: 'slider', review_text: '', caption: '', sort_order: 0, is_active: true })
let fileObj: File | null = null

function onFile(e: Event) { fileObj = (e.target as HTMLInputElement).files?.[0] || null }

function openForm(item?: any) {
  editId.value = item?.id || null
  fileObj = null
  if (item) Object.assign(form, item)
  else Object.assign(form, { type: 'slider', review_text: '', caption: '', sort_order: 0, is_active: true })
  showModal.value = true
}

async function saveItem() {
  const fd = new FormData()
  Object.keys(form).forEach(k => fd.append(k, form[k]))
  fd.set('is_active', form.is_active ? '1' : '0')
  if (fileObj) fd.append('image', fileObj)
  if (editId.value) await api.put(`/admin/reviews/${editId.value}`, fd)
  else await api.post('/admin/reviews', fd)
  showModal.value = false
  await load()
}

async function deleteItem(id: number) {
  if (!confirm('Удалить отзыв?')) return
  await api.delete(`/admin/reviews/${id}`)
  await load()
}

async function load() {
  const res = await api.get('/admin/reviews')
  reviews.value = res.data.data
}
onMounted(load)
</script>

<style scoped>
.admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.admin-title { font-size: 2rem; color: #1a5a9e; }
.btn-add { background: #216DBD; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; }
.table-wrapper { overflow-x: auto; background: white; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table th, .admin-table td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #f0f0f0; font-size: 0.9rem; }
.admin-table th { background: #f8f9fa; font-weight: 600; }
.type-badge { padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
.type-slider { background: #e8f0fe; color: #216DBD; }
.type-gratitude { background: #fff3cd; color: #856404; }
.btn-edit { background: #e8f0fe; color: #216DBD; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; margin-right: 5px; }
.btn-delete { background: #fde8e8; color: #e53935; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; }
.modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 1000; }
.modal { background: white; border-radius: 15px; padding: 30px; width: 100%; max-width: 500px; max-height: 90vh; overflow-y: auto; }
.modal h2 { margin-bottom: 20px; color: #1a5a9e; }
.modal label { display: block; margin-bottom: 15px; font-weight: 600; font-size: 0.9rem; color: #444; }
.modal input, .modal textarea, .modal select { display: block; width: 100%; margin-top: 5px; padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.95rem; }
.modal textarea { min-height: 80px; resize: vertical; }
.checkbox-label { display: flex; align-items: center; gap: 10px; }
.checkbox-label input { width: auto; }
.modal-actions { display: flex; gap: 10px; margin-top: 20px; }
.btn-save { background: #216DBD; color: white; border: none; padding: 10px 24px; border-radius: 8px; cursor: pointer; }
.btn-cancel { background: #f0f0f0; color: #555; border: none; padding: 10px 24px; border-radius: 8px; cursor: pointer; }
</style>
