<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { motion, useInView } from "motion-v";
import Logo from "@/Components/Landing/Logo.vue";
import { fadeUp, staggerContainer, VIEWPORT } from "@/motion/presets";

/**
 * Footer: brand + sosial + identitas perusahaan di kiri,
 * kolom navigasi (Informasi, Perusahaan) dan kontak di kanan,
 * bar bawah berisi copyright, lalu watermark raksasa bergradien.
 * Warna mengikuti token proyek (impost-*).
 */
const year = new Date().getFullYear();

const contact = {
    phone: "+62 831-4780-2761",
    whatsapp: "https://wa.me/6283147802761",
    email: "adm.impostmedia@gmail.com",
    instagram: "https://instagram.com/impostmedia",
    instagramLabel: "@impostmedia",
    company: "CV. Impost Media Indonesia",
    address: "Jl. Kawamara No.3, Landasan Ulin Tengah, Banjarbaru, Kalimantan Selatan 70724",
};

const columns = [
    {
        title: "Informasi",
        links: [
            { label: "Articles & Insights", href: route("articles.index") },
            { label: "Careers", href: "#" },
            { label: "Media Resources", href: "#" },
        ],
    },
    {
        title: "Perusahaan",
        links: [
            { label: "Tentang Kami", href: route("about") },
            { label: "Kontak", href: route("contact.index") },
            { label: "Kebijakan Privasi", href: "#" },
            { label: "Syarat & Ketentuan", href: "#" },
        ],
    },
];

/*
 * Ikon brand sosial (Simple Icons, CC0) â€” tanpa library ikon eksternal.
 */
const socials = [
    {
        name: "Instagram",
        href: contact.instagram,
        d: "M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06zm0 3.678a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 1 0 0-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 0 1-2.88 0 1.44 1.44 0 0 1 2.88 0z",
    },
    {
        name: "Facebook",
        href: "#",
        d: "M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z",
    },
    {
        name: "LinkedIn",
        href: "#",
        d: "M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.125 2.062 2.062 0 0 1 0 4.125zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z",
    },
    {
        name: "WhatsApp",
        href: contact.whatsapp,
        d: "M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z",
    },
];

/**
 * Footer: elemen muncul berurutan saat masuk viewport.
 * Pola sama dengan section lain: `useInView` + `:animate` (bukan
 * `while-in-view`) supaya variant benar-benar merambat ke anak.
 */
const root = ref(null);
const inView = useInView(root, VIEWPORT);

const container = staggerContainer(0.12);
const itemVariants = fadeUp;
</script>

<template>
    <motion.footer
        id="kontak"
        ref="root"
        class="relative scroll-mt-[96px] overflow-hidden bg-impost-fifth text-white"
        :variants="container"
        initial="hidden"
        :animate="inView ? 'visible' : 'hidden'"
    >
        <div class="mx-auto w-full max-w-[1440px] px-6 pt-14 sm:px-10 sm:pt-20">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-[1.2fr_2fr]">
                <motion.div :variants="itemVariants" class="flex max-w-sm flex-col gap-6">
                    <Link href="/" class="inline-flex" aria-label="IMPOST MEDIA â€” ke Beranda">
                        <Logo size="lg" :wordmark="false" />
                    </Link>

                    <div class="flex items-center gap-2">
                        <a
                            v-for="social in socials"
                            :key="social.name"
                            :href="social.href"
                            :aria-label="social.name"
                            :target="social.href.startsWith('http') ? '_blank' : undefined"
                            :rel="social.href.startsWith('http') ? 'noopener' : undefined"
                            class="inline-flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-impost-primary hover:text-impost-fifth focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-impost-primary"
                        >
                            <svg viewBox="0 0 24 24" fill="currentColor" class="size-4" aria-hidden="true">
                                <path :d="social.d" />
                            </svg>
                        </a>
                    </div>

                    <div class="text-sm leading-6 text-white">
                        <p class="font-bold text-white">{{ contact.company }}</p>
                        <p>{{ contact.address }}</p>
                    </div>
                </motion.div>

                <motion.nav
                    aria-label="Footer"
                    :variants="itemVariants"
                    class="grid grid-cols-1 gap-8 sm:grid-cols-3"
                >
                    <div v-for="column in columns" :key="column.title">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-white">
                            {{ column.title }}
                        </h3>
                        <ul class="mt-4 flex flex-col gap-3">
                            <li v-for="link in column.links" :key="link.label">
                                <Link
                                    :href="link.href"
                                    class="text-sm text-white transition-colors hover:text-impost-primary"
                                >
                                    {{ link.label }}
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Kontak Kami</h3>
                        <ul class="mt-4 flex flex-col gap-3">
                            <li>
                                <a
                                    :href="contact.whatsapp"
                                    target="_blank"
                                    rel="noopener"
                                    class="flex items-center gap-2.5 text-sm text-white transition-colors hover:text-impost-primary"
                                >
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 shrink-0 text-impost-primary" aria-hidden="true">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                                    </svg>
                                    {{ contact.phone }}
                                </a>
                            </li>
                            <li>
                                <a
                                    :href="`mailto:${contact.email}`"
                                    class="flex items-center gap-2.5 text-sm text-white transition-colors hover:text-impost-primary"
                                >
                                    <svg class="size-4 shrink-0 text-impost-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    {{ contact.email }}
                                </a>
                            </li>
                            <li>
                                <a
                                    :href="contact.instagram"
                                    target="_blank"
                                    rel="noopener"
                                    class="flex items-center gap-2.5 text-sm text-white transition-colors hover:text-impost-primary"
                                >
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="size-4 shrink-0 text-impost-primary" aria-hidden="true">
                                        <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06zm0 3.678a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 1 0 0-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 0 1-2.88 0 1.44 1.44 0 0 1 2.88 0z" />
                                    </svg>
                                    {{ contact.instagramLabel }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </motion.nav>
            </div>

            <div class="mt-14 border-t border-white/10 py-8">
                <p class="text-sm text-white">&copy; {{ year }} IMPOST MEDIA. All Rights Reserved.</p>
            </div>
        </div>

        <!-- Watermark raksasa di dasar footer -->
        <div aria-hidden="true" class="pointer-events-none mx-auto w-full max-w-[1440px] select-none px-6 sm:px-10">
            <p
                class="-mb-[0.22em] bg-gradient-to-b from-white/15 to-transparent bg-clip-text text-center text-[clamp(5rem,22vw,16rem)] font-extrabold uppercase leading-none tracking-tighter text-transparent"
            >
                Impost
            </p>
        </div>
    </motion.footer>
</template>
