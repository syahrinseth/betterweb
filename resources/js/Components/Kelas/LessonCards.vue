<script setup>
import LessonCard from '@/Components/Kelas/LessonCard.vue';

defineProps({
    course: Object,
    lessons: Array,
    activeLesson: Object,
})
</script>
<template>
    <ol class="mb-6">
        <li v-for="lesson, i in lessons" class="mb-2">
            <LessonCard
                :course="course"
                :lesson="lesson"
                :active="lesson.id == activeLesson?.id"
            />
        </li>
    </ol>
</template>