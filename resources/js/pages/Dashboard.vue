<script setup>
// ** Inertia
import { Link } from "@inertiajs/vue3";

// ** Layouts
import UserLayout from "@/layouts/UserLayout.vue";

// ** Components
import DashboardOption from "@/components/Dashboard/Option.vue";

// ** Assets
import imageTraining from "~/assets/uploads/1.png";
import imageFitness from "~/assets/uploads/2.png";
import imageProgress from "~/assets/uploads/3.png";

const dashboardOptions = [
    {
        url: "/trainings",
        title: "Treinos",
        image: imageTraining,
    },
    {
        url: "/nutrition-plans",
        title: "Plano nutricional",
        image: imageFitness,
    },
    {
        url: "/progress",
        title: "Progresso",
        image: imageProgress,
    },
];
</script>

<template>
    <UserLayout title="Dashboard">
        <main class="container px-6 py-10 xl:px-[135px] xl:py-[72px] mx-auto">
            <div class="text-[#4D4B5C]">
                Olá <b>{{ $page.props.auth.user.name }}</b
                >! Seja bem-vindo!
            </div>

            <div class="grid grid-cols-12 mt-8 gap-9">
                <Link
                    :as="DashboardOption"
                    :href="option.url"
                    v-for="option in dashboardOptions"
                    :key="option.url"
                    class="col-span-12 md:col-span-4"
                    :title="option.title"
                    :image="option.image"
                />
            </div>
        </main>
    </UserLayout>
</template>
