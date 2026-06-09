import { defineStore } from 'pinia'
import * as cityService from '@/services/cityService'

export const useCityStore = defineStore('city', {
    state: () => ({
        loading: false
    }),

    actions: {
        async getAll() {
            this.loading = true;

            try {
                const response = await cityService.get();

                if (response.status === 200) {
                    return response.data;
                }

                return [];
            } catch (error) {
                return [];
            } finally {
                this.loading = false;
            }
        },

        async create(city: object) {
            this.loading = true
            try {
                await cityService.create(city)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        },

        async update(city: object) {
            this.loading = true
            try {
                await cityService.update(city)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        },

        async destroy(id: Number) {
            this.loading = true
            try {
                await cityService.destroy(id)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        }
    }
})