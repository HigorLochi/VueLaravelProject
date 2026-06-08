<script setup lang="ts">
import { BaseTitle } from '@/components/titles/index.ts';
import { BaseInput, BaseTextArea, BaseSelect } from '@/components/inputs/index.ts';
import { BaseButton } from '@/components/buttons/index.ts';
</script>

<template>
    <form :class="['base-form', `base-form-medium`]" action="">
        <BaseTitle title="Report Form" />
        <div class="base-form-row">
            <BaseInput label="Title" />
        </div>
        <div class="base-form-row">
            <BaseTextArea label="Description" rows="5" />
        </div>
        <div class="base-form-row">
            <BaseSelect label="Danger" />
            <BaseSelect label="City" />
        </div>
        <div class="base-form-row">
            <BaseButton text="Confirmar" role="confirm" />
            <BaseButton text="Cancelar" role="cancel" />
        </div>
    </form>
</template>