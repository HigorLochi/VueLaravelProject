<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { BaseTitle } from '@/components/titles/index.ts';
import { useAuthStore } from '@/stores/authStore.ts'
import Alert from '@/services/alert'

const router = useRouter()
const authStore = useAuthStore()

const email = ref('')
const password = ref('')

async function handleLogin() {
    authStore.login(
        email.value,
        password.value
    ).then((success) => {
        if(success) 
            router.push('/reports')
        else {
            Alert.warning("Invalid credentials!")
        }
    })
}

function exit(){
    window.location.href = "https://www.google.com.br"
}
</script>

<template>
    <form :class="['base-form', `base-form-small`]" @submit.prevent="handleLogin" action="">
        <BaseTitle title="Acess Panel" />
        <div :class="['base-form-row', `base-form-row-center`]">    
            <FloatLabel>
                <InputText id="email" type="text" v-model="email" fluid />
                <label for="email">Username</label>
            </FloatLabel>
        </div>
        <div :class="['base-form-row', `base-form-row-center`]">
            <FloatLabel>
                <Password id="password" type="text" v-model="password" toggleMask fluid />
                <label for="password">Password</label>
            </FloatLabel>
        </div>
        <div :class="['base-form-row', `base-form-row-center`]">
            <Button :loading="authStore.loading" label="Confirmar" type="submit" />
            <Button :loading="authStore.loading" label="Cancelar" severity="contrast" @click="exit" />
        </div>
    </form>
</template>