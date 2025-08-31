<script setup>
defineProps(['done', 'remaining', 'target']);
</script>

<template>
    <div class="flex h-6 w-full overflow-hidden rounded-lg">
        <div class="flex items-center justify-center bg-success text-xs text-white" :style="{ width: `${(done / target) * 100}%` }">
            {{ done }} dias
        </div>

        <div class="flex items-center justify-center bg-error text-xs text-white" :style="{ width: `${(remaining / target) * 100}%` }">
            {{ remaining }} dias
        </div>
    </div>
</template>
