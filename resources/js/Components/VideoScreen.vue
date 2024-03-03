<template>
    <div class="bg-gradient-to-r from-gray-200 dark:from-gray-600 to-gray-300 dark:to-gray-700 inline-block w-full h-48 sm:h-[450px] rounded-2xl aspect-video drop-shadow-md">
        <div v-if="((!lesson.is_premium) || authPurchased) && isNotLive" class="w-full p-10">
            <div class="grid grid-cols-3 text-gray-700 dark:text-gray-200 justify-items-center gap-2">
                <div class="col-span-3">
                    <CalendarDaysIcon class="hidden md:block h-16 md:h-24 lg:h-36" />
                </div>
                <h3 class="col-span-3 text-lg md:text-4xl text-center font-bold">
                    Anda sudah beli kursus video ini,<br/>
                    standby pelajaran ini akan dilancarkan pada {{ purchasedDate.format('D MMMM YYYY') }}
                </h3>
            </div>
        </div>
        <iframe v-else-if="(!lesson.is_premium) || authPurchased" class="rounded-2xl" width="100%" height="100%" :src="lesson.video_url" :title="lesson.title" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; modestbranding=1; rel=0" allowfullscreen></iframe>
        <div v-else class="w-full p-10">
            <div class="grid grid-cols-3 text-gray-700 dark:text-gray-200 justify-items-center gap-2">
                <div class="col-span-3">
                    <VideoCameraIcon class="hidden md:block h-16 md:h-24 lg:h-36" />
                </div>
                <h3 class="col-span-3 text-lg md:text-4xl text-center font-bold">
                    Kursus Video <PremiumBadge class="" />
                </h3>
                <p class="hidden md:block col-span-3 md:text-lg text-center leading-6 text-gray-600 dark:text-gray-300">
                    "Dengan harga lebih kurang kos hoodie uniqlo, anda akan mendapat akses kepada kursus video ini lengkap dengan video senang faham dan kod sumber pelajaran."
                </p>
            </div>
            <div class="grid justify-items-stretch mt-5 gap-5">
                <div class="justify-self-center flex gap-5">
                    <CoursePurchaseButton
                        :course="course"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { VideoCameraIcon, CalendarDaysIcon } from '@heroicons/vue/24/solid';
import PremiumBadge from'@/Components/PremiumBadge.vue';
import CoursePurchaseButton from './Kelas/CoursePurchaseButton.vue';
import moment from 'moment'

const props = defineProps({
    course: {
        required: false,
        type: Object,
        default: null
    },
    lesson: {
        required: true,
        type: Object
    },
    auth: {
        required: false,
        type: Object
    }
});

const purchasedDate = moment(props.lesson.published);

const now = moment();

const isNotLive = now.diff(purchasedDate, 'days') < 0;

const authPurchased = props.auth?.user?.course_purchases?.filter((c) => c.id == props.course.id)?.length > 0;

</script>