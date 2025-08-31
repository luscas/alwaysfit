<script setup>
const props = defineProps(["class"]);
</script>

<template>
    <div
        :class="[
            'bg-[#F6F6FA] w-full shadow-[0_8px_30px_#1D1D2620] rounded text-graphite',
            props.class,
        ]"
    >
        <slot />
    </div>
</template>
