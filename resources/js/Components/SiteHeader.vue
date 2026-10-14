<script setup>
import { ref } from "vue";

const mobileMenuOpen = ref(false);

const navigation = [
    { label: "Services", href: route('services.index') },
    { label: "Portfolio", href: route('portfolio.index') },
    { label: "Study Cases", href: "/study-cases" },
    { label: "Artikel", href: "/articles" },
    { label: "Tentang", href: "/about" },
    { label: "Karier", href: "/careers" },
];
</script>

<template>
    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-impost-fifth/80 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-6 px-4 sm:px-6 lg:px-8">
            <Link href="/" class="flex items-center gap-2 font-header text-xl tracking-tight">
                Impost<span class="text-impost-primary">Media</span>
            </Link>

            <nav class="hidden items-center gap-8 md:flex" aria-label="Navigasi utama">
                <Link
                    v-for="item in navigation"
                    :key="item.label"
                    :href="item.href"
                    class="text-sm text-white/70 transition hover:text-white"
                >
                    {{ item.label }}
                </Link>
            </nav>

            <div class="flex items-center gap-3">
                <Link
                    href="/contact"
                    class="hidden rounded-full bg-impost-primary px-5 py-2 text-sm font-semibold text-impost-fifth transition hover:bg-impost-secondary sm:inline-flex"
                >
                    Hubungi Kami
                </Link>

                <button
                    type="button"
                    class="inline-flex size-10 items-center justify-center rounded-lg text-white md:hidden"
                    :aria-expanded="mobileMenuOpen"
                    aria-label="Buka menu"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                >
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <Transition>
            <nav v-if="mobileMenuOpen" class="border-t border-white/10 bg-impost-fifth px-4 py-4 md:hidden" aria-label="Navigasi mobile">
                <ul class="flex flex-col gap-4">
                    <li v-for="item in navigation" :key="item.label">
                        <Link
                            :href="item.href"
                            class="block text-sm text-white/70 transition hover:text-white"
                            @click="mobileMenuOpen = false"
                        >
                            {{ item.label }}
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="/contact"
                            class="block rounded-full bg-impost-primary px-5 py-2 text-center text-sm font-semibold text-impost-fifth"
                            @click="mobileMenuOpen = false"
                        >
                            Hubungi Kami
                        </Link>
                    </li>
                </ul>
            </nav>
        </Transition>
    </header>
</template>
