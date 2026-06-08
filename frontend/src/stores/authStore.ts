import { defineStore } from 'pinia'
import { ref } from 'vue'

import * as authService from '@/services/authService'

export const useAuthStore = defineStore('auth', () => {

  const authenticated = ref(false)
  const user = ref(null)

  async function checkAuth() {
    try {
      const response = await authService.getUser()

      authenticated.value = true
      user.value = response.data
    }
    catch {
      authenticated.value = false
      user.value = null
    }
  }

  async function login(email: string, password: string) {
    await authService.login(email, password)

    await checkAuth()
  }

  async function logout() {
    await authService.logout()

    authenticated.value = false
    user.value = null
  }

  return {
    authenticated,
    user,
    login,
    logout,
    checkAuth
  }
})