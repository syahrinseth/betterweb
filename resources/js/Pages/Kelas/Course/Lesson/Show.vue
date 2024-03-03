<script setup>
import AkanDatang from '@/Components/AkanDatang.vue';
import KelasLayout from '@/Layouts/KelasLayout.vue'
import { ArrowLongLeftIcon, VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon, StarIcon, LockClosedIcon } from '@heroicons/vue/24/solid'
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment'
import PremiumBadge from '@/Components/PremiumBadge.vue';
import VideoScreen from '@/Components/VideoScreen.vue'
import Border from '@/Components/Border.vue'
import LessonCards from '@/Components/Kelas/LessonCards.vue';
import HtmlViewer from '@/Components/HtmlViewer.vue';
import MoreContentSoon from '@/Components/Kelas/MoreContentSoon.vue';

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
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-10">
                    <div class="col-span-1 lg:col-span-4">
                        <VideoScreen
                            :course="course.data"
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
                        <HtmlViewer :text="lesson.data.description"/>
                    </div>
                    <div class="col-span-1 lg:col-span-2">
                        <AkanDatang v-if="!course.data.published"></AkanDatang>
                        <template v-else>
                            <div class="h-full">
                                <div v-for="(section, index) in course.data.sections" class="dark:text-white">
                                    <h3 class="mb-2 text-md font-thin leading-none tracking-tight dark:text-gray-300">
                                        Bahagian  {{index + 1}} : {{ section.name }}
                                    </h3>
                                    <LessonCards 
                                        :course="course.data"
                                        :lessons="section.lessons"
                                        :active-lesson="lesson.data"
                                    />
                                    <MoreContentSoon/>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
        </KelasLayout>
    </div>
</template>