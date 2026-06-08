<script setup lang="ts">
  import { onMounted } from 'vue'
  import { RouterLink, RouterView } from 'vue-router'
  import { useAuthStore } from '@/stores/authStore'
  import { BaseButton } from '@/components/buttons/index.ts';

  const authStore = useAuthStore()

  onMounted(async () => {
    await authStore.checkAuth()
  })
</script>

<template>
  <header>
    <div class="wrapper">
      <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="40" height="40" />
      <nav>
        <RouterLink v-if="authStore.authenticated"  to="/reports">Reports</RouterLink>
        <RouterLink v-if="authStore.authenticated"  to="/report-form">Reports</RouterLink>
        <BaseButton
          v-if="authStore.authenticated"
          @click="authStore.logout"
          text="Logout"
        />
      </nav>
    </div>
  </header>

  <RouterView />
</template>
