<script setup lang="ts">
import { useRouter } from 'vue-router'
import UsersTable from '@/components/tables/UsersTable.vue';
import BaseTitle from '@/components/titles/BaseTitle.vue';

const router = useRouter()

async function goToForm() {
  router.push("/user-form")
}
</script>

<template>
  <main class="page-container">
    <BaseTitle title="User List" />
    <Button label="Add User" @click="goToForm()" />
    <UsersTable/>
  </main>
</template>