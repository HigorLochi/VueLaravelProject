<script setup lang="ts">
import { CountriesTable } from '@/components/tables/index.ts';
import { BaseTitle } from '@/components/titles/index.ts';
</script>

<template>
  <main class="page-container">
    <BaseTitle title="Country List" />
    <CountriesTable/>
  </main>
</template>