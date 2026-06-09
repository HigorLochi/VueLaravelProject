<script setup>
import { ref, onMounted } from 'vue'
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
import { IconTrash, IconPencil } from '@/components/icons/index.ts'; 
import { useUserStore } from '@/stores/userStore.ts'

var users = ref([])
const userStore = useUserStore()

onMounted(() => {
    userStore.getAll().then((response) => {
        users.value = response
    })
})
</script>

<template>
    <BaseTitle title="Users List" />
    <BaseButton text="Add User" role="confirm" to="/user-form" />
    <table class="default-table">
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
        <tbody>
            <tr v-for="user in users">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
                <td><IconPencil/></td>
                <td><IconTrash/></td>
            </tr>
        </tbody>
    </table>
</template>