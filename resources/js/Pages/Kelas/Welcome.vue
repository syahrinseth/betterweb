<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';
import VideoCourseCard from '@/Components/VideoCourseCard.vue'
import { computed } from 'vue';
import SectionTitle from '@/Components/SectionTitle.vue'
import SectionPrimary from '@/Components/SectionPrimary.vue'
import SectionSecondary from '@/Components/SectionSecondary.vue'

const page = usePage();

const user = computed(() => page.props.auth.user);

defineProps({
    courses: {
        type: Array,
        required: true
    }
});

</script>

<template>
    <Head title="Welcome" />

    <Layout>
        <!-- Start block -->
        <SectionPrimary>
            <div class="grid max-w-screen-xl px-4 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 ">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <template v-if="user">
                        <h1 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                        10x kan kemampuan anda sebagai software developer di betterweb. 
                        </h1>
                    </template>
                    <template v-else>
                        <h1 class="max-w-2xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                            Dapatkan kursus video pembangunan aplikasi, <br/> secara percuma!
                        </h1>
                        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                            10x kan kemampuan anda sebagai software developer di betterweb. 
                            <br/>
                            Daftar untuk dapatkan notifikasi kursus video pembangunan aplikasi setiap minggu.
                        </p>
                    </template>
                    <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <Link v-if="!$page.props.auth?.user" :href="route('register')" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800"> Daftar Sekarang 
                        </Link> 
                        <template v-else>
                            <Link :href="route('course.index')" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-cyan-600 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800"> Kursus Video 
                            </Link> 
                            <Link href="#" class="text-white hover:text-gray-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:hover:text-gray-300 focus:outline-none dark:focus:ring-cyan-800"> Artikel 
                            </Link> 
                        </template>
                    </div>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="/images/web-dev.png" alt="hero image">
                </div>
            </div>
        </SectionPrimary>
        <!-- End block -->
        <!-- Start block -->
        <SectionSecondary id="artikel">
            <SectionTitle>
                Artikel
                <template #description>
                    Pembangunan Aplikasi Web & Mobile
                </template>
            </SectionTitle>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <template v-for="post in [1, 2, 3, 4, 5, 6, 7, 8, 9]">
                    <div class="group cursor-pointer">
                        <div class="overflow-hidden rounded-md bg-gray-100 transition-all hover:scale-105 dark:bg-gray-800">
                            <Link class="" :href="route('course.show', { slug: '1' })">
                                <img alt="Thumbnail" fetchpriority="high" decoding="async" data-nimg="fill" class="object-cover transition-all rounded-md" src="https://www.techrepublic.com/wp-content/uploads/2022/08/learn-coding-automation-just.jpeg" style="">
                            </Link>
                        </div>
                        <div class="">
                            <div>
                                <div class="flex gap-3">
                                    <a href="/category/technology">
                                        <span class="inline-block text-xs font-medium tracking-wider uppercase mt-5 text-cyan-600">Technology</span>
                                    </a>
                                </div>
                                <h2 class="text-lg font-semibold leading-snug tracking-tight mt-2 dark:text-white">
                                    <Link class="" :href="route('course.show', { slug: '1' })">
                                        <span class="bg-gradient-to-r from-cyan-200 to-cyan-100 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 group-hover:bg-[length:100%_50%] dark:from-cyan-800 dark:to-cyan-900">Architectural Engineering Wonders of the modern era for your Inspiration</span>
                                    </Link>
                                </h2>
                                <div class="hidden">
                                    <p class="mt-2 line-clamp-3 text-sm text-gray-500 dark:text-gray-400">
                                        <Link class="" :href="route('course.show', { slug: '1' })">Reinvention often comes in spurts, after a long period of silence. Just as modern architecture recently enjoyed a comeback, brand architecture, a field with well-established principles for decades</Link>
                                    </p>
                                </div>
                                <div class="mt-3 flex items-center space-x-3 text-gray-500 dark:text-gray-400">
                                    <a href="/author/mario-sanchez">
                                        <div class="flex items-center gap-3">
                                            <img class="w-6 h-6 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">
                                            <span class="truncate text-sm">Syahrin Seth</span>
                                        </div>
                                    </a>
                                    <span class="text-xs text-gray-300 dark:text-gray-600">•</span>
                                    <time class="truncate text-sm" datetime="2022-10-21T15:48:00.000Z">October 21, 2022</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </SectionSecondary>
        <SectionPrimary id="kursus-video">
            <SectionTitle>
                Kursus Video
                <template #description>
                    Kursus video bersiris tentang pembelajaran pembangunan aplikasi web & mobile
                </template>
            </SectionTitle>
            <div class="items-center mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24">
                <div v-for="course in courses.data" class="group col-span-2 h-full">
                    <VideoCourseCard :course="course"></VideoCourseCard>
                </div>
            </div>

            <div class="pt-6 mt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
                <div class="text-center">
                    <Link :href="route('course.index')" class="inline-flex items-center text-xl font-medium text-cyan-600 hover:text-cyan-800 dark:text-cyan-500 dark:hover:text-cyan-700">
                        Lihat Semua
                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </Link>
                </div>
            </div>
        </SectionPrimary>
        <!-- End block -->
    </Layout>

    
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
