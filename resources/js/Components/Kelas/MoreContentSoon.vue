<script setup>
import { EllipsisHorizontalIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="col-span-2 md:space-y-0 text-center">
        <div class="flex items-center justify-center">
            <!-- Your icon goes here -->
            <EllipsisHorizontalIcon class="w-40 h-20 text-gray-900 dark:text-gray-300"/>
        </div>
        <div class="">
            <h2 class="mb-2 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">Lebih banyak lagi akan datang...</h2>
            <p class="mb-4 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                Lebih banyak lagi pelajaran akan di masukkan di sini. Kami akan hantar notifikasi ke email anda apabila terdapat pelajaran baru di sini.
            </p>
            <Link v-show="!$page.props.auth?.user" :href="route('register')" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800">Daftar Sekarang</Link>
        </div>
    </div>
</template>