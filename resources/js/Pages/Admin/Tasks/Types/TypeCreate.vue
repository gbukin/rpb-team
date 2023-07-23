<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MenuBreadcrumb from "@/Components/Admin/MenuBreadcrumb.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Select from "@/Components/Select.vue";
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    type: null,
    type_name: null
});

</script>

<template>
    <AuthenticatedLayout>
        <MenuBreadcrumb/>
        <section class="card p-5 bg-card mt-12 w-3/4 mx-auto">
            <header class="card-header mb-4 text-center">
                <h1 class="text-primary text-4xl font-bold">Новый тип</h1>
            </header>
            <form @submit.prevent="form.post(route('admin.tasks.types.store'))" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="type" value="Тип задачи"/>

                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.type"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.type"/>
                </div>

                <div>
                    <InputLabel for="type_name" value="Название типа задачи (на русском)"/>

                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.type_name"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.type_name"/>
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
</style>
