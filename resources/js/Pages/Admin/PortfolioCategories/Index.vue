<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    categories: { type: Object, required: true },
});
</script>

<template>
    <Head title="Portfolio Categories" />
    <AdminLayout>
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="font-header text-3xl text-white">Portfolio Categories</h1>
                    <p class="mt-1 text-sm text-white">Kelola kategori portfolio.</p>
                </div>
                <Link :href="route('admin.portfolio-categories.create')" class="rounded-xl bg-impost-primary px-4 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary">Tambah Kategori</Link>
            </div>
            <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5">
                <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                    <thead class="bg-white/5 text-white">
                        <tr><th class="px-4 py-3 font-medium">Nama</th><th class="px-4 py-3 font-medium">Slug</th><th class="px-4 py-3 font-medium"></th></tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr v-for="category in categories.data" :key="category.id" class="hover:bg-white/5">
                            <td class="px-4 py-3 text-white">{{ category.name }}</td>
                            <td class="px-4 py-3 text-white">{{ category.slug }}</td>
                            <td class="px-4 py-3 text-right"><Link :href="route('admin.portfolio-categories.edit', category.id)" class="text-impost-primary hover:underline">Edit</Link></td>
                        </tr>
                        <tr v-if="categories.data.length === 0"><td colspan="3" class="px-4 py-6 text-center text-white">Belum ada kategori.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
