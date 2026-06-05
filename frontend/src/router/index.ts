import { createRouter, createWebHistory } from 'vue-router'
import { LoginView, ReportView, ReportFormView } from '../views/index.ts'

const routes = [
  {
    path: '/login',
    name: 'login',
    component: LoginView,
  },
  {
    path: '/reports',
    name: 'reports',
    component: ReportView,
  },
  {
    path: '/report-form',
    name: 'report-form',
    component: ReportFormView,
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes
})

export default router
