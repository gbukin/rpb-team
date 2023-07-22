<script>
export default {
    data() {
        return {
            showOptions: false,
            __inputValue: '',
        }
    }
}
</script>

<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    options: {
        type: Object,
        required: true,
    }
});

defineEmits(['update:modelValue', 'update:$data.__inputValue']);

const input = ref(null);
const __input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div class="hover:block relative" v-if="options">
        <input class="hidden"
               :value="modelValue"
               ref="input"/>

        <input class="block cursor-pointer border-card-border bg-main text-card-gray focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
               @click="showOptions = true"
               @focus="showOptions = true"
               @blur="showOptions = false"
               :value="$data.__inputValue"
               ref="__input"/>

        <div class="absolute z-10 border-card-border bg-main text-card-gray focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
             v-show="showOptions">
            <div
                class="z-10 no-underline block cursor-pointer p-2 rounded-md text-base hover:text-primary hover:bg-gray-700 hover:ring-indigo-600"
                @mousedown="$emit('update:modelValue', key); $data.__inputValue = value; showOptions = false"
                v-for="(value, key) of options"
                :key="key">
                {{ value || key || '-' }}
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
