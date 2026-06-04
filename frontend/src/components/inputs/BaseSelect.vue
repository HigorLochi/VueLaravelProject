<script setup lang="ts">
const props = defineProps({
    modelValue: String,
    label: String,
    placeholder: String,
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
    <label v-if="label" class="base-input-label">{{ label }}</label>
    <select 
        class="base-input"
        :value="modelValue"
        :placeholder="placeholder"
        @input="emit('update:modelValue', $event.target.value)" 
    >
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
    </select>
</template>