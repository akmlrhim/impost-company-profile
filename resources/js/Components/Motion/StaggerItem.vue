<script setup>
import { computed } from "vue";
import { motion } from "motion-v";
import { fadeUp, scaleIn } from "@/motion/presets";

/**
 * StaggerItem - anak dari `StaggerGroup`.
 *
 * Mewarisi urutan animasi dari container induk, jadi tidak perlu
 * mengatur `initial`/`while-in-view` sendiri.
 */
const props = defineProps({
    as: { type: String, default: "div" },
    /** `fade-up` | `scale` */
    variant: {
        type: String,
        default: "fade-up",
        validator: (value) => ["fade-up", "scale"].includes(value),
    },
});

const VARIANTS = { "fade-up": fadeUp, scale: scaleIn };

const variants = computed(() => VARIANTS[props.variant] ?? fadeUp);
</script>

<template>
    <motion.div :as="as" :variants="variants">
        <slot />
    </motion.div>
</template>
