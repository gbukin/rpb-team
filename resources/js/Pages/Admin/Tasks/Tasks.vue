<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

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
                <article class="text-right mb-6 mr-3">
                    <a :href="route('admin.tasks.create')">
                        <primary-button>Создать</primary-button>
                    </a>
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
