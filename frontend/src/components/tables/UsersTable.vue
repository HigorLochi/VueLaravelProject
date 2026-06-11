<script setup>
import { ref, onMounted } from 'vue'
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput } from '@/components/inputs/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
import { IconTrash, IconPencil } from '@/components/icons/index.ts'; 
import { useUserStore } from '@/stores/userStore.ts'

import dayjs from 'dayjs'

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

onMounted(() => {
    search()
})
</script>

<template>
    <BaseTitle title="Users List" />
    <BaseButton text="Add User" role="confirm" to="/user-form" />
    <form :class="['base-form', `base-form-large`]" action="">
        <div class="base-form-row">
            <BaseInput v-model="name" label="Name" />
            <BaseInput v-model="email" label="E-mail" />
            <BaseButton :disabled="userStore.loading" @click="search" text="Search" role="confirm" />
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
                <td><a :href="`/user-form/${user.id}`"><IconPencil/></a></td>
                <td><a><IconTrash/></a></td>
            </tr>
        </tbody>
    </table>
</template>