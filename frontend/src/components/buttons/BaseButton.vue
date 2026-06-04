<script setup lang="ts">
defineProps({
    text: String,
    to: String,
    role: {
        type: String,
        default: 'default'
    }
})
</script>

<template>
    <RouterLink v-if="to" :to="to">
        <button :class="['base-button', `base-button-${role}`]">{{ text }}</button>
    </RouterLink>
    <button v-else :class="['base-button', `base-button-${role}`]">{{ text }}</button>
</template>