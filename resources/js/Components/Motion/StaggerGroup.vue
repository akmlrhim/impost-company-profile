<script setup>
import { computed, ref } from "vue";
import { motion, useInView } from "motion-v";
import { staggerContainer, VIEWPORT } from "@/motion/presets";

/**
 * StaggerGroup - container yang mengurutkan animasi anak-anaknya.
 *
 * Animasi dijalankan lewat `useInView` + `:animate` (pola kanonik) supaya
 * label variant benar-benar merambat ke `<StaggerItem>` anak.
 *
 * Pemakaian:
 *   <StaggerGroup class="grid gap-3 lg:grid-cols-3">
 *     <StaggerItem v-for="..." />
 *   </StaggerGroup>
 */
const props = defineProps({
    as: { type: String, default: "div" },
    /** Jeda antar anak (detik). */
    stagger: { type: [Number, String], default: 0.08 },
});

const root = ref(null);
const inView = useInView(root, VIEWPORT);

const variants = computed(() => staggerContainer(Number(props.stagger)));
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
