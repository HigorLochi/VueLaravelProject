import { defineStore } from 'pinia'
import * as countryService from '@/services/countryService'

export const useCountryStore = defineStore('country', {
    state: () => ({
        loading: false
    }),

    actions: {
        async search(where: Object = {}, page: Number = 1, limitPerPage: any = null) {
            this.loading = true;

            try {
                const response = await countryService.search(where, page, limitPerPage);

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

        async create(countries: Array<Object>) {
            this.loading = true
            try {
                await countryService.create(countries)

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