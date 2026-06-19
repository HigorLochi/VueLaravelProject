import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { useAuthStore } from '@/stores/authStore'
import { VueSpinnersPlugin } from 'vue3-spinners';

import PrimeVue from 'primevue/config';
import Lara from '@primeuix/themes/lara';
import Menubar from 'primevue/menubar';
import FloatLabel from 'primevue/floatlabel';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import Textarea from 'primevue/textarea';
import Select from 'primevue/select';
import Button from "primevue/button"
import Card from 'primevue/card';
import DataTable from 'primevue/datatable';
import Paginator from 'primevue/paginator';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';
import Row from 'primevue/row';

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

app.component('Menubar', Menubar);
app.component('FloatLabel', FloatLabel);
app.component('InputText', InputText);
app.component('Password', Password);
app.component('Textarea', Textarea);
app.component('Select', Select);
app.component('Button', Button);
app.component('Card', Card);
app.component('DataTable', DataTable);
app.component('Paginator', Paginator);
app.component('Column', Column);
app.component('ColumnGroup', ColumnGroup);
app.component('Row', Row);

app.mount('#app')
