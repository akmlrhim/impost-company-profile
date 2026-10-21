<script setup>
import { computed, ref } from "vue";
import { motion, useInView } from "motion-v";
import { useAutoSlider } from "@/composables/useAutoSlider";
import { fadeIn, fadeUp, VIEWPORT } from "@/motion/presets";

/**
 * Section "Artikel Terbaru" di halaman Beranda.
 *
 * Slider layar penuh (full-bleed): setiap slide memakai cover artikel
 * asli sebagai latar penuh dengan gradasi gelap, judul tebal, excerpt,
 * dan tombol "Baca Selengkapnya". Navigasi panah + slide otomatis
 * (pause saat kursor di atas slider).
 */
const props = defineProps({
    /** [{ slug, title, excerpt, author, date, cover }] */
    articles: { type: Array, default: () => [] },
});

const root = ref(null);
const inView = useInView(root, VIEWPORT);

const count = computed(() => props.articles.length);
const { active, hovered, goTo } = useAutoSlider(count);
const activeArticle = computed(() => props.articles[active.value] ?? null);

/** Sumber gambar: URL absolut atau path storage, null bila tidak ada cover. */
function coverSrc(article) {
    if (!article?.cover) {
        return null;
    }

    return /^(https?:)?\//.test(article.cover.src) ? article.cover.src : `/storage/${article.cover.src}`;
}
</script>

<template>
    <section
        ref="root"
        class="relative w-full overflow-hidden bg-impost-fifth"
        aria-label="Artikel terbaru"
    >
        <motion.div
            v-if="!articles.length"
            :variants="fadeUp"
            initial="hidden"
            :animate="inView ? 'visible' : 'hidden'"
            class="mx-auto max-w-[1440px] px-6 py-14 sm:px-10 lg:py-20"
        >
            <p class="text-sm italic text-white/60 lg:text-base">
                [Daftar artikel akan tampil di sini setelah artikel dipublikasikan.]
            </p>
        </motion.div>

        <div
            v-else
            class="relative min-h-[460px] sm:min-h-[540px] lg:min-h-[620px]"
            @mouseenter="hovered = true"
            @mouseleave="hovered = false"
        >
            <!-- Latar cover artikel aktif -->
            <motion.div
                :key="`bg-${active}`"
                :variants="fadeIn"
                initial="hidden"
                animate="visible"
                class="absolute inset-0"
                aria-hidden="true"
            >
                <img
                    v-if="coverSrc(activeArticle)"
                    :src="coverSrc(activeArticle)"
                    :alt="activeArticle.title"
                    class="absolute inset-0 size-full object-cover"
                >
                <div
                    class="absolute inset-0 bg-gradient-to-t from-impost-fifth via-impost-fifth/60 to-impost-fifth/25"
                />
            </motion.div>

            <!-- Konten slide -->
            <div
                class="relative mx-auto flex min-h-[460px] max-w-[1440px] flex-col justify-end px-6 py-12 sm:min-h-[540px] sm:px-10 lg:min-h-[620px] lg:py-16"
            >
                <motion.div
                    :key="`content-${active}`"
                    :variants="fadeUp"
                    initial="hidden"
                    animate="visible"
                    class="max-w-[720px]"
                >
                    <p class="text-xs font-bold uppercase tracking-wide text-impost-primary lg:text-sm">
                        Artikel Terbaru
                    </p>

                    <h2 class="mt-4 text-2xl font-bold leading-snug text-white sm:text-3xl lg:text-4xl">
                        {{ activeArticle.title }}
                    </h2>

                    <p
                        v-if="activeArticle.excerpt"
                        class="mt-3 text-sm leading-relaxed text-white/80 line-clamp-3 lg:text-base"
                    >
                        {{ activeArticle.excerpt }}
                    </p>

                    <Link
                        :href="route('articles.show', activeArticle.slug)"
                        class="mt-6 inline-flex items-center gap-2 rounded-full bg-impost-primary px-6 py-3 text-xs font-bold uppercase tracking-wide text-impost-fifth transition-colors hover:bg-impost-secondary"
                    >
                        Baca Selengkapnya
                        <svg
                            class="size-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                            aria-hidden="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m0 0l-6-6m6 6l-6 6" />
                        </svg>
                    </Link>
                </motion.div>
            </div>

            <!-- Navigasi -->
            <button
                v-if="count > 1"
                type="button"
                class="absolute left-4 top-1/2 z-10 grid size-10 -translate-y-1/2 place-items-center rounded-full border border-white/30 bg-impost-fifth/40 text-white backdrop-blur transition-colors hover:border-impost-primary hover:bg-impost-primary hover:text-impost-fifth sm:left-6"
                aria-label="Artikel sebelumnya"
                @click="goTo(-1)"
            >
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button
                v-if="count > 1"
                type="button"
                class="absolute right-4 top-1/2 z-10 grid size-10 -translate-y-1/2 place-items-center rounded-full border border-white/30 bg-impost-fifth/40 text-white backdrop-blur transition-colors hover:border-impost-primary hover:bg-impost-primary hover:text-impost-fifth sm:right-6"
                aria-label="Artikel berikutnya"
                @click="goTo(1)"
            >
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>
</template>
