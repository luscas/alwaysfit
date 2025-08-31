<script setup>
const props = defineProps(["class"]);
</script>

<template>
    <input
        :class="[
            'bg-white w-full rounded-xl border focus:border-charcoal py-3 px-5 border-lavendergray placeholder:text-graphite outline-none',
            props.class,
        ]"
    />
</template>
