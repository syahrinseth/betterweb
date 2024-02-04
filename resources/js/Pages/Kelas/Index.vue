<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import KelasLayout from '@/Layouts/KelasLayout.vue';
import { computed } from 'vue';
import HeroSection from '@/Components/Kelas/HeroSection.vue';
import CourseList from '@/Components/Kelas/CourseList.vue';

const page = usePage();

const user = computed(() => page.props.auth.user);

const props = defineProps({
    courses: {
        type: Object,
        required: true
    }
});

</script>

<template>
    <Head title="Welcome" />

    <KelasLayout>
        <!-- Start block -->
        <HeroSection/>
        <div class="py-12">
            <h2 class="font-extrabold text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center">Kursus Video</h2>
            <p class="mb-10 font-light text-gray-500 sm:text-lg dark:text-gray-400 text-center">
                Kursus video bersiris tentang pembelajaran koding dan pembangunan aplikasi software
            </p>
            <CourseList
                :courses="courses.data"
            />
        </div>
        <!-- End block -->
    </KelasLayout>

    
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
