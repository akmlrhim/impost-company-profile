<script setup>
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ImageUpload from "@/Components/ImageUpload.vue";

const form = useForm({ name: "", company_name: "", content: "", photo_path: "", photo_file: null, remove_image: false });
function submit() { form.post(route("admin.testimonials.store"), { forceFormData: true }); }
</script>

<template>
    <Head title="Tambah Testimoni" />
    <AdminLayout>
        <div class="max-w-2xl space-y-6">
            <div><h1 class="font-header text-3xl text-white">Tambah Testimoni</h1><p class="mt-1 text-sm text-white">Isi detail testimoni.</p></div>
            <form class="space-y-6" @submit.prevent="submit">
                <div><label class="block text-sm font-medium text-white">Nama</label><input v-model="form.name" type="text" required class="admin-input"><p v-if="form.errors.name" class="mt-1 text-xs text-red-400">{{ form.errors.name }}</p></div>
                <div><label class="block text-sm font-medium text-white">Perusahaan</label><input v-model="form.company_name" type="text" class="admin-input"><p v-if="form.errors.company_name" class="mt-1 text-xs text-red-400">{{ form.errors.company_name }}</p></div>
                <div><label class="block text-sm font-medium text-white">Isi</label><textarea v-model="form.content" rows="4" required class="admin-input" /><p v-if="form.errors.content" class="mt-1 text-xs text-red-400">{{ form.errors.content }}</p></div>
                <ImageUpload
                    v-model="form.photo_file"
                    :existing="form.photo_path"
                    label="Photo"
                    :error="form.errors.photo_file"
                    @remove="() => { form.photo_path = ''; form.remove_image = true; }"
                />
                <div class="flex items-center gap-4"><button type="submit" :disabled="form.processing" class="rounded-xl bg-impost-primary px-6 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50">Simpan</button><Link :href="route('admin.testimonials.index')" class="text-sm text-white hover:text-white">Batal</Link></div>
            </form>
        </div>
    </AdminLayout>
</template>
