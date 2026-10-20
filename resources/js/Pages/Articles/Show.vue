<script setup>
import { computed, onMounted, ref } from "vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";

const props = defineProps({
    article: {
        type: Object,
        required: true,
    },
    related: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
});

const instagram = "https://instagram.com/impostmedia";

/** URL absolut halaman, dipakai untuk link share & tombol salin tautan. */
const pageUrl = ref("");
onMounted(() => {
    pageUrl.value = window.location.href;
});

const shareLinks = computed(() => {
    const url = encodeURIComponent(pageUrl.value);
    const text = encodeURIComponent(props.article.title);

    return [
        {
            name: "X",
            href: `https://twitter.com/intent/tweet?text=${text}&url=${url}`,
            d: "M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932zM17.61 20.644h2.039L6.486 3.24H4.298z",
        },
        {
            name: "Facebook",
            href: `https://www.facebook.com/sharer/sharer.php?u=${url}`,
            d: "M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z",
        },
        {
            name: "LinkedIn",
            href: `https://www.linkedin.com/sharing/share-offsite/?url=${url}`,
            d: "M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.125 2.062 2.062 0 0 1 0 4.125zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z",
        },
    ];
});

/** Tombol "salin tautan" dengan umpan balik sementara. */
const copied = ref(false);
async function copyLink() {
    try {
        await navigator.clipboard.writeText(pageUrl.value);
        copied.value = true;
        setTimeout(() => {
            copied.value = false;
        }, 2000);
    } catch {
        // Abaikan bila izin clipboard ditolak.
    }
}

/** Estimasi waktu baca: jumlah kata dibagi 200 kata per menit. */
const readingTime = computed(() => {
    const words = (props.article.content || "").trim().split(/\s+/).filter(Boolean).length;

    return Math.max(1, Math.round(words / 200));
});

/**
 * Konten artikel berupa teks polos. Blok dipisah baris kosong,
 * dengan penanda ringan: "## " jadi sub-judul, "- " jadi daftar,
 * dan "> " jadi kutipan.
 */
const blocks = computed(() => {
    if (!props.article.content) {
        return [];
    }

    return props.article.content
        .split(/\n{2,}/)
        .map((block) => block.trim())
        .filter(Boolean)
        .map((block) => {
            if (block.startsWith("## ")) {
                return { type: "heading", text: block.slice(3).trim() };
            }

            const lines = block.split("\n").map((line) => line.trim());

            if (lines.every((line) => line.startsWith("- "))) {
                return { type: "list", items: lines.map((line) => line.slice(2).trim()) };
            }

            if (block.startsWith("> ")) {
                return { type: "quote", text: block.replace(/^>\s?/gm, "").trim() };
            }

            return { type: "paragraph", text: block.replace(/\n/g, " ") };
        });
});

function formatDate(value) {
    if (!value) {
        return "";
    }

    return new Date(value).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "short",
        year: "numeric",
    });
}

function coverSrc(article) {
    if (!article?.cover_path) {
        return null;
    }

    return /^(https?:)?\//.test(article.cover_path) ? article.cover_path : `/storage/${article.cover_path}`;
}

/** Inisial penulis untuk avatar lingkaran. */
const authorInitials = computed(() =>
    (props.article.written_by || "?")
        .split(" ")
        .filter(Boolean)
        .slice(0, 2)
        .map((word) => word[0].toUpperCase())
        .join(""),
);
</script>

<template>
    <HomeLayout :title="article.title">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 pb-20 pt-10 sm:px-10 lg:grid-cols-[minmax(0,1fr)_320px]">
            <!-- Kolom utama -->
            <article class="min-w-0">
                <!-- Breadcrumb -->
                <nav class="flex flex-wrap items-center gap-2 text-sm text-impost-third" aria-label="Breadcrumb">
                    <Link :href="route('home')" class="transition-colors hover:text-impost-fifth">Beranda</Link>
                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                    </svg>
                    <Link :href="route('articles.index')" class="transition-colors hover:text-impost-fifth">Artikel</Link>
                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
                    </svg>
                    <span class="font-bold text-impost-fifth">{{ article.category?.name }}</span>
                </nav>

                <!-- Judul -->
                <h1 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl">
                    {{ article.title }}
                </h1>

                <!-- Baris meta: penulis, kategori, waktu baca, tanggal, suka -->
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <span class="inline-flex items-center gap-2 rounded-full border border-impost-fifth/10 px-3 py-1.5 text-sm">
                        <span
                            class="flex size-6 items-center justify-center rounded-full bg-impost-primary/25 text-[10px] font-bold text-impost-fifth"
                            aria-hidden="true"
                        >
                            {{ authorInitials }}
                        </span>
                        {{ article.written_by }}
                    </span>

                    <span class="inline-flex items-center rounded-full border border-impost-fifth/10 px-3 py-1.5 text-sm text-impost-fifth">
                        {{ article.category?.name }}
                    </span>

                    <span class="inline-flex items-center gap-1.5 rounded-full border border-impost-fifth/10 px-3 py-1.5 text-sm text-impost-fifth">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z" />
                        </svg>
                        {{ readingTime }} menit baca
                    </span>

                    <span class="inline-flex items-center gap-1.5 rounded-full border border-impost-fifth/10 px-3 py-1.5 text-sm text-impost-fifth">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                        </svg>
                        {{ formatDate(article.created_at) }}
                    </span>
                </div>

                <!-- Gambar sampul -->
                <figure class="mt-8 overflow-hidden rounded-3xl bg-impost-fifth/5">
                    <img
                        v-if="coverSrc(article)"
                        :src="coverSrc(article)"
                        :alt="article.title"
                        class="aspect-[16/9] w-full object-cover"
                    >
                </figure>

                <!-- Isi artikel -->
                <div class="mt-10">
                    <template v-for="(block, index) in blocks" :key="index">
                        <h2
                            v-if="block.type === 'heading'"
                            class="mt-10 text-2xl font-bold leading-snug sm:text-3xl"
                        >
                            {{ block.text }}
                        </h2>

                        <ul v-else-if="block.type === 'list'" class="mt-6 space-y-3">
                            <li
                                v-for="item in block.items"
                                :key="item"
                                class="flex gap-3 leading-relaxed text-impost-fifth"
                            >
                                <span class="mt-2.5 size-1.5 shrink-0 rounded-full bg-impost-primary" aria-hidden="true" />
                                <span>{{ item }}</span>
                            </li>
                        </ul>

                        <blockquote
                            v-else-if="block.type === 'quote'"
                            class="mt-10 border-l-2 border-impost-primary pl-6 text-xl leading-relaxed text-impost-fifth"
                        >
                            {{ block.text }}
                        </blockquote>

                        <p v-else class="mt-6 leading-relaxed text-impost-fifth">
                            {{ block.text }}
                        </p>
                    </template>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">
                <!-- Bagikan -->
                <section>
                    <h2 class="text-sm font-bold">Bagikan lewat media sosial</h2>
                    <div class="mt-4 flex flex-wrap items-center gap-3">
                        <a
                            :href="instagram"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex size-10 items-center justify-center rounded-full border border-impost-fifth/10 transition-colors hover:border-impost-primary hover:text-impost-primary"
                            aria-label="Instagram Impost Media"
                        >
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <rect x="2.5" y="2.5" width="19" height="19" rx="5" />
                                <circle cx="12" cy="12" r="4" />
                                <circle cx="17.3" cy="6.7" r="0.6" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                        <a
                            v-for="link in shareLinks"
                            :key="link.name"
                            :href="link.href"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex size-10 items-center justify-center rounded-full border border-impost-fifth/10 transition-colors hover:border-impost-primary hover:text-impost-primary"
                            :aria-label="`Bagikan ke ${link.name}`"
                        >
                            <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path :d="link.d" />
                            </svg>
                        </a>
                        <button
                            type="button"
                            class="inline-flex size-10 items-center justify-center rounded-full border border-impost-fifth/10 transition-colors hover:border-impost-primary hover:text-impost-primary"
                            :aria-label="copied ? 'Tautan tersalin' : 'Salin tautan artikel'"
                            @click="copyLink"
                        >
                            <svg
                                v-if="copied"
                                class="size-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <svg
                                v-else
                                class="size-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                                aria-hidden="true"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                            </svg>
                        </button>
                    </div>
                </section>

                <hr v-if="categories.length" class="my-6 border-impost-fifth/10">

                <!-- Kategori -->
                <section v-if="categories.length">
                    <h2 class="text-sm font-bold">Kategori</h2>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span
                            v-for="category in categories"
                            :key="category.slug"
                            class="inline-flex items-center rounded-full border px-3 py-1 text-xs transition-colors"
                            :class="category.slug === article.category?.slug ? 'border-impost-primary text-impost-primary' : 'border-impost-fifth/15 text-impost-fifth hover:border-impost-primary hover:text-impost-primary'"
                        >
                            {{ category.name }}
                        </span>
                    </div>
                </section>

                <hr v-if="related.length" class="my-6 border-impost-fifth/10">

                <!-- Artikel terkait -->
                <section v-if="related.length">
                    <div class="flex items-center justify-between">
                        <h2 class="text-sm font-bold">Artikel Terkait</h2>
                        <Link
                            :href="route('articles.index')"
                            class="text-xs font-bold text-impost-fifth/60 transition-colors hover:text-impost-primary"
                        >
                            Lihat Semua
                        </Link>
                    </div>
                    <div class="mt-4 space-y-5">
                        <Link
                            v-for="item in related.slice(0, 3)"
                            :key="item.slug"
                            :href="route('articles.show', item.slug)"
                            class="group flex gap-3"
                        >
                            <div class="w-24 shrink-0 overflow-hidden rounded-xl bg-impost-fifth/5">
                                <img
                                    v-if="coverSrc(item)"
                                    :src="coverSrc(item)"
                                    :alt="item.title"
                                    loading="lazy"
                                    class="size-full object-cover transition duration-300 group-hover:scale-105"
                                >
                            </div>
                            <div class="min-w-0">
                                <p class="inline-flex items-center gap-1.5 text-xs text-impost-fifth">
                                    <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                                    </svg>
                                    {{ formatDate(item.created_at) }}
                                </p>
                                <h3 class="mt-1 line-clamp-2 text-sm font-bold leading-snug transition-colors group-hover:text-impost-secondary">
                                    {{ item.title }}
                                </h3>
                            </div>
                        </Link>
                    </div>
                </section>
            </aside>
        </div>
    </HomeLayout>
</template>
