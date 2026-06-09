import { defineStore } from 'pinia'
import * as reportService from '@/services/reportService'

export const useReportStore = defineStore('report', {
    state: () => ({
        loading: false
    }),

    actions: {
        async getAll() {
            this.loading = true;

            try {
                const response = await reportService.get();

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

        async create(report: object) {
            this.loading = true
            try {
                await reportService.create(report)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        },

        async update(report: object) {
            this.loading = true
            try {
                await reportService.update(report)

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
                await reportService.destroy(id)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        }
    }
})