<script setup>
defineProps({
    portfolio: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="route('portfolio.show', portfolio.slug)"
        class="group overflow-hidden rounded-2xl border border-white/10"
    >
        <div class="aspect-video bg-white/5">
            <img
                v-if="portfolio.media_path"
                :src="`/storage/${portfolio.media_path}`"
                :alt="portfolio.title"
                class="size-full object-cover transition duration-300 group-hover:scale-105"
                loading="lazy"
            >
        </div>
        <div class="p-5">
            <p class="text-xs uppercase tracking-widest text-impost-primary">
                {{ portfolio.category?.name }}
            </p>
            <h3 class="mt-2 font-semibold">{{ portfolio.title }}</h3>
        </div>
    </Link>
</template>
