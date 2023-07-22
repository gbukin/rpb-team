<script>
export default {
    data() {
        return {
            users: []
        }
    }
}
</script>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
</script>

<template>
    <AuthenticatedLayout>
        <MenuBreadcrumb/>
        <section class="card p-5 bg-card mt-12 w-3/4 mx-auto">
            <header class="card-header mb-4 text-center">
                <h1 class="text-primary text-4xl font-bold">Пользователи</h1>
            </header>
            <section class="grid grid-cols-1 gap-1">
                <article class="p-6 mb-6 text-base rounded-lg bg-gray-900 mr-3" v-for="user in $attrs.users">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-white">
                                <span v-if="!user.avatar" class="m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </span>
                                <span v-else>
                                    <img src="{{ user.avatar }}" alt="avatar" class="w-6 h-6" />
                                </span>
                                {{ user.name }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <time datetime="{{ user.created_at }}" title="{{ user.created_fdy }}">{{ user.created_dmy }}</time>
                            </p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 rounded-lg focus:ring-4 focus:outline-none  bg-gray-900 hover:bg-gray-700 focus:ring-gray-600"
                                type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1"
                             class="hidden z-10 w-36 rounded divide-y divide-gray-100 shadow bg-gray-700 divide-gray-600">
                            <ul class="py-1 text-sm text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-600 hover:text-white">
                                        Блокировать
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-600 hover:text-white">
                                        Удалить
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                </article>
            </section>
        </section>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
