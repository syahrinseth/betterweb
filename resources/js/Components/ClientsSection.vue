<template>
    <div class="bg-white dark:bg-gray-800 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h2 class="text-center text-lg font-semibold leading-8 text-gray-900 dark:text-gray-200">Dipercayai oleh syarikat dan pasukan yang bekerjasama dengan kami</h2>
        <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            <template v-for="client in clients">
                <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" :src="client.src" alt="Sensor Malaysia" width="158" height="48" />
            </template>
        </div>
        </div>
    </div>
</template>
<script setup>
const clients = [
    {
        src: '/images/clients/61181f3c4f1f858715f815f15d820069.png' 
    },
    {
        src: '/images/clients/537f1db6d46a006c9411cf690e295678.png' 
    },
    {
        src: '/images/clients/GE_Power_logo.png' 
    },
    {
        src: '/images/clients/LOE-Logo.png' 
    },
];
</script>