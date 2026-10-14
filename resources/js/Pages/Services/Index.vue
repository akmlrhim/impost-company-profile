<script setup>
import ServiceCard from "@/Components/ServiceCard.vue";
import SiteLayout from "@/Layouts/SiteLayout.vue";

defineProps({
    services: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <SiteLayout title="Services">
        <section class="mx-auto max-w-7xl px-4 pb-24 pt-32 sm:px-6 lg:px-8">
            <p class="text-sm uppercase tracking-[0.3em] text-impost-primary">Layanan</p>
            <h1 class="mt-4 max-w-2xl font-header text-4xl leading-tight sm:text-5xl">
                Solusi kreatif untuk brand yang ingin tumbuh.
            </h1>
            <p class="mt-4 max-w-2xl text-white/60">
                Dari strategi visual hingga produksi konten, kami siap membantu brand Anda dilihat dan diingat.
            </p>

            <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <ServiceCard v-for="service in services" :key="service.slug" :service="service" />
            </div>
        </section>
    </SiteLayout>
</template>
