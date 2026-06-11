<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, PasswordInput } from '@/components/inputs/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
import { useAuthStore } from '@/stores/authStore.ts'

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
        else 
            alert("Email or password incorrect!")
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
            <BaseInput label="Login" v-model="email" />
        </div>
        <div class="base-form-row">
            <PasswordInput label="Password" v-model="password" />
        </div>
        <div class="base-form-row">
            <BaseButton :disabled="authStore.loading" text="Confirmar" role="confirm" type="submit" />
            <BaseButton :disabled="authStore.loading" text="Cancelar" role="cancel" @click="exit" />
        </div>
        <div v-if="authStore.loading" class="base-form-row">
            <VueSpinner color="green" size="20"></VueSpinner>
        </div>
    </form>
</template>