<script setup>
const props = defineProps(["class"]);
</script>

<template>
    <div
        :class="[
            'bg-white border border-mist w-full shadow-[0_16px_40px_#1D1D2608] rounded-lg text-graphite',
            props.class,
        ]"
    >
        <slot />
    </div>
</template>
