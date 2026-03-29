import axios from 'axios'

export const useApi = () => {
  const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL || 'http://localhost:3001/api',
    timeout: 10000,
  })

  api.interceptors.response.use(
    response => response,
    error => {
      console.error('API Error:', error)
      return Promise.reject(error)
    }
  )

  return { api }
}
