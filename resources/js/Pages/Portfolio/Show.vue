<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";

defineProps({
    portfolio: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <SiteLayout :title="portfolio.title">
        <section class="mx-auto max-w-5xl px-4 pb-24 pt-32 sm:px-6 lg:px-8">
            <p class="text-sm uppercase tracking-[0.3em] text-impost-primary">{{ portfolio.category?.name }}</p>
            <h1 class="mt-4 font-header text-4xl leading-tight sm:text-5xl">{{ portfolio.title }}</h1>

            <div class="mt-10 aspect-video overflow-hidden rounded-3xl bg-white/5">
                <img
                    v-if="portfolio.media_path"
                    :src="`/storage/${portfolio.media_path}`"
                    :alt="portfolio.title"
                    class="size-full object-cover"
                >
            </div>

            <div class="mt-10 flex flex-wrap gap-4">
                <Link href="/contact" class="rounded-full bg-impost-primary px-8 py-3 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary">
                    Tertarik kerja sama?
                </Link>
                <Link :href="route('portfolio.index')" class="rounded-full border border-white/20 px-8 py-3 text-sm font-semibold text-white transition hover:border-impost-primary hover:text-impost-primary">
                    Kembali ke portfolio
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
