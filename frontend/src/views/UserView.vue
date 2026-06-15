<script setup lang="ts">
  import { UsersTable } from '@/components/tables/index.ts';
  import { BaseTitle } from '@/components/titles/index.ts';
  import { BaseButton } from '@/components/buttons/index.ts';
</script>

<template>
  <main class="page-container">
    <BaseTitle title="Users List" />
    <BaseButton text="Add User" role="confirm" to="/user-form" />
    <UsersTable/>
  </main>
</template>