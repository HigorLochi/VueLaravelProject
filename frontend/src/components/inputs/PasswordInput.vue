<script setup lang="ts">
import { BaseInput } from '../inputs/index.ts'; 

const model = defineModel<string>()
</script>

<template>
  <BaseInput
    label="Password"
    type="password"
    v-model="model"
  />
</template>