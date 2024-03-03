<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    course: Object
})
</script>
<template>
    <div>
        <a v-if="course && $page?.props?.auth?.user" :href="route('kelas.course.purchase.index', { slug: course.slug })" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-extrabold rounded-lg text-xs sm:text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800 bg-gradient-to-r from-red-700 to-blue-500 transition duration-300 ease-in-out hover:scale-105"> Mula Belajar Dengan <span class="line-through text-gray-300 font-light">RM199</span> RM99 
        </a>
        <Link v-else :href="route('kelas.register', { callback_url: $page.url })" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-extrabold rounded-lg text-xs sm:text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800 bg-gradient-to-r from-red-700 to-blue-500 transition duration-300 ease-in-out hover:scale-105"> 
            Mula Belajar Dengan <span class="line-through text-gray-300 font-light">RM199</span> RM99 <small class="text-xs">(Kupon Diskaun)</small>
        </Link>
        <p class="mt-2 text-xs dark:text-gray-300">*Dengan Kupon Diskaun</p>
    </div>
    
</template>