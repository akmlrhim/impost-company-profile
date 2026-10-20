<script setup>
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ImageUpload from "@/Components/ImageUpload.vue";

defineProps({ categories: { type: Array, required: true } });

const form = useForm({
    title: "",
    slug: "",
    category_id: "",
    media_path: "",
    media_file: null,
    remove_image: false,
    media_type: "",
});

function submit() {
    form.post(route("admin.portfolios.store"), { forceFormData: true });
}
</script>

<template>
    <Head title="Tambah Portfolio" />
    <AdminLayout>
        <div class="max-w-2xl space-y-6">
            <div><h1 class="font-header text-3xl text-white">Tambah Portfolio</h1><p class="mt-1 text-sm text-white">Isi detail karya.</p></div>
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
                <div class="flex items-center gap-4"><button type="submit" :disabled="form.processing" class="rounded-xl bg-impost-primary px-6 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50">Simpan</button><Link :href="route('admin.portfolios.index')" class="text-sm text-white hover:text-white">Batal</Link></div>
            </form>
        </div>
    </AdminLayout>
</template>
