<script setup lang="ts">
import UserLayout from '@/layouts/UserLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();

interface User {
    id: number;
    name: string;
    email: string;
}

const user: User = (page.props.auth as any).user as User;
</script>

<template>
    <Head title="Dashboard" />

    <UserLayout>
        <h1>Olá, {{ user.name }}</h1>
        <pre>{{ JSON.stringify($page.props, null, 2) }}</pre>
    </UserLayout>
</template>
