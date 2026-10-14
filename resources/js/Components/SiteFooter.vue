<script setup>
const year = new Date().getFullYear();

const navigation = [
    { label: "Services", href: "/services" },
    { label: "Portfolio", href: "/portfolio" },
    { label: "Study Cases", href: "/study-cases" },
    { label: "Artikel", href: "/articles" },
    { label: "Tentang", href: "/about" },
    { label: "Karier", href: "/careers" },
];

const contact = {
    email: "hello@impostmedia.id",
    whatsapp: "+62 800 0000 0000",
    address: "Jakarta, Indonesia",
};

const socials = [
    { label: "Instagram", href: "https://instagram.com/impostmedia" },
    { label: "LinkedIn", href: "https://linkedin.com/company/impostmedia" },
];
</script>

<template>
    <footer class="border-t border-white/10 bg-impost-fifth">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:grid-cols-2 sm:px-6 lg:grid-cols-4 lg:px-8">
            <div>
                <p class="font-header text-xl">Impost<span class="text-impost-primary">Media</span></p>
                <p class="mt-3 text-sm text-white/60">Creative agency &amp; media company.</p>
            </div>

            <nav aria-label="Footer navigasi">
                <p class="text-sm font-semibold text-white/80">Navigasi</p>
                <ul class="mt-4 flex flex-col gap-3">
                    <li v-for="item in navigation" :key="item.label">
                        <Link :href="item.href" class="text-sm text-white/60 transition hover:text-white">
                            {{ item.label }}
                        </Link>
                    </li>
                </ul>
            </nav>

            <div>
                <p class="text-sm font-semibold text-white/80">Kontak</p>
                <ul class="mt-4 flex flex-col gap-3 text-sm text-white/60">
                    <li>{{ contact.email }}</li>
                    <li>{{ contact.whatsapp }}</li>
                    <li>{{ contact.address }}</li>
                </ul>
            </div>

            <div>
                <p class="text-sm font-semibold text-white/80">Sosial Media</p>
                <ul class="mt-4 flex flex-col gap-3">
                    <li v-for="social in socials" :key="social.label">
                        <a :href="social.href" target="_blank" rel="noopener" class="text-sm text-white/60 transition hover:text-white">
                            {{ social.label }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 py-6 text-center text-xs text-white/40">
            &copy; {{ year }} Impost Media. All rights reserved.
        </div>
    </footer>
</template>
