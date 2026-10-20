<script setup>
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({ category: { type: Object, required: true } });
const form = useForm({ name: props.category.name, slug: props.category.slug });
function submit() { form.put(route("admin.portfolio-categories.update", props.category.id)); }
function destroy() { if (confirm("Yakin ingin menghapus kategori ini?")) form.delete(route("admin.portfolio-categories.destroy", props.category.id)); }
</script>

<template>
    <Head title="Edit Kategori" />
    <AdminLayout>
        <div class="max-w-2xl space-y-6">
            <div class="flex items-center justify-between">
                <div><h1 class="font-header text-3xl text-white">Edit Kategori</h1><p class="mt-1 text-sm text-white">Ubah detail kategori.</p></div>
                <button type="button" @click="destroy" class="rounded-xl border border-red-500/30 px-4 py-2 text-sm font-semibold text-red-400 transition hover:bg-red-500/10">Hapus</button>
            </div>
            <form class="space-y-6" @submit.prevent="submit">
                <div><label class="block text-sm font-medium text-white">Nama</label><input v-model="form.name" type="text" required class="admin-input"><p v-if="form.errors.name" class="mt-1 text-xs text-red-400">{{ form.errors.name }}</p></div>
                <div><label class="block text-sm font-medium text-white">Slug</label><input v-model="form.slug" type="text" required class="admin-input"><p v-if="form.errors.slug" class="mt-1 text-xs text-red-400">{{ form.errors.slug }}</p></div>
                <div class="flex items-center gap-4"><button type="submit" :disabled="form.processing" class="rounded-xl bg-impost-primary px-6 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50">Simpan Perubahan</button><Link :href="route('admin.portfolio-categories.index')" class="text-sm text-white hover:text-white">Batal</Link></div>
            </form>
        </div>
    </AdminLayout>
</template>
