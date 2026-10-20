<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({ lead: { type: Object, required: true } });
</script>

<template>
    <Head title="Detail Lead" />
    <AdminLayout>
        <div class="max-w-2xl space-y-6">
            <div class="flex items-center justify-between">
                <div><h1 class="font-header text-3xl text-white">Detail Lead</h1><p class="mt-1 text-sm text-white">Informasi lead yang masuk.</p></div>
                <Link :href="route('admin.leads.index')" class="text-sm text-white hover:text-white">Kembali</Link>
            </div>
            <div class="space-y-4 rounded-2xl border border-white/10 bg-white/5 p-6">
                <div><p class="text-xs text-white">Nama</p><p class="text-white">{{ lead.fullname }}</p></div>
                <div><p class="text-xs text-white">Email</p><p class="text-white">{{ lead.email }}</p></div>
                <div><p class="text-xs text-white">Telepon</p><p class="text-white">{{ lead.phone }}</p></div>
                <div><p class="text-xs text-white">Bisnis</p><p class="text-white">{{ lead.business_name }}</p></div>
                <div><p class="text-xs text-white">Budget</p><p class="text-white">{{ lead.income }}</p></div>
                <div><p class="text-xs text-white">Tujuan</p><p class="text-white">{{ lead.objective }}</p></div>
                <div><p class="text-xs text-white">Pesan</p><p class="whitespace-pre-line text-white">{{ lead.note }}</p></div>
            </div>
        </div>
    </AdminLayout>
</template>
