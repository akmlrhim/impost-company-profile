<script setup>
import { ref } from "vue";
import { motion, useInView } from "motion-v";
import { fadeUp, staggerContainer, VIEWPORT } from "@/motion/presets";

/**
 * Section "Tentang Kami" di halaman Beranda.
 *
 * Mengikuti referensi desain: label kecil di kiri-atas, lalu dua kolom,
 * kiri pernyataan besar (nama brand tebal), kanan paragraf pendukung + tautan
 * "Pelajari Lebih Lanjut" menuju halaman Tentang Kami.
 *
 * Label, pernyataan, dan kolom pendukung muncul berurutan saat masuk viewport.
 */
const root = ref(null);
const inView = useInView(root, VIEWPORT);

const container = staggerContainer(0.12);
</script>

<template>
    <motion.section
        ref="root"
        class="mx-auto max-w-[1440px] px-6 py-14 sm:px-10 lg:py-20"
        :variants="container"
        initial="hidden"
        :animate="inView ? 'visible' : 'hidden'"
    >
        <motion.p :variants="fadeUp" class="text-xs font-bold uppercase text-impost-third lg:text-sm">
            Tentang Kami
        </motion.p>

        <div class="mt-6 grid gap-y-8 lg:grid-cols-[1.8fr_1fr] lg:gap-x-20">
            <motion.h1
                :variants="fadeUp"
                class="text-2xl font-light leading-snug text-ink sm:text-3xl lg:text-4xl"
            >
                <strong class="font-bold">Impost Media</strong> adalah All-in-One Integrated Digital Marketing Agency
                sekaligus perusahaan multiservice yang membantu bisnis Indonesia bertumbuh dengan arah yang jelas,
                sistem yang kuat, dan dampak yang berkelanjutan.
            </motion.h1>

            <motion.div :variants="fadeUp" class="lg:pt-2">
                <p class="text-base leading-relaxed text-ink lg:text-lg">
                    Berpusat di Banjarbaru, Kalimantan Selatan, kami mendampingi bisnis untuk merapikan makna,
                    membangun identitas merek yang kuat, dan meningkatkan visibilitas secara natural.
                </p>

                <Link
                    :href="route('about')"
                    class="group mt-6 inline-flex items-center gap-2 text-base font-light text-ink transition-colors hover:text-impost-secondary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 lg:text-lg"
                >
                    Pelajari Lebih Lanjut
                    <span
                        aria-hidden="true"
                        class="text-impost-secondary transition-transform duration-200 group-hover:translate-x-1"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="h-5 w-5 lg:h-6 lg:w-6"
                        >
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </Link>
            </motion.div>
        </div>
    </motion.section>
</template>
