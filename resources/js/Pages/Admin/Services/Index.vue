<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
    services: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Services" />

    <AdminLayout>
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="font-header text-3xl text-white">Services</h1>
                    <p class="mt-1 text-sm text-white">Kelola layanan yang ditampilkan di website.</p>
                </div>
                <Link
                    :href="route('admin.services.create')"
                    class="rounded-xl bg-impost-primary px-4 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary"
                >
                    Tambah Service
                </Link>
            </div>

            <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5">
                <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                    <thead class="bg-white/5 text-white">
                        <tr>
                            <th class="px-4 py-3 font-medium">Cover</th>
                            <th class="px-4 py-3 font-medium">Nama</th>
                            <th class="px-4 py-3 font-medium">Slug</th>
                            <th class="px-4 py-3 font-medium">Kategori</th>
                            <th class="px-4 py-3 font-medium">Sort</th>
                            <th class="px-4 py-3 font-medium"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr v-for="service in services.data" :key="service.id" class="hover:bg-white/5">
                            <td class="px-4 py-3">
                                <div class="size-12 overflow-hidden rounded-lg border border-white/10 bg-white/5">
                                    <img v-if="service.cover_path" :src="`/storage/${service.cover_path}`" :alt="service.service_name" class="size-full object-cover">
                                </div>
                            </td>
                            <td class="px-4 py-3 text-white">{{ service.service_name }}</td>
                            <td class="px-4 py-3 text-white">{{ service.slug }}</td>
                            <td class="px-4 py-3 text-white">{{ service.category }}</td>
                            <td class="px-4 py-3 text-white">{{ service.sort }}</td>
                            <td class="px-4 py-3 text-right">
                                <Link
                                    :href="route('admin.services.edit', service.id)"
                                    class="text-impost-primary hover:underline"
                                >
                                    Edit
                                </Link>
                            </td>
                        </tr>
                        <tr v-if="services.data.length === 0">
                            <td colspan="6" class="px-4 py-6 text-center text-white">Belum ada service.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div v-if="services.links.length > 3" class="flex flex-wrap gap-2">
                <Link
                    v-for="(link, index) in services.links"
                    :key="index"
                    :href="link.url ?? '#'"
                    :class="['rounded-full border px-3 py-1 text-sm transition', link.active ? 'border-impost-primary text-impost-primary' : 'border-white/10 text-white hover:text-white']"
                >
                    <span v-html="link.label" />
                </Link>
            </div>
        </div>
    </AdminLayout>
</template>
