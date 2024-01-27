<script setup>
import AkanDatang from '@/Components/AkanDatang.vue';
import KelasLayout from '@/Layouts/KelasLayout.vue'
import { ArrowLongLeftIcon, VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon, StarIcon, LockClosedIcon } from '@heroicons/vue/24/solid'
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment'
import LessonCard from '@/Components/LessonCard.vue'
import PremiumBadge from '@/Components/PremiumBadge.vue';
import VideoScreen from '@/Components/VideoScreen.vue'
import Border from '@/Components/Border.vue'

const props = defineProps({
    course: {
        required: true,
        type: Object
    },
    lesson: {
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
        <Head title="Pelajaran" />
        <KelasLayout>
            <section class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-24">
                <div class="grid mb-6">
                    <Link :href="urlPrevious" class="flex w-48 gap-2 text-xl dark:text-white items-center hover:dark:text-gray-400 hover:-translate-x-6 transition-all">
                        <ArrowLongLeftIcon class="h-8 w-8" />
                        <p>Belakang</p>
                    </Link>
                </div>
                <div class="grid md:grid-cols-6 gap-10">
                    <div class="col-span-4">
                        <VideoScreen
                            :lesson="lesson.data"
                            :auth="$page.props.auth"
                        ></VideoScreen>
                        <Border></Border>
                        <PremiumBadge v-if="course.data.premium" class="text-2xl"/>
                        <p class="text-lg font-medium text-cyan-600 dark:text-cyan-500">{{ course.data.title }}</p>
                        <h1 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-gray-200">
                            {{ lesson.data.title }}
                        </h1>
                        <div class="flex gap-5 dark:text-gray-300">
                            <div class="flex gap-1 items-center text-xs md:text-md">
                                <VideoCameraIcon class="h-6 w-6"/>
                                pelajaran {{ lesson.data.order }}
                            </div>
                            <div v-if="course.data.lessons?.length" class="flex gap-1 items-center text-xs md:text-md">
                                <ClockIcon class="h-6 w-6"/>
                                {{ lesson.data.video_length }}
                            </div>
                            <div v-if="course.data.published" class="flex gap-1 items-center text-xs md:text-md">
                                <CalendarIcon class="h-6 w-6"/>
                                {{ moment(lesson.data.published).format('DD MMMM YYYY') }}
                            </div>
                            <div class="flex gap-1 items-center text-xs md:text-md">
                                <template v-if="course.data.tags?.length > 0">
                                    <TagIcon class="h-6 w-6"/>
                                    {{ course.data.tags?.map(v => v.name)?.join(', ') }}
                                </template>
                            </div>
                        </div>
                        <Border></Border>
                        <div class="dark:text-white mb-10">
                            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight ">
                                Tentang Pelajaran
                            </h1>
                            <p>
                                {{ course.data.description }}
                            </p>
                        </div>
                        <div class="dark:text-white mb-10">
                            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight ">
                                Perkara Yang Anda Akan Belajar
                            </h1>
                            <p>
                                {{ course.data.description }}
                            </p>
                        </div>
                        <div class="dark:text-white mb-10">
                            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight ">
                                FAQ
                            </h1>
                            <p>
                                {{ course.data.description }}
                            </p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <AkanDatang v-if="!course.data.published"></AkanDatang>
                        <template v-else>
                            <div class="h-full">
                                <ol style>
                                    <li v-for="value, index in course.data.lessons" class="mb-4">
                                        <LessonCard
                                            :auth="$page.props.auth"
                                            :course="course.data"
                                            :lesson="value"
                                            :active="lesson.data.id == value.id"
                                        ></LessonCard>
                                    </li>
                                </ol>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
        </KelasLayout>
    </div>
</template>