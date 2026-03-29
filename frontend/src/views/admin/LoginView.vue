<template>
  <div class="admin-login-page">
    <div class="login-card">
      <img src="/images/Лого2.png" alt="Логотип" class="login-logo">
      <h1>Администратор</h1>
      <p class="login-subtitle">Владимирский АСК ДОСААФ</p>

      <form @submit.prevent="handleLogin">
        <div class="form-group">
          <label for="username">Логин</label>
          <input id="username" v-model="username" type="text" placeholder="admin" required>
        </div>
        <div class="form-group">
          <label for="password">Пароль</label>
          <input id="password" v-model="password" type="password" placeholder="••••••••" required>
        </div>
        <p v-if="error" class="login-error">{{ error }}</p>
        <button type="submit" class="login-btn" :disabled="loading">
          {{ loading ? 'Вход...' : 'Войти' }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth'

const router = useRouter()
const auth = useAuthStore()

const username = ref('')
const password = ref('')
const error = ref('')
const loading = ref(false)

async function handleLogin() {
  error.value = ''
  loading.value = true
  try {
    await auth.login(username.value, password.value)
    router.push('/admin')
  } catch (e: any) {
    error.value = e.response?.data?.message || 'Ошибка входа'
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.admin-login-page {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #1a5a9e 0%, #216DBD 100%);
}
.login-card {
  background: white;
  border-radius: 20px;
  padding: 50px 40px;
  width: 100%;
  max-width: 420px;
  text-align: center;
  box-shadow: 0 20px 60px rgba(0,0,0,0.2);
}
.login-logo { width: 80px; height: 80px; border-radius: 50%; margin-bottom: 20px; }
h1 { font-size: 1.8rem; color: #1a5a9e; margin-bottom: 5px; }
.login-subtitle { color: #888; margin-bottom: 30px; font-size: 0.95rem; }
.form-group { text-align: left; margin-bottom: 20px; }
label { display: block; margin-bottom: 6px; font-weight: 600; color: #444; font-size: 0.9rem; }
input { width: 100%; padding: 12px 16px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1rem; transition: border-color 0.2s; }
input:focus { outline: none; border-color: #216DBD; }
.login-error { color: #e53935; font-size: 0.9rem; margin-bottom: 15px; }
.login-btn {
  width: 100%; padding: 14px; background: linear-gradient(135deg, #216DBD, #1a5a9e);
  color: white; border: none; border-radius: 10px; font-size: 1.1rem; font-weight: 700;
  cursor: pointer; transition: opacity 0.2s;
}
.login-btn:disabled { opacity: 0.7; cursor: not-allowed; }
</style>
