<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useCityStore } from '@/stores/cityStore.ts'
import { useCountryStore } from '@/stores/countryStore.ts'
import dayjs from 'dayjs'

const limitPerPage = ref(10)
const page = ref(1)
const totalRecords = ref(10)

var cities = ref([])
var countries = ref([])

const name = ref('')
const country:any = ref({})
const cityStore = useCityStore()
const countryStore = useCountryStore()

async function search() {
    var search:any = {}

    if(name.value) search.name = name.value
    if(country.value && country.value.name) search.country_id = country.value.id

    cityStore.search(search, page.value, limitPerPage.value).then((response) => {
        cities.value = response.data
        totalRecords.value = response.total
    })
}

async function getCountries() {
    countryStore.search({}, 1, null).then((response) => {
        countries.value = response.data
    })
}

async function pageChange(event: any){
    page.value = event.page + 1

    search()
}

onMounted(() => {
    getCountries()
    search()
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" action="">
        <div class="base-form-row">
            <FloatLabel>
                <InputText id="name" type="text" v-model="name" fluid />
                <label for="name">City</label>
            </FloatLabel>
            <FloatLabel>
                <Select v-model="country" showClear :loading="countryStore.loading" :options="countries" optionLabel="name" placeholder="Select a Country" fluid  style="height: 42.5px;">
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
            <Button label=" " icon="pi pi-search" severity="success" rounded aria-label="Search" :loading="cityStore.loading" @click="search()" />
        </div>
    </form>
    <DataTable :value="cities" :loading="cityStore.loading" tableStyle="min-width: 50rem;border-radius:10px">
        <Column field="id" header="ID"></Column>
        <Column field="name" header="Name"></Column>
        <Column header="Country" dataType="date">
            <template #body="{ data }">
                {{ data.country.name }}
            </template>
        </Column>
        <Column field="created_at" header="Created At" dataType="date">
            <template #body="{ data }">
                {{ dayjs(data.created_at).format('YYYY/MM/DD') }}
            </template>
        </Column>
    </DataTable>
    <Paginator :rows="limitPerPage" :totalRecords="totalRecords" @page="pageChange"></Paginator>
</template>