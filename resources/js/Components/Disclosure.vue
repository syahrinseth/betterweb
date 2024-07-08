<template>
    <Disclosure v-slot="{ open }" :default-open="defaultOpen">
        <DisclosureButton class="py-2 dark:text-gray-200">
            <div class="flex gap-2 items-center">
                <div clas="flex-none">
                    <div class="bg-gray-400 px-2 py-2 rounded-full">
                        <ChevronDownIcon v-show="open" class="w-5 h-5"/>
                        <ChevronRightIcon v-show="!open" class="w-5 h-5"/>
                    </div>
                </div>
                <div class="flex-1 text-2xl font-bold">
                    <slot name="title"></slot>
                </div>
            </div>
        </DisclosureButton>
        <DisclosurePanel class="text-gray-500 my-3">
            <slot></slot>
        </DisclosurePanel>
    </Disclosure>
</template>

<script setup>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from '@headlessui/vue'
import { ChevronRightIcon, ChevronDownIcon } from '@heroicons/vue/24/solid'

defineProps({
    defaultOpen: {
        default: false,
        type: Boolean
    }
})
</script>