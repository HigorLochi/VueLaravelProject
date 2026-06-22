<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useReportStore } from '@/stores/reportStore.ts'
import { useCountryStore } from '@/stores/countryStore.ts'
import { useCityStore } from '@/stores/cityStore.ts'
import { useDangerLevelStore } from '@/stores/dangerLevelStore.ts'

const limitPerPage = ref(10)
const page = ref(1)
const totalRecords = ref(0)

var reports = ref([])

const country:any = ref({})
const city:any = ref({})
const dangerLevel:any = ref({})

var cities = ref([])
var countries = ref([])
var dangerLevels = ref([])

const reportStore = useReportStore()
const countryStore = useCountryStore()
const cityStore = useCityStore()
const dangerLevelStore = useDangerLevelStore()

async function search() {
    var search:any = {}

    if(city.value && city.value.name) search.city_id = city.value.id
    if(dangerLevel.value && dangerLevel.value.name) search.danger_level_id  = dangerLevel.value.id

    reportStore.search(search, page.value, limitPerPage.value).then((response) => {
        reports.value = response.data
        totalRecords.value = response.total
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

async function pageChange(event: any){
    page.value = event.page + 1

    search()
}

onMounted(() => {
    getDangerLevels()
    getCountries().then(() => {
        getCities()
    })
    search()
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" action="">
        <div class="base-form-row">
            <FloatLabel>
                <Select v-model="dangerLevel" showClear :loading="dangerLevelStore.loading" :options="dangerLevels" optionLabel="title" fluid style="height: 42.5px;" />
                <label for="dangerLevel">Danger Level</label>
            </FloatLabel>
            <FloatLabel>
                <Select v-model="country" showClear :loading="countryStore.loading" :options="countries" optionLabel="name" fluid style="height: 42.5px;" />
                <label for="country">Country</label>
            </FloatLabel>
            <FloatLabel>
                <Select v-model="city" showClear :loading="cityStore.loading" :options="cities" optionLabel="name" fluid style="height: 42.5px;" />
                <label for="city">City</label>
            </FloatLabel>
            <Button label=" " icon="pi pi-search" severity="success" rounded aria-label="Search" :loading="cityStore.loading" @click="search()" />
        </div>
    </form>
    <!-- <DataTable :value="reports" :loading="cityStore.loading" tableStyle="min-width: 50rem;border-radius:10px">
        <Column field="title" header="Title"></Column>
    </DataTable> -->
    <Paginator :rows="limitPerPage" :totalRecords="totalRecords" @page="pageChange"></Paginator>
</template>