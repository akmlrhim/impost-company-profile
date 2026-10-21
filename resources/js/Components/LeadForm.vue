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

const objectiveOptions = [
    { value: 'Branding', label: 'Branding', description: 'Meningkatkan citra brand' },
    { value: 'Engagement', label: 'Engagement', description: 'Mendapatkan interaksi' },
    { value: 'Sales ROI', label: 'Sales ROI', description: 'Meningkatkan leads/sales' },
    { value: 'All In One', label: 'All In One', description: 'Branding & Penjualan' },
];

const incomeOptions = [
    { value: '< 10 Juta', label: '< 10 Juta' },
    { value: '10 - 50 Juta', label: '10 - 50 Juta' },
    { value: '50 - 100 Juta', label: '50 - 100 Juta' },
    { value: '> 100 Juta', label: '> 100 Juta' },
];

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
            <label for="fullname" class="block text-sm font-medium text-ink">Nama lengkap</label>
            <input
                id="fullname"
                v-model="form.fullname"
                type="text"
                required
                class="mt-2 block w-full rounded-xl border-0 bg-field px-4 py-3 text-ink placeholder-ink/40 outline-none ring-1 ring-line transition focus:ring-impost-primary"
                :class="{ 'ring-red-500': form.errors.fullname }"
                placeholder="Masukkan nama lengkap Anda"
            >
            <p v-if="form.errors.fullname" class="mt-1 text-xs text-red-600">{{ form.errors.fullname }}</p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label for="email" class="block text-sm font-medium text-ink">Email</label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    class="mt-2 block w-full rounded-xl border-0 bg-field px-4 py-3 text-ink placeholder-ink/40 outline-none ring-1 ring-line transition focus:ring-impost-primary"
                    :class="{ 'ring-red-500': form.errors.email }"
                    placeholder="nama@email.com"
                >
                <p v-if="form.errors.email" class="mt-1 text-xs text-red-600">{{ form.errors.email }}</p>
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-ink">Telepon</label>
                <input
                    id="phone"
                    v-model="form.phone"
                    type="tel"
                    required
                    class="mt-2 block w-full rounded-xl border-0 bg-field px-4 py-3 text-ink placeholder-ink/40 outline-none ring-1 ring-line transition focus:ring-impost-primary"
                    :class="{ 'ring-red-500': form.errors.phone }"
                    placeholder="08xx-xxxx-xxxx"
                >
                <p v-if="form.errors.phone" class="mt-1 text-xs text-red-600">{{ form.errors.phone }}</p>
            </div>
        </div>

        <div>
            <label for="business_name" class="block text-sm font-medium text-ink">Nama bisnis/organisasi</label>
            <input
                id="business_name"
                v-model="form.business_name"
                type="text"
                required
                class="mt-2 block w-full rounded-xl border-0 bg-field px-4 py-3 text-ink placeholder-ink/40 outline-none ring-1 ring-line transition focus:ring-impost-primary"
                :class="{ 'ring-red-500': form.errors.business_name }"
                placeholder="Nama bisnis atau organisasi Anda"
            >
            <p v-if="form.errors.business_name" class="mt-1 text-xs text-red-600">{{ form.errors.business_name }}</p>
        </div>

        <div>
            <span class="block text-sm font-medium text-ink">Estimasi budget</span>
            <div class="mt-2 grid gap-3 sm:grid-cols-2" role="radiogroup" aria-label="Estimasi budget">
                <label
                    v-for="option in incomeOptions"
                    :key="option.value"
                    class="flex cursor-pointer items-center gap-3 rounded-xl px-4 py-3 ring-1 transition"
                    :class="form.income === option.value ? 'bg-impost-primary/5 ring-impost-primary' : 'ring-line hover:ring-line-strong'"
                >
                    <input v-model="form.income" type="radio" name="income" :value="option.value" class="sr-only" required>
                    <span
                        class="flex size-4 shrink-0 items-center justify-center rounded-full border"
                        :class="form.income === option.value ? 'border-impost-primary' : 'border-line-strong'"
                    >
                        <span class="size-2 rounded-full" :class="form.income === option.value ? 'bg-impost-primary' : 'bg-transparent'" />
                    </span>
                    <span class="text-sm font-bold text-ink">{{ option.label }}</span>
                </label>
            </div>
            <p v-if="form.errors.income" class="mt-1 text-xs text-red-600">{{ form.errors.income }}</p>
        </div>

        <div>
            <span class="block text-sm font-medium text-ink">Tujuan</span>
            <div class="mt-2 grid gap-3 sm:grid-cols-2" role="radiogroup" aria-label="Tujuan">
                <label
                    v-for="option in objectiveOptions"
                    :key="option.value"
                    class="flex cursor-pointer items-center gap-3 rounded-xl px-4 py-3 ring-1 transition"
                    :class="form.objective === option.value ? 'bg-impost-primary/5 ring-impost-primary' : 'ring-line hover:ring-line-strong'"
                >
                    <input v-model="form.objective" type="radio" name="objective" :value="option.value" class="sr-only" required>
                    <span
                        class="flex size-4 shrink-0 items-center justify-center rounded-full border"
                        :class="form.objective === option.value ? 'border-impost-primary' : 'border-line-strong'"
                    >
                        <span class="size-2 rounded-full" :class="form.objective === option.value ? 'bg-impost-primary' : 'bg-transparent'" />
                    </span>
                    <span>
                        <span class="block text-sm font-bold text-ink">{{ option.label }}</span>
                        <span class="block text-xs text-ink/80">{{ option.description }}</span>
                    </span>
                </label>
            </div>
            <p v-if="form.errors.objective" class="mt-1 text-xs text-red-600">{{ form.errors.objective }}</p>
        </div>

        <div>
            <label for="note" class="block text-sm font-medium text-ink">Pesan</label>
            <textarea
                id="note"
                v-model="form.note"
                rows="4"
                class="mt-2 block w-full rounded-xl border-0 bg-field px-4 py-3 text-ink placeholder-ink/40 outline-none ring-1 ring-line transition focus:ring-impost-primary"
                placeholder="Ceritakan kebutuhan proyek Anda..."
            />
        </div>

        <button
            type="submit"
            :disabled="form.processing"
            class="w-full rounded-full bg-impost-primary px-8 py-3 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50"
        >
            {{ form.processing ? 'Mengirim...' : 'Kirim' }}
        </button>

        <p v-if="$page.props.status === 'success'" class="text-sm text-emerald-600">
            Pesan terkirim. Tim kami akan segera menghubungi Anda.
        </p>
    </form>
</template>
