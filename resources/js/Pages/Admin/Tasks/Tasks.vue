<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Select from "@/Components/Select.vue";

const props = defineProps({
    tasks: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <AuthenticatedLayout>
        <MenuBreadcrumb/>
        <section class="card p-5 bg-card mt-12 w-3/4 mx-auto">
            <header class="card-header mb-4 text-center">
                <h1 class="text-primary text-4xl font-bold">Задачи</h1>
            </header>
            <section class="grid grid-cols-1 gap-1">
                <article class="grid grid-cols-3 gap-1 mb-6 w-1/2">
                    <a :href="route('admin.tasks.create')" class="mx-2">
                        <primary-button>Новая задача</primary-button>
                    </a>
                    <Dropdown align="left">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <primary-button type="button">
                                    Категории
                                    <svg
                                        class="ml-2 -mr-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </primary-button>
                            </span>
                        </template>
                        <template #content>
                            <DropdownLink :href="route('admin.tasks.categories.index')">Список</DropdownLink>
                            <DropdownLink :href="route('admin.tasks.categories.create')">Новая категория</DropdownLink>
                        </template>
                    </Dropdown>
                    <Dropdown align="left">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <primary-button type="button">
                                    Типы
                                    <svg
                                        class="ml-2 -mr-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </primary-button>
                            </span>
                        </template>
                        <template #content>
                            <DropdownLink :href="route('admin.tasks.types.index')">Список</DropdownLink>
                            <DropdownLink :href="route('admin.tasks.types.create')">Новый тип</DropdownLink>
                        </template>
                    </Dropdown>
                </article>
                <article class="p-6 mb-6 text-base rounded-lg bg-gray-900 mr-3" v-for="task in $page.props.tasks">
                    <p class="text-primary text-center text-lg mb-3">{{ task.title }}</p>
                    <div class="grid grid-cols-2 w-3/4 text-gray-400">
                        <div>
                            <span class="text-primary mr-2">Сложность:</span>{{ task.difficulty }}
                        </div>
                    </div>
                    <hr>
                    <p class="text-gray-500 my-2">{{ task.description }}</p>
                    <hr>
                    <div class="mt-4">
                        <a :href="route('admin.tasks.edit', [task.id])">
                            <primary-button :class="'mr-2'">Редактировать</primary-button>
                        </a>
                        <a :href="route('admin.tasks.delete', [task.id])" v-if="task.deleted_at">
                            <primary-button>Удалить</primary-button>
                        </a>
                        <a :href="route('admin.tasks.archive', [task.id])" v-else>
                            <primary-button>Архив</primary-button>
                        </a>
                    </div>
                </article>
            </section>
        </section>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
