<script setup>
defineProps({
    /**
     * Daftar item breadcrumb. Item terakhir otomatis tampil tebal
     * sebagai posisi halaman saat ini. Item dengan `href` jadi link.
     *
     * @type {{ label: string, href?: string }[]}
     */
    items: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <nav class="flex flex-wrap items-center gap-2 text-sm text-impost-third" aria-label="Breadcrumb">
        <template v-for="(item, index) in items" :key="index">
            <svg
                v-if="index > 0"
                class="size-3.5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7" />
            </svg>
            <Link
                v-if="item.href"
                :href="item.href"
                class="transition-colors hover:text-ink"
            >
                {{ item.label }}
            </Link>
            <span v-else :class="index === items.length - 1 ? 'font-bold text-ink' : ''">
                {{ item.label }}
            </span>
        </template>
    </nav>
</template>
