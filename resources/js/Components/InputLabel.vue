<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block font-medium text-sm text-card-gray">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
