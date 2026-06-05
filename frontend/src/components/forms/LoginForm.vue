<script setup lang="ts">
import { BaseTitle } from '../titles/index.ts';
import { BaseInput, PasswordInput } from '../inputs/index.ts';
import { BaseButton } from '../buttons/index.ts';
import { ref } from 'vue'
import api from '../../services/api'

const email = ref('')
const password = ref('')

async function login() {
  await api.get('/sanctum/csrf-cookie')

  await api.post('/api/login', {
    email: email.value,
    password: password.value
  })

  alert('Logged in')
}
</script>

<template>
    <form :class="['base-form', `base-form-small`]" action="">
        <BaseTitle title="Acess Panel" />
        <div class="base-form-row">
            <BaseInput label="Login" />
        </div>
        <div class="base-form-row">
            <PasswordInput label="Password" />
        </div>
        <div class="base-form-row">
            <BaseButton @click="login" text="Confirmar" role="confirm" />
            <BaseButton text="Cancelar" role="cancel" />
        </div>
    </form>
</template>