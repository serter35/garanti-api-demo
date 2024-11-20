<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import MaskTextInput from "@/Components/MaskTextInput.vue";

const props = defineProps({
    order: {
        required: true,
        type: Object
    }
});

const form = useForm({
    CardHolderName: 'Test User',
    Number: '374427543211042',
    ExpireDate: '0427',
    CVV2: '454',
})

function onSubmit() {
    form.post(route('orders.payments.store', {order: props.order.uuid}), {

    })
}

</script>

<template>
    <GuestLayout>
        <Head title="Payment Create" />

        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Sipariş Ödeme
            </h2>

            <p class="mt-1 text-sm text-gray-600" v-if="order">
                <b>{{order.amount}} TL</b> tutarlı siparişiniz için aşağıdaki ödeme işlemini tamamlayınız.
            </p>
        </header>

        <form @submit.prevent="onSubmit" class="space-y-4 mt-8">
            <div>
                <InputLabel for="CardHolderName" value="Kart Sahibi Adı Soyadı" />

                <TextInput
                    id="Number"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.CardHolderName"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.CardHolderName" />
            </div>

            <div>
                <InputLabel for="Number" value="Kart Numarası" />

                <MaskTextInput
                    mask="#### #### #### ####"
                    id="Number"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Number"
                    required
                />

                <InputError class="mt-2" :message="form.errors.Number" />
            </div>

            <div>
                <InputLabel for="ExpireDate" value="ExpireDate" />

                <MaskTextInput
                    mask="##/##"
                    id="ExpireMonth"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.ExpireDate"
                    required
                />

                <InputError class="mt-2" :message="form.errors.ExpireDate" />
            </div>

            <div>
                <InputLabel for="CVV2" value="CVV2" />

                <MaskTextInput
                    mask="####"
                    id="CVV2"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.CVV2"
                    required
                />

                <InputError class="mt-2" :message="form.errors.CVV2" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Ödeme Yap</PrimaryButton>

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
                        Ödeme Yapıldı.
                    </p>
                </Transition>
            </div>
        </form>
    </GuestLayout>
</template>

<style scoped>

</style>
