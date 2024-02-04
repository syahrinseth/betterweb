<template>
    <div class="bg-gray-300/50 dark:bg-gray-700/50 rounded-xl p-6 md:p-12 mb-6">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6 lg:col-span-3 flex flex-col">
                <PremiumBadge class="" v-if="course.premium"/>
                <p class="text-lg font-medium text-cyan-600 dark:text-cyan-500">
                    {{ course.tags.map(v => v.name)?.join(', ') }}
                </p>
                <h2 class="mt-0 mb-2 text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl dark:text-white">
                    <Link class="" :href="route('kelas.course.show', { slug: course.slug })">
                        <span class="bg-gradient-to-r from-cyan-200 to-cyan-100 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_50%] dark:from-cyan-800 dark:to-cyan-900">
                            {{ course.title }}
                        </span>
                    </Link>
                </h2>
                <div class="block lg:hidden">
                    <Link class="" :href="route('kelas.course.show', { slug: course.slug })">
                        <img alt="author" fetchpriority="high" decoding="async" data-nimg="fill" class="object-cover aspect-[16/9] transition-all rounded-xl" :src="course.medias?.[0]?.original_url || 'https://www.techrepublic.com/wp-content/uploads/2022/08/learn-coding-automation-just.jpeg'" style=""/>
                    </Link>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 dark:text-gray-300 mt-5 lg:mt-0">
                    <div class="flex gap-1 items-start md:items-center text-xs md:text-md ">
                        <VideoCameraIcon class="h-6 w-6"/>
                        {{ course.lessons?.length || 0 }} pelajaran
                    </div>
                    <div v-if="course.lessons?.length" class="flex gap-1 items-start md:items-center text-xs md:text-md">
                        <ClockIcon class="h-6 w-6"/>
                        1 Jam 15 Minit
                    </div>
                    <div v-if="course.published" class="flex gap-1 items-start md:items-center text-xs md:text-md">
                        <CalendarIcon class="h-6 w-6"/>
                        {{ moment(course.published).format('MMMM YYYY') }}
                    </div>
                    <div class="flex gap-1 items-start md:items-center text-xs md:text-md">
                        <template v-if="course.tags?.length > 0">
                            <TagIcon class="h-6 w-6"/>
                            {{ course.tags?.map(v => v.name)?.join(', ') }}
                        </template>
                    </div>
                </div>
                <div class="font-light text-gray-500 sm:text-xl dark:text-gray-400 line-clamp-4 mt-5">
                    {{ course.description }}
                </div>
            </div>
            <div class="hidden lg:col-span-3 lg:flex justify-end">
                <Link class="" :href="route('kelas.course.show', { slug: course.slug })">
                    <img alt="author" fetchpriority="high" decoding="async" data-nimg="fill" class="object-cover aspect-[16/9] transition-all rounded-xl" :src="course.medias?.[0]?.original_url || 'https://www.techrepublic.com/wp-content/uploads/2022/08/learn-coding-automation-just.jpeg'" style=""/>
                </Link>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import PremiumBadge from '@/Components/PremiumBadge.vue'
import moment from 'moment'
import { VideoCameraIcon, ClockIcon, CalendarIcon, TagIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
    course: {
        type: Object,
        required: true
    }
});
</script>