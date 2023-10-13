<script setup>
import AkanDatang from '@/Components/AkanDatang.vue';
import Layout from '@/Layouts/Layout.vue'
import { ArrowLongLeftIcon, VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon, StarIcon, LockClosedIcon } from '@heroicons/vue/24/solid'
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment'
import { reactive } from 'vue';
import PremiumBadge from '@/Components/PremiumBadge.vue';

const props = defineProps({
    course: {
        required: true,
        type: Object
    },
    urlPrevious: {
        required: false,
        type: String
    }
})

</script>

<template>
    <div>
        <Head title="Kursus Video" />
        <Layout>
            <section class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-24">
                <div class="grid mb-10">
                    <Link :href="urlPrevious" class="flex w-48 gap-2 text-xl dark:text-white items-center hover:dark:text-gray-400 hover:-translate-x-6 transition-all">
                        <ArrowLongLeftIcon class="h-8 w-8" />
                        <p>Belakang</p>
                    </Link>
                </div>
                <div class="grid md:grid-cols-2 gap-10">
                    <div>
                        <PremiumBadge v-if="course.data.premium" class="text-2xl"/>
                        <p class="text-lg font-medium text-cyan-600 dark:text-cyan-500">Pembangunan Aplikasi Mobile</p>
                        <h1 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-gray-200">
                            {{ course.data.title }}
                        </h1>
                        <div class="flex gap-5 dark:text-gray-300">
                            <div class="flex gap-1 items-center text-xs md:text-md">
                                <VideoCameraIcon class="h-6 w-6"/>
                                {{ course.data.lessons?.length || 0 }} pelajaran
                            </div>
                            <div v-if="course.data.lessons?.length" class="flex gap-1 items-center text-xs md:text-md">
                                <ClockIcon class="h-6 w-6"/>
                                1 Jam 15 Minit
                            </div>
                            <div v-if="course.data.published" class="flex gap-1 items-center text-xs md:text-md">
                                <CalendarIcon class="h-6 w-6"/>
                                {{ moment(course.data.published).format('MMMM YYYY') }}
                            </div>
                            <div class="flex gap-1 items-center text-xs md:text-md">
                                <template v-if="course.data.tags?.length > 0">
                                    <TagIcon class="h-6 w-6"/>
                                    {{ course.data.tags?.map(v => v.name)?.join(', ') }}
                                </template>
                            </div>
                        </div>
                        <div class="my-10 border-b border-gray-700"></div>
                        <div class="dark:text-white">
                            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight ">
                                Tentang Kursus Video
                            </h1>
                            <p>
                                {{ course.data.description }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <div v-if="course.data.medias?.length > 0">
                            <img alt="Thumbnail" fetchpriority="high" decoding="async" data-nimg="fill" class="h-96 w-full object-cover transition-all rounded-md" :src="course.data.medias[0]?.original_url" style="">
                        </div>
                        <div class="py-10">
                            <AkanDatang v-if="!course.data.published"></AkanDatang>
                            <template v-else>
                                <h3 class="mb-3 text-2xl font-bold text-gray-400 dark:text-gray-200">Pelajaran:</h3>
                                <div>
                                    <ol style>
                                        <li v-for="lesson, index in course.data.lessons" class="my-4">
                                            <Link :href="route('course.lesson.show', { slug: course.data.slug, id: lesson.id })" class="flex gap-5 items-center bg-gray-200 dark:bg-gray-700 px-6 py-5 rounded-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition-all">
                                                <div>
                                                    <div class="items-center flex justify-center dark bg-gray-500 dark:bg-gray-600 w-14 h-14 rounded-full text-2xl font-extrabold text-white">
                                                        <template v-if="index >= 3 && course.data.premium">
                                                            <LockClosedIcon class="w-5 h-5"/>
                                                        </template>
                                                        <template v-else>
                                                            {{ lesson.order }}
                                                        </template>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="font-bold text-xl mb-2 dark:text-gray-200">{{ lesson.title }}</h6>
                                                    <p class="dark:text-gray-300 line-clamp-2 leading-5 mb-2 text-md">{{ lesson.description }}</p>
                                                    <div class="flex text-xs dark:text-gray-300 items-center gap-2">
                                                        <div class="flex gap-1 items-center">
                                                            <ClockIcon class="h-3 w-3"/>
                                                            {{ lesson.video_length }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </Link>
                                        </li>
                                    </ol>
                                </div>
                            </template>
                        </div>
                        
                        
                    </div>
                </div>
            </section>
        </Layout>
    </div>
</template>