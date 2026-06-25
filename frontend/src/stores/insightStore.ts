import { defineStore } from 'pinia'
import * as insightService from '@/services/insightService'

export const useInsightStore = defineStore('insight', {
    state: () => ({
        loading: false
    }),

    actions: {
        async reportCountByMonth() {
            this.loading = true;

            try {
                const response = await insightService.reportCountByMonth();

                if (response.status === 200) {
                    return response.data;
                } else throw new Error;
            } catch (error) {
                return {};
            } finally {
                this.loading = false;
            }
        },
    }
})