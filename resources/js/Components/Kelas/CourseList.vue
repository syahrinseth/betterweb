<script setup>
import VideoCourseCard from '@/Components/VideoCourseCard.vue';

const props = defineProps({
    courses: Array
});
</script>
<template>
    <div class="max-w-7xl mx-auto sm:px-4">
        <section class="dark:bg-gray-800">
            <div class="max-w-screen-xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-10">
                    <div v-for="course in courses" class="col-span-1 h-full">
                        <VideoCourseCard :course="course"></VideoCourseCard>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>