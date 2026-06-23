import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useAuthStore } from '@/stores/authStore'
import { VueSpinnersPlugin } from 'vue3-spinners';

import PrimeVue from 'primevue/config';
import Lara from '@primeuix/themes/lara';
import {
    Chip,
    Divider,
    Splitter,
    SplitterPanel,
    Menubar, 
    FloatLabel, 
    InputText, 
    Password, 
    Textarea, 
    Select, 
    Button, 
    Card, 
    DataTable, 
    Column, 
    ColumnGroup, 
    Row, 
    Paginator 
} from 'primevue'

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

app.component('Chip', Chip);
app.component('Divider', Divider);
app.component('Splitter', Splitter);
app.component('SplitterPanel', SplitterPanel);
app.component('Menubar', Menubar);
app.component('FloatLabel', FloatLabel);
app.component('InputText', InputText);
app.component('Password', Password);
app.component('Textarea', Textarea);
app.component('Select', Select);
app.component('Button', Button);
app.component('Card', Card);
app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('ColumnGroup', ColumnGroup);
app.component('Row', Row);
app.component('Paginator', Paginator);

app.mount('#app')
