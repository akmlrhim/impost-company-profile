<script setup>
defineProps({
    article: {
        type: Object,
        required: true,
    },
});

function coverSrc(article) {
    if (!article?.cover_path) {
        return null;
    }

    return /^(https?:)?\//.test(article.cover_path) ? article.cover_path : `/storage/${article.cover_path}`;
}

function formatDate(value) {
    if (!value) {
        return "";
    }

    return new Date(value).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
}
</script>

<template>
    <Link
        :href="route('articles.show', article.slug)"
        class="group block"
    >
        <div class="aspect-[16/10] overflow-hidden rounded-xl bg-ink/5">
            <img
                v-if="coverSrc(article)"
                :src="coverSrc(article)"
                :alt="article.title"
                class="size-full object-cover transition-transform duration-500 group-hover:scale-105"
                loading="lazy"
            >
        </div>

        <p class="mt-5 text-sm font-bold uppercase text-impost-primary">
            {{ article.category?.name }}
        </p>

        <h3 class="mt-2 line-clamp-2 text-xl font-bold leading-snug text-ink transition-colors group-hover:text-impost-primary">
            {{ article.title }}
        </h3>

        <p class="mt-3 flex items-center gap-2 text-sm text-ink">
            <svg class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
            </svg>
            {{ formatDate(article.created_at) }}
        </p>
    </Link>
</template>
