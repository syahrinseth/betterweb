<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue'
import { ArrowLongLeftIcon, VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon } from '@heroicons/vue/24/solid'
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
        <Head title="Kursus Video" />
        <PublicLayout>
            <section class="bg-white dark:text-white dark:bg-gray-900 max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-28">
                <div class="grid mb-10">
                    <Link :href="route('/')" class="flex w-48 gap-2 text-xl dark:text-white items-center hover:dark:text-gray-400 hover:-translate-x-6 transition-all">
                        <ArrowLongLeftIcon class="h-8 w-8" />
                        <p>Laman Utama</p>
                    </Link>
                </div>
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <h1 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">
                            Pembangunan Aplikasi Mobile Dengan Flutter Untuk Pemula
                        </h1>
                        <div class="flex gap-5 dark:text-gray-300">
                            <div class="flex gap-1 items-center">
                                <VideoCameraIcon class="h-6 w-6"/>
                                16 pelajaran
                            </div>
                            <div class="flex gap-1 items-center">
                                <ClockIcon class="h-6 w-6"/>
                                1 Jam 15 Minit
                            </div>
                            <div class="flex gap-1 items-center">
                                <CalendarIcon class="h-6 w-6"/>
                                Akan datang
                            </div>
                            <div class="flex gap-1 items-center">
                                <TagIcon class="h-6 w-6"/>
                                Flutter 3
                            </div>
                        </div>
                        <div class="my-10 border-b border-gray-700"></div>
                        <div class="dark:text-white">
                            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight ">
                                Tentang Kursus Video
                            </h1>
                            <p>Kursus ini mengandungi beberapa bahagian seperti berikut:</p>

                        </div>
                    </div>
                    <div>
                        <div>
                            <img alt="Thumbnail" fetchpriority="high" decoding="async" data-nimg="fill" class="h-72 w-full object-cover transition-all rounded-md mb-5" src="https://www.techrepublic.com/wp-content/uploads/2022/08/learn-coding-automation-just.jpeg" style="">
                        </div>
                        <div>
                            <div>
                                <h3 class="mb-2 dark:text-gray-300">Bahagian 1: Pengenalan Kepada Pembangunan Dengan Flutter</h3>
                                <div>
                                    <ol style>
                                        <li class="my-2">
                                            <Link href="#" class="flex gap-5 items-center bg-gray-800 px-6 py-5 rounded-xl hover:bg-gray-700 hover:scale-105 transition-all">
                                                <div>
                                                    <div class="items-center flex justify-center bg-gray-600 w-14 h-14 rounded-full text-2xl font-extrabold">
                                                        01
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="font-bold text-xl mb-2">Kenapa Flutter?</h6>
                                                    <p class="text-gray-300 line-clamp-2 leading-5 mb-2 text-md">Memahami sebab-sebab untuk mengunakan flutter untuk pembangunan aplikasi mudah alih.</p>
                                                    <div class="flex text-xs text-gray-300 items-center gap-2">
                                                        <div class="uppercase">Pelajaran 1</div>
                                                        <div class="flex gap-1 items-center">
                                                            <ClockIcon class="h-3 w-3"/>
                                                            1 Minit
                                                        </div>
                                                    </div>
                                                </div>
                                            </Link>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </PublicLayout>
    </div>
</template>