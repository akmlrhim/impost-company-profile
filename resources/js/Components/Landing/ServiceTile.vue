<script setup>
import { computed } from "vue";
import { motion } from "motion-v";
import { fadeUp, useReducedMotion } from "@/motion/presets";

/**
 * Kartu Layanan Beranda (referensi Danantara "Lingkup Kerja").
 *
 * State normal: krem, judul + deskripsi + gambar bergradasi.
 * State hover: kartu gelap (`impost-fifth`) dan teks putih.
 */
const props = defineProps({
    title: { type: String, required: true },
    description: { type: String, default: "" },
    /** `{ src, alt }` atau null bila layanan belum punya cover. */
    image: { type: Object, default: null },
});

/** Urutan animasi diatur oleh `StaggerGroup` induk. */
const itemVariants = fadeUp;

/**
 * Lift saat hover dinonaktifkan manual saat reduce-motion, karena
 * `MotionConfig reducedMotion="user"` tidak mencakup gesture `whileHover`.
 */
const reducedMotion = useReducedMotion();
const hoverLift = computed(() => (reducedMotion.value ? undefined : { y: -4 }));
</script>

<template>
    <motion.article
        :variants="itemVariants"
        :while-hover="hoverLift"
        class="group flex flex-col overflow-hidden rounded-2xl bg-white transition-colors duration-200 hover:bg-impost-fifth"
    >
        <div class="flex flex-1 flex-col p-5">
            <h3
                class="text-lg font-medium leading-snug text-impost-fourth transition-colors duration-200 group-hover:text-white lg:text-xl"
            >
                {{ title }}
            </h3>

            <p
                v-if="description"
                class="mt-3 text-sm leading-relaxed text-impost-fifth transition-colors duration-200 group-hover:text-white"
            >
                {{ description }}
            </p>
        </div>

        <div class="relative mt-auto h-52 w-full lg:h-60">
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
