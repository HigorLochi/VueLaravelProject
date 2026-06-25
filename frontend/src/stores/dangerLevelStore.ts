import { defineStore } from 'pinia'
import * as dangerLevelService from '@/services/dangerLevelService'

export const useDangerLevelStore = defineStore('dangerlevel', {
    state: () => ({
        loading: false
    }),

    actions: {
        async search(where: Object = {}, page: Number = 1, limitPerPage: any = null) {
            this.loading = true;

            try {
                const response = await dangerLevelService.search(where, page, limitPerPage);

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
                const response = await dangerLevelService.getById(id);

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

        async create(levels: Array<Object>) {
            this.loading = true
            try {
                await dangerLevelService.create(levels)

                return true
            } catch(e) {
                return false
            } finally {
                this.loading = false
            }
        },

        async update(level: object) {
            this.loading = true
            try {
                await dangerLevelService.update(level)

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
                await dangerLevelService.destroy(id)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        }
    }
})