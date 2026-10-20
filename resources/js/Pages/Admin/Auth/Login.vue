<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

function submit() {
    form.post(route("admin.login"));
}
</script>

<template>
    <Head title="Admin Login" />

    <div class="flex min-h-screen items-center justify-center bg-impost-fifth px-4">
        <div class="w-full max-w-md rounded-2xl border border-white/10 bg-white/5 p-8">
            <h1 class="font-header text-2xl text-impost-primary">Admin Login</h1>

            <form class="mt-8 space-y-6" @submit.prevent="submit">
                <div>
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                        :class="{ 'ring-red-500': form.errors.email }"
                    >
                    <p v-if="form.errors.email" class="mt-1 text-xs text-red-400">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-white">Password</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        required
                        class="mt-2 block w-full rounded-xl border-0 bg-white/5 px-4 py-3 text-white outline-none ring-1 ring-white/10 transition focus:ring-impost-primary"
                        :class="{ 'ring-red-500': form.errors.password }"
                    >
                    <p v-if="form.errors.password" class="mt-1 text-xs text-red-400">{{ form.errors.password }}</p>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full rounded-xl bg-impost-primary px-4 py-3 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary disabled:opacity-50"
                >
                    {{ form.processing ? "Logging in..." : "Login" }}
                </button>
            </form>
        </div>
    </div>
</template>
