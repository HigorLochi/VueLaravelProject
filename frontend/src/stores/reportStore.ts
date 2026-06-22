import { defineStore } from 'pinia'
import * as reportService from '@/services/reportService'

export const useReportStore = defineStore('report', {
    state: () => ({
        loading: false
    }),

    actions: {
        async search(where: Object, page: Number, limitPerPage: any) {
            this.loading = true;

            try {
                const response = await reportService.search(where, page, limitPerPage);

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

        async getById(id: Number) {
            this.loading = true;

            try {
                const response = await reportService.getById(id);

                if (response.status === 200) {
                    return response.data;
                }

                return {};
            } catch (error) {
                return {};
            } finally {
                this.loading = false;
            }
        },

        async create(reports: Array<Object>) {
            this.loading = true
            try {
                await reportService.create(reports)

                return true
            } catch(e) {
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