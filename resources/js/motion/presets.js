/**
 * Preset animasi bersama (motion-v / Framer Motion untuk Vue).
 *
 * Dipakai oleh halaman publik (Beranda & Tentang) lewat komponen
 * `Motion/Reveal.vue` dan `Motion/StaggerGroup.vue`.
 *
 * Catatan aksesibilitas: `reducedMotion="user"` dipasang di root aplikasi
 * (`resources/js/app.js`) sehingga saat pengguna mengaktifkan
 * "reduce motion" di OS, animasi transform entrance dinonaktifkan otomatis
 * dan hanya opacity yang tersisa. Untuk gesture (`whileHover`), gunakan
 * `useReducedMotion()` karena tidak tercakup config tersebut.
 */

import { onScopeDispose, ref } from "vue";

/** Kurva easing khas editorial (cepat di awal, lembut di akhir). */
export const EASE = [0.22, 1, 0.36, 1];

/** Muncul dari bawah sambil fade. */
export const fadeUp = {
    hidden: { opacity: 0, y: 24 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.5, ease: EASE } },
};

/** Hanya fade, tanpa gerak. */
export const fadeIn = {
    hidden: { opacity: 0 },
    visible: { opacity: 1, transition: { duration: 0.6, ease: EASE } },
};

/** Muncul dari atas (untuk header). */
export const fadeDown = {
    hidden: { opacity: 0, y: -16 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.5, ease: EASE } },
};

/** Skala naik halus (untuk kartu / media). */
export const scaleIn = {
    hidden: { opacity: 0, scale: 0.96 },
    visible: { opacity: 1, scale: 1, transition: { duration: 0.45, ease: EASE } },
};

/**
 * Container yang mengurutkan animasi anak-anaknya.
 *
 * @param {number} staggerChildren Jeda antar anak (detik).
 * @param {number} delayChildren   Jeda sebelum anak pertama mulai (detik).
 */
export function staggerContainer(staggerChildren = 0.08, delayChildren = 0) {
    return {
        hidden: {},
        visible: { transition: { staggerChildren, delayChildren } },
    };
}

/** Pengaturan viewport: animasi hanya sekali, mulai saat elemen menyentuh
 * ±80px dari tepi bawah layar.
 *
 * `amount: "some"` dipakai (bukan angka) supaya section yang lebih tinggi
 * dari viewport tetap ter-trigger, bukan menunggu persentase tertentu.
 */
export const VIEWPORT = { once: true, amount: "some", margin: "0px 0px -80px 0px" };

/**
 * Status `prefers-reduced-motion` sebagai ref reaktif.
 *
 * Dipakai untuk menonaktifkan animasi gesture (`whileHover`) secara manual,
 * karena `MotionConfig reducedMotion="user"` hanya mencakup animasi
 * variant/entrance, bukan gesture (terverifikasi lewat pengujian).
 */
export function useReducedMotion() {
    const reduced = ref(false);

    if (typeof window !== "undefined" && typeof window.matchMedia === "function") {
        const query = window.matchMedia("(prefers-reduced-motion: reduce)");
        reduced.value = query.matches;

        const onChange = (event) => {
            reduced.value = event.matches;
        };
        query.addEventListener("change", onChange);
        onScopeDispose(() => query.removeEventListener("change", onChange));
    }

    return reduced;
}
