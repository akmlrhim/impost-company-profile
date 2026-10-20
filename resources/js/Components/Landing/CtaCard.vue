<script setup>
import { motion } from "motion-v";
import { fadeUp } from "@/motion/presets";

defineProps({
  title: { type: String, required: true },
  description: { type: String, default: "" },
  ctaLabel: { type: String, default: "Hubungi Kami" },
  ctaHref: { type: String, required: true },
});

/** Urutan animasi diatur oleh `StaggerGroup` induk. */
const itemVariants = fadeUp;
</script>

<template>
  <motion.div :variants="itemVariants" class="flex flex-col justify-between rounded-2xl bg-impost-fifth p-5">
    <div>
      <h3 class="text-xl font-bold leading-tight text-white lg:text-2xl">{{ title }}</h3>
      <p class="mt-3 text-justify text-sm leading-relaxed text-white">{{ description }}</p>
    </div>

    <Link :href="ctaHref"
      class="mt-6 inline-block text-justify w-fit rounded-lg bg-impost-primary px-4 py-2 text-xs font-bold text-impost-fifth transition-colors duration-200 hover:bg-impost-secondary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 lg:text-sm">
    {{ ctaLabel }}
    </Link>
  </motion.div>
</template>
