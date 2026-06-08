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
    ).then((response) => {
        router.push('/reports')
    })
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
            <BaseButton text="Confirmar" role="confirm" />
            <BaseButton text="Cancelar" role="cancel" />
        </div>
    </form>
</template>