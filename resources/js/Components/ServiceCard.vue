<script setup>
defineProps({
    service: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <article class="flex flex-col rounded-2xl border border-impost-fifth/10 bg-impost-fifth/5 p-6 transition hover:border-impost-primary">
        <h3 class="text-xl font-bold">{{ service.service_name }}</h3>
        <p class="mt-3 flex-grow text-sm leading-relaxed text-impost-fifth line-clamp-3">
            {{ service.description }}
        </p>
        <Link
            :href="route('services.show', service.slug)"
            class="mt-6 inline-flex items-center text-sm font-bold text-impost-primary transition-colors hover:text-impost-secondary"
        >
            Lihat detail
            <svg class="ml-1 size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </Link>
    </article>
</template>
