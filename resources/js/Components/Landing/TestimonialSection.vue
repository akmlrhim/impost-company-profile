<script setup>
import { computed, ref } from "vue";
import { motion, useInView } from "motion-v";
import { useAutoSlider } from "@/composables/useAutoSlider";
import { fadeIn, fadeUp, staggerContainer, VIEWPORT } from "@/motion/presets";

/**
 * Section Testimonial (slider) di bawah section Layanan.
 *
 * Konsep slider mengikuti referensi: kartu aktif di tengah (besar),
 * kartu tetangga tampil redup di sisi kiri-kanan, navigasi panah bulat.
 * Slide bergeser otomatis (pause saat kursor di atas slider), tanpa dots.
 * Tipe item fleksibel: `text` (quote besar), `photo` (foto + caption),
 * `video` (pemutar video). Tanpa rating bintang.
 */
const props = defineProps({
    /** `{ type, name, company, quote, media: { src, mime } | null }` */
    items: { type: Array, default: () => [] },
});

const rootEl = ref(null);
const inView = useInView(rootEl, VIEWPORT);
const container = staggerContainer(0.12);

const count = computed(() => props.items.length);
const { active, hovered, goTo } = useAutoSlider(count);
const activeItem = computed(() => props.items[active.value] ?? null);
const prevItem = computed(() =>
    count.value > 1 ? props.items[(active.value - 1 + count.value) % count.value] : null,
);
const nextItem = computed(() => (count.value > 1 ? props.items[(active.value + 1) % count.value] : null));

/** Inisial nama untuk avatar fallback item bertipe teks. */
function initials(name) {
    return (name ?? "")
        .split(/\s+/)
        .slice(0, 2)
        .map((word) => word.charAt(0))
        .join("")
        .toUpperCase();
}
</script>

<template>
    <section
        ref="rootEl"
        class="mx-auto max-w-[1440px] px-6 py-14 sm:px-10 lg:py-20"
        aria-label="Testimonial"
    >
        <motion.div
            :variants="container"
            initial="hidden"
            :animate="inView ? 'visible' : 'hidden'"
            class="flex flex-col items-center text-center"
        >
            <motion.h2
                :variants="fadeUp"
                class="mt-6 max-w-[760px] text-2xl font-bold leading-snug text-ink sm:text-3xl lg:text-4xl"
            >
                Cerita klien yang bertumbuh bersama kami
            </motion.h2>

            <motion.p
                :variants="fadeUp"
                class="mt-4 max-w-[560px] text-sm leading-relaxed text-ink lg:text-base"
            >
                Lihat apa kata klien tentang pengalaman dan hasil yang mereka raih selama bekerja sama dengan kami.
            </motion.p>
        </motion.div>

        <div
            v-if="count"
            class="mt-12 flex items-center justify-center gap-3 lg:mt-16 lg:gap-6"
            @mouseenter="hovered = true"
            @mouseleave="hovered = false"
        >
            <!-- Kartu sebelumnya (redup, hanya layar lebar) -->
            <article
                v-if="prevItem"
                class="hidden h-[360px] w-[260px] shrink-0 flex-col rounded-2xl bg-ink/5 p-5 opacity-50 xl:flex xl:h-[400px] xl:w-[300px]"
                aria-hidden="true"
            >
                <header class="flex items-center gap-3">
                    <img
                        v-if="prevItem.media && prevItem.type === 'photo'"
                        :src="prevItem.media.src"
                        :alt="prevItem.name"
                        class="size-10 rounded-full object-cover"
                    />
                    <span
                        v-else
                        class="grid size-10 place-items-center rounded-full bg-impost-primary/20 text-xs font-bold text-ink"
                    >
                        {{ initials(prevItem.name) }}
                    </span>
                    <div class="min-w-0 text-left">
                        <h3 class="truncate text-sm font-semibold text-ink">{{ prevItem.name }}</h3>
                        <p v-if="prevItem.company" class="truncate text-xs text-ink/60">{{ prevItem.company }}</p>
                    </div>
                </header>

                <p class="mt-4 text-sm leading-relaxed text-ink/80 line-clamp-6">
                    &ldquo;{{ prevItem.quote }}&rdquo;
                </p>
            </article>

            <!-- Navigasi sebelumnya -->
            <button
                v-if="count > 1"
                type="button"
                class="z-10 grid size-10 shrink-0 place-items-center rounded-full border border-line bg-paper text-ink transition-colors hover:border-impost-primary hover:text-impost-primary"
                aria-label="Testimonial sebelumnya"
                @click="goTo(-1)"
            >
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Kartu aktif: naik setengah nada di tema gelap, hitam brand di tema terang.
                 Di mobile kartu ikut menyusut mengisi sisa ruang antara panah (tanpa overflow). -->
            <div class="relative h-[420px] min-w-0 flex-1 overflow-hidden rounded-2xl bg-ink/5 sm:w-[340px] sm:flex-none lg:h-[480px] lg:w-[380px] light:bg-impost-fifth">
                <motion.div
                    :key="active"
                    :variants="fadeIn"
                    initial="hidden"
                    animate="visible"
                    class="size-full"
                >
                    <!-- Tipe teks: quote besar -->
                    <div v-if="activeItem.type === 'text' || !activeItem.media" class="flex size-full flex-col p-6 text-left lg:p-8">
                        <p class="text-base leading-relaxed text-white sm:text-lg lg:text-xl">
                            &ldquo;{{ activeItem.quote }}&rdquo;
                        </p>

                        <footer class="mt-auto">
                            <p class="text-sm font-semibold text-white">{{ activeItem.name }}</p>
                            <p v-if="activeItem.company" class="mt-0.5 text-xs text-white/60">{{ activeItem.company }}</p>
                        </footer>
                    </div>

                    <!-- Tipe foto: foto + caption -->
                    <template v-else-if="activeItem.type === 'photo'">
                        <img
                            :src="activeItem.media.src"
                            :alt="`Foto testimonial ${activeItem.name}`"
                            class="absolute inset-0 size-full object-cover"
                        />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-impost-fifth/90 via-impost-fifth/10 to-transparent"
                            aria-hidden="true"
                        />
                        <div class="absolute inset-x-0 bottom-0 p-5 text-left lg:p-6">
                            <p class="text-sm font-semibold text-white">{{ activeItem.name }}</p>
                            <p v-if="activeItem.company" class="mt-0.5 text-xs text-white/70">{{ activeItem.company }}</p>
                            <p class="mt-2 text-xs leading-relaxed text-white/80 line-clamp-2">
                                &ldquo;{{ activeItem.quote }}&rdquo;
                            </p>
                        </div>
                    </template>

                    <!-- Tipe video: pemutar -->
                    <template v-else>
                        <video
                            class="absolute inset-0 size-full object-cover"
                            :src="activeItem.media.src"
                            controls
                            playsinline
                            preload="metadata"
                        ></video>
                    </template>
                </motion.div>
            </div>

            <!-- Navigasi berikutnya -->
            <button
                v-if="count > 1"
                type="button"
                class="z-10 grid size-10 shrink-0 place-items-center rounded-full border border-line bg-paper text-ink transition-colors hover:border-impost-primary hover:text-impost-primary"
                aria-label="Testimonial berikutnya"
                @click="goTo(1)"
            >
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Kartu berikutnya (redup, hanya layar lebar) -->
            <article
                v-if="nextItem"
                class="hidden h-[360px] w-[260px] shrink-0 flex-col rounded-2xl bg-ink/5 p-5 opacity-50 xl:flex xl:h-[400px] xl:w-[300px]"
                aria-hidden="true"
            >
                <header class="flex items-center gap-3">
                    <img
                        v-if="nextItem.media && nextItem.type === 'photo'"
                        :src="nextItem.media.src"
                        :alt="nextItem.name"
                        class="size-10 rounded-full object-cover"
                    />
                    <span
                        v-else
                        class="grid size-10 place-items-center rounded-full bg-impost-primary/20 text-xs font-bold text-ink"
                    >
                        {{ initials(nextItem.name) }}
                    </span>
                    <div class="min-w-0 text-left">
                        <h3 class="truncate text-sm font-semibold text-ink">{{ nextItem.name }}</h3>
                        <p v-if="nextItem.company" class="truncate text-xs text-ink/60">{{ nextItem.company }}</p>
                    </div>
                </header>

                <p class="mt-4 text-sm leading-relaxed text-ink/80 line-clamp-6">
                    &ldquo;{{ nextItem.quote }}&rdquo;
                </p>
            </article>
        </div>
    </section>
</template>
