<template>
  <a href="https://wa.me/79190234000" class="whatsapp-btn" target="_blank" title="Написать в WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</template>

<script setup lang="ts">
</script>

<style scoped>
.whatsapp-btn {
  position: fixed;
  bottom: 30px;
  left: 30px;
  width: 60px;
  height: 60px;
  background: #25D366;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: white;
  text-decoration: none;
  box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
  z-index: 999;
  transition: all 0.3s ease;
}
.whatsapp-btn:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
}
</style>
