import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useAuthStore } from '@/stores/authStore'
import { VueSpinnersPlugin } from 'vue3-spinners';
import PrimeVue from 'primevue/config';
import Lara from '@primeuix/themes/lara';
import Button from "primevue/button"

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())

const authStore = useAuthStore()
await authStore.checkAuth()

app.use(router)
app.use(VueSpinnersPlugin);
app.use(PrimeVue, {
    theme: {
        preset: Lara
    }
});

app.component('Button', Button);

app.mount('#app')
