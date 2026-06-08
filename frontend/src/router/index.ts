import { createRouter, createWebHistory } from 'vue-router'
import { LoginView, ReportView, ReportFormView } from '@/views/index.ts'
import { useAuthStore } from '@/stores/authStore'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/reports',
      name: 'reports',
      component: ReportView,
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/report-form',
      name: 'report-form',
      component: ReportFormView,
      meta: {
        requiresAuth: true
      }
    }
  ]
})

router.beforeEach(async (to, from) => {
  const authStore = useAuthStore()

  if (to.meta.requiresAuth && !authStore.authenticated) {
    return {
      name: 'login'
    }
  }

  if (to.name === 'login' && authStore.authenticated) {
    return {
      name: 'report'
    }
  }
})

export default router
