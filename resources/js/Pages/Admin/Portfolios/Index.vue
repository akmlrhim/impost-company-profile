<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    portfolios: { type: Object, required: true },
});
</script>

<template>
    <Head title="Portfolios" />
    <AdminLayout>
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div><h1 class="font-header text-3xl text-white">Portfolios</h1><p class="mt-1 text-sm text-white">Kelola karya portfolio.</p></div>
                <Link :href="route('admin.portfolios.create')" class="rounded-xl bg-impost-primary px-4 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary">Tambah Portfolio</Link>
            </div>
            <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5">
                <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                    <thead class="bg-white/5 text-white">
                        <tr><th class="px-4 py-3 font-medium">Media</th><th class="px-4 py-3 font-medium">Judul</th><th class="px-4 py-3 font-medium">Slug</th><th class="px-4 py-3 font-medium">Kategori</th><th class="px-4 py-3 font-medium"></th></tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr v-for="portfolio in portfolios.data" :key="portfolio.id" class="hover:bg-white/5">
                            <td class="px-4 py-3">
                                <div class="size-12 overflow-hidden rounded-lg border border-white/10 bg-white/5">
                                    <img v-if="portfolio.media_path" :src="`/storage/${portfolio.media_path}`" :alt="portfolio.title" class="size-full object-cover">
                                </div>
                            </td>
                            <td class="px-4 py-3 text-white">{{ portfolio.title }}</td>
                            <td class="px-4 py-3 text-white">{{ portfolio.slug }}</td>
                            <td class="px-4 py-3 text-white">{{ portfolio.category?.name }}</td>
                            <td class="px-4 py-3 text-right"><Link :href="route('admin.portfolios.edit', portfolio.id)" class="text-impost-primary hover:underline">Edit</Link></td>
                        </tr>
                        <tr v-if="portfolios.data.length === 0"><td colspan="5" class="px-4 py-6 text-center text-white">Belum ada portfolio.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
