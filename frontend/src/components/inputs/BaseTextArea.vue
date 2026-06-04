<script setup lang="ts">
const props = defineProps({
    modelValue: String,
    label: String,
    placeholder: String,
    rows: {
        type: String,
        default: "5"
    },
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
    <label v-if="label" class="base-input-label">{{ label }}</label>
    <textarea 
        class="base-input"
        :value="modelValue"
        :rows="rows"
        :placeholder="placeholder"
        @input="emit('update:modelValue', $event.target.value)" 
    ></textarea>
</template>