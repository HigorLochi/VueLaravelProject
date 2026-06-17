<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { type User } from '@/interfaces/IUser';
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, PasswordInput } from '@/components/inputs/index.ts';
import { useUserStore } from '@/stores/userStore.ts'
import Alert from '@/services/alert'

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

async function action(){
    if(user.value.id == 0) await save()
    else await update()
}

async function save() {
    userStore.create([user.value]).then((success) => {
        if(success) {
            Alert.success("User created sucessfully!").then(() => {
                router.push('/users')
            })
        } else {
            Alert.error("An error has occurred!")
        }
    })
}

async function update() {
    userStore.update(user.value).then((success) => {
        if(success) {
            Alert.success("User updated sucessfully!").then(() => {
                router.push('/users')
            })
        } else {
            Alert.error("An error has occurred!")
        }
    })
}

onMounted(() => {
    getUser()
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" @submit.prevent="action" action="">
        <BaseTitle title="User Form" />
        <div class="base-form-row">
            <BaseInput label="Name" v-model="user.name" />
        </div>
        <div class="base-form-row">
            <BaseInput label="E-mail" v-model="user.email" />
            <PasswordInput v-if="!iduser" label="Password" v-model="user.password" />
        </div>
        <div class="base-form-row">
            <Button :disabled="userStore.loading" label="Confirmar" type="submit" />
            <Button :disabled="userStore.loading" label="Cancelar" severity="contrast" to="/users" />
        </div>
        <div v-if="userStore.loading" class="base-form-row">
            <VueSpinner color="green" size="20"></VueSpinner>
        </div>
    </form>
</template>