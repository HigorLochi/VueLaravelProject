<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BaseTitle from '@/components/titles/BaseTitle.vue';
import { useReportStore } from '@/stores/reportStore.ts'
import { useCountryStore } from '@/stores/countryStore.ts'
import { useCityStore } from '@/stores/cityStore.ts'
import { useDangerLevelStore } from '@/stores/dangerLevelStore.ts'
import Alert from '@/services/alert'

const route = useRoute()
const router = useRouter()
const reportStore = useReportStore()
const countryStore = useCountryStore()
const cityStore = useCityStore()
const dangerLevelStore = useDangerLevelStore()

const idreport = ('id' in route.params) ? Number(route.params.id) : null
var report = ref<any>({})

var cities = ref([])
var countries = ref([])
var dangerLevels = ref([])

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

async function getDangerLevels() {
    dangerLevelStore.search({}, 1, null).then((response) => {
        dangerLevels.value = response.data
    })
}

async function getCountries() {
    countryStore.search({}, 1, null).then((response) => {
        countries.value = response.data
    })
}

async function getCities() {
    cityStore.search({}, 1, null).then((response) => {
        cities.value = response.data
    })
}

async function goToReports(){
    router.push("/reports")
}

onMounted(() => {
    getDangerLevels()
    getCountries().then(() => {
        getCities()
    })
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
                <Select v-model="report.dangerLevel" showClear :loading="dangerLevelStore.loading" :options="dangerLevels" optionLabel="title" fluid style="height: 42.5px;" />
                <label for="dangerLevel">Danger Level</label>
            </FloatLabel>
            <FloatLabel>
                <Select v-model="report.country" showClear :loading="countryStore.loading" :options="countries" optionLabel="name" fluid style="height: 42.5px;" />
                <label for="country">Country</label>
            </FloatLabel>
            <FloatLabel>
                <Select v-model="report.city" showClear :loading="cityStore.loading" :options="cities" optionLabel="name" fluid style="height: 42.5px;" />
                <label for="city">City</label>
            </FloatLabel>
        </div>
        <div :class="['base-form-row', `base-form-row-center`]">
            <Button :loading="reportStore.loading" label="Confirmar" type="submit" />
            <Button :loading="reportStore.loading" label="Cancelar" severity="contrast" @click="goToReports" />
        </div>
    </form>
</template>