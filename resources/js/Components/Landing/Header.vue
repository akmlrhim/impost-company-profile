<script>
let headerAnimated = false;
</script>

<script setup>
import { computed, onMounted, onUnmounted, ref } from "vue";
import { motion } from "motion-v";
import Logo from "@/Components/Landing/Logo.vue";
import { useTheme } from "@/composables/useTheme";
import { fadeDown } from "@/motion/presets";

const instagram = "https://instagram.com/impostmedia";
const instagramLabel = "@impostmedia";

const { isLight, toggle: toggleTheme } = useTheme();

const themeLabel = computed(() =>
  isLight.value ? "Ganti ke tema gelap" : "Ganti ke tema terang",
);

const mobileOpen = ref(false);
const scrolled = ref(false);

const headerInitial = headerAnimated ? "visible" : "hidden";

const transparent = computed(() => !scrolled.value && !mobileOpen.value && route().current("home"));

const toneClass = computed(() =>
  transparent.value
    ? "text-white"
    : "text-ink",
);

const themeButtonClass = computed(() => [
  toneClass.value,
  "size-10 shrink-0 cursor-pointer items-center justify-center transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary",
]);

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
  <motion.header class="fixed inset-x-0 top-0 z-50 border-b transition-colors duration-300"
    :class="transparent ? 'border-transparent bg-transparent' : 'border-line bg-paper'" :variants="fadeDown"
    :initial="headerInitial" animate="visible">
    <div class="mx-auto flex h-[86px] max-w-[1440px] items-center justify-between px-6 sm:px-10">
      <Link :href="route('home')"
        class="flex shrink-0 items-center rounded-none transition-colors duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2"
        :class="toneClass" aria-label="IMPOST MEDIA - Beranda">
      <Logo size="lg" :wordmark="false" />
      </Link>

      <nav class="hidden items-center gap-8 transition-colors duration-300 md:flex" :class="toneClass"
        aria-label="Navigasi utama">
        <a :href="instagram" target="_blank" rel="noopener"
          class="text-xs font-bold transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 lg:text-sm">
          {{ instagramLabel }}
        </a>
        <Link :href="route('contact.index')"
          class="text-xs font-bold transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 lg:text-sm">
        Kontak Kami
        </Link>

        <button type="button" class="hidden md:inline-flex" :class="themeButtonClass" :aria-label="themeLabel"
          :aria-pressed="isLight" @click="toggleTheme">
          <svg v-if="isLight" class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
          </svg>
          <svg v-else class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
          </svg>
        </button>
      </nav>

      <button type="button"
        class="inline-flex size-10 cursor-pointer items-center justify-center transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary md:hidden"
        :class="themeButtonClass" :aria-label="themeLabel" :aria-pressed="isLight" @click="toggleTheme">
        <svg v-if="isLight" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
          aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
        </svg>
        <svg v-else class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"
          aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
        </svg>
      </button>

      <button type="button"
        class="inline-flex size-11 cursor-pointer items-center justify-center transition-colors hover:text-impost-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary md:hidden"
        :class="toneClass" :aria-expanded="mobileOpen" aria-controls="landing-mobile-nav"
        :aria-label="mobileOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi'" @click="mobileOpen = !mobileOpen">
        <svg v-if="!mobileOpen" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
          aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg v-else class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
          aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <nav v-if="mobileOpen" id="landing-mobile-nav" class="border-t border-line bg-paper px-6 py-4 md:hidden"
      aria-label="Navigasi mobile">
      <ul class="flex flex-col gap-4">
        <li>
          <a :href="instagram" target="_blank" rel="noopener" class="block text-sm font-bold text-ink"
            @click="mobileOpen = false">
            {{ instagramLabel }}
          </a>
        </li>
        <li>
          <Link :href="route('contact.index')" class="block text-sm font-bold text-ink" @click="mobileOpen = false">
          Kontak Kami
          </Link>
        </li>
      </ul>
    </nav>
  </motion.header>
</template>
