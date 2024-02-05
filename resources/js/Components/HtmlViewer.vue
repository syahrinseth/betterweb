<script setup>
    defineProps({
        text: String
    })
</script>
<template>
    <div class="htmlviewer dark:text-white" v-html="text"></div>
</template>
<style>
.htmlviewer body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

.htmlviewer h1, .htmlviewer h2, .htmlviewer h3, .htmlviewer h4, .htmlviewer h5, .htmlviewer h6 {
    font-weight: bold;
    margin-bottom: 0.5em;
}

.htmlviewer h1 {
    font-size: 32px;
}

.htmlviewer h2 {
    font-size: 28px;
}

.htmlviewer h3 {
    font-size: 26px;
}

.htmlviewer h4 {
    font-size: 24px;
}

.htmlviewer h5 {
    font-size: 20px;
}

.htmlviewer h6 {
    font-size: 16px;
}

.htmlviewer p {
    margin-bottom: 1em;
}

.htmlviewer a {
    color: #007bff;
    text-decoration: none;
}

.htmlviewer ul, .htmlviewer ol {
    margin-bottom: 1em;
}

.htmlviewer li {
    margin-bottom: 0.5em;
}
</style>