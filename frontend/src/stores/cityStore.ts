import { defineStore } from 'pinia'
import * as cityService from '@/services/cityService'
import type { search } from '@/services/reportService';

export const useCityStore = defineStore('city', {
    state: () => ({
        loading: false
    }),

    actions: {
        async search(where: Object = {}, page: Number = 1, limitPerPage: any = null) {
            this.loading = true;

            try {
                const response = await cityService.search(where, page, limitPerPage);

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

        async create(cities: Array<object>) {
            this.loading = true
            try {
                await cityService.create(cities)

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