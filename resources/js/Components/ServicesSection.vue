<template>
    <div class="overflow-hidden bg-gray-50 dark:bg-gray-700 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
            <div class="lg:max-w-lg">
                <h2 class="text-base font-semibold leading-7 text-cyan-600">Kami Menyediakan</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">Pengalaman digital yang terbaik untuk pelanggan anda</p>
                <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Di Betterweb, kami pakar dalam mencipta penyelesaian web dan aplikasi mudah alih yang disesuaikan dengan keperluan unik anda. Pasukan pakar kami berada di sini untuk membimbing anda melalui kerumitan landskap digital, menawarkan perkhidmatan perundingan untuk memastikan kejayaan anda.</p>
                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 dark:text-gray-300 lg:max-w-none">
                <div v-for="feature in features" :key="feature.name" class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900 dark:text-gray-200">
                    <component :is="feature.icon" class="absolute left-1 top-1 h-5 w-5 text-cyan-600" aria-hidden="true" />
                    {{ feature.name }}
                    </dt>
                    {{ ' ' }}
                    <dd class="inline">{{ feature.description }}</dd>
                </div>
                </dl>
            </div>
            </div>
            <img src="images/vector_it_1.svg" alt="Product screenshot" class="w-full max-w-none" width="2432" height="1442" />
        </div>
        </div>
    </div>
</template>

<script setup>
import { ComputerDesktopIcon, WrenchScrewdriverIcon, UsersIcon } from '@heroicons/vue/20/solid'

const features = [
    {
        name: 'Aplikasi Web.',
        description:
        'Daripada laman web yang cantik hingga ke platform e-dagang, kami mencipta pengalaman digital terbaik.',
        icon: ComputerDesktopIcon,
    },
    {
        name: 'Aplikasi Mudah Alih.',
        description: 'Kami menukar idea anda menjadi aplikasi mudah alih yang mesra pengguna, merentas semua platform utama.',
        icon: WrenchScrewdriverIcon,
    },
    {
        name: 'Perkhidmatan Konsultansi.',
        description: 'Perkhidmatan konsultansi kami membantu perniagaan membangunkan sistem, aplikasi web, dan mudah alih yang cekap dan inovatif. Dengan kepakaran dalam teknologi moden, kami menyediakan penyelesaian tersuai, daripada perancangan hingga pelaksanaan, untuk memastikan kejayaan projek digital anda.',
        icon: UsersIcon,
    },
]
</script>