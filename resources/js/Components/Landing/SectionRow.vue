<script setup>
import { ref } from "vue";
import { motion, useInView } from "motion-v";
import { fadeUp, staggerContainer, VIEWPORT } from "@/motion/presets";

/**
 * SectionRow - label di atas sebagai header + konten di bawahnya.
 *
 * Label dan konten dianimasikan berurutan saat section masuk viewport.
 * Karena variant diteruskan lewat `motion.*`, tidak ada elemen pembungkus
 * tambahan sehingga grid tetap sama persis.
 */
defineProps({
    label: {
        type: String,
        default: "",
    },
});

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
        <div class="grid gap-y-6">
            <motion.h2 v-if="label" :variants="fadeUp" class="text-xs font-bold uppercase leading-none text-impost-third lg:text-sm">
                {{ label }}
            </motion.h2>

            <motion.div :variants="fadeUp" class="min-w-0">
                <slot />
            </motion.div>
        </div>
    </motion.section>
</template>
