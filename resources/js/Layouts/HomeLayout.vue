<script setup>
import Header from "@/Components/Landing/Header.vue";
import Footer from "@/Components/Landing/Footer.vue";

defineProps({
    title: String,
});
</script>

<template>
    <Head :title="title" />

    <div class="min-h-screen scroll-smooth bg-paper font-sans text-ink transition-colors duration-300">
        <Header />

        <main :class="route().current('home') ? '' : 'pt-[86px]'">
            <slot />
        </main>

        <Footer />
    </div>
</template>
