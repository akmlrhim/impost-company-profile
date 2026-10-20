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
        class="group overflow-hidden rounded-2xl border border-impost-fifth/10"
    >
        <div class="aspect-video bg-impost-fifth/5">
            <img
                v-if="portfolio.media_path"
                :src="`/storage/${portfolio.media_path}`"
                :alt="portfolio.title"
                class="size-full object-cover transition duration-300 group-hover:scale-105"
                loading="lazy"
            >
        </div>
        <div class="p-5">
            <p class="text-xs font-bold uppercase text-impost-third lg:text-sm">
                {{ portfolio.category?.name }}
            </p>
            <h3 class="mt-2 font-semibold lg:text-lg">{{ portfolio.title }}</h3>
        </div>
    </Link>
</template>
