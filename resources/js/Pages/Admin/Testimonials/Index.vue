<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({ testimonials: { type: Object, required: true } });
</script>

<template>
    <Head title="Testimonials" />
    <AdminLayout>
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div><h1 class="font-header text-3xl text-white">Testimonials</h1><p class="mt-1 text-sm text-white">Kelola testimoni klien.</p></div>
                <Link :href="route('admin.testimonials.create')" class="rounded-xl bg-impost-primary px-4 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary">Tambah Testimoni</Link>
            </div>
            <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5">
                <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                    <thead class="bg-white/5 text-white">
                        <tr><th class="px-4 py-3 font-medium">Foto</th><th class="px-4 py-3 font-medium">Nama</th><th class="px-4 py-3 font-medium">Perusahaan</th><th class="px-4 py-3 font-medium">Isi</th><th class="px-4 py-3 font-medium"></th></tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr v-for="testimonial in testimonials.data" :key="testimonial.id" class="hover:bg-white/5">
                            <td class="px-4 py-3">
                                <div class="size-12 overflow-hidden rounded-full border border-white/10 bg-white/5">
                                    <img v-if="testimonial.photo_path" :src="`/storage/${testimonial.photo_path}`" :alt="testimonial.name" class="size-full object-cover">
                                </div>
                            </td>
                            <td class="px-4 py-3 text-white">{{ testimonial.name }}</td>
                            <td class="px-4 py-3 text-white">{{ testimonial.company_name }}</td>
                            <td class="px-4 py-3 text-white">{{ testimonial.content.slice(0, 60) }}...</td>
                            <td class="px-4 py-3 text-right"><Link :href="route('admin.testimonials.edit', testimonial.id)" class="text-impost-primary hover:underline">Edit</Link></td>
                        </tr>
                        <tr v-if="testimonials.data.length === 0"><td colspan="5" class="px-4 py-6 text-center text-white">Belum ada testimoni.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
