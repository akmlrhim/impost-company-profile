<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";

const user = usePage().props.auth.user;
const flash = computed(() => usePage().props.flash ?? {});

const mobileOpen = ref(false);

const navigation = [
    { name: "Dashboard", href: route("admin.dashboard"), active: route().current("admin.dashboard") },
    { name: "Services", href: route("admin.services.index"), active: route().current("admin.services.*") },
    { name: "Portfolio Categories", href: route("admin.portfolio-categories.index"), active: route().current("admin.portfolio-categories.*") },
    { name: "Portfolios", href: route("admin.portfolios.index"), active: route().current("admin.portfolios.*") },
    { name: "Leads", href: route("admin.leads.index"), active: route().current("admin.leads.*") },
    { name: "Testimonials", href: route("admin.testimonials.index"), active: route().current("admin.testimonials.*") },
];

const toast = ref(null);
let toastTimer = null;

function showToast(message, type) {
    if (!message) {
        return;
    }

    toast.value = { message, type };
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => (toast.value = null), 3500);
}

watch(
    () => flash.value,
    (value) => {
        if (value?.success) {
            showToast(value.success, "success");
        } else if (value?.error) {
            showToast(value.error, "error");
        }
    },
    { immediate: true, deep: true },
);
</script>

<template>
    <div class="min-h-screen bg-impost-fifth text-white">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="hidden w-64 border-r border-white/10 bg-impost-fifth lg:block">
                <div class="flex h-full flex-col">
                    <div class="border-b border-white/10 p-6">
                        <Link :href="route('admin.dashboard')" class="font-header text-xl text-impost-primary">
                            Impost Admin
                        </Link>
                    </div>

                    <nav class="flex-1 space-y-1 p-4">
                        <Link
                            v-for="item in navigation"
                            :key="item.name"
                            :href="item.href"
                            :class="[
                                'block rounded-lg px-4 py-2 text-sm transition',
                                item.active
                                    ? 'bg-impost-primary/10 text-impost-primary'
                                    : 'text-white hover:bg-white/5 hover:text-white',
                            ]"
                        >
                            {{ item.name }}
                        </Link>
                    </nav>

                    <div class="border-t border-white/10 p-4">
                        <p class="truncate text-sm text-white">{{ user?.email }}</p>
                        <Link
                            :href="route('admin.logout')"
                            method="post"
                            as="button"
                            class="mt-3 w-full rounded-lg bg-white/5 px-4 py-2 text-left text-sm text-white transition hover:bg-white/10 hover:text-white"
                        >
                            Logout
                        </Link>
                    </div>
                </div>
            </aside>

            <!-- Mobile drawer -->
            <div v-if="mobileOpen" class="fixed inset-0 z-40 lg:hidden">
                <div class="absolute inset-0 bg-black/60" @click="mobileOpen = false" />
                <aside class="absolute inset-y-0 left-0 flex w-64 flex-col border-r border-white/10 bg-impost-fifth">
                    <div class="flex items-center justify-between border-b border-white/10 p-6">
                        <Link :href="route('admin.dashboard')" class="font-header text-xl text-impost-primary" @click="mobileOpen = false">
                            Impost Admin
                        </Link>
                        <button type="button" class="text-white hover:text-white" @click="mobileOpen = false">âœ•</button>
                    </div>
                    <nav class="flex-1 space-y-1 overflow-y-auto p-4">
                        <Link
                            v-for="item in navigation"
                            :key="item.name"
                            :href="item.href"
                            :class="[
                                'block rounded-lg px-4 py-2 text-sm transition',
                                item.active
                                    ? 'bg-impost-primary/10 text-impost-primary'
                                    : 'text-white hover:bg-white/5 hover:text-white',
                            ]"
                            @click="mobileOpen = false"
                        >
                            {{ item.name }}
                        </Link>
                    </nav>
                    <div class="border-t border-white/10 p-4">
                        <p class="truncate text-sm text-white">{{ user?.email }}</p>
                        <Link
                            :href="route('admin.logout')"
                            method="post"
                            as="button"
                            class="mt-3 w-full rounded-lg bg-white/5 px-4 py-2 text-left text-sm text-white transition hover:bg-white/10 hover:text-white"
                        >
                            Logout
                        </Link>
                    </div>
                </aside>
            </div>

            <!-- Main -->
            <div class="flex flex-1 flex-col">
                <header class="flex items-center justify-between border-b border-white/10 bg-impost-fifth p-4 lg:hidden">
                    <button
                        type="button"
                        class="rounded-lg bg-white/5 px-3 py-2 text-sm text-white transition hover:bg-white/10"
                        @click="mobileOpen = true"
                    >
                        â˜° Menu
                    </button>
                    <Link :href="route('admin.dashboard')" class="font-header text-lg text-impost-primary">
                        Impost Admin
                    </Link>
                </header>

                <main class="flex-1 p-6 lg:p-10">
                    <slot />
                </main>
            </div>
        </div>

        <!-- Flash toast -->
        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="translate-y-2 opacity-0"
            leave-active-class="transition duration-150 ease-in"
            leave-to-class="translate-y-2 opacity-0"
        >
            <div
                v-if="toast"
                class="fixed bottom-6 right-6 z-50 max-w-sm rounded-xl border px-5 py-3 text-sm shadow-lg"
                :class="toast.type === 'error' ? 'border-red-500/30 bg-red-500/15 text-red-200' : 'border-emerald-500/30 bg-emerald-500/15 text-emerald-200'"
            >
                {{ toast.message }}
            </div>
        </transition>
    </div>
</template>
