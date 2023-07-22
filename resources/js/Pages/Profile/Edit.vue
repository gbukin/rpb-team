<script>
import {usePage} from "@inertiajs/vue3";

export default {
    methods: {
        copyShareLink() {
            navigator.clipboard.writeText(route('profile.show', [usePage().props.auth.user.name]));
        }
    }
}
</script>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Профиль</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-card border-card-border shadow sm:rounded-lg">
                    <div class="flex md:flex-row md:justify-content-between flex-col">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl w-1/2"
                        />

                        <section class="max-w-xl md:ml-12 md:mt-0 mt-12">
                            <header>
                                <h2 class="text-lg font-medium text-primary">Социальные сети</h2>

                                <p class="mt-1 text-sm text-card-gray">Twitter</p>
                                <p class="mt-1 text-sm text-card-gray">VK</p>
                                <p class="mt-1 text-sm text-card-gray">Discord</p>
                            </header>

                            <div class="flex items-center gap-4 md:mt-[100%]">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md bg-primary hover:bg-secondary font-semibold text-xs text-nav hover:text-black uppercase tracking-widest transition ease-in-out duration-150 mt-6 md:mt-0"
                                        data-popover-target="share-button-click"
                                        data-popover-trigger="click"
                                        type="button"
                                        @click="copyShareLink"
                                >
                                    Поделиться
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-main inline">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                    </svg>
                                </button>
                                <div data-popover id="share-button-click" role="tooltip" class="absolute z-10 visible inline-block text-sm text-gray-500 transition-opacity duration-150 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                    <div class="px-3 py-2">
                                        <p>Скопировано в буфер обмена</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-card border-card-border shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-card border-card-border shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
