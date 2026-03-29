import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import api from '../api'

export const useAuthStore = defineStore('auth', () => {
  const token = ref<string | null>(localStorage.getItem('admin_token'))

  const isLoggedIn = computed(() => !!token.value)

  async function login(username: string, password: string) {
    const res = await api.post('/admin/login', { username, password })
    token.value = res.data.token
    localStorage.setItem('admin_token', res.data.token)
    api.defaults.headers.common['Authorization'] = `Bearer ${res.data.token}`
  }

  function logout() {
    token.value = null
    localStorage.removeItem('admin_token')
    delete api.defaults.headers.common['Authorization']
  }

  // Восстановить токен при загрузке
  if (token.value) {
    api.defaults.headers.common['Authorization'] = `Bearer ${token.value}`
  }

  return { token, isLoggedIn, login, logout }
})
