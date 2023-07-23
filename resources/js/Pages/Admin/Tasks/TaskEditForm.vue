<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({
    task: {
        type: Array,
        required: true
    },
    task_form: {
        type: Array,
        required: true
    }
});

const task = usePage().props.task;
const task_form = usePage().props.task_form;

const form = useForm({
    title: task.title,
    description: task.description,
    difficulty: task.difficulty,
    fields: task_form.fields ? JSON.parse(task_form.fields) : []
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

                <div v-for="(item, index) of form.fields">
                    <div class="grid grid-cols-6 gap-1">
                        <InputLabel
                            :for="'question_' + index"
                            value="Вопрос"
                            class="col-span-2"
                        />

                        <InputLabel
                            :for="'answer_' + index"
                            value="Ответ"
                            class="col-span-2"
                        />

                        <InputLabel
                            :for="'checkcase_' + index"
                            value="Учитывать регистр"
                            class="text-center"
                        />
                    </div>
                    <div class="grid grid-cols-6 gap-1">
                        <TextInput
                            :id="'question_' + index"
                            type="text"
                            class="mt-1 col-span-2"
                            v-model="form.fields[index].question"
                            required
                        />

                        <TextInput
                            :id="'answer_' + index"
                            type="text"
                            class="mt-1 col-span-2"
                            v-model="form.fields[index].answer"
                            required
                        />

                        <Checkbox
                            :id="'checkcase_' + index"
                            v-model:checked="form.fields[index].checkcase"
                            class="m-auto p-3"
                        />

                        <PrimaryButton
                            type="button"
                            @click="form.fields.splice(index, 1)"
                            class="m-auto px-1 py-1"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </PrimaryButton>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton type="button" @click="form.fields.push({question: '', answer: '', checkcase: false})">Добавить строку</PrimaryButton>
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
