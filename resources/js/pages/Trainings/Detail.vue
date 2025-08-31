<script setup>
// ** Inertia
import { usePage } from '@inertiajs/vue3';

// ** Layouts
import UserLayout from '@/layouts/UserLayout.vue';

// ** Components
import Progress from '@/components/Training/Progress.vue';
import CardList from '@/components/ui/CardList.vue';

// ** Utils
import { getLevel } from '@/utils/levels';

// ** Composables
const page = usePage();

// ** Props
const { data: training } = page.props.data;
</script>

<template>
    <UserLayout title="Progresso" redirectBack="true">
        <main class="container mx-auto px-6 py-10 xl:px-[135px] xl:py-[72px]">
            <div class="mb-4 text-center text-[#60E70]">
                <div class="text-2xl font-semibold">Progresso dos seus treinos</div>
            </div>

            <div class="mt-8 grid grid-cols-12 gap-9">
                <CardList
                    class="col-span-12 flex flex-col items-stretch px-5 py-4 lg:col-span-6 xl:col-span-4"
                    v-for="item in training.progressLogs"
                    :key="item.id"
                >
                    <div class="flex justify-between">
                        <div class="font-semibold">
                            {{ training.title }}
                        </div>
                        <div class="text-sm font-medium">
                            {{ getLevel(training.level) }}
                        </div>
                    </div>

                    <div class="mt-4">{{ training.description }}</div>

                    <div class="flex flex-grow flex-col justify-end">
                        <div class="mt-2">
                            <div class="mb-1 text-sm font-semibold">Meta ({{ new Date(item.performed_at).toLocaleDateString('pt-BR') }})</div>
                            <Progress
                                :done="training.weekly_progress.done"
                                :remaining="training.weekly_progress.remaining"
                                :target="training.weekly_progress.target"
                            />
                        </div>
                    </div>
                </CardList>
            </div>
        </main>
    </UserLayout>
</template>
