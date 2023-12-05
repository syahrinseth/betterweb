<script setup>
import SectionSecondary from '@/Components/SectionSecondary.vue';
import SectionTitle from '@/Components/SectionTitle.vue';
import { ChatBubbleOvalLeftIcon, EnvelopeIcon } from '@heroicons/vue/24/solid';
</script>
<template>
    <SectionSecondary>
        <SectionTitle>
            Hubungi Kami
            <template #description>
                Jika ada pertanyaan, sila hubungi kami
            </template>
        </SectionTitle>
        <div class="grid grid-cols-1 gap-12 mt-10 max-w-md mx-auto">
            <div class="flex gap-10">
                <div>
                    <div class="bg-cyan-700 dark:bg-cyan-600 p-3 rounded-lg">
                        <EnvelopeIcon class="text-white font-bold h-4 w-4" />
                    </div>
                </div>
                <div>
                    <h3 class="text-gray-700 dark:text-gray-100 font-bold mb-1">
                        Melalui Emel
                    </h3>
                    <p class="text-gray-500 dark:text-gray-300 text-sm mb-1">
                        syahrin@betterweb.dev
                    </p>
                    <a href="mailto:syahrin@betterweb.dev" target="_blank" class="text-sm font-semibold leading-6 text-cyan-700 dark:text-cyan-600">
                        Hantar <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            <div class="flex gap-10">
                <div>
                    <div class="bg-cyan-700 dark:bg-cyan-600 p-3 rounded-lg">
                        <ChatBubbleOvalLeftIcon class="text-white font-bold h-4 w-4" />
                    </div>
                </div>
                <div>
                    <h3 class="text-gray-700 dark:text-gray-100 font-bold mb-1">
                        Melalui Whatsapp
                    </h3>
                    <p class="text-gray-500 dark:text-gray-300 text-sm mb-1">
                        +60 12 704 2807
                    </p>
                    <a href="https://wa.me/60127042807" target="_blank" class="text-sm font-semibold leading-6 text-cyan-700 dark:text-cyan-600">
                        Mesej <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </SectionSecondary>
</template>