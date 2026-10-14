# Rencana Migrasi Stack — Blade/Alpine → Inertia 3 + Vue 3

| | |
|---|---|
| Versi | 1.0 |
| Tanggal | 2026-10-14 |
| Keputusan | Laravel 12 + PHP 8.3 tetap; frontend pindah ke Inertia + Vue 3; routing JS pakai Ziggy |

---

## 1. Kondisi Awal

- Laravel v12.42.0, PHP 8.3.9 — sudah versi terkini, tidak ada perubahan major PHP/Laravel.
- Frontend saat ini Blade + Alpine 3 + Tailwind 4; belum ada halaman publik (`/` redirect `/admin`).
- `node_modules` sudah berisi `vue@3.5.35` dan `@inertiajs/vue3@3.3.0` (extraneous — bekas percobaan, tidak di package.json). Aman di-adopt langsung.

## 2. Dependency Baru

Composer:

```bash
composer require inertiajs/inertia-laravel:^2.1 tightenco/ziggy:^2
```

npm (devDependencies):

```bash
npm install -D vue @inertiajs/vue3 ziggy-js @vitejs/plugin-vue
```

Catatan:

- `@inertiajs/vue3@3` (JS) dipasangkan dengan adapter `inertia-laravel` v2 — pasangan resmi untuk Inertia 3.
- Ziggy v2 modern sudah tidak butuh `ziggy:generate` (route tersedia via `Ziggy` global yang di-share oleh `HandleInertiaRequests`).
- Alpine dipertahankan sementara untuk panel admin (bila ada), lalu dihapus dari frontend publik. Blade error pages (`resources/views/errors/`) tetap — tidak lewat Inertia.

## 3. Langkah Migrasi

### 3.1 Middleware Inertia

Buat `app/Http/Middleware/HandleInertiaRequests.php` (stub dari package):

- Share `auth.user` (nanti), dan `Ziggy` config untuk `route()` di JS.
- Daftarkan di `bootstrap/app.php` pada group `web`.

### 3.2 Blade shell

Ganti isi `resources/views/app.blade.php` (buat bila belum ada):

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
```

### 3.3 Vite config

`vite.config.js` — tambah `@vitejs/plugin-vue` dan alias `@` → `resources/js`:

```js
import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig(({ command, mode }) => ({
    plugins: [
        laravel(...),
        vue(),
    ],
    resolve: { alias: { '@': path.resolve(__dirname, 'resources/js') } },
}));
```

### 3.4 Entry JS

Buat `resources/js/app.js`:

```js
import '../css/app.css';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { createApp, h } from 'vue';

createInertiaApp({
    title: (title) => `${title} — Impost Media`,
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el);
    },
    progress: { color: 'var(--color-brand)' },
});
```

### 3.5 Layout & page pertama

- `resources/js/Layouts/SiteLayout.vue` — header, footer, `<slot/>`.
- `resources/js/Pages/Home.vue` — placeholder konten dari DESIGN.md §5.1.
- HomeController return `Inertia::render('Home')`, route `/` ganti dari redirect.

### 3.6 Validasi & verifikasi

- `php artisan inertia:middleware`, jalankan `npm run build` — pastikan manifest Vite terbentuk.
- Pest feature test: GET `/` assert Inertia page `Home` (`assertInertia` / cek `page.component`), GET `/services` assert props `services`.
- `vendor/bin/pint --dirty` sebelum selesai.

## 4. Struktur Target

Lihat [SITEMAP.md §4](SITEMAP.md) untuk struktur `resources/js` final: `Components/`, `Layouts/`, `Pages/<Domain>/Index|Show.vue`.

## 5. Checklist Keluar dari Fase 0

- [ ] `composer.json` + `package.json` mendeklarasikan semua dependency baru.
- [ ] Middleware `HandleInertiaRequests` aktif, Ziggy ter-share.
- [ ] `Home.vue` ter-render di `/` lewat Inertia.
- [ ] `npm run build` sukses tanpa error.
- [ ] Pint pass, Pest test `/` hijau.
- [ ] Tidak ada dependensi Alpine di sisi publik.

## 6. Risiko & Catatan

- **SEO tanpa SSR:** halaman publik CSR dulu; bila SEO artikel jadi krusial, nyalakan SSR Inertia (`inertia:ssr`, `resources/js/ssr.js`) di Fase 3 — struktur saat ini sengaja SSR-ready.
- **Extraneous packages:** versi yang sudah ada di `node_modules` bisa dipakai langsung; yang penting dideklarasikan di `package.json` agar lockfile konsisten.
- **Alpine di admin:** jika admin panel masih pakai Alpine, jangan hapus dependency-nya sampai admin ikut dipindah atau tetap Blade.
- **Boost guidelines:** aturan project melarang dependency baru tanpa persetujuan — perubahan stack ini sudah disetujui lewat keputusan user (2026-10-14).
