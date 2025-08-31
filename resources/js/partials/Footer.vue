<script setup>
import logoOutline from '~/assets/logo_outline.svg';
</script>

<template>
    <footer class="bg-graphite w-full text-white">
        <div class="container mx-auto grid grid-cols-12 px-6 py-10 xl:px-[135px] xl:py-20">
            <img :src="logoOutline" width="170" height="170" draggable="false" class="col-span-12 xl:col-span-2" />

            <div class="col-span-12 mt-12 xl:col-span-3 xl:col-start-5">
                <b>ALWAYS FIT ®</b> <br />
                Saúde Longevidade e Autoestima <br /><br />
                <b>Contato:</b> <br />
                <a href="tel:08004545103">0800 454 5103</a> <br />
                <a href="https://wa.me/+5517991266117?text=Olá! Tenho uma dúvida, pode me ajudar?" target="_blank">+55 (17) 9 9126-6117</a>
                (Whatsapp)<br /><br />
                <b>Endereço:</b><br />
                Rodovia Fernão Dias, 937 <br />
                Complemento: BW Diase - DocaLog G500 Modulo 5 <br />
                CEP: 37646-202 <br />
                Extrema - MG <br />
                30.417.094/0001.60
            </div>

            <div class="col-span-12 mt-8 leading-9 xl:col-span-2 xl:col-start-10">
                <b>POLÍTICA</b><br />
                <a href="#" class="underline">Quem Somos</a><br />
                <a href="#" class="underline">Política de Segurança</a><br />
                <a href="#" class="underline">Política de Privacidade</a><br />
                <a href="#" class="underline">Política de Entrega</a><br />
                <a href="#" class="underline">Política de Cookies</a><br />
                <a href="#" class="underline">Política de Devolução</a>
            </div>
        </div>

        <div class="border-slate border-t py-[30px]">
            <div class="text-mist text-center">© 2025 Always Fit</div>
        </div>
    </footer>
</template>
