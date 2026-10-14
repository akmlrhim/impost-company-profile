<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";

defineProps({
    service: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <SiteLayout :title="service.service_name">
        <section class="mx-auto max-w-4xl px-4 pb-24 pt-32 sm:px-6 lg:px-8">
            <p class="text-sm uppercase tracking-[0.3em] text-impost-primary">{{ service.category }}</p>
            <h1 class="mt-4 font-header text-4xl leading-tight sm:text-5xl">{{ service.service_name }}</h1>
            <p class="mt-6 whitespace-pre-line text-lg leading-relaxed text-white/70">{{ service.description }}</p>

            <div class="mt-10 flex flex-wrap gap-4">
                <Link href="/contact" class="rounded-full bg-impost-primary px-8 py-3 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary">
                    Diskusikan Proyek
                </Link>
                <Link :href="route('services.index')" class="rounded-full border border-white/20 px-8 py-3 text-sm font-semibold text-white transition hover:border-impost-primary hover:text-impost-primary">
                    Kembali ke services
                </Link>
            </div>
        </section>
    </SiteLayout>
</template>
