<script setup>
import SiteHeader from "@/Components/SiteHeader.vue";
import SiteFooter from "@/Components/SiteFooter.vue";

defineProps({
    title: String,
});
</script>

<template>
    <Head :title="title" />

    <div class="min-h-screen bg-impost-fifth font-sans text-white">
        <SiteHeader />

        <main>
            <slot />
        </main>

        <SiteFooter />
    </div>
</template>
