<script setup>
// ** Inertia
import { Link, router } from '@inertiajs/vue3';

// ** Vue
import { ref } from 'vue';

// ** Layouts
import UserLayout from '@/layouts/UserLayout.vue';

// ** Components
import Progress from '@/components/Training/Progress.vue';
import Button from '@/components/ui/Button.vue';
import CardList from '@/components/ui/CardList.vue';
import { Switch } from '@headlessui/vue';

// ** Libs
import axios from 'axios';

// ** States
const enabled = ref({});

// ** Methods
function toggleTraining(id) {
    enabled.value[id] = !enabled.value[id];

    axios.post(`/trainings/${id}/log`);
    router.reload();
}
</script>

<template>
    <UserLayout title="Treinos" redirectBack="true">
        <main class="container mx-auto px-6 py-10 xl:px-[135px] xl:py-[72px]">
            <div class="mb-4 text-center text-[#60E70]">
                <div class="text-2xl font-semibold">Seus treinos de hoje</div>
                <div class="font-semibold">Membros superiores</div>
            </div>

            <div class="mt-8 grid grid-cols-12 gap-9">
                <CardList class="col-span-12 px-5 py-4" v-if="$page.props.data.length == 0">
                    <div class="text-2xl font-bold">Ops...</div>
                    <div class="mt-1">Você ainda não tem treinos.</div>
                </CardList>

                <CardList class="col-span-12 px-5 py-4 lg:col-span-6 xl:col-span-4" v-for="item in $page.props.data" :key="item.id">
                    <div class="text-xl font-semibold">{{ item.title }}</div>

                    <img :src="item.image" :alt="item.title" width="320" height="320" draggable="false" />

                    <div class="flex cursor-pointer items-center gap-10 select-none" @click="toggleTraining(item.id)">
                        <div class="font-medium text-[#605E70]">Realizado?</div>
                        <Switch
                            v-model="enabled[item.id]"
                            :class="enabled[item.id] ? 'bg-[#10B981]' : 'bg-[#88859920]'"
                            class="pointer-events-none relative inline-flex h-6 w-11 items-center rounded-full"
                            v-bind:value="enabled[item.id] = item.weekly_progress.is_done_this_today"
                        >
                            <span
                                :class="enabled[item.id] ? 'translate-x-6 bg-white' : 'translate-x-1 bg-[#888599]'"
                                class="inline-block h-4 w-4 transform rounded-full transition"
                            />
                        </Switch>
                    </div>

                    <div>
                        <div class="mb-1 text-sm font-semibold">Meta</div>
                        <Progress
                            :done="item.weekly_progress.done"
                            :remaining="item.weekly_progress.remaining"
                            :target="item.weekly_progress.target"
                        />
                    </div>

                    <Link :href="'/trainings/' + item.id">
                        <Button class="mt-4" variant="outline">Detalhes</Button>
                    </Link>
                </CardList>
            </div>
        </main>
    </UserLayout>
</template>
