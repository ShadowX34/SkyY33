<template>
  <main class="gallery-page" style="padding-top:90px;">
    <h1 class="page-title">ГАЛЕРЕЯ</h1>
    <div class="gallery-grid">
      <!-- Статичные фото (1-328) -->
      <div
        v-for="n in staticCount"
        :key="`s_${n}`"
        class="gallery-item"
        @click="openLightbox(`/images/gallery/${n}.jpg`)"
      >
        <img :src="`/images/gallery/${n}.jpg`" :alt="`Фото ${n}`" loading="lazy">
      </div>
      <!-- Загруженные из БД -->
      <div
        v-for="photo in dbPhotos"
        :key="`db_${photo.id}`"
        class="gallery-item"
        @click="openLightbox(`/uploads/gallery/${photo.filename}`)"
      >
        <img :src="`/uploads/gallery/${photo.filename}`" :alt="photo.filename" loading="lazy">
      </div>
    </div>

    <!-- Лайтбокс -->
    <div v-if="lightboxSrc" class="lightbox" @click.self="closeLightbox">
      <button class="lightbox-close" @click="closeLightbox"><i class="fas fa-times"></i></button>
      <img :src="lightboxSrc" class="lightbox-img" alt="Фото">
    </div>
  </main>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import api from '../api'

const staticCount = 328
const dbPhotos = ref<any[]>([])
const lightboxSrc = ref<string | null>(null)

function openLightbox(src: string) { lightboxSrc.value = src }
function closeLightbox() { lightboxSrc.value = null }

onMounted(async () => {
  try {
    const res = await api.get('/gallery')
    dbPhotos.value = res.data.data
  } catch (e) {
    console.error(e)
  }
})
</script>

<style scoped>
.gallery-page { max-width: 1400px; margin: 40px auto; padding: 0 20px; }
.page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 40px; text-align: center; }
.gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; }
.gallery-item { overflow: hidden; border-radius: 8px; cursor: pointer; aspect-ratio: 1; }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; }
.gallery-item:hover img { transform: scale(1.05); }
.lightbox { position: fixed; inset: 0; background: rgba(0,0,0,0.9); display: flex; align-items: center; justify-content: center; z-index: 9999; }
.lightbox-img { max-width: 90vw; max-height: 90vh; border-radius: 8px; }
.lightbox-close { position: absolute; top: 20px; right: 20px; background: none; border: none; color: white; font-size: 2rem; cursor: pointer; }
</style>
