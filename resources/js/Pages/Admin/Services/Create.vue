<script setup>
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ImageUpload from "@/Components/ImageUpload.vue";

const form = useForm({
    service_name: "",
    slug: "",
    description: "",
    category: "",
    cover_path: "",
    cover_file: null,
    remove_image: false,
    sort: 0,
});

function submit() {
    form.post(route("admin.services.store"), { forceFormData: true });
}
</script>

<template>
    <Head title="Tambah Service" />

    <AdminLayout>
        <div class="max-w-2xl space-y-6">
            <div>
                <h1 class="font-header text-3xl text-white">Tambah Service</h1>
                <p class="mt-1 text-sm text-white">Isi detail layanan baru.</p>
            </div>

            <form class="space-y-6" @submit.prevent="submit">
                <div>
                    <label class="block text-sm font-medium text-white">Nama Service</label>
                    <input v-model="form.service_name" type="text" required class="admin-input">
                    <p v-if="form.errors.service_name" class="mt-1 text-xs text-red-400">{{ form.errors.service_name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-white">Slug</label>
                    <input v-model="form.slug" type="text" required class="admin-input">
                    <p v-if="form.errors.slug" class="mt-1 text-xs text-red-400">{{ form.errors.slug }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-white">Deskripsi</label>
                    <textarea v-model="form.description" rows="5" required class="admin-input" />
                    <p v-if="form.errors.description" class="mt-1 text-xs text-red-400">{{ form.errors.description }}</p>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-white">Kategori</label>
                        <input v-model="form.category" type="text" class="admin-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white">Sort</label>
                        <input v-model.number="form.sort" type="number" required class="admin-input">
                    </div>
                </div>

                <ImageUpload
                    v-model="form.cover_file"
                    :existing="form.cover_path"
                    label="Cover"
                    :error="form.errors.cover_file"
                    @remove="() => { form.cover_path = ''; form.remove_image = true; }"
                />

                <div class="flex items-center gap-4">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-xl bg-impost-primary px-6 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50"
                    >
                        Simpan
                    </button>
                    <Link :href="route('admin.services.index')" class="text-sm text-white hover:text-white">Batal</Link>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
