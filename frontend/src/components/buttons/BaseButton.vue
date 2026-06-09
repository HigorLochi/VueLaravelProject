<script setup lang="ts">
defineProps({
    text: String,
    to: String,
    role: {
        type: String,
        default: 'default'
    },
    direction: {
        type: String,
        default: 'default'
    }
})
const emit = defineEmits<{
    click: []
}>()

function handleClick() {
    emit('click')
}
</script>

<template>
    <RouterLink v-if="to" :to="to">
        <button :class="['base-button', `base-button-${role}`, `base-button-${direction}`]">{{ text }}</button>
    </RouterLink>
    <button v-else @click="handleClick" :class="['base-button', `base-button-${role}`, `base-button-${direction}`]" type="submit" >
        {{ text }}
    </button>
</template>