<script setup>
import { computed } from 'vue';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        required: true
    },
    tooltip: {
        type: String,
        required: true
    }
});

const classes = computed(() =>
    props.active
        ? `scale-110 text-primary mx-3 disabled pointer-events-none`
        : `hover:text-primary scale-100 hover:scale-125 ease-in duration-200 mx-3`
);

const disabled = computed(() =>
    props.active ? 'disabled' : ''
);
</script>

<template>
    <a :href="href"
       :class="classes"
       :data-tooltip-target="'tooltip-' + tooltip"
       data-tooltip-style="light"
    >
        <slot></slot>
    </a>
    <div :id="'tooltip-' + tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
        {{ tooltip }}
    </div>
</template>

<style scoped>

</style>
