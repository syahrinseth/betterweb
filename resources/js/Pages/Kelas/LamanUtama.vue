<script setup>
import KelasLayout from '@/Layouts/KelasLayout.vue'
import CourseList from '@/Components/Kelas/CourseList.vue'
import { Head } from '@inertiajs/vue3';
import Disclosure from '@/Components/Disclosure.vue'

const props = defineProps({
    courses: Object,
    inProgress: Object
});
</script>
<template>
    <Head title="Welcome" />
    <KelasLayout>
        <div class="py-12 max-w-7xl mx-auto sm:px-4">
            <div class="mt-12">
                <div v-if="inProgress.data.length > 0">
                    <Disclosure :default-open="true">
                        <template #title>
                            Sedang Berlangsung
                        </template>
                        <CourseList
                            :courses="inProgress.data"
                        />
                    </Disclosure>
                </div>
                <div>
                    <Disclosure :default-open="true">
                        <template #title>
                            Kursus Video Bersiris
                        </template>
                        <CourseList
                            :courses="courses.data"
                        />
                    </Disclosure>
                </div>
            </div>
        </div>
        <!-- End block -->
    </KelasLayout>
</template>