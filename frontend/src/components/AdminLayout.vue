<template>
  <div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
      <div class="sidebar-logo">
        <img src="/images/Лого2.png" alt="Лого" class="sidebar-logo-img">
        <span>Админ-панель</span>
      </div>
      <nav class="sidebar-nav">
        <RouterLink to="/admin" class="sidebar-link" :class="{active: $route.path==='/admin'}"><i class="fas fa-tachometer-alt"></i> Дашборд</RouterLink>
        <RouterLink to="/admin/orders" class="sidebar-link"><i class="fas fa-shopping-cart"></i> Заказы</RouterLink>
        <RouterLink to="/admin/stocks" class="sidebar-link"><i class="fas fa-tags"></i> Акции</RouterLink>
        <RouterLink to="/admin/news" class="sidebar-link"><i class="fas fa-newspaper"></i> Новости</RouterLink>
        <RouterLink to="/admin/gallery" class="sidebar-link"><i class="fas fa-images"></i> Галерея</RouterLink>
        <RouterLink to="/admin/reviews" class="sidebar-link"><i class="fas fa-star"></i> Отзывы</RouterLink>
      </nav>
      <button class="sidebar-logout" @click="logout"><i class="fas fa-sign-out-alt"></i> Выйти</button>
    </aside>

    <!-- Main content -->
    <main class="admin-main">
      <slot />
    </main>
  </div>
</template>

<script setup lang="ts">
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth'

const auth = useAuthStore()
const router = useRouter()

function logout() {
  auth.logout()
  router.push('/admin/login')
}
</script>

<style scoped>
.admin-layout { display: flex; min-height: 100vh; }
.admin-sidebar {
  width: 260px; background: linear-gradient(135deg, #1a5a9e, #216DBD);
  color: white; display: flex; flex-direction: column; padding: 0; flex-shrink: 0;
  position: fixed; top: 0; left: 0; height: 100vh; overflow-y: auto; z-index: 100;
}
.sidebar-logo { display: flex; align-items: center; gap: 12px; padding: 25px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); font-weight: 700; font-size: 1.1rem; }
.sidebar-logo-img { width: 40px; height: 40px; border-radius: 50%; }
.sidebar-nav { flex: 1; padding: 20px 0; }
.sidebar-link { display: flex; align-items: center; gap: 12px; padding: 14px 25px; color: rgba(255,255,255,0.85); text-decoration: none; font-size: 0.95rem; transition: all 0.2s; }
.sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.15); color: white; padding-left: 30px; }
.sidebar-link i { width: 20px; text-align: center; }
.sidebar-logout { margin: 20px; padding: 12px; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2); border-radius: 10px; cursor: pointer; font-size: 0.95rem; transition: all 0.2s; }
.sidebar-logout:hover { background: rgba(255,255,255,0.25); }
.admin-main { margin-left: 260px; flex: 1; background: #f4f6f9; min-height: 100vh; padding: 30px; }
</style>
