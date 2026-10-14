<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    fullname: '',
    email: '',
    phone: '',
    business_name: '',
    income: '',
    objective: '',
    note: '',
});

function submit() {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <form class="space-y-6" @submit.prevent="submit">
        <div>
            <label for="fullname" class="block text-sm font-medium text-white/80">Nama lengkap</label>
            <input
                id="fullname"
                v-model="form.fullname"
                type="text"
                required
                class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white placeholder-white/30 outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                :class="{ 'ring-red-500': form.errors.fullname }"
            >
            <p v-if="form.errors.fullname" class="mt-1 text-xs text-red-400">{{ form.errors.fullname }}</p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="email" class="block text-sm font-medium text-white/80">Email</label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white placeholder-white/30 outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                    :class="{ 'ring-red-500': form.errors.email }"
                >
                <p v-if="form.errors.email" class="mt-1 text-xs text-red-400">{{ form.errors.email }}</p>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-white/80">Telepon</label>
                <input
                    id="phone"
                    v-model="form.phone"
                    type="tel"
                    required
                    class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white placeholder-white/30 outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                    :class="{ 'ring-red-500': form.errors.phone }"
                >
                <p v-if="form.errors.phone" class="mt-1 text-xs text-red-400">{{ form.errors.phone }}</p>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="business_name" class="block text-sm font-medium text-white/80">Nama bisnis/organisasi</label>
                <input
                    id="business_name"
                    v-model="form.business_name"
                    type="text"
                    required
                    class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white placeholder-white/30 outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                    :class="{ 'ring-red-500': form.errors.business_name }"
                >
                <p v-if="form.errors.business_name" class="mt-1 text-xs text-red-400">{{ form.errors.business_name }}</p>
            </div>
            <div>
                <label for="income" class="block text-sm font-medium text-white/80">Estimasi budget</label>
                <select
                    id="income"
                    v-model="form.income"
                    required
                    class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                    :class="{ 'ring-red-500': form.errors.income }"
                >
                    <option value="" disabled class="bg-impost-fifth">Pilih range</option>
                    <option value="< 10 Juta" class="bg-impost-fifth">&lt; 10 Juta</option>
                    <option value="10 - 50 Juta" class="bg-impost-fifth">10 - 50 Juta</option>
                    <option value="50 - 100 Juta" class="bg-impost-fifth">50 - 100 Juta</option>
                    <option value="> 100 Juta" class="bg-impost-fifth">&gt; 100 Juta</option>
                </select>
                <p v-if="form.errors.income" class="mt-1 text-xs text-red-400">{{ form.errors.income }}</p>
            </div>
        </div>

        <div>
            <label for="objective" class="block text-sm font-medium text-white/80">Tujuan</label>
            <input
                id="objective"
                v-model="form.objective"
                type="text"
                required
                class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white placeholder-white/30 outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                :class="{ 'ring-red-500': form.errors.objective }"
            >
            <p v-if="form.errors.objective" class="mt-1 text-xs text-red-400">{{ form.errors.objective }}</p>
        </div>

        <div>
            <label for="note" class="block text-sm font-medium text-white/80">Pesan</label>
            <textarea
                id="note"
                v-model="form.note"
                rows="4"
                class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white placeholder-white/30 outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
            />
        </div>

        <button
            type="submit"
            :disabled="form.processing"
            class="rounded-full bg-impost-primary px-8 py-3 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50"
        >
            {{ form.processing ? 'Mengirim...' : 'Kirim' }}
        </button>

        <p v-if="$page.props.status === 'success'" class="text-sm text-emerald-400">
            Pesan terkirim. Tim kami akan segera menghubungi Anda.
        </p>
    </form>
</template>
