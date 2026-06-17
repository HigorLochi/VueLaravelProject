<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, PasswordInput } from '@/components/inputs/index.ts';
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
        <div class="base-form-row">
            <BaseInput label="Login" v-model="email" autocomplete="login-email" />
        </div>
        <div class="base-form-row">
            <PasswordInput label="Password" v-model="password" autocomplete="login-password" />
        </div>
        <div class="base-form-row">
            <Button :disabled="authStore.loading" label="Confirmar" type="submit" />
            <Button :disabled="authStore.loading" label="Cancelar" severity="contrast" @click="exit" />
        </div>
        <div v-if="authStore.loading" class="base-form-row">
            <VueSpinner color="green" size="20"></VueSpinner>
        </div>
    </form>
</template>