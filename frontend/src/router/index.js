import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '../views/HomeView.vue'

// Импортируем созданные компоненты
import FaqView from '../views/FaqView.vue'
import PricesView from '../views/PricesView.vue'
import ContactsView from '../views/ContactsView.vue'
import AboutView from '../views/AboutView.vue'
import TeamView from '../views/TeamView.vue'
import ReviewsView from '../views/ReviewsView.vue'
import GalleryView from '../views/GalleryView.vue'
import NewsView from '../views/NewsView.vue'
import StocksView from '../views/StocksView.vue'
import CertificatesView from '../views/CertificatesView.vue'


const routes = [
  { path: '/', name: 'home', component: HomeView, meta: { title: 'Владимирский АСК ДОСААФ России - Прыжки с парашютом' } },
  { path: '/about', name: 'about', component: AboutView, meta: { title: 'О клубе - Владимирский АСК ДОСААФ России' } },
  { path: '/team', name: 'team', component: TeamView, meta: { title: 'Наша команда - Владимирский АСК ДОСААФ России' } },
  { path: '/reviews', name: 'reviews', component: ReviewsView, meta: { title: 'Отзывы - Владимирский АСК ДОСААФ России' } },
  { path: '/faq', name: 'faq', component: FaqView, meta: { title: 'Вопрос-ответ - Владимирский АСК ДОСААФ России' } },
  { path: '/prices', name: 'prices', component: PricesView, meta: { title: 'Цены на услуги - Владимирский АСК ДОСААФ России' } },
  { path: '/gallery', name: 'gallery', component: GalleryView, meta: { title: 'Галерея - Владимирский АСК ДОСААФ России' } },
  { path: '/news', name: 'news', component: NewsView, meta: { title: 'Новости - Владимирский АСК ДОСААФ России' } },
  { path: '/stocks', name: 'stocks', component: StocksView, meta: { title: 'Акции - Владимирский АСК ДОСААФ России' } },
  { path: '/certificates', name: 'certificates', component: CertificatesView, meta: { title: 'Подарочные сертификаты - Владимирский АСК ДОСААФ России' } },
  { path: '/contacts', name: 'contacts', component: ContactsView, meta: { title: 'Контакты - Владимирский АСК ДОСААФ России' } },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) { return savedPosition } else { return { top: 0 } }
  }
})

router.afterEach((to) => {
  if (to.meta.title) { document.title = to.meta.title }
})

export default router
