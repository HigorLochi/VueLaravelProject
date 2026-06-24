<script setup lang="ts">
import { useRouter } from 'vue-router'
import ReportsTable from '@/components/tables/ReportsTable.vue';
import BaseTitle from '@/components/titles/BaseTitle.vue';

const router = useRouter()

async function goToForm() {
  router.push("/report-form")
}
</script>

<template>
  <main class="page-container">
    <BaseTitle :title="$t('ReportList')" />
    <Button :label="$t('AddReport')" @click="goToForm()" />
    <ReportsTable/>
  </main>
</template>