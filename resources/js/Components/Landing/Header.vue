<script>
/**
 * Module-level: animasi fadeDown navbar hanya diputar sekali per muatan
 * halaman penuh (hard refresh). Navigasi SPA tidak mengulang animasi.
 */
let headerAnimated = false;
</script>

<script setup>
import { computed, onMounted, onUnmounted, ref } from "vue";
import { motion } from "motion-v";
import Logo from "@/Components/Landing/Logo.vue";
import { fadeDown } from "@/motion/presets";

const instagram = "https://instagram.com/impostmedia";
const instagramLabel = "@impostmedia";

const mobileOpen = ref(false);
const scrolled = ref(false);

/** "hidden" hanya di mount pertama; mount berikutnya (SPA) langsung "visible". */
const headerInitial = headerAnimated ? "visible" : "hidden";

/**
 * Transparan hanya saat halaman punya hero gelap (home) dan belum di-scroll.
 * Halaman lain berlatar terang di bagian atas, jadi langsung memakai bg putih.
 */
const transparent = computed(() => !scrolled.value && !mobileOpen.value && route().current("home"));

const toneClass = computed(() =>
    transparent.value
        ? "text-white"
        : "text-impost-fifth",
);

function onScroll() {
    scrolled.value = window.scrollY > 24;
}

onMounted(() => {
    headerAnimated = true;
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener("scroll", onScroll);
});
</script>

<template>
  <motion.header
    class="fixed inset-x-0 top-0 z-50 border-b transition-colors duration-300"
    :class="transparent ? 'border-transparent bg-transparent' : 'border-impost-fifth/10 bg-white'"
    :variants="fadeDown"
    :initial="headerInitial"
    animate="visible"
  >
    <div class="mx-auto flex h-[86px] max-w-[1440px] items-center justify-between px-6 sm:px-10">
      <Link
        :href="route('home')"
        class="flex shrink-0 items-center rounded-none transition-colors duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2"
        :class="toneClass"
        aria-label="IMPOST MEDIA - Beranda"
      >
        <Logo size="lg" :wordmark="false" />
      </Link>

      <nav
        class="hidden items-center gap-8 transition-colors duration-300 md:flex"
        :class="toneClass"
        aria-label="Navigasi utama"
      >
        <a
          :href="instagram"
          target="_blank"
          rel="noopener"
          class="text-xs font-bold transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 lg:text-sm"
        >
          {{ instagramLabel }}
        </a>
        <Link
          :href="route('contact.index')"
          class="text-xs font-bold transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 lg:text-sm"
        >
          Kontak Kami
        </Link>
      </nav>

      <button
        type="button"
        class="inline-flex size-11 cursor-pointer items-center justify-center transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary md:hidden"
        :class="toneClass"
        :aria-expanded="mobileOpen"
        aria-controls="landing-mobile-nav"
        :aria-label="mobileOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi'"
        @click="mobileOpen = !mobileOpen"
      >
        <svg v-if="!mobileOpen" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg v-else class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <nav
      v-if="mobileOpen"
      id="landing-mobile-nav"
      class="border-t border-impost-fifth/10 bg-white px-6 py-4 md:hidden"
      aria-label="Navigasi mobile"
    >
      <ul class="flex flex-col gap-4">
        <li>
          <a
            :href="instagram"
            target="_blank"
            rel="noopener"
            class="block text-sm font-bold text-impost-fifth"
            @click="mobileOpen = false"
          >
            {{ instagramLabel }}
          </a>
        </li>
        <li>
          <Link
            :href="route('contact.index')"
            class="block text-sm font-bold text-impost-fifth"
            @click="mobileOpen = false"
          >
            Kontak Kami
          </Link>
        </li>
      </ul>
    </nav>
  </motion.header>
</template>
