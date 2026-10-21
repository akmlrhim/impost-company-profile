<script setup>
import { computed, ref } from "vue";
import { motion, useInView } from "motion-v";
import AboutIntro from "@/Components/Landing/AboutIntro.vue";
import ClientCard from "@/Components/Landing/ClientCard.vue";
import CtaCard from "@/Components/Landing/CtaCard.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Hero from "@/Components/Landing/Hero.vue";
import LatestNews from "@/Components/Landing/LatestNews.vue";
import SectionRow from "@/Components/Landing/SectionRow.vue";
import ServiceTile from "@/Components/Landing/ServiceTile.vue";
import TestimonialSection from "@/Components/Landing/TestimonialSection.vue";
import StaggerGroup from "@/Components/Motion/StaggerGroup.vue";
import { fadeUp, staggerContainer, VIEWPORT } from "@/motion/presets";

const props = defineProps({
    services: { type: Array, default: () => [] },
    clients: { type: Array, default: () => [] },
    testimonials: { type: Array, default: () => [] },
    articles: { type: Array, default: () => [] },
});

/**
 * Section Layanan mengikuti referensi Danantara ("Lingkup Kerja"):
 * label di atas, pernyataan besar, lalu baris kartu gambar.
 */
const layananRoot = ref(null);
const layananInView = useInView(layananRoot, VIEWPORT);
const layananContainer = staggerContainer(0.1);

const serviceCards = computed(() =>
    props.services.map((service) => ({
        slug: service.slug,
        title: service.service_name,
        description: service.description,
        image: service.cover_path
            ? {
                  src: /^(https?:)?\//.test(service.cover_path)
                      ? service.cover_path
                      : `/storage/${service.cover_path}`,
                  alt: service.service_name,
              }
            : null,
    })),
);

/**
 * Mode hero mengikuti data yang tersedia (lihat docs/UI_SLICING.md §3.2).
 * Selama aset belum ada, komponen Hero menampilkan latar `impost-fifth` + pola grid.
 *
 * Contoh saat aset siap:
 *   <Hero
 *     :image="{ desktop: '/images/hero-desktop.webp', mobile: '/images/hero-mobile.webp', alt: '...' }"
 *   />
 */
const heroImage = {
    desktop: "/img/hero.webp",
    mobile: "/img/hero.webp",
    alt: "Kolase potret tim Impost Media",
};
const heroVideo = null;
const heroSlides = [];

const clientLogos = computed(() =>
    props.clients.map((client) => ({
        src: /^(https?:)?\//.test(client.client_logo) ? client.client_logo : `/storage/${client.client_logo}`,
        alt: client.filename || "Logo klien",
    })),
);

/**
 * Testimonial fleksibel (teks / foto / video) untuk slider di bawah
 * section Layanan. `media_path` dari storage publik diawali `/storage/`.
 */
const testimonialItems = computed(() =>
    props.testimonials.map((testimonial) => ({
        type: testimonial.type ?? "text",
        name: testimonial.name,
        company: testimonial.company_name ?? "",
        quote: testimonial.content,
        media: testimonial.media_path
            ? {
                  src: /^(https?:)?\//.test(testimonial.media_path)
                      ? testimonial.media_path
                      : `/storage/${testimonial.media_path}`,
                  mime: testimonial.media_type ?? "",
              }
            : null,
    })),
);

const newsArticles = computed(() =>
    props.articles.map((article) => ({
        slug: article.slug,
        title: article.title,
        excerpt: article.excerpt,
        author: article.written_by,
        date: article.created_at,
        cover: article.cover_path ? { src: article.cover_path, alt: article.title } : null,
    })),
);
</script>

<template>
    <HomeLayout title="Beranda">
        <!-- [2] Hero -->
        <Hero :image="heroImage" :video="heroVideo" :slides="heroSlides" />

            <!-- [3] Tentang Kami -->
            <AboutIntro />

            <!-- [4] Layanan -->
            <motion.section
                ref="layananRoot"
                class="mx-auto max-w-[1440px] px-6 py-14 sm:px-10 lg:py-20"
                :variants="layananContainer"
                initial="hidden"
                :animate="layananInView ? 'visible' : 'hidden'"
            >
                <motion.p :variants="fadeUp" class="text-xs font-bold uppercase text-impost-third lg:text-sm">
                    Layanan
                </motion.p>

                <motion.h2
                    :variants="fadeUp"
                    class="mt-6 max-w-[1000px] text-2xl font-normal leading-snug text-ink sm:text-3xl lg:text-4xl"
                >
                    Melalui pendekatan terintegrasi, Impost Media memastikan kebutuhan digital marketing, event, dan
                    pengadaan Anda tertangani secara selaras, efektif, dan berdampak nyata bagi pertumbuhan bisnis.
                </motion.h2>

                <StaggerGroup
                    v-if="services.length"
                    class="mt-10 grid gap-3 sm:grid-cols-2 lg:grid-cols-4"
                    :stagger="0.08"
                >
                    <ServiceTile
                        v-for="service in serviceCards"
                        :key="service.slug"
                        :title="service.title"
                        :description="service.description"
                        :image="service.image"
                    />
                </StaggerGroup>

                <p v-else class="mt-10 text-sm italic text-impost-third lg:text-base">
                    [Daftar layanan akan tampil di sini.]
                </p>
            </motion.section>

            <!-- [4b] Testimonial: slider teks / foto / video -->
            <TestimonialSection v-if="testimonialItems.length" :items="testimonialItems" />

            <!-- [5] Berita Terbaru -->
            <LatestNews :articles="newsArticles" />

            <!-- [6] Klien: tanpa judul section -->
            <SectionRow>
                <StaggerGroup class="grid gap-3 lg:grid-cols-[240px_1fr]">
                    <CtaCard
                        title="Mulai Proyek Anda"
                        description="Ceritakan kebutuhan brand Anda. Tim kami akan menyusun pendekatan yang paling tepat."
                        cta-label="Hubungi Kami"
                        :cta-href="route('contact.index')"
                    />

                    <ClientCard
                        title="Dipercaya Oleh"
                        description="Brand dari berbagai industri telah mempercayakan pertumbuhan mereka kepada kami."
                        :logos="clientLogos"
                    />
                </StaggerGroup>
            </SectionRow>
    </HomeLayout>
</template>