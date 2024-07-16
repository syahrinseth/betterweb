<template>
    <div>
        <Border></Border>
        <div class="flex gap-4">
            <div class="content-center">
                <PrimaryButton v-if="lesson.previous_lesson?.id">
                    <Link :href="route('kelas.course.lesson.show', { slug: course.slug, id: lesson.previous_lesson.id })" :preserve-scroll="true" :preserve-state="true">
                        <ArrowLeftCircleIcon class="h-4 w-4 md:h-10 md:w-10"/>
                    </Link>
                </PrimaryButton>
            </div>
            <div class="flex-1">
                <PremiumBadge v-if="course.premium" class="text-2xl"/>
                <p class="text-xs md:text-md font-medium text-cyan-600 dark:text-cyan-500 mb-2 md:mb-0">{{ course.title }}</p>
                <!-- Mobile view title start -->
                <div class="flex justify-between items-center">
                    <h1 class="max-w-lg mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-3xl dark:text-gray-200">
                        {{ lesson.title }}
                    </h1>
                    <div class="hidden lg:block" v-if="$page.props.auth?.user?.course_purchases?.filter((c) => c.id == course.id)?.length > 0">
                        <PrimaryButton type="button" @click="toggleComplete" class="flex gap-1 border-gray-300" :class="{ 'border-cyan-300 text-cyan-300 dark:text-cyan-500 dark:border-cyan-500': lessonCompleted }">
                            <CheckCircleIcon class="h-4 w-4" /> <template v-if="!lessonCompleted">Tandai Sebagai Selesai</template><template v-else>Selesai</template>
                        </PrimaryButton>
                    </div>
                </div>
                <!-- Mobile view title end -->
                <div class="flex flex-row-reverse mb-6 lg:mb-0 lg:hidden" v-if="$page.props.auth?.user?.course_purchases?.filter((c) => c.id == course.id)?.length > 0">
                    <PrimaryButton type="button" @click="toggleComplete" class="flex gap-1" :class="{ 'border-cyan-300 text-cyan-300 dark:text-cyan-500 dark:border-cyan-500': lessonCompleted }">
                        <CheckCircleIcon class="h-4 w-4" /> <template v-if="!lessonCompleted">Tandai Sebagai Selesai</template><template v-else>Selesai</template>
                    </PrimaryButton>
                </div>
                
                <div class="grid gap-2 md:flex md:gap-5 dark:text-gray-300">
                    <div v-if="lesson.order" class="flex gap-1 items-center text-xs md:text-md">
                        <VideoCameraIcon class="h-6 w-6"/>
                        {{ lesson.section.order }}.{{ lesson.order }}
                    </div>
                    <div v-if="lesson.video_length" class="flex gap-1 items-center text-xs md:text-md">
                        <ClockIcon class="h-6 w-6"/>
                        {{ moment(lesson.video_length, "HH:mm:ss").format('m') }}m {{ moment(lesson.video_length, "HH:mm:ss").format('ss') }}s
                    </div>
                    <div v-if="lesson.published" class="flex gap-1 items-center text-xs md:text-md">
                        <CalendarIcon class="h-6 w-6"/>
                        {{ moment(lesson.published).format('DD MMMM YYYY') }}
                    </div>
                    <div class="flex gap-1 items-center text-xs md:text-md">
                        <template v-if="course.tags?.length > 0">
                            <TagIcon class="h-6 w-6"/>
                            {{ course.tags?.map(v => v.name)?.join(', ') }}
                        </template>
                    </div>
                </div>
            </div>
            <div class="content-center">
                <PrimaryButton v-if="lesson.next_lesson?.id">
                    <Link :href="route('kelas.course.lesson.show', { slug: course.slug, id: lesson.next_lesson.id })" :preserve-scroll="true" :preserve-state="true">
                        <ArrowRightCircleIcon class="h-4 w-4 md:h-10 md:w-10"/>
                    </Link>
                </PrimaryButton>
            </div>
        </div>
        
        <Border></Border>
    </div>
</template>
<script setup>
import { ArrowLongLeftIcon, VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon, StarIcon, ArrowLeftCircleIcon, ArrowRightCircleIcon, CheckCircleIcon } from '@heroicons/vue/24/solid'
import PremiumBadge from '@/Components/PremiumBadge.vue';
import Border from '@/Components/Border.vue'
import moment from 'moment'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { onMounted } from 'vue';
import { watch } from 'vue';
import { router } from '@inertiajs/vue3'

const props = defineProps({
    course: {
        type: Object,
        required: true
    },
    lesson: {
        type: Object,
        required: true
    }
});

const lessonCompleted = ref(false);

const toggleComplete = () => {
    router.put(
        route('kelas.course.lesson.update', { slug: props.course.slug, id: props.lesson.id }),
        {
            completed: !lessonCompleted.value
        },
        {
            preserveScroll: true,
            preserveState: true,
        }
    );
}

watch(() => props.lesson.completed, (val) => {
    lessonCompleted.value = val;
})

onMounted(() => {
    lessonCompleted.value = props.lesson.completed;
})
</script>