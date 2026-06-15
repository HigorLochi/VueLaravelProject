<script setup lang="ts">
const props = defineProps({
    type: {
        type: String,
        default: 'text'
    },
    autocomplete: {
        type: String,
        default: "off"
    },
    label: String,
    placeholder: String,
    
})

const model = defineModel<any>()

const emit = defineEmits(['update:modelValue'])
</script>

<template>
    <label v-if="label" class="base-input-label">{{ label }}</label>
    <input 
        v-model="model"
        class="base-input"
        :type="type"
        :value="modelValue"
        :placeholder="placeholder"
        :autocomplete="autocomplete"
    ></input>
</template>