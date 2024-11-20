<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const props = defineProps([
    'terminal',
    'auth'
]);

const is_admin = computed(() => usePage().props.auth.user.is_admin)

const form = useForm({
    merchant_id: props.terminal.merchant_id,
    provision_user_id: props.terminal.provision_user_id,
    provision_user_password: '',
    terminal_id: String(props.terminal.terminal_id),
    store_key: props.terminal.store_key
})
function onSubmit() {
    form.put(route('terminals.update', {terminal: props.terminal}))
}
</script>

<template>
    <Head title="Terminal Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Sanal POS Terminal Ayarları
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6"
                >
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Garanti POS Ayarları
                        </h2>

                        <p class="mt-1 text-sm text-gray-600" v-if="is_admin">
                            Sanal POS ayarlarını güncelleyebilirsiniz.
                        </p>
                        <p class="mt-1 text-sm text-gray-600" v-else>
                            Sanal POS ayarlarını görüntüleyebilirsiniz.
                        </p>
                    </header>

                    <form @submit.prevent="onSubmit" class="space-y-4 mt-8">
                        <div>
                            <InputLabel for="merchant_id" value="Mağaza Numarası" />

                            <TextInput
                                id="merchant_id"
                                type="text"
                                class="mt-1 block w-2/4"
                                v-model="form.merchant_id"
                                required
                                autofocus
                                :disabled="!is_admin"
                            />

                            <InputError class="mt-2" :message="form.errors.merchant_id" />
                        </div>

                        <div>
                            <InputLabel for="provision_user_id" value="Provizyon Kullanıcı Numarası" />

                            <TextInput
                                id="provision_user_id"
                                type="text"
                                class="mt-1 block w-2/4"
                                v-model="form.provision_user_id"
                                required
                                :disabled="!is_admin"
                            />

                            <InputError class="mt-2" :message="form.errors.provision_user_id" />
                        </div>

                        <div>
                            <InputLabel for="provision_user_password" value="Provizyon Kullanıcı Parolası" />

                            <TextInput
                                id="provision_user_password"
                                type="password"
                                class="mt-1 block w-2/4"
                                v-model="form.provision_user_password"
                                :disabled="!is_admin"
                            />

                            <InputError class="mt-2" :message="form.errors.provision_user_password" />
                        </div>

                        <div>
                            <InputLabel for="terminal_id" value="Terminal Numarası" />

                            <TextInput
                                id="terminal_id"
                                type="text"
                                class="mt-1 block w-2/4"
                                v-model="form.terminal_id"
                                required
                                :disabled="!is_admin"
                            />

                            <InputError class="mt-2" :message="form.errors.terminal_id" />
                        </div>

                        <div>
                            <InputLabel for="store_key" value="Store Key" />

                            <TextInput
                                id="store_key"
                                type="text"
                                class="mt-1 block w-2/4"
                                v-model="form.store_key"
                                required
                                :disabled="!is_admin"
                            />

                            <InputError class="mt-2" :message="form.errors.store_key" />
                        </div>

                        <div class="flex items-center gap-4" v-if="is_admin">
                            <PrimaryButton :disabled="form.processing">Güncelle</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                                <p
                                    v-if="form.recentlySuccessful"
                                    class="text-sm text-gray-600"
                                >
                                    Güncellendi.
                                </p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
