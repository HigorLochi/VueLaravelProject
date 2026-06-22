<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BaseTitle from '@/components/titles/BaseTitle.vue';
import { useReportStore } from '@/stores/reportStore.ts'
import { useCountryStore } from '@/stores/countryStore.ts'
import { useCityStore } from '@/stores/cityStore.ts'
import Alert from '@/services/alert'

const route = useRoute()
const router = useRouter()
const reportStore = useReportStore()

const idreport = ('id' in route.params) ? Number(route.params.id) : null
var report = ref<any>({
    id: 0,
    name: '',
    email: '',
    password: undefined
})

async function action(){
    await save()
}

async function save() {
    reportStore.create([report.value]).then((success) => {
        if(success) {
            Alert.success("Report created sucessfully!").then(() => {
                router.push('/reports')
            })
        } else {
            Alert.error("An error has occurred!")
        }
    })
}

async function goToReports(){
    router.push("/reports")
}

onMounted(() => {
    
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" action="">
        <BaseTitle title="Report Form" />
        <div class="base-form-row">
            <FloatLabel>
                <InputText id="title" type="text" v-model="report.title" fluid />
                <label for="title">Title</label>
            </FloatLabel>
        </div>
        <div class="base-form-row">
            <FloatLabel>
                <Textarea id="description" rows="5" v-model="report.description" fluid maxlength="2000" />
                <label for="description">Description</label>
            </FloatLabel>
        </div>
        <div class="base-form-row">
            <FloatLabel>
                <Select id="danger" v-model="report.danger" fluid />
                <label for="danger">Danger</label>
            </FloatLabel>
            <FloatLabel>
                <Select id="city" v-model="report.city" fluid />
                <label for="city">City</label>
            </FloatLabel>
        </div>
        <div :class="['base-form-row', `base-form-row-center`]">
            <Button :loading="reportStore.loading" label="Confirmar" type="submit" />
            <Button :loading="reportStore.loading" label="Cancelar" severity="contrast" @click="goToReports" />
        </div>
    </form>
</template>