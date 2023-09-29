<script setup>
import { Link } from '@inertiajs/vue3';

</script>
<template>
    <div class="col-span-2 md:space-y-0 text-center">
        <div class="">
            <h2 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">Akan Datang</h2>
            <p v-if="!$page.props.auth?.user" class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                Kursus ini dalam pembangunan dan di sediakan untuk ahli premium. Daftar sekarang untuk mendapatkan notifikasi apabila kursus ini di lancarkan.
            </p>
            <p v-else class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                Awak telah daftar, kami akan hantar notifikasi ke email awak apabila kursus video ini di lancarkan.
            </p>
            <Link v-show="!$page.props.auth?.user" :href="route('register')" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800">Daftar Sekarang</Link>
        </div>
    </div>
</template>