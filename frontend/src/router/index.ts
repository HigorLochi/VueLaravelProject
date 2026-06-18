import { createRouter, createWebHistory } from 'vue-router'
import { LoginView, ReportView, ReportFormView, UserView, UserFormView, AboutView } from '@/views/index.ts'
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
      },
    },
    {
      path: '/users',
      name: 'users',
      component: UserView,
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/user-form',
      name: 'user-form',
      component: UserFormView,
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/user-form/:id',
      name: 'user-form-edit',
      component: UserFormView,
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    }
  ]
})

router.beforeEach(async (to, from) => {
  const authStore = useAuthStore()

  if (to.meta.requiresAuth && !authStore.user) {
    return {
      name: 'login'
    }
  }

  if (to.name === 'login' && authStore.user) {
    return {
      name: 'reports'
    }
  }
})

export default router
