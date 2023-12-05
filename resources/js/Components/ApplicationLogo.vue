<script setup>
let theme = window.theme;
</script>
<template>
    <img v-if="theme" src="/images/betterweb-dark-logo.png" class="mr-3 h-5 sm:h-6" alt="Betterweb Logo" />
    <img v-else src="/images/betterweb-light-logo.png" class="mr-3 h-5 sm:h-6" alt="Betterweb Logo" />
</template>
