<script setup lang="ts">
import { BaseTitle } from '../titles/index.ts';
import { BaseInput, PasswordInput } from '../inputs/index.ts';
import { BaseButton } from '../buttons/index.ts';
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
            <BaseButton text="Confirmar" role="confirm" />
            <BaseButton text="Cancelar" role="cancel" />
        </div>
    </form>
</template>