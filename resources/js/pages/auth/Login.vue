<script setup>
import { Form } from '@inertiajs/vue3';
</script>

<template>
    <h1>Login</h1>
    <Form action="/api/auth/login" method="POST">
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
    </Form>
</template>
