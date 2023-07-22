<script setup>
import {Head} from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import Table from "@/Components/Table.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>

<template>
    <Head title="Мероприятия" />

    <component :is="$page.props.auth.user ? AuthenticatedLayout : GuestLayout">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-card border border-card-border overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <Table :url="route('api.events')" :element-url="'event'" />
                    </div>
                </div>
            </div>
        </div>
    </component>
</template>
