import { ref } from "vue";

const THEME_KEY = "impost-theme";

/** State global modul: satu sumber kebenaran untuk semua pemakai useTheme. */
const isLight = ref(
    typeof document !== "undefined" && document.documentElement.classList.contains("light"),
);

function apply(light) {
    document.documentElement.classList.toggle("light", light);

    try {
        localStorage.setItem(THEME_KEY, light ? "light" : "dark");
    } catch {
        // Penyimpanan diblokir (mis. mode privat): tema tetap berlaku per sesi.
    }

    isLight.value = light;
}

/**
 * Toggle tema gelap/terang. Default gelap: tanpa kelas pada <html>;
 * tema terang ditandai kelas `light` (dipulihkan skrip inline di app.blade.php).
 */
export function useTheme() {
    const toggle = () => apply(!isLight.value);

    return { isLight, toggle };
}
