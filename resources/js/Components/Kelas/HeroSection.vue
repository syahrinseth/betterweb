<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <section class="bg-white dark:bg-gray-900">
        <div class="relative isolate px-6 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56"> 
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 dark:text-gray-200 ring-1 ring-gray-900/10 dark:ring-gray-200/10 hover:ring-gray-900/20 dark:hover:ring-gray-200/20">
                        Terokai kursus video kami di <Link :href="route('kelas.course.index')" class="font-semibold text-cyan-600"><span class="absolute inset-0" aria-hidden="true" />sini <span aria-hidden="true">&rarr;</span></Link>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-6xl">Kuasai Pembangunan Aplikasi dengan Kursus Video Kami</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Direka khas untuk pelajar dan junior developer, kursus kami akan melengkapkan anda dengan kemahiran yang diperlukan untuk mencipta aplikasi anda sendiri atau memulakan kerjaya sebagai software developer.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <Link v-if="$page.props.auth.user == null" :href="route('kelas.register')" class="rounded-md bg-cyan-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Daftar Sekarang</Link>
                        <a :href="route('kelas.course.index')" class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-200">Kursus video kami <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </section>
</template>