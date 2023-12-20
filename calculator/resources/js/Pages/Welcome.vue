<script setup>
import fltLogo from '@/assets/FLT_logo.png';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<style scoped>
/* Define custom colors based on the image's color palette */
.primary-blue {
    --tw-bg-opacity: 1;
    background-color: rgba(0, 31, 63, var(--tw-bg-opacity)); /* Replace with the actual blue color from the image */
}

.text-primary {
    --tw-text-opacity: 1;
    color: rgba(255, 255, 255, var(--tw-text-opacity)); /* Replace with the actual text color from the image */
}

.text-green {
    --tw-text-opacity: 1;
    color: rgba(0, 255, 0, var(--tw-text-opacity)); /* Replace with the actual green color from the image */
}

/* Apply custom styles to elements */
.bg-primary-blue {
    background-color: var(--primary-blue);
}

.text-primary {
    color: var(--text-primary);
}

.text-green {
    color: var(--text-green);
}

/* Continue to add or override styles as needed */
</style>

<template>
    <Head title="Welcome" />

    <div class="flex relative flex-col min-h-screen bg-primary-blue sm:flex sm:justify-center sm:items-center selection:text-primary">
        <div v-if="canLogin" class="z-10 p-6 sm:fixed sm:top-0 sm:end-0 text-end text-primary">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold hover:text-primary focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profile</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold hover:text-primary focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="font-semibold ms-4 hover:text-primary focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>

        <div class="flex justify-center items-center min-h-screen bg-primary-blue text-primary">
        <div class="p-6 mx-auto max-w-7xl lg:p-8">
            <div class="flex justify-center">
                <img :src="fltLogo" alt="FLT Logo" class="w-auto h-40">
            </div>
        </div>
    </div>

            <div class="flex absolute inset-0 justify-center items-center">
                <div class="mt-auto text-sm text-center text-gray-500 ms-4 dark:text-gray-600">
                    Ignas Apsega @ 2023
                </div>
            </div>
        </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
