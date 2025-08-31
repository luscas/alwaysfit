<script setup>
// ** Inertia
import { Link } from '@inertiajs/vue3';

// ** Layouts
import UserLayout from '@/layouts/UserLayout.vue';

// ** Components
import Button from '@/components/ui/Button.vue';
import CardList from '@/components/ui/CardList.vue';
</script>

<template>
    <UserLayout title="Planos Nutricionais" redirectBack="true">
        <main class="container mx-auto px-6 py-10 xl:px-[135px] xl:py-[72px]">
            <div class="mb-4 text-center text-graphite">
                <div class="text-2xl font-semibold">Planos Nutricionais</div>
                <div class="font-semibold">Estes são os seus planos nutricionais</div>
            </div>

            <div class="mt-8 grid grid-cols-12 gap-9">
                <CardList class="col-span-12 px-8 py-6" v-if="$page.props.data.length == 0">
                    <div class="text-2xl font-bold">Ops...</div>
                    <div class="mt-1">Você ainda não tem planos nutricionais.</div>
                </CardList>

                <CardList class="col-span-12 px-8 py-6 lg:col-span-6 xl:col-span-4" v-for="item in $page.props.data" :key="item.id">
                    <div class="text-2xl font-bold">{{ item.title }}</div>
                    <div class="mt-1">{{ item.description }}</div>
                    <div class="mt-1 max-w-max rounded-full bg-slate-100 px-3 py-2 text-xs font-semibold">
                        Início em
                        {{ new Date(item.start_date).toLocaleDateString('pt-BR') }}
                    </div>

                    <div class="mt-4 text-sm" v-if="item.calories || item.protein_g || item.carbs_g || item.fat_g">
                        <b>Metas</b>
                        <ul class="my-2 ml-6 list-disc">
                            <li v-if="item.calories">Calorias: {{ item.calories }}</li>
                            <li v-if="item.protein_g">Proteinas: {{ item.protein_g }} (g)</li>
                            <li v-if="item.carbs_g">Carboidratos: {{ item.carbs_g }} (g)</li>
                            <li v-if="item.fat_g">FAT: {{ item.fat_g }} (g)</li>
                        </ul>
                    </div>

                    <Link :href="'/nutrition-plans/' + item.id">
                        <Button class="mt-4">Ver detalhes</Button>
                    </Link>
                </CardList>
            </div>
        </main>
    </UserLayout>
</template>
