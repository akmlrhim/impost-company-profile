<script setup>
import { computed, ref } from "vue";
import { motion, useInView } from "motion-v";
import { fadeIn, fadeUp, VIEWPORT } from "@/motion/presets";

/**
 * Reveal - membungkus konten agar muncul saat masuk viewport.
 *
 * Animasi dijalankan lewat `useInView` + `:animate` (pola kanonik), bukan
 * `while-in-view`, karena variant `while-in-view` pada container tidak
 * merambat ke elemen anaknya.
 *
 * Pemakaian:
 *   <Reveal>...</Reveal>
 *   <Reveal as="section" :delay="0.1">...</Reveal>
 *   <Reveal variant="fade">...</Reveal>
 */
const props = defineProps({
    /** Tag HTML yang dirender (default `div`). */
    as: { type: String, default: "div" },
    /** `fade-up` | `fade` */
    variant: {
        type: String,
        default: "fade-up",
        validator: (value) => ["fade-up", "fade"].includes(value),
    },
    /** Jeda mulai animasi (detik). */
    delay: { type: [Number, String], default: 0 },
});

const root = ref(null);
const inView = useInView(root, VIEWPORT);

const VARIANTS = { "fade-up": fadeUp, fade: fadeIn };

const variants = computed(() => {
    const base = VARIANTS[props.variant] ?? fadeUp;

    if (!props.delay) {
        return base;
    }

    return {
        hidden: base.hidden,
        visible: { ...base.visible, transition: { ...base.visible.transition, delay: Number(props.delay) } },
    };
});
</script>

<template>
    <motion.div
        ref="root"
        :as="as"
        :variants="variants"
        initial="hidden"
        :animate="inView ? 'visible' : 'hidden'"
    >
        <slot />
    </motion.div>
</template>
