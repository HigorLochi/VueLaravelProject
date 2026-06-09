<script setup lang="ts">
  import { onMounted } from 'vue'
  import { useRouter, RouterLink, RouterView } from 'vue-router'
  import { useAuthStore } from '@/stores/authStore'
  import { BaseButton } from '@/components/buttons/index.ts';

  const authStore = useAuthStore()
  const router = useRouter()

  async function handleLogout() {
    authStore.logout().then((response) => {
      router.push('/login')
    })
  }

  onMounted(async () => {
    await authStore.checkAuth()
  })
</script>

<template>
  <header>
    <div class="wrapper">
      <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="40" height="40" />
      <nav>
        <RouterLink v-if="authStore.user"  to="/reports">Reports</RouterLink>
        <RouterLink v-if="authStore.user"  to="/report-form">Reports</RouterLink>
        <BaseButton
          v-if="authStore.user"
          @click="handleLogout"
          text="Logout"
          direction="right"
        />
      </nav>
    </div>
  </header>

  <RouterView />
</template>
