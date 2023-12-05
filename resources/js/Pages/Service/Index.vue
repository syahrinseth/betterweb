<template>
    <div>
        <Head title="Perkhidmatan" />
        <Layout>
            <HeroSection/>
            <ServicesSection/>
            <ClientsSection/>
        </Layout>
    </div>
</template>
<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ServicesSection from '@/Components/ServicesSection.vue';
import ClientsSection from '@/Components/ClientsSection.vue';
import HeroSection from '@/Components/HeroSection.vue';
</script>