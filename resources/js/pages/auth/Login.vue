<script setup>
// ** Inertia
import { Form } from '@inertiajs/vue3';

// ** Assets
import logo from '~/assets/logo.svg';

// ** Layouts
import AuthLayout from '@/layouts/AuthLayout.vue';

// ** Components
import Button from '@/components/ui/Button.vue';
import Card from '@/components/ui/Card.vue';
import TextInput from '@/components/ui/TextInput.vue';
</script>

<template>
    <AuthLayout>
        <main class="mx-auto max-w-[770px] py-[190px]">
            <Card class="flex flex-col gap-10 p-[30px]">
                <img :src="logo" width="201" height="36" class="mx-auto" draggable="false" />

                <div class="text-center text-4xl font-bold">Login</div>

                <div>
                    <p class="font-bold">Olá!</p>
                    <br />
                    <p>Este é o ambiente seguro de login da Always Fit ®</p>
                </div>

                <Form action="/auth/login" method="post" class="flex flex-col gap-2" #default="{ errors, processing }">
                    <div class="mb-2 font-bold">Para acessar, informe suas credeciais.</div>
                    <div class="text-error mb-2 font-bold" v-if="errors.email ?? errors.password">
                        {{ errors.email ?? errors.password }}
                    </div>
                    <TextInput type="email" placeholder="E-mail" name="email" />
                    <TextInput type="password" placeholder="Senha" name="password" />

                    <Button type="submit" :disabled="processing">Logar</Button>
                </Form>
            </Card>
        </main>
    </AuthLayout>
</template>
