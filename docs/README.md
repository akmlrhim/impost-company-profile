# Dokumentasi Produk — Impost Media

Dokumen arahan untuk pembangunan ulang (rebuild) website publik Impost Media.
Referensi utama: [adgi.or.id](https://www.adgi.or.id) — Asosiasi Desainer Grafis Indonesia.

## Daftar Dokumen

| Dokumen | Isi |
|---|---|
| [PRD.md](PRD.md) | Product Requirements: tujuan, persona, scope, kebutuhan fungsional per halaman, metrik sukses, roadmap |
| [DESIGN.md](DESIGN.md) | Arah desain: analisis referensi ADGI, design tokens, tipografi, komponen, layout per halaman, responsif, aksesibilitas |
| [SITEMAP.md](SITEMAP.md) | Arsitektur informasi, routing Laravel, pemetaan model data ke halaman |
| [MIGRATION.md](MIGRATION.md) | Rencana migrasi teknis: Blade/Alpine → Inertia 3 + Vue 3, langkah demi langkah |

## Ringkasan Proyek

- **Produk:** Website publik Impost Media — creative agency / media company.
- **Stack:** Laravel 12 (PHP 8.3), Inertia 3, Vue 3 (Composition API + `<script setup>`), Tailwind CSS 4, Vite, Ziggy.
- **Frontend pattern:** SPA — controller Laravel return `Inertia::render()`, halaman sebagai Vue SFC di `resources/js/Pages/`. Tidak ada Blade view untuk halaman publik (blade hanya `app.blade.php` sebagai shell).
- **Status saat ini:** Model data lengkap (portfolio, services, articles, team, clients, testimonials, study cases, leads, job postings) namun belum ada halaman publik. Route `/` redirect ke `/admin`.
- **Tujuan:** Bangun frontend publik profesional dengan standar struktur & kualitas visual setara adgi.or.id.

## Urutan Baca

1. `PRD.md` — pahami scope & prioritas.
2. `SITEMAP.md` — pahami struktur halaman & routing.
3. `DESIGN.md` — pahami eksekusi visual sebelum menulis komponen Vue.
4. `MIGRATION.md` — rencana teknis migrasi Blade/Alpine → Inertia + Vue 3.
