<script setup>
import {Head} from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>

<template>
    <Head title="Мероприятия" />

    <GuestLayout v-if="!$page.props.auth.user">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-card border border-card-border overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg text-primary p-4">
                        Тут будет гостевой контент
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>

    <AuthenticatedLayout v-else>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-card border border-card-border overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg text-primary p-4">
                        Тут будет ауфный контент
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
