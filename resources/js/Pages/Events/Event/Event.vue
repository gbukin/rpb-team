<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <Head title="Мероприятие"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Мероприятие</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white border border-gray-200 dark:border-white dark:bg-gray-800 dark:text-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-white text-lg font-bold text-center">{{$page.props.event.name}} | {{$page.props.event.description}}</div>
                    <hr>
                    <div class="p-4 text-gray-800 dark:text-white flex flex-row justify-around my-3">
                        <div class="flex flex-col">
                            <div class="flex flex-row my-3">
                                <span class="font-bold mr-1">Дата начала: </span>
                                <span>{{$page.props.event.event_start}}</span>
                            </div>
                            <div class="flex flex-row">
                                <span class="font-bold mr-1">Дата окончания: </span>
                                <span>{{$page.props.event.event_end}}</span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex flex-row my-3">
                                <span class="font-bold mr-1">Тип участия: </span>
                                <span v-if="$page.props.event.participation_type = 0">
                                    Одиночный
                                </span>
                                <span v-else>
                                    Командный
                                </span>
                            </div>
                            <div class="flex flex-row">
                                <span class="font-bold mr-1">Этап:</span>
                                <span>{{$page.props.event.stage}}</span>
                            </div>
                        </div>
                    </div>

                    <primary-button class="mt-4 text-center float-right dark:bg-white dark:text-black m-4">Принять участие</primary-button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
