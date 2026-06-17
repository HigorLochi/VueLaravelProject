<script setup lang="ts">
  import { onMounted } from 'vue'
  import { useRouter, RouterLink, RouterView } from 'vue-router'
  import { useAuthStore } from '@/stores/authStore'
  import Alert from '@/services/alert'

  const authStore = useAuthStore()
  const router = useRouter()

  async function handleLogout() {
    Alert.question("Do you confirm the logout?", "Yes", "No").then((response) => {
      if (response.isConfirmed) {
        authStore.logout().then((success) => {
          if(success) 
            router.push('/login')
        })
      }
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
        <RouterLink v-if="authStore.user" to="/reports">Reports</RouterLink>
        <RouterLink v-if="authStore.user" to="/users">Users</RouterLink>
        
      </nav>
      <Button
          v-if="authStore.user"
          @click="handleLogout"
          label="Logout"
          iconPos="right"
          severity="contrast"
        />
    </div>
  </header>

  <RouterView />
</template>
