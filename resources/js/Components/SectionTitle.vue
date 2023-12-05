<template>
    <div class="text-center">
        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">
            <slot/>
        </h2>
        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400 capitalize">
            <slot name="description"></slot>
        </p>
    </div>
</template>