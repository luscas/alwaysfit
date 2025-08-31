<script setup>
import { Link, router } from '@inertiajs/vue3';
import arrowLeft from '~/assets/icons/arrow-left.svg';
import logout from '~/assets/icons/logout.svg';
import logo from '~/assets/logo.svg';
const props = defineProps(['title', 'redirectBack']);
</script>

<template>
    <nav class="w-full bg-white shadow-[0_8px_30px_#1D1D2620] xl:h-[120px]">
        <div
            class="container mx-auto flex h-full flex-col gap-6 px-6 py-6 xl:flex-row xl:items-center xl:justify-between xl:gap-0 xl:px-[135px] xl:py-0"
        >
            <Link href="/dashboard">
                <img :src="logo" alt="AlwaysFit Logo" width="201" height="36" draggable="false" />
            </Link>

            <div class="flex items-center gap-3">
                <img
                    v-if="props.redirectBack"
                    :src="arrowLeft"
                    width="24"
                    height="24"
                    alt="Voltar para página anterior"
                    draggable="false"
                    class="cursor-pointer"
                    @click="router.get('/dashboard')"
                />

                <div class="text-2xl font-bold text-[#2826733] lg:text-4xl">
                    {{ props.title }}
                </div>
            </div>

            <Link href="/auth/logout" method="post" as="button" class="text-primary flex items-center gap-2 font-medium">
                <img :src="logout" alt="Logout Icon" width="24" height="22" draggable="false" />
                Sair
            </Link>
        </div>
    </nav>
</template>
