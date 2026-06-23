<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { type User } from '@/interfaces/IUser';
import BaseTitle from '@/components/titles/BaseTitle.vue';
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

async function goToUsers(){
    router.push("/users")
}

onMounted(() => {
    getUser()
})
</script>

<template>
    <form :class="['base-form', `base-form-large`]" @submit.prevent="action" action="">
        <BaseTitle title="User Form" />
        <div class="base-form-row">
            <FloatLabel>
                <InputText id="name" type="text" v-model="user.name" :invalid="!user.name" required fluid />
                <label for="name">Name</label>
            </FloatLabel>
        </div>
        <div class="base-form-row">
            <FloatLabel>
                <InputText id="email" type="text" v-model="user.email" :invalid="!user.email" required fluid />
                <label for="email">E-mail</label>
            </FloatLabel>
            <FloatLabel v-if="!iduser">
                <Password id="password" type="text" v-model="user.password" :invalid="!user.password" required fluid />
                <label for="password">Password</label>
            </FloatLabel>
        </div>
        <div :class="['base-form-row', `base-form-row-center`]">
            <Button :loading="userStore.loading" label="Confirmar" type="submit" />
            <Button :loading="userStore.loading" label="Cancelar" severity="contrast" @click="goToUsers" />
        </div>
    </form>
</template>