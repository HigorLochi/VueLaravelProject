<script setup lang="ts">
import CountriesTable from '@/components/tables/CountriesTable.vue';
import BaseTitle from '@/components/titles/BaseTitle.vue';
</script>

<template>
  <main class="page-container">
    <BaseTitle title="Country List" />
    <CountriesTable/>
  </main>
</template>