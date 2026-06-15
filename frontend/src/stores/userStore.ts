import { defineStore } from 'pinia'
import * as userService from '@/services/userService'

export const useUserStore = defineStore('user', {
    state: () => ({
        loading: false
    }),

    actions: {
        async getAll(where: Object) {
            this.loading = true;

            try {
                const response = await userService.get(where);

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
                const response = await userService.getById(id);

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

        async create(users: Array<Object>) {
            this.loading = true
            try {
                await userService.create(users)

                return true
            } catch(e) {
                return false
            } finally {
                this.loading = false
            }
        },

        async update(user: object) {
            this.loading = true
            try {
                await userService.update(user)

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
                await userService.destroy(id)

                return true
            } catch {
                return false
            } finally {
                this.loading = false
            }
        }
    }
})