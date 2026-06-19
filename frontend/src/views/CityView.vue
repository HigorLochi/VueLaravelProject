<script setup lang="ts">
import { CitiesTable } from '@/components/tables/index.ts';
import { BaseTitle } from '@/components/titles/index.ts';
</script>

<template>
  <main class="page-container">
    <BaseTitle title="City List" />
    <CitiesTable/>
  </main>
</template>