<template>
    <div class="bg-gradient-to-r from-gray-300 dark:from-gray-600 to-gray-400 dark:to-gray-700 inline-block w-full h-64 sm:h-[450px] rounded-2xl">
        <iframe v-if="!lesson.is_premium" class="rounded-2xl" width="100%" height="100%" src="https://www.youtube.com/embed/gzG_nV3Pd1c?si=gLvSDwkTCGynxIfr" :title="lesson.title" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <div v-else class="w-full p-10">
            <div class="grid grid-cols-3 text-gray-700 dark:text-gray-200 justify-items-center gap-2">
                <div class="col-span-3">
                    <TicketIcon class="h-44" />
                </div>
                <h3 class="col-span-3 text-4xl text-center font-bold">
                    Kursus Video <PremiumBadge class="text-4xl" />
                </h3>
                <p class="col-span-3 text-2xl text-center leading-6 text-gray-600 dark:text-gray-300">
                    "Dengan harga lebih kurang kos hoodie uniqlo, awak akan mendapat akses kepada kursus video ini lengkap dengan video senang faham dan kod sumber pelajaran."
                </p>
            </div>
            <div class="grid justify-items-stretch mt-5 gap-5">
                <div class="justify-self-center flex gap-5">
                    <Link :href="route('register')" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-extrabold rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800 bg-gradient-to-r from-red-700 to-blue-500 transition duration-300 ease-in-out hover:scale-105"> Lihat Kesemua Pelajaran Ini Dengan <span class="line-through text-gray-300">RM185</span> RM95
                    </Link>
                    <Link v-if="!auth?.user" :href="route('register', { callback_url: $page.url })" class="text-white bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800"> Log Masuk 
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { LockClosedIcon, TicketIcon } from '@heroicons/vue/24/solid';
import PremiumBadge from'@/Components/PremiumBadge.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    lesson: {
        required: true,
        type: Object
    },
    auth: {
        required: false,
        type: Object
    }
});
</script>