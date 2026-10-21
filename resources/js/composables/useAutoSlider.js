import { onScopeDispose, ref, watch } from "vue";
import { useReducedMotion } from "@/motion/presets";

/**
 * Slider otomatis melingkar yang dipakai section Testimonial & Artikel.
 *
 * - Pindah slide sendiri setiap `interval` ms.
 * - Pause saat kursor di atas slider (`hovered`).
 * - Interaksi manual (panah) me-reset hitungan mundur.
 * - Nonaktif otomatis saat `prefers-reduced-motion`.
 * - Timer dibersihkan saat komponen unmount.
 *
 * @param {import("vue").Ref<number>} count Ref jumlah item slider.
 * @param {{ interval?: number }} [options]
 */
export function useAutoSlider(count, { interval = 5000 } = {}) {
    const active = ref(0);
    const hovered = ref(false);
    const reducedMotion = useReducedMotion();
    let timer = null;

    function stopAutoSlide() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    function startAutoSlide() {
        stopAutoSlide();

        if ((count.value ?? 0) <= 1 || hovered.value || reducedMotion.value) {
            return;
        }

        timer = setInterval(() => goTo(1), interval);
    }

    /** Navigasi melingkar: mundur dari item pertama kembali ke item terakhir. */
    function goTo(delta) {
        const total = count.value ?? 0;

        if (!total) {
            return;
        }

        active.value = (active.value + delta + total) % total;
        startAutoSlide();
    }

    watch(count, startAutoSlide);
    watch(reducedMotion, startAutoSlide);
    watch(hovered, startAutoSlide);
    onScopeDispose(stopAutoSlide);
    startAutoSlide();

    return { active, hovered, goTo };
}
