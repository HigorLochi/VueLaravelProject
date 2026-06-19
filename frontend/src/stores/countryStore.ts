import { defineStore } from 'pinia'
import * as countryService from '@/services/countryService'

export const useCountryStore = defineStore('country', {
    state: () => ({
        loading: false
    }),

    actions: {
        async getAll(where: object) {
            this.loading = true;

            try {
                const response = await countryService.get(where);

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

        async create(country: object) {
            this.loading = true
            try {
                await countryService.create(country)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        },

        async update(country: object) {
            this.loading = true
            try {
                await countryService.update(country)

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
                await countryService.destroy(id)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        }
    }
})