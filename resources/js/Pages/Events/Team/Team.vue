<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import DangerButton from "@/Components/DangerButton.vue";
</script>

<template>
    <Head title="Команда"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Команда</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white border border-gray-200 dark:border-white dark:bg-gray-800 dark:text-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-white text-lg font-bold text-center">{{$page.props.team.name}} | {{$page.props.team.created_at}}</div>
                    <hr>
                    <danger-button class="mt-4 text-center float-right dark:bg-white dark:text-black m-4">Покинуть</danger-button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
