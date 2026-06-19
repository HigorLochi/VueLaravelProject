<script setup lang="ts">
  import { onMounted } from 'vue'
  import { useRouter, RouterLink, RouterView } from 'vue-router'
  import { useAuthStore } from '@/stores/authStore'
  import Alert from '@/services/alert'
  import { menuItems } from '@/variables/menuItems'

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
    <Menubar v-if="authStore.user" :model="menuItems" style="border-radius: 0px;">
      <template #item="{ item, props, hasSubmenu }"> 
        <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom> 
          <a v-ripple :href="href" v-bind="props.action" @click="navigate"> 
            <span :class="item.icon" /> <span>{{ item.label }}</span> 
          </a> 
        </router-link> 
        <a v-else v-ripple :href="item.url" :target="item.target" v-bind="props.action"> 
          <span :class="item.icon" /> <span>{{ item.label }}</span> 
          <span v-if="hasSubmenu" class="pi pi-fw pi-angle-down" /> 
        </a> 
      </template>
      <template #end>
        <Button
          label="Logout"
          icon="pi pi-sign-out"
          severity="contrast"
          @click="handleLogout"
        />
      </template>
    </Menubar>
  </header>

  <RouterView />
</template>
