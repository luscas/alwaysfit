<script setup>
// ** Partials
import Footer from '@/partials/Footer.vue';
import Header from '@/partials/Header.vue';
import Navbar from '@/partials/Navbar.vue';

const props = defineProps(['title', 'redirectBack']);
</script>

<template>
    <Header />

    <Navbar :title="props.title" :redirectBack="props.redirectBack" />

    <slot />

    <Footer />
</template>
