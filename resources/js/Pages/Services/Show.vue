<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import Breadcrumb from "@/Components/Breadcrumb.vue";

defineProps({
    service: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <HomeLayout :title="service.service_name">
        <section class="mx-auto max-w-4xl px-4 pb-24 pt-14 sm:px-6 lg:px-8">
            <Breadcrumb
                :items="[
                    { label: 'Beranda', href: route('home') },
                    { label: 'Layanan' },
                    { label: service.service_name },
                ]"
            />
            <h1 class="mt-4 text-4xl font-bold leading-tight sm:text-5xl">{{ service.service_name }}</h1>
            <p class="mt-6 whitespace-pre-line text-lg leading-relaxed text-ink">{{ service.description }}</p>

            <div class="mt-10 flex flex-wrap gap-4">
                <Link href="/contact" class="rounded-full bg-impost-primary px-8 py-3 text-sm font-bold text-impost-fifth transition-colors hover:bg-impost-secondary">
                    Diskusikan Proyek
                </Link>
                <Link :href="route('home')" class="rounded-full border border-line px-8 py-3 text-sm font-bold text-ink transition-colors hover:border-impost-primary hover:text-impost-primary">
                    Kembali ke beranda
                </Link>
            </div>
        </section>
    </HomeLayout>
</template>
