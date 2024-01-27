<script setup>
import AkanDatang from '@/Components/AkanDatang.vue';
import { ArrowLongLeftIcon, VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon } from '@heroicons/vue/24/solid'
import { Head, Link } from '@inertiajs/vue3';
import VideoCourseCard from '@/Components/VideoCourseCard.vue';
import KelasLayout from '@/Layouts/KelasLayout.vue';

const props = defineProps({
    courses: {
        required: true,
        type: Array
    }
});
</script>

<template>
    <div>
        <Head title="Kursus Video" />
        <KelasLayout>
            <template #header>
                <h2 class="font-extrabold text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center">Kursus Video</h2>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400 text-center">
                    Kursus video bersiris tentang pembelajaran koding dan pembangunan aplikasi software
                </p>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-4">
                    <section id="kursus-video" class="bg-gray-50 dark:bg-gray-800">
                        <div class="max-w-screen-xl mx-auto">
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-10">
                                <div v-for="course in courses.data" class="group col-span-1 h-full">
                                    <VideoCourseCard :course="course"></VideoCourseCard>
                                </div>
                                <!-- <template v-for="post in courses.data">
                                    <div class="group cursor-pointer">
                                        <div class="overflow-hidden rounded-md bg-gray-100 transition-all hover:scale-105 dark:bg-gray-800">
                                            <Link class="" :href="route('kelas.course.show', { slug: '1' })">
                                                <img alt="Thumbnail" fetchpriority="high" decoding="async" data-nimg="fill" class="object-cover transition-all rounded-md" src="https://www.techrepublic.com/wp-content/uploads/2022/08/learn-coding-automation-just.jpeg" style="">
                                            </Link>
                                        </div>
                                        <div class="">
                                            <div>
                                                <div class="flex gap-3">
                                                    <a href="/category/technology">
                                                        <span class="inline-block text-xs font-medium tracking-wider uppercase mt-5 text-cyan-600">Technology</span>
                                                    </a>
                                                </div>
                                                <h2 class="text-lg font-semibold leading-snug tracking-tight mt-2 dark:text-white">
                                                    <Link class="" :href="route('kelas.course.show', { slug: '1' })">
                                                        <span class="bg-gradient-to-r from-cyan-200 to-cyan-100 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 group-hover:bg-[length:100%_50%] dark:from-cyan-800 dark:to-cyan-900">Architectural Engineering Wonders of the modern era for your Inspiration</span>
                                                    </Link>
                                                </h2>
                                                <div class="hidden">
                                                    <p class="mt-2 line-clamp-3 text-sm text-gray-500 dark:text-gray-400">
                                                        <Link class="" :href="route('kelas.course.show', { slug: '1' })">Reinvention often comes in spurts, after a long period of silence. Just as modern architecture recently enjoyed a comeback, brand architecture, a field with well-established principles for decades</Link>
                                                    </p>
                                                </div>
                                                <div class="mt-3 flex items-center space-x-3 text-gray-500 dark:text-gray-400">
                                                    <a href="/author/mario-sanchez">
                                                        <div class="flex items-center gap-3">
                                                            <img class="w-6 h-6 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">
                                                            <span class="truncate text-sm">Syahrin Seth</span>
                                                        </div>
                                                    </a>
                                                    <span class="text-xs text-gray-300 dark:text-gray-600">•</span>
                                                    <time class="truncate text-sm" datetime="2022-10-21T15:48:00.000Z">October 21, 2022</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template> -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </KelasLayout>
    </div>
</template>