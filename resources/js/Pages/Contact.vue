<script setup>
import LeadForm from "@/Components/LeadForm.vue";
import SiteLayout from "@/Layouts/SiteLayout.vue";

defineProps({
    status: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <SiteLayout title="Kontak">
        <section class="mx-auto max-w-7xl px-4 pb-24 pt-32 sm:px-6 lg:px-8">
            <div class="grid gap-16 lg:grid-cols-2">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-impost-primary">Kontak</p>
                    <h1 class="mt-4 font-header text-4xl leading-tight sm:text-5xl">
                        Mari diskusi proyek Anda.
                    </h1>
                    <p class="mt-4 text-white/60">
                        Isi formulir di samping atau hubungi kami langsung. Kami biasanya membalas dalam 1 × 24 jam.
                    </p>

                    <div class="mt-10 space-y-4 text-white/70">
                        <p>hello@impostmedia.id</p>
                        <p>+62 800 0000 0000</p>
                        <p>Jakarta, Indonesia</p>
                    </div>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-6 sm:p-10">
                    <LeadForm />
                </div>
            </div>
        </section>
    </SiteLayout>
</template>
