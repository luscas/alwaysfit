<script setup>
import whatsappIcon from '~/assets/icons/whatsapp.svg';
</script>

<template>
    <div class="bg-graphite w-full text-white xl:h-[50px]">
        <div class="container mx-auto flex flex-col justify-between gap-4 px-6 py-6 lg:flex-row lg:items-center lg:gap-0 lg:py-0 xl:px-[135px]">
            <div>
                Havendo qualquer dúvida, entre em contato com nosso SAC
                <a href="https://wa.me/+5517991266117?text=Olá! Tenho uma dúvida, pode me ajudar?" target="_blank" class="font-bold"
                    >(17) 9 9126-6117</a
                >
            </div>

            <a
                href="https://wa.me/+5517991266117?text=Olá! Tenho uma dúvida, pode me ajudar?"
                target="_blank"
                class="bg-emerald hover:bg-emerald-dark flex h-full items-center justify-center gap-2.5 px-10 py-[13px] transition-all"
            >
                <img :src="whatsappIcon" width="24" height="24" draggable="false" />
                SAC pelo whatsapp
            </a>
        </div>
    </div>
</template>
