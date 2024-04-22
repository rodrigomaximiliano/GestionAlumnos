<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col justify-center items-center">
        <!-- Div para el logo -->
        <div>
            <Link href="/">
                <img src="/img/logoHeader-green.png" alt="Nuevo Logo" class="w-30 h-30">
            </Link>
        </div>
        
        <!-- Texto de bienvenida -->
        <div class="text-center mt-4">
            <h1 class="text-4xl font-bold text-white mb-8">¡Bienvenido al alumnado de Talentos Digitales!</h1>
            <div class="space-x-4">
                <template v-if="canLogin">
                    <Link
                        :href="route('login')"
                        class="btn-primary"
                    >Iniciar sesión</Link>
                </template>
                <template v-if="canRegister">
                    <Link
                        :href="route('register')"
                        class="btn-secondary"
                    >Registrarse</Link>
                </template>
            </div>
        </div>
    </div>
</template>

<style>
.btn-primary {
    display: inline-block;
    padding: 0.75rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    color: #fff;
    background-color: #4CAF50;
    border: 2px solid #4CAF50;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-primary:hover {
    background-color: #45a049;
    border-color: #45a049;
}

.btn-secondary {
    display: inline-block;
    padding: 0.75rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    color: #4CAF50;
    background-color: #fff;
    border: 2px solid #4CAF50;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-secondary:hover {
    color: #fff;
    background-color: #4CAF50;
}
</style>
