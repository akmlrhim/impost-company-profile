<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Breadcrumb from "@/Components/Breadcrumb.vue";

defineProps({
    portfolio: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <HomeLayout :title="portfolio.title">
        <section class="mx-auto max-w-5xl px-4 pb-24 pt-14 sm:px-6 lg:px-8">
            <Breadcrumb
                :items="[
                    { label: 'Beranda', href: route('home') },
                    { label: 'Portfolio', href: route('portfolio.index') },
                    { label: portfolio.title },
                ]"
            />
            <h1 class="mt-4 text-4xl font-bold leading-tight sm:text-5xl">{{ portfolio.title }}</h1>

            <div class="mt-10 aspect-video overflow-hidden rounded-3xl bg-impost-fifth/5">
                <img
                    v-if="portfolio.media_path"
                    :src="`/storage/${portfolio.media_path}`"
                    :alt="portfolio.title"
                    class="size-full object-cover"
                >
            </div>

            <div class="mt-10 flex flex-wrap gap-4">
                <Link href="/contact" class="rounded-full bg-impost-primary px-8 py-3 text-sm font-bold text-impost-fifth transition-colors hover:bg-impost-secondary">
                    Tertarik kerja sama?
                </Link>
                <Link :href="route('portfolio.index')" class="rounded-full border border-impost-fifth/20 px-8 py-3 text-sm font-bold text-impost-fifth transition-colors hover:border-impost-primary hover:text-impost-primary">
                    Kembali ke portfolio
                </Link>
            </div>
        </section>
    </HomeLayout>
</template>
