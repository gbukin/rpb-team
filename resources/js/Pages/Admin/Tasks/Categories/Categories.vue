<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Link} from "@inertiajs/vue3";

defineProps({categories: {type: Array, required: true}});

</script>

<template>
    <AuthenticatedLayout>
        <MenuBreadcrumb/>
        <section class="card p-5 bg-card mt-12 w-3/4 mx-auto">
            <header class="card-header mb-4 text-center">
                <h1 class="text-primary text-4xl font-bold">Категории задач</h1>
            </header>
            <section class="grid grid-cols-1 gap-1">
                <a :href="route('admin.tasks.categories.create')" class="block mb-5 text-center">
                    <primary-button>Новая категория</primary-button>
                </a>
                <article class="card bg-card grid grid-cols-1 gap-y-4 sm:grid-cols-3 sm:gap-x-5 sm:gap-y-5 md:grid-cols-4 md:gap-x-8 md:gap-y-3 lg:grid-cols-5 lg:gap-x-12 lg:gap-y-6">
                    <div v-for="category of $props.categories"
                         class="bg-gray-800 rounded border border-indigo-600 px-0">
                        <h1 class="text-center text-base md:text-xl text-white py-2 md:py-4">{{ category.category }}</h1>
                        <div class="grid grid-cols-2 gap-x-1 my-2 md:my-3">
                            <a :href="route('admin.tasks.categories.edit', category.id)"
                               class="mx-auto text-yellow-300 scale-100 hover:scale-110 ease-in duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                </svg>
                            </a>
                            <Link
                                :href="route('admin.tasks.categories.delete', category.id)"
                                method="post"
                                as="button"
                                class="mx-auto text-red-700 scale-100 hover:scale-110 ease-in duration-200"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </Link>
                        </div>
                    </div>
                </article>
            </section>
        </section>
    </AuthenticatedLayout>
</template>

<style scoped>
</style>
