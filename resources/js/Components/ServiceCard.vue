<script setup>
defineProps({
    service: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <article class="flex flex-col rounded-2xl border border-white/10 bg-white/5 p-6 transition hover:border-impost-primary">
        <h3 class="font-header text-xl">{{ service.service_name }}</h3>
        <p class="mt-3 flex-grow text-sm leading-relaxed text-white/60 line-clamp-3">
            {{ service.description }}
        </p>
        <Link
            :href="route('services.show', service.slug)"
            class="mt-6 inline-flex items-center text-sm font-semibold text-impost-primary transition hover:text-impost-secondary"
        >
            Lihat detail
            <svg class="ml-1 size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </Link>
    </article>
</template>
