import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/auth'

// Public views
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import TeamView from '../views/TeamView.vue'
import ReviewsView from '../views/ReviewsView.vue'
import FaqView from '../views/FaqView.vue'
import GalleryView from '../views/GalleryView.vue'
import CertificatesView from '../views/CertificatesView.vue'
import PricesView from '../views/PricesView.vue'
import NewsView from '../views/NewsView.vue'
import StocksView from '../views/StocksView.vue'
import ContactsView from '../views/ContactsView.vue'

// Admin views
import AdminLoginView from '../views/admin/LoginView.vue'
import AdminDashboardView from '../views/admin/DashboardView.vue'
import AdminOrdersView from '../views/admin/OrdersView.vue'
import AdminStocksView from '../views/admin/StocksView.vue'
import AdminNewsView from '../views/admin/NewsView.vue'
import AdminGalleryView from '../views/admin/GalleryView.vue'
import AdminReviewsView from '../views/admin/ReviewsView.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    // Public
    { path: '/', name: 'home', component: HomeView },
    { path: '/about', name: 'about', component: AboutView },
    { path: '/team', name: 'team', component: TeamView },
    { path: '/reviews', name: 'reviews', component: ReviewsView },
    { path: '/faq', name: 'faq', component: FaqView },
    { path: '/gallery', name: 'gallery', component: GalleryView },
    { path: '/certificates', name: 'certificates', component: CertificatesView },
    { path: '/prices', name: 'prices', component: PricesView },
    { path: '/news', name: 'news', component: NewsView },
    { path: '/stocks', name: 'stocks', component: StocksView },
    { path: '/contacts', name: 'contacts', component: ContactsView },

    // Admin
    { path: '/admin/login', name: 'admin-login', component: AdminLoginView },
    {
      path: '/admin',
      name: 'admin-dashboard',
      component: AdminDashboardView,
      meta: { requiresAuth: true },
    },
    {
      path: '/admin/orders',
      name: 'admin-orders',
      component: AdminOrdersView,
      meta: { requiresAuth: true },
    },
    {
      path: '/admin/stocks',
      name: 'admin-stocks',
      component: AdminStocksView,
      meta: { requiresAuth: true },
    },
    {
      path: '/admin/news',
      name: 'admin-news',
      component: AdminNewsView,
      meta: { requiresAuth: true },
    },
    {
      path: '/admin/gallery',
      name: 'admin-gallery',
      component: AdminGalleryView,
      meta: { requiresAuth: true },
    },
    {
      path: '/admin/reviews',
      name: 'admin-reviews',
      component: AdminReviewsView,
      meta: { requiresAuth: true },
    },
  ],
  scrollBehavior() {
    return { top: 0 }
  },
})

// Navigation guard для /admin/*
router.beforeEach((to) => {
  const auth = useAuthStore()
  if (to.meta.requiresAuth && !auth.isLoggedIn) {
    return { name: 'admin-login' }
  }
})

export default router
