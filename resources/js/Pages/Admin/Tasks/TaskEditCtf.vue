<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm, usePage} from "@inertiajs/vue3";

const props = defineProps({
    task: {
        type: Array,
        required: true
    },
    task_ctf: {
        type: Array,
        required: true
    }
});

const task = usePage().props.task;
const task_ctf = usePage().props.task_ctf;

const form = useForm({
    title: task.title,
    description: task.description,
    difficulty: task.difficulty,
    flag: task_ctf.flag,

});
</script>

<template>
    <AuthenticatedLayout>
        <MenuBreadcrumb/>
        <section class="card p-5 bg-card mt-12 w-3/4 mx-auto">
            <header class="card-header mb-4 text-center">
                <h1 class="text-primary text-4xl font-bold">Редактирование</h1>
            </header>
            <form @submit.prevent="form.patch(route('admin.tasks.update', [task.id]))" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="title" value="Название"/>

                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.title"/>
                </div>

                <div>
                    <InputLabel for="description" value="Описание"/>

                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.description"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.description"/>
                </div>

                <div>
                    <InputLabel for="difficulty" value="Сложность"/>

                    <TextInput
                        id="difficulty"
                        type="number"
                        min="1"
                        max="10"
                        class="mt-1 block w-full"
                        v-model="form.difficulty"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.difficulty"/>
                </div>

                <div>
                    <InputLabel for="flag" value="Флаг"/>

                    <TextInput
                        id="flag"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.flag"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.flag"/>
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Сохранить</PrimaryButton>

                    <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                        <p v-if="form.recentlySuccessful" class="text-sm text-primary">Сохранено</p>
                    </Transition>
                </div>
            </form>
        </section>
    </AuthenticatedLayout>
</template>

<style scoped>
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    display: none;
}
</style>
