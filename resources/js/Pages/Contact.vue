<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";
import LeadForm from "@/Components/LeadForm.vue";
import Breadcrumb from "@/Components/Breadcrumb.vue";

defineProps({
    status: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <HomeLayout title="Kontak">
        <section class="mx-auto max-w-7xl px-4 pb-24 pt-14 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <Breadcrumb :items="[{ label: 'Beranda', href: route('home') }, { label: 'Kontak' }]" />
                <h1 class="mt-4 text-4xl font-bold leading-tight sm:text-5xl">
                    Hubungi tim kami.
                </h1>
                <p class="mt-4 text-impost-fifth">
                    Kami siap menjawab pertanyaan, mendiskusikan proyek Anda, dan membantu menemukan solusi terbaik. Hubungi kami, dan mari mulai membangun sesuatu yang hebat bersama.
                </p>
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2 class="text-2xl font-bold">Mari Bicara Tentang Proyek Anda</h2>
                    <div class="mt-8">
                        <LeadForm />
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold">Ingin Hubungi Langsung?</h2>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center gap-3 text-impost-fifth">
                            <svg class="size-5 shrink-0 text-impost-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <a href="tel:+6283147802761" class="transition-colors hover:text-impost-fifth">+62 831-4780-2761</a>
                        </li>
                        <li class="flex items-center gap-3 text-impost-fifth">
                            <svg class="size-5 shrink-0 text-impost-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <a href="mailto:adm.impostmedia@gmail.com" class="transition-colors hover:text-impost-fifth">adm.impostmedia@gmail.com</a>
                        </li>
                    </ul>

                    <div class="relative mt-10 overflow-hidden rounded-3xl border border-impost-fifth/10">
                        <iframe
                            src="https://www.google.com/maps?q=Jasa+Digital+Marketing+Banjarmasin+(Impost+Media),+Jl.+Kawamara+No.3,+Landasan+Ulin+Tengah,+Banjarbaru&output=embed"
                            title="Lokasi kantor kami"
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                            class="h-[560px] w-full border-0"
                        />
                        <a
                            href="https://maps.app.goo.gl/sPJZutVa4kEcoqjc6"
                            target="_blank"
                            rel="noopener"
                            class="absolute bottom-4 right-4 inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-sm font-bold shadow-lg transition hover:text-impost-primary"
                        >
                            Petunjuk Arah
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </HomeLayout>
</template>
