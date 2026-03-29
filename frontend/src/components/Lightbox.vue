<script setup>
import { onMounted, onUnmounted, watch } from 'vue'

const props = defineProps({
  isOpen: Boolean,
  images: Array,
  currentIndex: Number
})

const emit = defineEmits(['close', 'update:currentIndex'])

const close = () => {
  emit('close')
}

const prev = () => {
  if (props.images.length === 0) return
  const newIndex = (props.currentIndex - 1 + props.images.length) % props.images.length
  emit('update:currentIndex', newIndex)
}

const next = () => {
  if (props.images.length === 0) return
  const newIndex = (props.currentIndex + 1) % props.images.length
  emit('update:currentIndex', newIndex)
}

// Управление с клавиатуры
const handleKeydown = (e) => {
  if (!props.isOpen) return
  if (e.key === 'Escape') close()
  if (e.key === 'ArrowLeft') prev()
  if (e.key === 'ArrowRight') next()
}

// Блокировка скролла
watch(() => props.isOpen, (newVal) => {
  if (newVal) {
    document.body.style.overflow = 'hidden'
  } else {
    document.body.style.overflow = ''
  }
})

onMounted(() => {
  window.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
  window.removeEventListener('keydown', handleKeydown)
  document.body.style.overflow = ''
})
</script>

<template>
  <div v-if="isOpen" class="lightbox" @click="close">
    <div class="lightbox-inner" @click.stop>
      <button class="lightbox-close" @click="close"><i class="fas fa-times"></i></button>
      <button class="lightbox-nav lightbox-prev" @click="prev"><i class="fas fa-chevron-left"></i></button>
      
      <img v-if="images[currentIndex]" :src="images[currentIndex]" alt="Фото" class="lightbox-img">
      
      <button class="lightbox-nav lightbox-next" @click="next"><i class="fas fa-chevron-right"></i></button>
    </div>
  </div>
</template>

<style scoped>
.lightbox {
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.9);
  display: flex;
  justify-content: center;
  align-items: center;
}

.lightbox-inner {
  position: relative;
  width: 90%;
  max-width: 1000px;
  max-height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.lightbox-img {
  width: 100%;
  height: 100%;
  max-width: 1000px;
  max-height: 90vh;
  border-radius: 5px;
  box-shadow: 0 0 30px rgba(0,0,0,0.5);
  object-fit: contain;
}

.lightbox-close {
  position: absolute;
  top: -40px;
  right: 0;
  color: white;
  font-size: 30px;
  background: none;
  border: none;
  cursor: pointer;
  transition: 0.3s;
}

.lightbox-close:hover {
  color: var(--secondary);
  transform: scale(1.1);
}

.lightbox-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255,255,255,0.2);
  color: white;
  border: none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  font-size: 20px;
  cursor: pointer;
  transition: 0.3s;
  display: flex;
  justify-content: center;
  align-items: center;
}

.lightbox-nav:hover {
  background: var(--secondary);
  color: var(--dark);
}

.lightbox-prev {
  left: -60px;
}

.lightbox-next {
  right: -60px;
}

@media (max-width: 768px) {
  .lightbox-prev { left: 10px; }
  .lightbox-next { right: 10px; }
  .lightbox-close { top: 10px; right: 10px; }
}
</style>
