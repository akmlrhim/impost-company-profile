<script setup>
import { motion } from "motion-v";
import { fadeUp } from "@/motion/presets";

/**
 * Kartu Layanan Beranda (referensi Danantara "Lingkup Kerja").
 *
 * State normal: kartu naik setengah nada dari latar halaman (ink/5).
 * State hover: overlay hitam (impost-fifth) langsung menutupi seluruh
 * kartu, teks berubah putih. Tanpa panah, tanpa animasi terangkat.
 * Tampilan mengikuti tema aktif (gelap default / terang) lewat token ink & line.
 */
const props = defineProps({
    title: { type: String, required: true },
    description: { type: String, default: "" },
    /** `{ src, alt }` atau null bila layanan belum punya cover. */
    image: { type: Object, default: null },
});

/** Urutan animasi diatur oleh `StaggerGroup` induk. */
const itemVariants = fadeUp;
</script>

<template>
    <motion.article
        :variants="itemVariants"
        class="group relative flex flex-col overflow-hidden rounded-2xl bg-ink/5"
    >
        <!-- Overlay hover: emas di tema gelap, hitam di tema terang. Tanpa animasi. -->
        <div
            class="absolute inset-0 z-10 bg-impost-primary opacity-0 group-hover:opacity-100 light:bg-impost-fifth"
            aria-hidden="true"
        />

        <div class="relative z-20 flex flex-1 flex-col p-5">
            <h3
                class="text-lg font-medium leading-snug text-ink transition-colors duration-200 group-hover:text-impost-fifth light:group-hover:text-white lg:text-xl"
            >
                {{ title }}
            </h3>

            <p
                v-if="description"
                class="mt-3 text-sm leading-relaxed text-ink/80 transition-colors duration-200 group-hover:text-impost-fifth/90 light:group-hover:text-white"
            >
                {{ description }}
            </p>
        </div>

        <div class="relative z-0 mt-auto h-52 w-full lg:h-60">
            <img
                v-if="image"
                :src="image.src"
                :alt="image.alt"
                loading="lazy"
                class="absolute inset-0 h-full w-full object-cover [mask-image:linear-gradient(to_bottom,transparent,black_40%)] [-webkit-mask-image:linear-gradient(to_bottom,transparent,black_40%)]"
            >
            <div v-else class="absolute inset-0 bg-impost-primary/20" aria-hidden="true" />
        </div>
    </motion.article>
</template>
