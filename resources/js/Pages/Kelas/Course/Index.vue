<script setup>
import { Head } from '@inertiajs/vue3';
import KelasLayout from '@/Layouts/KelasLayout.vue';
import CourseList from '@/Components/Kelas/CourseList.vue';

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
                <CourseList 
                    :courses="courses.data"
                />
            </div>
        </KelasLayout>
    </div>
</template>