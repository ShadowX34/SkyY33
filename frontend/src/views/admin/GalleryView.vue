<template>
  <AdminLayout>
    <div class="admin-header">
      <h1 class="admin-title">Галерея</h1>
      <label class="btn-add">
        <i class="fas fa-upload"></i> Загрузить фото
        <input type="file" accept="image/*" multiple @change="upload" style="display:none">
      </label>
    </div>
    <div class="gallery-grid">
      <div v-for="p in photos" :key="p.id" class="gallery-item">
        <img :src="`/uploads/gallery/${p.filename}`" :alt="p.filename">
        <button class="delete-btn" @click="deletePhoto(p.id)"><i class="fas fa-trash"></i></button>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AdminLayout from '../../components/AdminLayout.vue'
import api from '../../api'

const photos = ref<any[]>([])

async function upload(e: Event) {
  const files = (e.target as HTMLInputElement).files
  if (!files) return
  const fd = new FormData()
  for (const f of Array.from(files)) fd.append('file', f)
  await api.post('/admin/gallery', fd)
  await load()
}

async function deletePhoto(id: number) {
  if (!confirm('Удалить фото?')) return
  await api.delete(`/admin/gallery/${id}`)
  await load()
}

async function load() {
  const res = await api.get('/admin/gallery')
  photos.value = res.data.data
}
onMounted(load)
</script>

<style scoped>
.admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
.admin-title { font-size: 2rem; color: #1a5a9e; }
.btn-add { background: #216DBD; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; gap: 8px; }
.gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 15px; }
.gallery-item { position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 1; background: #eee; }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; }
.delete-btn { position: absolute; top: 8px; right: 8px; background: rgba(229,57,53,0.9); color: white; border: none; width: 32px; height: 32px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; }
</style>
