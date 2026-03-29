import axios from 'axios'

export const useApi = () => {
  const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL || 'http://localhost:3000/api',
    timeout: 10000,
  })

  api.interceptors.response.use(
    response => response,
    error => {
      console.error('API Error:', error)
      return Promise.reject(error)
    }
  )

  return { 
    api, 
    get: api.get.bind(api), 
    post: api.post.bind(api), 
    put: api.put.bind(api), 
    del: api.delete.bind(api) 
  }
}
