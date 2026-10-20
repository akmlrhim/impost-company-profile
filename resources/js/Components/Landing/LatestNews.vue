<script setup>
import { computed, ref } from "vue";
import { motion, useInView } from "motion-v";
import { fadeUp, staggerContainer, VIEWPORT } from "@/motion/presets";

/**
 * Section "Berita Terbaru" di halaman Beranda.
 *
 * Mengikuti konsep layout editorial (referensi Fox News "Latest Updates"):
 * judul section di tengah bergaris bawah, lalu 4 kolom berisi
 * artikel teks, artikel unggulan bergambar besar, artikel bergambar,
 * dan artikel teks kecil. Warna mengikuti token proyek (impost-*).
 *
 * Setiap artikel dibungkus Link menuju halaman detail (articles.show).
 */
const props = defineProps({
    /** [{ slug, title, excerpt, author, date, cover }] */
    articles: { type: Array, default: () => [] },
});

const root = ref(null);
const inView = useInView(root, VIEWPORT);

const container = staggerContainer(0.1);

/** Artikel terbaru jadi unggulan di kolom tengah. */
const featured = computed(() => props.articles[0] ?? null);
const textColumn = computed(() => props.articles.slice(1, 3));
const imageColumn = computed(() => props.articles.slice(3, 5));
const smallColumn = computed(() => props.articles.slice(5, 7));

function formatDate(value) {
    if (!value) {
        return "";
    }

    return new Date(value).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
}

/** Inisial penulis untuk avatar lingkaran. */
function initials(name) {
    return (name || "?")
        .split(" ")
        .filter(Boolean)
        .slice(0, 2)
        .map((word) => word[0].toUpperCase())
        .join("");
}

/** Sumber gambar: URL absolut atau path storage, null bila tidak ada cover. */
function coverSrc(article) {
    if (!article?.cover) {
        return null;
    }

    return /^(https?:)?\//.test(article.cover.src) ? article.cover.src : `/storage/${article.cover.src}`;
}
</script>

<template>
    <motion.section
        ref="root"
        class="mx-auto max-w-[1440px] px-6 py-14 sm:px-10 lg:py-20"
        :variants="container"
        initial="hidden"
        :animate="inView ? 'visible' : 'hidden'"
    >
        <motion.h2
            :variants="fadeUp"
            class="mx-auto w-fit border-b-2 border-impost-fifth pb-1 text-center text-2xl font-bold tracking-tight text-impost-fifth sm:text-3xl"
        >
            Berita Terbaru
        </motion.h2>

        <p v-if="!articles.length" class="mt-10 text-sm italic text-impost-third lg:text-base">
            [Daftar berita akan tampil di sini setelah artikel dipublikasikan.]
        </p>

        <div
            v-else
            class="mt-10 grid gap-x-8 gap-y-12 md:grid-cols-2 lg:grid-cols-[1fr_1.5fr_1fr_1fr] lg:divide-x lg:divide-impost-fifth/10"
        >
            <!-- Kolom 1: dua artikel teks -->
            <motion.div v-if="textColumn.length" :variants="fadeUp" class="space-y-10 lg:pr-2">
                <Link
                    v-for="article in textColumn"
                    :key="article.slug"
                    :href="route('articles.show', article.slug)"
                    class="group block"
                >
                    <p class="text-xs font-bold uppercase text-impost-third">{{ formatDate(article.date) }}</p>
                    <h3 class="mt-2 text-xl font-bold leading-snug text-impost-fifth transition group-hover:text-impost-third lg:text-2xl">
                        {{ article.title }}
                    </h3>
                    <p v-if="article.excerpt" class="mt-3 text-sm leading-relaxed text-impost-fifth">
                        {{ article.excerpt }}
                    </p>
                    <div class="mt-4 flex items-center gap-3">
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-impost-primary/30 text-xs font-bold text-impost-fifth"
                            aria-hidden="true"
                        >
                            {{ initials(article.author) }}
                        </span>
                        <div>
                            <p class="text-sm font-bold leading-tight text-impost-fifth">{{ article.author }}</p>
                            <p class="text-xs text-impost-third">Penulis</p>
                        </div>
                    </div>
                </Link>
            </motion.div>

            <!-- Kolom 2: artikel unggulan bergambar besar -->
            <Link
                v-if="featured"
                :href="route('articles.show', featured.slug)"
                class="group block md:col-span-2 lg:col-span-1 lg:px-8"
            >
                <motion.article :variants="fadeUp">
                <div class="relative h-64 w-full overflow-hidden rounded-2xl lg:h-72">
                    <img
                        v-if="coverSrc(featured)"
                        :src="coverSrc(featured)"
                        :alt="featured.title"
                        loading="lazy"
                        class="absolute inset-0 size-full object-cover transition duration-300 group-hover:scale-105"
                    >
                    <div v-else class="absolute inset-0 bg-impost-primary/20" aria-hidden="true" />
                </div>

                <h3 class="mt-5 text-2xl font-bold leading-snug text-impost-fifth transition group-hover:text-impost-third lg:text-3xl">
                    {{ featured.title }}
                </h3>
                <p v-if="featured.excerpt" class="mt-3 text-sm leading-relaxed text-impost-fifth lg:text-base">
                    {{ featured.excerpt }}
                </p>

                <div class="mt-4 flex items-center gap-3">
                    <span
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-impost-primary/30 text-xs font-bold text-impost-fifth"
                        aria-hidden="true"
                    >
                        {{ initials(featured.author) }}
                    </span>
                    <div>
                        <p class="text-sm font-bold leading-tight text-impost-fifth">{{ featured.author }}</p>
                        <p class="text-xs text-impost-third">Penulis</p>
                    </div>
                </div>
                </motion.article>
            </Link>

            <!-- Kolom 3: dua artikel bergambar -->
            <motion.div v-if="imageColumn.length" :variants="fadeUp" class="space-y-10 lg:px-8">
                <Link
                    v-for="article in imageColumn"
                    :key="article.slug"
                    :href="route('articles.show', article.slug)"
                    class="group block"
                >
                    <div class="relative h-40 w-full overflow-hidden rounded-2xl">
                        <img
                            v-if="coverSrc(article)"
                            :src="coverSrc(article)"
                            :alt="article.title"
                            loading="lazy"
                            class="absolute inset-0 size-full object-cover transition duration-300 group-hover:scale-105"
                        >
                        <div v-else class="absolute inset-0 bg-impost-primary/20" aria-hidden="true" />
                    </div>
                    <h3 class="mt-4 text-lg font-bold leading-snug text-impost-fifth transition group-hover:text-impost-third lg:text-xl">
                        {{ article.title }}
                    </h3>
                    <p class="mt-2 text-xs uppercase tracking-wide text-impost-third">
                        {{ article.author }}
                    </p>
                </Link>
            </motion.div>

            <!-- Kolom 4: dua artikel teks kecil -->
            <motion.div v-if="smallColumn.length" :variants="fadeUp" class="space-y-10 lg:pl-8">
                <Link
                    v-for="article in smallColumn"
                    :key="article.slug"
                    :href="route('articles.show', article.slug)"
                    class="group block"
                >
                    <h3 class="text-lg font-bold leading-snug text-impost-fifth transition group-hover:text-impost-third lg:text-xl">
                        {{ article.title }}
                    </h3>
                    <p v-if="article.excerpt" class="mt-2 text-sm leading-relaxed text-impost-fifth">
                        {{ article.excerpt }}
                    </p>
                    <div class="mt-4 flex items-center gap-3">
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-impost-primary/30 text-xs font-bold text-impost-fifth"
                            aria-hidden="true"
                        >
                            {{ initials(article.author) }}
                        </span>
                        <div>
                            <p class="text-sm font-bold leading-tight text-impost-fifth">{{ article.author }}</p>
                            <p class="text-xs text-impost-third">Penulis</p>
                        </div>
                    </div>
                </Link>
            </motion.div>
        </div>
    </motion.section>
</template>
