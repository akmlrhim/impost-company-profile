<script setup>
import { motion } from "motion-v";
import { fadeUp } from "@/motion/presets";

defineProps({
    title: { type: String, required: true },
    description: { type: String, default: "" },
    /** [{ src, alt }] */
    logos: { type: Array, default: () => [] },
});

/** Urutan animasi diatur oleh `StaggerGroup` induk. */
const itemVariants = fadeUp;
</script>

<template>
    <motion.div :variants="itemVariants" class="rounded-2xl bg-impost-fifth p-5">
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <h3 class="text-xl font-bold leading-tight text-white lg:text-2xl">{{ title }}</h3>
                <p v-if="description" class="mt-3 text-sm leading-relaxed text-white">{{ description }}</p>
            </div>

            <div v-if="logos.length" class="grid grid-cols-3 gap-3">
                <div
                    v-for="logo in logos"
                    :key="logo.src"
                    class="flex h-14 items-center justify-center p-2"
                >
                    <img
                        :src="logo.src"
                        :alt="logo.alt"
                        class="max-h-full max-w-full object-contain brightness-0 invert transition duration-200 hover:opacity-70"
                        loading="lazy"
                    >
                </div>
            </div>

            <p v-else class="text-sm italic leading-relaxed text-white lg:text-base">
                [Logo klien akan tampil di sini setelah data klien ditambahkan.]
            </p>
        </div>
    </motion.div>
</template>
