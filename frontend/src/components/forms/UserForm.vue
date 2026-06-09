<script setup lang="ts">
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, PasswordInput } from '@/components/inputs/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
</script>

<template>
    <form :class="['base-form', `base-form-medium`]" action="">
        <BaseTitle title="Report Form" />
        <div class="base-form-row">
            <BaseInput label="Name" />
        </div>
        <div class="base-form-row">
            <BaseInput label="E-mail" />
            <PasswordInput label="Password"/>
        </div>
        <div class="base-form-row">
            <BaseButton text="Confirmar" role="confirm" />
            <BaseButton text="Cancelar" role="cancel" />
        </div>
    </form>
</template>