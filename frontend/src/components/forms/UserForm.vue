<script setup lang="ts">
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, PasswordInput } from '@/components/inputs/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
</script>

<template>
    <form :class="['base-form', `base-form-large`]" action="">
        <BaseTitle title="Report Form" />
        <div class="base-form-row">
            <BaseInput label="Name" />
        </div>
        <div class="base-form-row">
            <BaseInput modelValue="" label="E-mail" />
            <PasswordInput modelValue="" label="Password"/>
        </div>
        <div class="base-form-row">
            <BaseButton text="Confirmar" role="confirm" />
            <BaseButton text="Cancelar" role="cancel" />
        </div>
    </form>
</template>