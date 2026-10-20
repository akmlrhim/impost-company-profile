<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import PortfolioCard from "@/Components/PortfolioCard.vue";
import Breadcrumb from "@/Components/Breadcrumb.vue";

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
    portfolios: {
        type: Object,
        required: true,
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
});

function isActive(slug) {
    return props.filters.category === slug || (!slug && !props.filters.category);
}
</script>

<template>
    <HomeLayout title="Portfolio">
        <section class="mx-auto max-w-7xl px-4 pb-24 pt-14 sm:px-6 lg:px-8">
            <Breadcrumb :items="[{ label: 'Beranda', href: route('home') }, { label: 'Portfolio' }]" />
            <h1 class="mt-4 max-w-2xl text-4xl font-bold leading-tight sm:text-5xl">
                Portfolio kami.
            </h1>
            <p class="mt-4 max-w-2xl text-impost-fifth">
                Kumpulan proyek yang menunjukkan pendekatan kami terhadap desain, konten, dan strategi media.
            </p>

            <div class="mt-10 flex flex-wrap items-center gap-3">
                <Link
                    :href="route('portfolio.index')"
                    :class="['rounded-full border px-4 py-1.5 text-sm font-bold transition-colors', isActive(null) ? 'border-impost-primary bg-impost-primary/10 text-impost-primary' : 'border-impost-fifth/15 text-impost-fifth hover:text-impost-fifth']"
                >
                    Semua
                </Link>
                <Link
                    v-for="category in categories"
                    :key="category.slug"
                    :href="route('portfolio.index', { category: category.slug })"
                    :class="['rounded-full border px-4 py-1.5 text-sm font-bold transition-colors', isActive(category.slug) ? 'border-impost-primary bg-impost-primary/10 text-impost-primary' : 'border-impost-fifth/15 text-impost-fifth hover:text-impost-fifth']"
                >
                    {{ category.name }}
                </Link>
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <PortfolioCard v-for="portfolio in portfolios.data" :key="portfolio.slug" :portfolio="portfolio" />
            </div>

            <div v-if="portfolios.links.length > 3" class="mt-12 flex justify-center">
                <nav class="flex flex-wrap gap-2">
                    <Link
                        v-for="(link, index) in portfolios.links"
                        :key="index"
                        :href="link.url ?? '#'"
                        preserve-scroll
                        :class="['px-3 py-1 text-sm font-bold rounded-full border transition-colors', link.active ? 'border-impost-primary text-impost-primary' : 'border-impost-fifth/15 text-impost-fifth hover:text-impost-fifth']"
                    >
                        <span v-html="link.label" />
                    </Link>
                </nav>
            </div>
        </section>
    </HomeLayout>
</template>
