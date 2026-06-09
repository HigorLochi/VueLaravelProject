import { defineStore } from 'pinia'

import * as authService from '@/services/authService'

export const useAuthStore = defineStore('auth', {

  state: () => ({
    loading: false,
    user: null
  }),

  actions: {
    async checkAuth() {
      this.loading = true;

      try {
        const response = await authService.getUser()

        this.user = response.data
      } catch {
        this.user = null
      } finally {
        this.loading = false;
      }
    },

    async login(email: string, password: string) {
      this.loading = true;

      try {
        const response = await authService.login(email, password)

        this.user = response.data

        return true
      } catch {
        await this.checkAuth()

        return (this.user !== null);
      } finally {
        this.loading = false;
      }
    },

    async logout() {
      this.loading = true;

      try{
        await authService.logout()

        this.user = null

        return true
      } catch {
        await this.checkAuth()

        return (this.user !== null);
      } finally {
        this.loading = false;
      }
    }
  }
})