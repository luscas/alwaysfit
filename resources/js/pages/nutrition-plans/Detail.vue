<script setup>
import { Head } from '@inertiajs/vue3';

// ** Layouts
import UserLayout from '@/layouts/UserLayout.vue';

// ** Components
import CardList from '@/components/ui/CardList.vue';
</script>

<template>
    <Head title="Plano Nutricional" />

    <UserLayout title="Plano Nutricional" redirectBack="true">
        <main class="container mx-auto px-6 py-10 xl:px-[135px] xl:py-[72px]">
            <div class="mb-4 text-center text-graphite">
                <div class="text-2xl font-semibold">Refeições do dia</div>
            </div>

            <div class="mt-8 grid grid-cols-12 gap-4">
                <div class="col-span-12 flex flex-col gap-4 xl:col-span-8">
                    <CardList class="col-span-12 px-5 py-4" v-for="meal in $page.props.data.meals" :key="meal.id">
                        <div class="font-semibold">{{ meal.title }}</div>
                        <div class="mt-2 first-of-type:mt-3.5" v-for="item in meal.items" :key="item.id">
                            {{ item.food }} <br />
                            <div class="ml-2">&bull; {{ item.description }}</div>
                        </div>
                    </CardList>
                </div>

                <div class="col-span-12 flex flex-col gap-4 xl:col-span-4">
                    <div class="rounded-md bg-sky px-16 py-[38px]">
                        Tente fazer da sua refeição um momento de pausa e presença. Coma devagar, apreciando cada sabor — isso faz bem para o corpo e
                        para a mente.
                    </div>

                    <div class="rounded-md bg-warning p-8">
                        Em meio à correria do dia a dia, fazer uma pausa para se alimentar é um dos gestos mais simples — e poderosos — de cuidado
                        consigo mesmo. Mais do que apenas ingerir alimentos, a refeição é um ritual de conexão: com seu corpo, seus sentidos e o
                        momento presente. Reserve alguns minutos para se desligar das preocupações e focar no agora. Sente-se confortavelmente,
                        respire fundo e observe seu prato: as cores, os aromas, as texturas. Coma devagar, apreciando cada garfada como uma pequena
                        celebração da vida. Permita-se sentir gratidão por cada ingrediente e pelo caminho que ele percorreu até chegar até você.
                    </div>
                </div>
            </div>
        </main>
    </UserLayout>
</template>
