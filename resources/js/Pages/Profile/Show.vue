<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

defineProps({
    profile: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Profile"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Профиль пользователя
                {{ $page.props.profile.name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-card border-card-border shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-primary">
                                Профиль игрока
                                <span class="text-card-gray">
                                    {{ $page.props.profile.name }}
                                </span>
                            </h2>

                            <p class="mt-1 text-sm text-card-gray">
                                Общая информация
                            </p>
                        </header>

                        <div class="mt-6 space-y-6">
                            <div>
                                <label class="text-primary w-auto">Имя пользователя:</label>
                                <p class="border-card-border bg-main text-card-gray focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                   type="text">
                                    {{ $page.props.profile.name }}
                                </p>
                            </div>
                            <div>
                                <label class="text-primary w-auto">Email пользователя:</label>
                                <p class="border-card-border bg-main text-card-gray focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                   type="text">
                                    {{ $page.props.profile.email }}
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
