<script setup lang="ts">
import CitiesTable from '@/components/tables/CitiesTable.vue';
import BaseTitle from '@/components/titles/BaseTitle.vue';
</script>

<template>
  <main class="page-container">
    <BaseTitle title="City List" />
    <CitiesTable/>
  </main>
</template>