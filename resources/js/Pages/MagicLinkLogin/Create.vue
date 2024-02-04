<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage, router } from '@inertiajs/vue3';

const page = usePage();

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    remember: true,
    callback_url: (new URLSearchParams(window.location.search))?.get('callback_url')
});

const submit = () => {
    if (route().current('kelas.*')) {
        form.post(route('kelas.login'), {
            onFinish: () => form.reset('email'),
        });
    } else {
        form.post(route('login'), {
            onFinish: () => form.reset('email'),
        });
    }
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <template v-if="!form.wasSuccessful">
            <form @submit.prevent="submit">
                <div class="mt-2">
                    <InputLabel for="email" value="Emel" />

                    <TextInput
                        id="email"
                        type="email"
                        placeholder="Cth: ahmad@gmail.com"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                
                <div class="flex items-center justify-end mt-4">

                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Daftar / Log Masuk
                    </PrimaryButton>
                </div>
            </form>
        </template>
        <template v-else>
            <p class="dark:text-gray-300 text-lg">Sila klik pautan yang dihantar ke emel anda untuk menyelesaikan pendaftaran / log masuk.</p>
        </template>
        
    </GuestLayout>
</template>
