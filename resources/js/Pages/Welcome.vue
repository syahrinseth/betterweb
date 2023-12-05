<template>
    <div>
        <Head title="Perkhidmatan" />
        <Layout>
            <HeroSection/>
            <ServicesSection id="services"/>
            <ClientsSection id="clients"/>
            <ContactSection id="contact-us"/>
        </Layout>
    </div>
</template>
<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import ServicesSection from '@/Components/ServicesSection.vue';
import ClientsSection from '@/Components/ClientsSection.vue';
import HeroSection from '@/Components/HeroSection.vue';
import ContactSection from '@/Components/ContactSection.vue';
</script>