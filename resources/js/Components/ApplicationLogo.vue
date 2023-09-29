<script setup>
let theme = window.theme;
</script>
<template>
    <img v-if="theme" src="/images/betterweb-dark-logo.png" class="mr-3 sm:h-9" alt="Landwind Logo" />
    <img v-else src="/images/betterweb-light-logo.png" class="mr-3 sm:h-9" alt="Landwind Logo" />
</template>
