<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import ServiceCard from "@/Components/ServiceCard.vue";
import Breadcrumb from "@/Components/Breadcrumb.vue";

defineProps({
    services: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <HomeLayout title="Services">
        <section class="mx-auto max-w-7xl px-4 pb-24 pt-14 sm:px-6 lg:px-8">
            <Breadcrumb :items="[{ label: 'Beranda', href: route('home') }, { label: 'Layanan' }]" />
            <h1 class="mt-4 max-w-2xl text-4xl font-bold leading-tight sm:text-5xl">
                Solusi kreatif untuk brand yang ingin tumbuh.
            </h1>
            <p class="mt-4 max-w-2xl text-impost-fifth">
                Dari strategi visual hingga produksi konten, kami siap membantu brand Anda dilihat dan diingat.
            </p>

            <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <ServiceCard v-for="service in services" :key="service.slug" :service="service" />
            </div>
        </section>
    </HomeLayout>
</template>
