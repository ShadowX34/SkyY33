<template>
  <main class="reviews-page" style="padding-top:90px;">
    <h1 class="page-title">ОТЗЫВЫ</h1>

    <!-- Слайдер отзывов -->
    <section class="reviews-slider-section" v-if="sliderReviews.length">
      <div class="reviews-slider">
        <div class="slider-track" :style="`transform: translateX(-${current * 100}%)`">
          <div v-for="r in sliderReviews" :key="r.id" class="slide">
            <div class="review-card">
              <div class="review-img" :style="`background-image: url('/uploads/reviews/${r.image}');`"></div>
              <p class="review-text">{{ r.review_text }}</p>
            </div>
          </div>
        </div>
        <button class="slider-btn prev" @click="prev"><i class="fas fa-chevron-left"></i></button>
        <button class="slider-btn next" @click="next"><i class="fas fa-chevron-right"></i></button>
      </div>
    </section>

    <!-- Благодарности -->
    <section class="gratitude-section" v-if="gratitudeReviews.length">
      <h2 class="section-subtitle">БЛАГОДАРНОСТИ</h2>
      <div class="gratitude-grid">
        <div v-for="r in gratitudeReviews" :key="r.id" class="gratitude-card">
          <img :src="`/uploads/reviews/${r.image}`" :alt="r.caption || ''" class="gratitude-img">
          <p class="gratitude-caption">{{ r.caption }}</p>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import api from '../api'

const reviews = ref<any[]>([])
const current = ref(0)

const sliderReviews = computed(() => reviews.value.filter(r => r.type === 'slider'))
const gratitudeReviews = computed(() => reviews.value.filter(r => r.type === 'gratitude'))

function prev() { current.value = (current.value - 1 + sliderReviews.value.length) % sliderReviews.value.length }
function next() { current.value = (current.value + 1) % sliderReviews.value.length }

onMounted(async () => {
  const res = await api.get('/reviews')
  reviews.value = res.data.data
})
</script>

<style scoped>
.reviews-page { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
.page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 40px; text-align: center; }
.reviews-slider { position: relative; overflow: hidden; border-radius: 15px; }
.slider-track { display: flex; transition: transform 0.5s ease; }
.slide { min-width: 100%; }
.review-card { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,.1); display: flex; gap: 20px; align-items: center; }
.review-img { width: 100px; height: 100px; border-radius: 50%; background-size: cover; background-position: center; flex-shrink: 0; }
.review-text { font-size: 1rem; line-height: 1.7; color: #555; }
.slider-btn { position: absolute; top: 50%; transform: translateY(-50%); background: var(--primary); color: white; border: none; width: 44px; height: 44px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; }
.prev { left: 10px; }
.next { right: 10px; }
.section-subtitle { font-size: 2rem; color: var(--primary-dark); text-align: center; margin: 50px 0 30px; }
.gratitude-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; }
.gratitude-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,.1); padding: 20px; text-align: center; }
.gratitude-img { max-width: 100%; border-radius: 10px; margin-bottom: 15px; }
.gratitude-caption { font-size: 0.95rem; color: #555; line-height: 1.6; }
</style>
