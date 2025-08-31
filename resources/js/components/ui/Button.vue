<script setup>
import { computed } from "vue";

const props = defineProps(["class", "type", "variant"]);

const variant = computed(() => {
    return props.variant === "outline"
        ? "border-primary text-primary"
        : "border-transparent bg-primary text-white";
});
</script>

<template>
    <button
        :class="[
            'rounded-xl w-full font-bold py-3 px-6 border-2 disabled:bg-slate-300',
            variant,
            props.class,
        ]"
    >
        <slot />
    </button>
</template>
