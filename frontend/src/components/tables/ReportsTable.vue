<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useReportStore } from '@/stores/reportStore.ts'
import { useCountryStore } from '@/stores/countryStore.ts'
import { useCityStore } from '@/stores/cityStore.ts'
import { useDangerLevelStore } from '@/stores/dangerLevelStore.ts'
import { type Report } from '@/interfaces/IReport';
import dayjs from 'dayjs'

const limitPerPage = ref(10)
const page = ref(1)
const totalRecords = ref(0)

var reports =  ref<Report[]>([])

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

    if(city.value && city.value.id) search.city_id = city.value.id
    if(dangerLevel.value && dangerLevel.value.id) search.danger_level_id  = dangerLevel.value.id

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

async function changeCountry(event: any){
    if(event.value && event.value.id){
        cityStore.search({country_id: event.value.id}, 1, null).then((response) => {
            cities.value = response.data
        })
    } else {
        cities.value = []
    }
}

async function pageChange(event: any){
    page.value = event.page + 1

    search()
}

onMounted(() => {
    getDangerLevels()
    getCountries()
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
                <Select v-model="country" showClear :loading="countryStore.loading" :options="countries" optionLabel="name" placeholder="Select a Country" @change="changeCountry" fluid  style="height: 42.5px;">
                    <template #value="slotProps">
                        <div v-if="slotProps.value" style="display: flex;flex-direction: row;gap: 10px;">
                            <img style="border-radius: 5px;" alt="Vue logo" :src="`/src/assets/countrieslogos/${slotProps.value.logo}.svg`" width="20" height="20"/>
                            <div>{{ slotProps.value.name }}</div>
                        </div>
                        <span v-else>
                            {{ slotProps.placeholder }}
                        </span>
                    </template>
                    <template #option="slotProps">
                        <div style="display: flex;flex-direction: row;gap: 10px;">
                            <img style="border-radius: 5px;" alt="Vue logo" :src="`/src/assets/countrieslogos/${slotProps.option.logo}.svg`" width="20" height="20"/>
                            <div>{{ slotProps.option.name }}</div>
                        </div>
                    </template>
                    <template #dropdownicon>
                        <i class="pi pi-map" />
                    </template>
                </Select>
            </FloatLabel>
            <FloatLabel>
                <Select v-model="city" showClear :loading="cityStore.loading" :options="cities" optionLabel="name" fluid style="height: 42.5px;" />
                <label for="city">City</label>
            </FloatLabel>
            <Button label=" " icon="pi pi-search" severity="success" rounded aria-label="Search" :loading="reportStore.loading" @click="search()" />
        </div>
    </form>
    <Splitter v-for="report in reports" :key="report.id" style="height: 150px; margin-bottom: 20px;">
        <SplitterPanel style="text-align: center;align-content: center;" :size="25" :minSize="10">
            <i class="pi pi-map-marker"></i>
            {{ report.city.name }} - {{ report.city.country.name }}<br>
            {{ dayjs(report.created_at).format('YYYY/MM/DD') }}
        </SplitterPanel>
        <SplitterPanel style="align-content: center;padding: 10px;" :size="75">
            <Chip :style="{height: '25px',backgroundColor: report.danger_level.color, position: 'absolute'}" :label="report.danger_level.title" />
            <div style="text-align: center; font-weight: bold;color: var(--vt-c-primevue-green);margin: 5px;">
                {{ report.title }}
            </div>
            <p
                :style="{
                    display: '-webkit-box',
                    '-webkit-line-clamp': 2,
                    '-webkit-box-orient': 'vertical',
                    overflow: 'hidden',
                    fontSize: '12px',
                    color: 'lightgray'
                }"
            >
                {{ report.description }}
            </p>
        </SplitterPanel>
    </Splitter>
    <Paginator :rows="limitPerPage" :totalRecords="totalRecords" @page="pageChange"></Paginator>
</template>