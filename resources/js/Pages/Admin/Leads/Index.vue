<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    leads: { type: Object, required: true },
});
</script>

<template>
    <Head title="Leads" />
    <AdminLayout>
        <div class="space-y-6">
            <div><h1 class="font-header text-3xl text-white">Leads</h1><p class="mt-1 text-sm text-white">Data leads yang masuk melalui formulir kontak.</p></div>
            <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5">
                <table class="min-w-full divide-y divide-white/10 text-left text-sm">
                    <thead class="bg-white/5 text-white">
                        <tr><th class="px-4 py-3 font-medium">Nama</th><th class="px-4 py-3 font-medium">Email</th><th class="px-4 py-3 font-medium">Telepon</th><th class="px-4 py-3 font-medium">Bisnis</th><th class="px-4 py-3 font-medium">Tanggal</th><th class="px-4 py-3 font-medium"></th></tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr v-for="lead in leads.data" :key="lead.id" class="hover:bg-white/5">
                            <td class="px-4 py-3 text-white">{{ lead.fullname }}</td>
                            <td class="px-4 py-3 text-white">{{ lead.email }}</td>
                            <td class="px-4 py-3 text-white">{{ lead.phone }}</td>
                            <td class="px-4 py-3 text-white">{{ lead.business_name }}</td>
                            <td class="px-4 py-3 text-white">{{ new Date(lead.created_at).toLocaleDateString() }}</td>
                            <td class="px-4 py-3 text-right"><Link :href="route('admin.leads.show', lead.id)" class="text-impost-primary hover:underline">Detail</Link></td>
                        </tr>
                        <tr v-if="leads.data.length === 0"><td colspan="6" class="px-4 py-6 text-center text-white">Belum ada leads.</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
