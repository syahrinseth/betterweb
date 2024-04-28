<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import moment from 'moment'

const props = defineProps({
    course: Object
});

const displayCountdownTimer = ref(null);

const countDownTimer = (dt) =>
{
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            displayCountdownTimer.value = 'EXPIRED!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        displayCountdownTimer.value = days + 'hari ' + hours + 'jam ' + minutes + 'min ' + seconds  + 'saat ';
    }

    timer = setInterval(showRemaining, 1000);
}

onMounted(() => {
    countDownTimer(moment(props.course.stripe_promo_end_at).format('MM/DD/yyyy hh:mm a'));
});
</script>
<template>
    <div>
        <a v-if="course && $page?.props?.auth?.user" :href="route('kelas.course.purchase.index', { slug: course.slug })" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-extrabold rounded-lg text-xs sm:text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800 bg-gradient-to-r from-red-700 to-blue-500 transition duration-300 ease-in-out hover:scale-105"> Mula Belajar Dengan 
            <span v-if="course.stripe_promo_amount > 0"><span class="line-through text-gray-300 font-light">RM{{ course.stripe_price_amount }}</span> RM{{ Math.trunc((course.stripe_price_amount / 100) * course.stripe_promo_amount) }}</span>
            <span v-else>RM{{ course.stripe_price_amount }}</span>
        </a>
        <Link v-else :href="route('kelas.register', { callback_url: $page.url })" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-extrabold rounded-lg text-xs sm:text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800 bg-gradient-to-r from-red-700 to-blue-500 transition duration-300 ease-in-out hover:scale-105"> 
            Mula Belajar Dengan 
            <span v-if="course.stripe_promo_amount > 0"><span class="line-through text-gray-300 font-light">RM{{ course.stripe_price_amount }}</span> RM{{ Math.trunc((course.stripe_price_amount / 100) * course.stripe_promo_amount) }}</span>
            <span v-else>RM{{ course.stripe_price_amount }}</span>
        </Link>
        <div v-if="moment(course.stripe_promo_end_at).isAfter(moment())" class="mt-2 text-sm dark:text-gray-300">
            <p v-if="course.stripe_promo_end_at != null">*Diskaun tamat dalam </p>
            <span class="text-lg font-extrabold">{{ displayCountdownTimer }}</span> lagi.
        </div>
    </div>
</template>