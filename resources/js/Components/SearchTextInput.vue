<script setup>
defineProps({
    modelValue: {
        type: String,
        required: true,
    },
});

defineEmits(['update:modelValue']);
</script>

<template>
    <input
        class="border border-gray-300 dark:border-white dark:text-black focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
