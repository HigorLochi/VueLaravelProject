<script setup lang="ts">
import { BaseTitle } from '../titles/index.ts';
import { BaseInput, PasswordInput } from '../inputs/index.ts';
import { BaseButton } from '../buttons/index.ts';
import { ref } from 'vue'
import api from '../../services/api'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const router = useRouter()

async function login() {
    await api.get('/sanctum/csrf-cookie')
    
    api.post('/login', {
        email: email.value,
        password: password.value
    }).then((response) => {       
        router.push('/reports')
    })
}
</script>

<template>
    <form :class="['base-form', `base-form-small`]" @submit.prevent="login" action="">
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