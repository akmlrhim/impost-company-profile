<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    counts: {
        type: Object,
        required: true,
    },
    recent_leads: {
        type: Array,
        required: true,
    },
});

const cards = [
    { key: "services", label: "Services", href: () => route("admin.services.index") },
    { key: "portfolios", label: "Portfolios", href: () => route("admin.portfolios.index") },
    { key: "leads", label: "Leads", href: () => route("admin.leads.index") },
    { key: "testimonials", label: "Testimonials", href: () => route("admin.testimonials.index") },
];

const quickActions = [
    { label: "Tambah Service", href: () => route("admin.services.create") },
    { label: "Tambah Portfolio", href: () => route("admin.portfolios.create") },
    { label: "Tambah Testimoni", href: () => route("admin.testimonials.create") },
];
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <div class="space-y-8">
            <div>
                <h1 class="font-header text-3xl text-white">Dashboard</h1>
                <p class="mt-1 text-sm text-white">Ringkasan data website Impost Media.</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <Link
                    v-for="card in cards"
                    :key="card.key"
                    :href="card.href()"
                    class="rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-impost-primary/50 hover:bg-white/10"
                >
                    <p class="text-sm text-white">{{ card.label }}</p>
                    <p class="mt-2 font-header text-3xl text-impost-primary">{{ counts[card.key] ?? 0 }}</p>
                </Link>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                <h2 class="font-header text-xl text-white">Aksi Cepat</h2>
                <div class="mt-4 flex flex-wrap gap-3">
                    <Link
                        v-for="action in quickActions"
                        :key="action.label"
                        :href="action.href()"
                        class="rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-white transition hover:border-impost-primary hover:text-impost-primary"
                    >
                        + {{ action.label }}
                    </Link>
                </div>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-header text-xl text-white">Leads Terbaru</h2>
                    <Link :href="route('admin.leads.index')" class="text-sm text-impost-primary hover:underline">Lihat semua</Link>
                </div>

                <div class="mt-4 overflow-hidden rounded-xl border border-white/10">
                    <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                        <thead class="bg-white/5 text-white">
                            <tr>
                                <th class="px-4 py-3 font-medium">Nama</th>
                                <th class="px-4 py-3 font-medium">Email</th>
                                <th class="px-4 py-3 font-medium">Bisnis</th>
                                <th class="px-4 py-3 font-medium">Tanggal</th>
                                <th class="px-4 py-3 font-medium"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr v-for="lead in recent_leads" :key="lead.id" class="hover:bg-white/5">
                                <td class="px-4 py-3 text-white">{{ lead.fullname }}</td>
                                <td class="px-4 py-3 text-white">{{ lead.email }}</td>
                                <td class="px-4 py-3 text-white">{{ lead.business_name }}</td>
                                <td class="px-4 py-3 text-white">{{ new Date(lead.created_at).toLocaleDateString() }}</td>
                                <td class="px-4 py-3 text-right">
                                    <Link :href="route('admin.leads.show', lead.id)" class="text-impost-primary hover:underline">Detail</Link>
                                </td>
                            </tr>
                            <tr v-if="recent_leads.length === 0">
                                <td colspan="5" class="px-4 py-6 text-center text-white">Belum ada leads.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
