<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { type User } from '@/interfaces/IUser';
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, PasswordInput } from '@/components/inputs/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
import { useUserStore } from '@/stores/userStore.ts'
import Swal from 'sweetalert2'

const route = useRoute()
const router = useRouter()
const userStore = useUserStore()

const iduser = ('id' in route.params) ? Number(route.params.id) : null
var user = ref<User>({
    id: 0,
    name: '',
    email: '',
    password: undefined
})

async function getUser() {
    if(iduser){
        userStore.getById(iduser).then((response) => {
            user.value = response
        })
    }
}

async function save() {
    userStore.create([user.value]).then((success) => {
        if(success) {
            Swal.mixin({
                timer: 3000,
                timerProgressBar: true,
            }).fire({
                icon: 'success',
                title: 'Success',
                text: 'User created successfully!',
            }).then(() => {
                router.push('/reports')
            })
        } else {
            Swal.fire({
                title: 'Error',
                text: 'An error has occurred!',
                icon: 'error'
            })
        }
    })
}

onMounted(() => {
    getUser()
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" @submit.prevent="save" action="">
        <BaseTitle title="User Form" />
        <div class="base-form-row">
            <BaseInput label="Name" v-model="user.name" />
        </div>
        <div class="base-form-row">
            <BaseInput label="E-mail" v-model="user.email" />
            <PasswordInput v-if="!iduser" label="Password" v-model="user.password" />
        </div>
        <div class="base-form-row">
            <BaseButton :disabled="userStore.loading" text="Confirmar" role="confirm" type="submit" />
            <BaseButton :disabled="userStore.loading" text="Cancelar" role="cancel" to="/users" />
        </div>
    </form>
</template>