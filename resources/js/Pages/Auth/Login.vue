<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="w-full max-w-sm">
            <div class="mb-6">
                <InputLabel for="email" value="Email" class="block text-gray-700 text-sm font-bold mb-2" />

                <TextInput
                    id="email"
                    type="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mb-6">
                <InputLabel for="password" value="Password" class="block text-gray-700 text-sm font-bold mb-2" />

                <TextInput
                    id="password"
                    type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mb-6">
                <label class="flex items-center text-sm text-gray-700">
                    <Checkbox name="remember" v-model:checked="form.remember" class="form-checkbox h-4 w-4 text-green-600" />
                    <span class="ms-2">Recordad Contraseña</span>
                </label>
            </div>

            <div class="flex items-center justify-between">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-sm text-gray-600 hover:text-gray-900"
                >
                    Olvidaste tu contraseña?
                </Link>

                <PrimaryButton class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Incia Sesión
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
