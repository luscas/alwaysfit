<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome" />
    <div>
        <h1>Voce está logado!</h1>
        <pre>{{ JSON.stringify($page.props) }}</pre>
    </div>
</template>
