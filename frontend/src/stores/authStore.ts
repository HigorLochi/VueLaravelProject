import { defineStore } from 'pinia'
import { ref } from 'vue'

import * as authService from '@/services/authService'

export const useAuthStore = defineStore('auth', () => {

  const user = ref(null)

  async function checkAuth() {
    try {
      const response = await authService.getUser()

      user.value = response.data
    } catch {
      user.value = null
    }
  }

  async function login(email: string, password: string) {
    try {
      const response = await authService.login(email, password)

      user.value = response.data.user

      return response.data;
    } catch {
      user.value = null

      return false;
    }
  }

  async function logout() {
    try{
      const response = await authService.logout()

      user.value = null

      return response.data
    } catch {
      return false;
    }
  }

  return {
    user,
    login,
    logout,
    checkAuth
  }
})