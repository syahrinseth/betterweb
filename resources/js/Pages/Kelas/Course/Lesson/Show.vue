<script setup>
import AkanDatang from '@/Components/AkanDatang.vue';
import KelasLayout from '@/Layouts/KelasLayout.vue'
import { Head } from '@inertiajs/vue3';
import VideoScreen from '@/Components/VideoScreen.vue'
import LessonCards from '@/Components/Kelas/LessonCards.vue';
import HtmlViewer from '@/Components/HtmlViewer.vue';
import MoreContentSoon from '@/Components/Kelas/MoreContentSoon.vue';
import LessonTitle from '@/Components/Kelas/Course/Lesson/Title.vue';

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
            <section class="px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-24">
                <div class="grid grid-cols-1 xl:grid-cols-6 gap-10">
                    <div class="col-span-1 xl:col-span-4">
                        <VideoScreen
                            :course="course.data"
                            :lesson="lesson.data"
                            :auth="$page.props.auth"
                        ></VideoScreen>
                        <LessonTitle 
                            :course="course.data"
                            :lesson="lesson.data"
                        />
                        <HtmlViewer :text="lesson.data.description"/>
                    </div>
                    <div class="col-span-1 xl:col-span-2 h-screen overflow-y-scroll dark:scrollbar-thumb:!bg-slate-500/50 dark:scrollbar-track:!bg-slate-500/[0.16] flex-none lg:supports-scrollbars:pr-2 md:px-0 overflow-hidden scrollbar-thumb:!bg-slate-300 scrollbar-thumb:!rounded scrollbar-track:!bg-slate-100 scrollbar-track:!rounded scrollbar:!h-1.5 scrollbar:!w-1.5 scrollbar:bg-transparent sm:px-6">
                        <AkanDatang v-if="!course.data.published"></AkanDatang>
                        <template v-else>
                            <div class="h-full">
                                <div v-for="(section, index) in course.data.sections" class="dark:text-white overflow px-6">
                                    <h3 v-show="section.lessons.length > 0" class="mb-2 text-md font-thin leading-none tracking-tight dark:text-gray-300">
                                        Bahagian  {{index + 1}} : {{ section.name }}
                                    </h3>
                                    <LessonCards 
                                        :course="course.data"
                                        :lessons="section.lessons"
                                        :active-lesson="lesson.data"
                                    />
                                </div>
                                <MoreContentSoon/>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
        </KelasLayout>
    </div>
</template>