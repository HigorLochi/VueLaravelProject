<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores/userStore.ts'
import Alert from '@/services/alert'
import dayjs from 'dayjs'

const router = useRouter()

var users = ref([])
const name = ref('')
const email = ref('')
const userStore = useUserStore()

async function search() {
    var search = {}

    if(name.value) search.name = name.value
    if(email.value) search.email = email.value

    userStore.getAll(search).then((response) => {
        users.value = response
    })
}

async function goToUpdatePage(id){
    router.push("/user-form/" + id)
}

async function deleteUser(id){
    Alert.question("Do you want to delete the user?", "Yes", "No").then((response) => {
      if (response.isConfirmed) {
        userStore.destroy(id).then((success) => {
            if(success) Alert.success("User deleted!")
            else Alert.error("An error has ocurred!")

            router.go()
        })
      }
    })
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
                <label for="name">Name</label>
            </FloatLabel>
            <FloatLabel>
                <InputText id="email" type="text" v-model="email" fluid />
                <label for="email">E-mail</label>
            </FloatLabel>
            <Button label=" " icon="pi pi-search" severity="success" rounded aria-label="Search" :loading="userStore.loading" @click="search()" />
        </div>
    </form>
    <DataTable :value="users" tableStyle="min-width: 50rem;border-radius:10px">
        <Column field="id" header="ID"></Column>
        <Column field="name" header="Name"></Column>
        <Column field="email" header="E-mail"></Column>
        <Column field="created_at" header="Created At" dataType="date">
            <template #body="{ data }">
                {{ dayjs(data.created_at).format('YYYY/MM/DD') }}
            </template>
        </Column>
        <Column header="Edit">
            <template #body="{ data }">
                <Button icon="pi pi-pencil" @click="goToUpdatePage(data.id)" />
            </template>
        </Column>
        <Column header="Delete">
            <template #body="{ data }">
                <Button icon="pi pi-trash" severity="danger" @click="deleteUser(data.id)" />
            </template>
        </Column>
    </DataTable>
</template>