<script setup>
import { RouterView } from 'vue-router'
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'
import WhatsAppButton from './components/WhatsAppButton.vue'
</script>

<template>
  <AppHeader />
  
  <main>
    <RouterView />
  </main>
  
  <AppFooter />
  <WhatsAppButton />
</template>

<style>
/* Базовые стили из старого проекта */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', 'Arial', sans-serif;
}

:root {
  --primary: #216DBD;
  --primary-dark: #1a5a9e;
  --secondary: #ffc107;
  --light: #f8f9fa;
  --dark: #212529;
  --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

body {
  padding-top: 90px;
  background-color: #f8f9fa;
  color: #333;
  line-height: 1.6;
}

/* Настраиваем скрытие скролла при открытом меню, этот класс будем вешать скриптом */
.no-scroll {
  overflow: hidden;
}
</style>
