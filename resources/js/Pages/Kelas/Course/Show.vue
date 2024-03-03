<script setup>
import KelasLayout from '@/Layouts/KelasLayout.vue'
import { VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon, StarIcon, LockClosedIcon, EllipsisHorizontalIcon } from '@heroicons/vue/24/solid'
import { Head } from '@inertiajs/vue3';
import moment from 'moment'
import PremiumBadge from '@/Components/PremiumBadge.vue';
import HtmlViewer from '@/Components/HtmlViewer.vue';
import LessonCards from '@/Components/Kelas/LessonCards.vue';
import MoreContentSoon from '@/Components/Kelas/MoreContentSoon.vue';
import CoursePurchaseButton from '@/Components/Kelas/CoursePurchaseButton.vue';

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
        <KelasLayout>
            <section class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-24">
                <div class="grid md:grid-cols-2 gap-10">
                    <div>
                        <PremiumBadge v-if="course.data.premium" class="text-2xl"/>
                        <p class="text-lg font-medium text-cyan-600 dark:text-cyan-500">Pembangunan Aplikasi Mudah Alih</p>
                        <h1 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-gray-200">
                            {{ course.data.title }}
                        </h1>
                        <div class="flex gap-5 dark:text-gray-300">
                            <div v-if="false" class="flex gap-1 items-center text-xs md:text-md">
                                <VideoCameraIcon class="h-6 w-6"/>
                                {{ course.data.lessons?.length || 0 }} pelajaran
                            </div>
                            <div v-if="false" class="flex gap-1 items-center text-xs md:text-md">
                                <ClockIcon class="h-6 w-6"/>
                                1 Jam 15 Minit
                            </div>
                            <div v-if="course.data.published" class="flex gap-1 items-center text-xs md:text-md">
                                <CalendarIcon class="h-6 w-6"/>
                                {{ moment(course.data.published).format('Do MMMM YYYY') }}
                            </div>
                            <div class="flex gap-1 items-center text-xs md:text-md">
                                <template v-if="course.data.tags?.length > 0">
                                    <TagIcon class="h-6 w-6"/>
                                    {{ course.data.tags?.map(v => v.name)?.join(', ') }}
                                </template>
                            </div>
                        </div>
                        <div class="mt-6">
                            <CoursePurchaseButton
                                v-if="$page.props.auth?.user?.course_purchases?.filter((c) => c.id == course.data.id)?.length == 0 || $page.props.auth.user == null"
                                :course="course.data"
                            />
                        </div>
                        <div class="my-10 border-b border-gray-700"></div>
                        <HtmlViewer :text="course.data.description"/>

                        <div class="mt-6 text-center">
                            <CoursePurchaseButton
                                v-if="$page.props.auth?.user?.course_purchases?.filter((c) => c.id == course.data.id)?.length == 0 || $page.props.auth.user == null"
                                :course="course.data"
                            />
                        </div>
                    </div>
                    <div>
                        <div v-if="course.data.medias?.length > 0">
                            <img alt="Thumbnail" fetchpriority="high" decoding="async" data-nimg="fill" class="w-full object-cover transition-all rounded-md aspect-video drop-shadow-md" :src="course.data.medias[0]?.original_url" style="">
                        </div>
                        <div class="py-10">
                            <h3 class="mb-3 text-2xl font-bold dark:text-gray-200">Pelajaran:</h3>
                            <div v-for="(section, index) in course.data.sections" class="dark:text-white">
                                <h3 class="mb-2 text-md font-thin leading-none tracking-tight dark:text-gray-300">
                                    Bahagian  {{index + 1}} : {{ section.name }}
                                </h3>
                                <LessonCards 
                                    :course="course.data"
                                    :lessons="section.lessons"
                                />
                            </div>
                            <MoreContentSoon/>
                        </div>
                    </div>
                </div>
            </section>
        </KelasLayout>
    </div>
</template>