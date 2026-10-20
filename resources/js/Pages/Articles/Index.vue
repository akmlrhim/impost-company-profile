<script setup>
import { useForm } from "@inertiajs/vue3";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import ArticleCard from "@/Components/ArticleCard.vue";
import Breadcrumb from "@/Components/Breadcrumb.vue";

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
    articles: {
        type: Object,
        required: true,
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    search: props.filters.search ?? "",
});

function submitSearch() {
    form.get(route("articles.index"), {
        preserveState: true,
        preserveScroll: true,
    });
}

function isActive(slug) {
    return props.filters.category === slug || (!slug && !props.filters.category);
}

function categoryHref(slug) {
    return route("articles.index", {
        category: slug || undefined,
        search: props.filters.search || undefined,
    });
}
</script>

<template>
    <HomeLayout title="Artikel">
        <section class="mx-auto max-w-7xl px-4 pb-24 pt-14 sm:px-6 lg:px-8">
            <Breadcrumb :items="[{ label: 'Beranda', href: route('home') }, { label: 'Artikel' }]" />

            <!-- Kepala halaman: judul + pencarian -->
            <div class="mt-4 flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                <h1 class="max-w-2xl text-4xl font-bold leading-tight sm:text-5xl">
                    Artikel &amp; wawasan untuk membantu bisnis Anda bertumbuh
                </h1>

                <form
                    class="flex w-full max-w-md items-center gap-2 rounded-full border border-impost-fifth/15 p-1.5 pl-5 focus-within:border-impost-fifth/40"
                    role="search"
                    @submit.prevent="submitSearch"
                >
                    <input
                        v-model="form.search"
                        type="search"
                        name="search"
                        placeholder="Cari artikel..."
                        aria-label="Cari artikel"
                        class="min-w-0 flex-1 bg-transparent text-sm outline-none placeholder:text-impost-fifth/50"
                    >
                    <button
                        type="submit"
                        class="rounded-full bg-impost-fifth px-5 py-2.5 text-sm font-bold text-white transition-colors hover:bg-impost-fifth/90 disabled:opacity-50"
                        :disabled="form.processing"
                    >
                        Cari
                    </button>
                </form>
            </div>

            <!-- Tab kategori -->
            <nav class="mt-10 flex gap-6 overflow-x-auto border-b border-impost-fifth/10" aria-label="Filter kategori artikel">
                <Link
                    :href="categoryHref(null)"
                    preserve-scroll
                    :class="['-mb-px whitespace-nowrap border-b-2 pb-3 text-sm transition-colors', isActive(null) ? 'border-impost-fifth font-bold text-impost-fifth' : 'border-transparent text-impost-fifth/60 hover:text-impost-fifth']"
                >
                    Semua
                </Link>
                <Link
                    v-for="category in categories"
                    :key="category.slug"
                    :href="categoryHref(category.slug)"
                    preserve-scroll
                    :class="['-mb-px whitespace-nowrap border-b-2 pb-3 text-sm transition-colors', isActive(category.slug) ? 'border-impost-fifth font-bold text-impost-fifth' : 'border-transparent text-impost-fifth/60 hover:text-impost-fifth']"
                >
                    {{ category.name }}
                </Link>
            </nav>

            <!-- Daftar artikel -->
            <div v-if="articles.data.length" class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <ArticleCard v-for="article in articles.data" :key="article.slug" :article="article" />
            </div>

            <!-- Kosong -->
            <div v-else class="mt-16 rounded-3xl border border-dashed border-impost-fifth/15 py-16 text-center">
                <p class="font-bold">Tidak ada artikel yang ditemukan.</p>
                <p class="mt-2 text-sm text-impost-fifth">
                    Coba kata kunci lain atau pilih kategori berbeda.
                </p>
                <Link
                    :href="route('articles.index')"
                    class="mt-6 inline-flex rounded-full border border-impost-fifth/15 px-5 py-2 text-sm font-bold transition-colors hover:border-impost-primary hover:text-impost-primary"
                >
                    Hapus filter
                </Link>
            </div>

            <!-- Paginasi -->
            <div v-if="articles.links.length > 3" class="mt-12 flex justify-center">
                <nav class="flex flex-wrap gap-2">
                    <Link
                        v-for="(link, index) in articles.links"
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
