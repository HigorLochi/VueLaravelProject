<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import Alert from '@/services/alert'
import { BaseInput } from '@/components/inputs/index.ts';
import { useUserStore } from '@/stores/userStore.ts'
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
            <BaseInput v-model="name" label="Name" />
            <BaseInput v-model="email" label="E-mail" />
            <Button label="Search" :loading="userStore.loading" @click="search()" />
        </div>
        <div v-if="userStore.loading" class="base-form-row">
            <VueSpinner color="green" size="20"></VueSpinner>
        </div>
    </form>
    <table v-if="!userStore.loading" class="default-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Created At</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody >
            <tr v-for="user in users">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ dayjs(user.created_at).format('YYYY/MM/DD') }}</td>
                <td><Button icon="pi pi-pencil" @click="goToUpdatePage(user.id)" /></td>
                <td><Button icon="pi pi-trash" severity="danger" @click="deleteUser(user.id)" /></td>
            </tr>
        </tbody>
    </table>
</template>