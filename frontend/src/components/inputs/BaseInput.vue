<script setup lang="ts">
const props = defineProps({
    modelValue: String,
    type: {
        type: String,
        default: 'text'
    },
    label: String,
    placeholder: String,
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
    <label v-if="label" class="base-input-label">{{ label }}</label>
    <input 
        class="base-input"
        :type="type"
        :value="modelValue"
        :placeholder="placeholder"
        @input="emit('update:modelValue', $event.target.value)" 
    ></input>
</template>