<script setup>
import { computed, onBeforeUnmount, onMounted, ref, watch } from "vue";
import { motion } from "motion-v";
import { fadeIn } from "@/motion/presets";

const props = defineProps({
    /** { desktop, mobile?, alt } */
    image: { type: Object, default: null },
    /** { mp4, webm?, poster, alt?, hasAudio? } */
    video: { type: Object, default: null },
    /** [{ desktop, mobile?, alt }] */
    slides: { type: Array, default: () => [] },
});

/** video > slides > image (lihat docs/UI_SLICING.md §3.2) */
const mode = computed(() => {
    if (props.video) return "video";
    if (props.slides.length) return "slides";
    return "image";
});

const activeSlide = ref(0);
const muted = ref(true);
const videoEl = ref(null);
const rootEl = ref(null);

const userPaused = ref(false);
const interactionPaused = ref(false);
const offscreenPaused = ref(false);
const prefersReducedMotion = ref(false);
const saveData = ref(false);

let timer = null;
let observer = null;

const canAutoplay = computed(
    () =>
        mode.value === "slides" &&
        props.slides.length > 1 &&
        !userPaused.value &&
        !interactionPaused.value &&
        !offscreenPaused.value &&
        !prefersReducedMotion.value,
);

const hasMedia = computed(() => {
    if (mode.value === "video") return true;
    if (mode.value === "slides") return props.slides.length > 0;
    return Boolean(props.image);
});

const showVideo = computed(() => mode.value === "video" && !prefersReducedMotion.value && !saveData.value);

function stopAutoplay() {
    if (timer) {
        window.clearInterval(timer);
        timer = null;
    }
}

function startAutoplay() {
    stopAutoplay();
    if (!canAutoplay.value) return;

    timer = window.setInterval(() => {
        activeSlide.value = (activeSlide.value + 1) % props.slides.length;
    }, 5000);
}

function goTo(index) {
    activeSlide.value = (index + props.slides.length) % props.slides.length;
    startAutoplay();
}

function togglePause() {
    userPaused.value = !userPaused.value;
}

function toggleMute() {
    muted.value = !muted.value;
    if (videoEl.value) videoEl.value.muted = muted.value;
}

function playVideo() {
    if (!videoEl.value || !showVideo.value || offscreenPaused.value) return;
    videoEl.value.muted = muted.value;
    videoEl.value.play().catch(() => {});
}

function pauseVideo() {
    videoEl.value?.pause();
}

function onVisibilityChange() {
    if (document.hidden) pauseVideo();
    else playVideo();
}

onMounted(() => {
    prefersReducedMotion.value = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    saveData.value = Boolean(navigator.connection?.saveData);

    if (rootEl.value && typeof IntersectionObserver !== "undefined") {
        observer = new IntersectionObserver(
            ([entry]) => {
                offscreenPaused.value = !entry.isIntersecting;
                if (entry.isIntersecting) playVideo();
                else pauseVideo();
            },
            { threshold: 0.2 },
        );
        observer.observe(rootEl.value);
    }

    document.addEventListener("visibilitychange", onVisibilityChange);
    playVideo();
    startAutoplay();
});

onBeforeUnmount(() => {
    stopAutoplay();
    observer?.disconnect();
    document.removeEventListener("visibilitychange", onVisibilityChange);
});

watch(canAutoplay, (value) => (value ? startAutoplay() : stopAutoplay()));
</script>

<template>
    <section
        ref="rootEl"
        class="relative min-h-screen w-full overflow-hidden bg-impost-fifth"
        aria-label="Sorotan utama"
        @mouseenter="interactionPaused = true"
        @mouseleave="interactionPaused = false"
        @focusin="interactionPaused = true"
        @focusout="interactionPaused = false"
    >
        <!-- Mode image -->
        <picture v-if="mode === 'image' && image" class="absolute inset-0">
            <source v-if="image.mobile" media="(max-width: 767px)" :srcset="image.mobile" >
            <motion.img
                :src="image.desktop"
                :alt="image.alt"
                class="size-full object-cover"
                fetchpriority="high"
                :variants="fadeIn"
                initial="hidden"
                animate="visible"
            />
        </picture>

        <!-- Mode slides -->
        <template v-else-if="mode === 'slides'">
            <picture
                v-for="(slide, index) in slides"
                :key="slide.desktop"
                class="absolute inset-0 transition-opacity duration-[600ms] ease-out motion-reduce:transition-none"
                :class="index === activeSlide ? 'opacity-100' : 'opacity-0'"
                :aria-hidden="index !== activeSlide"
            >
                <source v-if="slide.mobile" media="(max-width: 767px)" :srcset="slide.mobile" >
                <img
                    :src="slide.desktop"
                    :alt="slide.alt"
                    class="h-full w-full object-cover"
                    :loading="index === 0 ? 'eager' : 'lazy'"
                >
            </picture>
        </template>

        <!-- Mode video -->
        <template v-else-if="mode === 'video'">
            <video
                v-show="showVideo"
                ref="videoEl"
                class="absolute inset-0 size-full object-cover"
                autoplay
                muted
                loop
                playsinline
                preload="metadata"
                :poster="video.poster"
            >
                <source v-if="video.webm" :src="video.webm" type="video/webm" >
                <source :src="video.mp4" type="video/mp4" >
            </video>

            <!-- Fallback poster: reduced-motion & hemat data -->
            <motion.img
                v-if="!showVideo"
                :src="video.poster"
                :alt="video.alt ?? ''"
                class="absolute inset-0 size-full object-cover"
                :variants="fadeIn"
                initial="hidden"
                animate="visible"
            />
        </template>

        <!-- Placeholder bila belum ada media -->
        <motion.div
            v-else
            class="hero-grid absolute inset-0"
            aria-hidden="true"
            :variants="fadeIn"
            initial="hidden"
            animate="visible"
        />

        <!-- Overlay gelap tipis: menjaga dots & kontrol tetap terbaca di atas media apa pun -->
        <div class="absolute inset-0 bg-impost-fifth/25" aria-hidden="true" />

        <!-- Dots (kiri bawah) -->
        <div v-if="mode === 'slides' && slides.length > 1" class="absolute bottom-5 left-6 flex items-center gap-2.5">
            <button
                v-for="(slide, index) in slides"
                :key="`dot-${index}`"
                type="button"
                class="size-2.5 cursor-pointer rounded-full border transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary focus-visible:ring-offset-2 focus-visible:ring-offset-impost-fifth"
                :class="
                    index === activeSlide
                        ? 'border-impost-primary bg-impost-primary'
                        : 'border-white/70 bg-transparent hover:bg-white/40'
                "
                :aria-label="`Tampilkan slide ${index + 1} dari ${slides.length}`"
                :aria-current="index === activeSlide"
                @click="goTo(index)"
            />
        </div>

        <!-- Kontrol slide: prev / pause / next (kanan bawah) -->
        <div v-if="mode === 'slides' && slides.length > 1" class="absolute bottom-4 right-6 flex items-center gap-1">
            <button
                type="button"
                class="inline-flex size-10 cursor-pointer items-center justify-center rounded-full bg-impost-fifth/50 text-white backdrop-blur transition-colors hover:bg-impost-fifth/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary"
                aria-label="Slide sebelumnya"
                @click="goTo(activeSlide - 1)"
            >
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                type="button"
                class="inline-flex size-10 cursor-pointer items-center justify-center rounded-full bg-impost-fifth/50 text-white backdrop-blur transition-colors hover:bg-impost-fifth/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary"
                :aria-label="userPaused ? 'Putar otomatis' : 'Jeda putar otomatis'"
                :aria-pressed="userPaused"
                @click="togglePause"
            >
                <svg v-if="userPaused" class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M8 5v14l11-7z" />
                </svg>
                <svg v-else class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M7 5h4v14H7zM13 5h4v14h-4z" />
                </svg>
            </button>
            <button
                type="button"
                class="inline-flex size-10 cursor-pointer items-center justify-center rounded-full bg-impost-fifth/50 text-white backdrop-blur transition-colors hover:bg-impost-fifth/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary"
                aria-label="Slide berikutnya"
                @click="goTo(activeSlide + 1)"
            >
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Tombol mute: hanya mode video ber-audio -->
        <button
            v-if="mode === 'video' && video?.hasAudio"
            type="button"
            class="absolute bottom-4 right-6 inline-flex size-10 cursor-pointer items-center justify-center rounded-full bg-impost-fifth/50 text-white backdrop-blur transition-colors hover:bg-impost-fifth/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary"
            :aria-label="muted ? 'Aktifkan suara' : 'Matikan suara'"
            :aria-pressed="!muted"
            @click="toggleMute"
        >
            <svg v-if="muted" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5 6 9H3v6h3l5 4V5zM17 9l4 6M21 9l-4 6" />
            </svg>
            <svg v-else class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5 6 9H3v6h3l5 4V5zM16.5 8.5a5 5 0 0 1 0 7M19 6a9 9 0 0 1 0 12" />
            </svg>
        </button>

        <!-- Pengumuman slide untuk screen reader -->
        <p v-if="mode === 'slides' && slides.length > 1" class="sr-only" aria-live="polite">
            Slide {{ activeSlide + 1 }} dari {{ slides.length }}
        </p>
    </section>
</template>
