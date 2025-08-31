<script setup>
import { Head } from '@inertiajs/vue3';

// ** Layouts
import UserLayout from '@/layouts/UserLayout.vue';

// ** Components
import Progress from '@/components/Training/Progress.vue';
import CardList from '@/components/ui/CardList.vue';

// ** Utils
import { getLevel } from '@/utils/levels';
</script>

<template>
    <Head title="Progresso" />

    <UserLayout title="Progresso" redirectBack="true">
        <main class="container mx-auto px-6 py-10 xl:px-[135px] xl:py-[72px]">
            <div class="mb-4 text-center text-[#60E70]">
                <div class="text-2xl font-semibold">Progresso dos seus treinos</div>
            </div>

            <div class="mt-8 grid grid-cols-12 gap-9">
                <CardList class="col-span-12 px-5 py-4" v-if="$page.props.data.length == 0">
                    <div class="text-2xl font-bold">Ops...</div>
                    <div class="mt-1">Você ainda não tem treinos.</div>
                </CardList>

                <CardList
                    class="col-span-12 flex flex-col items-stretch px-5 py-4 lg:col-span-6 xl:col-span-4"
                    v-for="item in $page.props.data"
                    :key="item.id"
                >
                    <div class="flex justify-between">
                        <div class="font-semibold">
                            {{ item.title }}
                        </div>
                        <div class="text-sm font-medium">
                            {{ getLevel(item.level) }}
                        </div>
                    </div>

                    <div class="mt-4">{{ item.description }}</div>

                    <div class="flex flex-grow flex-col justify-end">
                        <div class="mt-2">
                            <div class="mb-1 text-sm font-semibold">Meta ({{ item.target_per_week }} de 7)</div>
                            <Progress
                                :done="item.weekly_progress.done"
                                :remaining="item.weekly_progress.remaining"
                                :target="item.weekly_progress.target"
                            />
                        </div>
                    </div>
                </CardList>
            </div>
        </main>
    </UserLayout>
</template>
