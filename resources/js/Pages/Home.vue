<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";

defineProps({
    services: {
        type: Array,
        default: () => [],
    },

    portfolios: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <Head title="Beranda" />

    <SiteLayout>
        <!-- Hero -->
        <section class="flex min-h-screen flex-col items-center justify-center px-4 text-center">
            <p class="text-sm uppercase tracking-[0.3em] text-impost-primary">Creative Agency &amp; Media Company</p>
            <h1 class="mt-6 max-w-4xl font-header text-4xl leading-tight sm:text-6xl">
                Karya yang <span class="text-impost-primary">berbicara</span>, brand yang <span class="text-impost-primary">diingat</span>.
            </h1>
            <p class="mt-6 max-w-2xl text-white/60">
                Impost Media membantu bisnis tampil kuat lewat desain, konten, dan strategi media yang terukur.
            </p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <Link href="/contact" class="rounded-full bg-impost-primary px-8 py-3 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary">
                    Diskusikan Proyek
                </Link>
                <Link href="/portfolio" class="rounded-full border border-white/20 px-8 py-3 text-sm font-semibold text-white transition hover:border-impost-primary hover:text-impost-primary">
                    Lihat Karya
                </Link>
            </div>
        </section>

        <!-- Services -->
        <section v-if="services.length" class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <h2 class="font-header text-3xl sm:text-4xl">Layanan Kami</h2>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <article
                    v-for="service in services"
                    :key="service.slug"
                    class="rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-impost-primary"
                >
                    <h3 class="font-semibold">{{ service.service_name }}</h3>
                    <p class="mt-3 line-clamp-3 text-sm text-white/60">{{ service.description }}</p>
                </article>
            </div>
        </section>

        <!-- Portfolio -->
        <section v-if="portfolios.length" class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <h2 class="font-header text-3xl sm:text-4xl">Karya Unggulan</h2>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <Link
                    v-for="portfolio in portfolios"
                    :key="portfolio.slug"
                    :href="`/portfolio/${portfolio.slug}`"
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
                        <p class="text-xs uppercase tracking-widest text-impost-primary">{{ portfolio.category?.name }}</p>
                        <h3 class="mt-2 font-semibold">{{ portfolio.title }}</h3>
                    </div>
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
