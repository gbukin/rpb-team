<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <AuthenticatedLayout>
        <section class="card p-5 bg-card mt-12 w-3/4 mx-auto">
            <header class="card-header mb-4 text-center">
                <h1 class="text-primary text-4xl font-bold">Меню</h1>
            </header>
            <section class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                <a :href="route('admin.users')" class="p-3 sm:p-4 md:p-5 hover:bg-gray-900 active:bg-slate-900 scale-75 hover:scale-100 md:scale-100 hover:md:scale-110 ease-in duration-200 border border-primary rounded text-secondary hover:text-primary m-1 sm:m-2 md:m-3">
                    <div class="border-bottom border-primary text-white md:text-lg text-center">
                        Пользователи
                    </div>
                    <div class="p-1 sm:p-2 md:p-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-16 h-16 md:w-20 md:h-20 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                    </div>
                </a>
                <a href="{{route('admin.events')}}" class="p-3 sm:p-4 md:p-5 hover:bg-gray-900 active:bg-slate-900 scale-75 hover:scale-100 md:scale-100 hover:md:scale-110 ease-in duration-200 border border-primary rounded text-secondary hover:text-primary m-1 sm:m-2 md:m-3">
                    <div class="border-bottom border-primary text-white md:text-lg text-center">
                        Мероприятия
                    </div>
                    <div class="p-1 sm:p-2 md:p-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-16 h-16 md:w-20 md:h-20 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                </a>
                <a :href="route('admin.tasks.index')" class="p-3 sm:p-4 md:p-5 hover:bg-gray-900 active:bg-slate-900 scale-75 hover:scale-100 md:scale-100 hover:md:scale-110 ease-in duration-200 border border-primary rounded text-secondary hover:text-primary m-1 sm:m-2 md:m-3">
                    <div class="border-bottom border-primary text-white md:text-lg text-center">
                        Задачи
                    </div>
                    <div class="p-1 sm:p-2 md:p-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-16 h-16 md:w-20 md:h-20 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                        </svg>
                    </div>
                </a>
                <a href="#" class="p-3 sm:p-4 md:p-5 hover:bg-gray-900 active:bg-slate-900 scale-75 hover:scale-100 md:scale-100 hover:md:scale-110 ease-in duration-200 border border-primary rounded text-secondary hover:text-primary m-1 sm:m-2 md:m-3">
                    <div class="border-bottom border-primary text-white md:text-lg text-center">
                        VM
                    </div>
                    <div class="p-1 sm:p-2 md:p-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-16 h-16 md:w-20 md:h-20 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                </a>
                <a href="#" class="p-3 sm:p-4 md:p-5 hover:bg-gray-900 active:bg-slate-900 scale-75 hover:scale-100 md:scale-100 hover:md:scale-110 ease-in duration-200 border border-primary rounded text-secondary hover:text-primary m-1 sm:m-2 md:m-3">
                    <div class="border-bottom border-primary text-white md:text-lg text-center">
                        Графики
                    </div>
                    <div class="p-1 sm:p-2 md:p-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-16 h-16 md:w-20 md:h-20 m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>
                    </div>
                </a>
            </section>
        </section>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
