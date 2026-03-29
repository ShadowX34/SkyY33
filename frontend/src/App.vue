<template>
  <div id="app-wrapper">
    <NavBar />
    <RouterView />
    <AppFooter />
    <WhatsAppBtn />
  </div>
</template>

<script setup lang="ts">
import NavBar from './components/NavBar.vue'
import AppFooter from './components/AppFooter.vue'
import WhatsAppBtn from './components/WhatsAppBtn.vue'
</script>

<style>
#app-wrapper {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
</style>
