<script setup>
const props = defineProps(['title', 'image']);
</script>

<template>
    <div class="flex cursor-pointer flex-col rounded-xl bg-primary p-10 text-white lg:px-[54px] lg:py-8">
        <img :src="props.image" width="263" height="175" :alt="props.title" class="mx-auto" draggable="false" />

        <div class="mt-auto pt-4 text-center font-bold">{{ props.title }}</div>
    </div>
</template>
