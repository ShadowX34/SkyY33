import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'

// Global CSS (перенесены из PHP проекта)
import './assets/css/style.css'
import './assets/css/transitions.css'

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.mount('#app')
