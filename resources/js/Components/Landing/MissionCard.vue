<script>
/**
 * Ikon pilar Misi (Heroicons v2 outline), disimpan sebagai `d` saja.
 * Ditaruh di `<script>` biasa karena `defineProps()` tidak boleh
 * mereferensikan variabel yang dideklarasikan di `<script setup>`.
 */
const ICONS = {
    /** Digital marketing berbasis data */
    analytics: "M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z",
    /** Event organizer, hiburan, music performance & production */
    event: "M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z",
    /** Pengadaan barang dan jasa */
    procurement: "m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9",
};

export default {
    name: "MissionCard",
};
</script>

<script setup>
import { computed } from "vue";
import { motion } from "motion-v";
import { fadeUp } from "@/motion/presets";

/**
 * Kartu pilar Misi.
 *
 * Sebelumnya tiap pilar ditandai angka besar. Sekarang tiap pilar punya
 * ikon SVG sesuai temanya, dibungkus kartu `impost-primary/10` (rounded-2xl,
 * konsisten dengan ServiceTile & CtaCard).
 *
 * Animasi: hanya `variants` yang dipasang (tanpa `initial`), sehingga kartu
 * mengikuti urutan `StaggerGroup` induknya dan tetap tampil normal bila
 * dipakai di luar grup.
 */
const props = defineProps({
    icon: {
        type: String,
        default: "analytics",
        validator: (value) => Object.keys(ICONS).includes(value),
    },
    description: { type: String, required: true },
    /** `light` untuk Beranda (latar putih), `dark` untuk halaman /about */
    variant: {
        type: String,
        default: "light",
        validator: (value) => ["light", "dark"].includes(value),
    },
});

const path = computed(() => ICONS[props.icon] ?? ICONS.analytics);

const cardClass = computed(() =>
    props.variant === "dark"
        ? "flex flex-col rounded-2xl bg-white/[0.06] p-6"
        : "flex flex-col rounded-2xl bg-impost-primary/10 p-5",
);

const badgeClass = computed(() =>
    props.variant === "dark"
        ? "flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-impost-primary text-impost-fifth"
        : "flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-impost-primary text-impost-fifth",
);

const textClass = computed(() =>
    props.variant === "dark"
        ? "mt-5 text-base leading-relaxed text-white lg:text-lg"
        : "mt-4 text-sm leading-relaxed text-ink lg:text-base",
);

/** Diteruskan ke `<motion.article>`; urutan diatur oleh `StaggerGroup` induk. */
const itemVariants = fadeUp;
</script>

<template>
    <motion.article :class="cardClass" :variants="itemVariants">
        <span :class="badgeClass" aria-hidden="true">
            <svg
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.6"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" :d="path" />
            </svg>
        </span>

        <p :class="textClass">{{ description }}</p>
    </motion.article>
</template>
