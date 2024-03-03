<template>
    <Link preserve-scroll :href="route('kelas.course.lesson.show', { slug: course.slug, id: lesson.id })" class="flex gap-5 items-center bg-gray-200 dark:bg-gray-700 px-6 py-5 rounded-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition-all">
        <div>
            <div class="items-center flex justify-center dark bg-gray-500 dark:bg-gray-600 w-14 h-14 rounded-full text-2xl font-extrabold text-white" :class="{ 'bg-red-500 dark:bg-red-500': active }">
                <template v-if="lesson.is_premium">
                    <template v-if="$page.props.auth?.user?.course_purchases?.filter((c) => c.id == course.id)?.length > 0">
                        <PlayIcon v-if="active" class="w-5 h-5"/>
                        <span v-else>{{ lesson.order }}</span>
                    </template>
                    <template v-else>
                        <LockClosedIcon class="w-5 h-5"/>
                    </template>
                </template>
                <template v-else>
                    <PlayIcon v-if="active" class="w-5 h-5"/>
                    <span v-else>{{ lesson.order }}</span>
                </template>
            </div>
        </div>
        <div class="flex-1">
            <h6 class="font-bold text-xl mb-2 dark:text-gray-200">{{ lesson.title }}</h6>
            <div v-show="lesson.description" class="dark:text-gray-300 line-clamp-2 leading-5 mb-2 text-md" v-html="lesson.description"></div>
            <div class="flex text-xs dark:text-gray-300 items-center gap-2">
                <div v-show="lesson.video_length" class="flex gap-1 items-center">
                    <ClockIcon class="h-3 w-3"/>
                    {{ lesson.video_length }}
                </div>
            </div>
        </div>
    </Link>
</template>
<script setup>
import { ClockIcon, LockClosedIcon, PlayIcon } from '@heroicons/vue/24/solid'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    course: {
        required: true,
        type: Object
    },
    lesson: {
        required: true,
        type: Object
    },
    active: {
        required: false,
        type: Boolean,
        default: false
    }
});
</script>