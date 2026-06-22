<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useCountryStore } from '@/stores/countryStore.ts'
import dayjs from 'dayjs'

const limitPerPage = ref(10)
const page = ref(1)
const totalRecords = ref(10)

var countries = ref([])

const name = ref('')
const countryStore = useCountryStore()

async function search() {
    var search:any = {}

    if(name.value) search.name = name.value

    countryStore.search(search, page.value, limitPerPage.value).then((response) => {
        countries.value = response.data
        totalRecords.value = response.total
    })
}

async function pageChange(event: any){
    page.value = event.page + 1

    search()
}

onMounted(() => {
    search()
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" action="">
        <div class="base-form-row">
            <FloatLabel>
                <InputText id="name" type="text" v-model="name" fluid />
                <label for="name">Country</label>
            </FloatLabel>
            <Button label="" icon="pi pi-search" severity="success" rounded aria-label="Search" :loading="countryStore.loading" @click="search()" />
        </div>
    </form>
    <DataTable :value="countries" :loading="countryStore.loading" tableStyle="min-width: 50rem;border-radius:10px">
        <Column field="id" header="ID"></Column>
        <Column field="name" header="Name"></Column>
        <Column field="created_at" header="Created At" dataType="date">
            <template #body="{ data }">
                {{ dayjs(data.created_at).format('YYYY/MM/DD') }}
            </template>
        </Column>
    </DataTable>
    <Paginator :rows="limitPerPage" :totalRecords="totalRecords" @page="pageChange"></Paginator>
</template>