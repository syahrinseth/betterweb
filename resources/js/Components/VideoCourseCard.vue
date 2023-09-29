<template>
    <div>
        <div class="my-1 mb-3 h-72 w-full overflow-hidden rounded-md bg-gray-100 transition-all hover:scale-105 dark:bg-gray-800">
            <Link class="" :href="route('videoCourse.show', { slug: course.slug })">
                <img alt="Thumbnail" fetchpriority="high" decoding="async" data-nimg="fill" class="object-cover w-full transition-all rounded-md" :src="course.medias?.[0]?.original_url || 'https://www.techrepublic.com/wp-content/uploads/2022/08/learn-coding-automation-just.jpeg'" style="">
            </Link>
        </div>
        <PremiumBadge v-if="course.premium"/>
        <p class="text-lg font-medium text-cyan-600 dark:text-cyan-500">Pembangunan Aplikasi Mobile</p>
        <h2 class="mt-0 mb-2 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">
            <Link class="" :href="route('videoCourse.show', { slug: course.slug })">
                <span class="bg-gradient-to-r from-cyan-200 to-cyan-100 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 group-hover:bg-[length:100%_50%] dark:from-cyan-800 dark:to-cyan-900">
                    {{ course.title }}
                </span>
            </Link>
        </h2>
        <div class="font-light text-gray-500 sm:text-xl dark:text-gray-400 line-clamp-4">
            {{ course.description }}
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import PremiumBadge from '@/Components/PremiumBadge.vue'

const props = defineProps({
    course: {
        type: Object,
        required: true
    }
});
</script>