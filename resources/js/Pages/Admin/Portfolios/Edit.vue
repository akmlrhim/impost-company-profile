<script setup>
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ImageUpload from "@/Components/ImageUpload.vue";

const props = defineProps({ portfolio: { type: Object, required: true }, categories: { type: Array, required: true } });
const form = useForm({
    title: props.portfolio.title,
    slug: props.portfolio.slug,
    category_id: props.portfolio.category_id ?? "",
    media_path: props.portfolio.media_path ?? "",
    media_file: null,
    remove_image: false,
    media_type: props.portfolio.media_type ?? "",
});
function submit() { form.put(route("admin.portfolios.update", props.portfolio.id), { forceFormData: true }); }
function destroy() { if (confirm("Yakin ingin menghapus portfolio ini?")) form.delete(route("admin.portfolios.destroy", props.portfolio.id)); }
</script>

<template>
    <Head title="Edit Portfolio" />
    <AdminLayout>
        <div class="max-w-2xl space-y-6">
            <div class="flex items-center justify-between">
                <div><h1 class="font-header text-3xl text-white">Edit Portfolio</h1><p class="mt-1 text-sm text-white">Ubah detail karya.</p></div>
                <button type="button" @click="destroy" class="rounded-xl border border-red-500/30 px-4 py-2 text-sm font-semibold text-red-400 transition hover:bg-red-500/10">Hapus</button>
            </div>
            <form class="space-y-6" @submit.prevent="submit">
                <div><label class="block text-sm font-medium text-white">Judul</label><input v-model="form.title" type="text" required class="admin-input"><p v-if="form.errors.title" class="mt-1 text-xs text-red-400">{{ form.errors.title }}</p></div>
                <div><label class="block text-sm font-medium text-white">Slug</label><input v-model="form.slug" type="text" required class="admin-input"><p v-if="form.errors.slug" class="mt-1 text-xs text-red-400">{{ form.errors.slug }}</p></div>
                <div><label class="block text-sm font-medium text-white">Kategori</label>
                    <select v-model="form.category_id" class="admin-input">
                        <option value="">Tanpa kategori</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
                <ImageUpload
                    v-model="form.media_file"
                    :existing="form.media_path"
                    label="Media"
                    :error="form.errors.media_file"
                    @remove="() => { form.media_path = ''; form.remove_image = true; }"
                />
                <div><label class="block text-sm font-medium text-white">Media Type</label><input v-model="form.media_type" type="text" class="admin-input"><p v-if="form.errors.media_type" class="mt-1 text-xs text-red-400">{{ form.errors.media_type }}</p></div>
                <div class="flex items-center gap-4"><button type="submit" :disabled="form.processing" class="rounded-xl bg-impost-primary px-6 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50">Simpan Perubahan</button><Link :href="route('admin.portfolios.index')" class="text-sm text-white hover:text-white">Batal</Link></div>
            </form>
        </div>
    </AdminLayout>
</template>
