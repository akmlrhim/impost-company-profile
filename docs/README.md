# Dokumentasi Produk — Impost Media

Dokumen arahan untuk pembangunan ulang (rebuild) website publik Impost Media.
Referensi utama: [adgi.or.id](https://www.adgi.or.id) — Asosiasi Desainer Grafis Indonesia.

## Daftar Dokumen

| Dokumen | Isi |
|---|---|
| [PRD.md](PRD.md) | Product Requirements: tujuan, persona, scope, kebutuhan fungsional per halaman, metrik sukses, roadmap |
| [DESIGN.md](DESIGN.md) | Arah desain: analisis referensi ADGI, design tokens, tipografi, komponen, layout per halaman, responsif, aksesibilitas |
| [SITEMAP.md](SITEMAP.md) | Arsitektur informasi, routing Laravel, pemetaan model data ke halaman |

## Ringkasan Proyek

- **Produk:** Website publik Impost Media — creative agency / media company.
- **Stack:** Laravel 12, Blade, Alpine.js 3, Tailwind CSS 4, Vite.
- **Status saat ini:** Model data lengkap (portfolio, services, articles, team, clients, testimonials, study cases, leads, job postings) namun belum ada halaman publik. Route `/` redirect ke `/admin`.
- **Tujuan:** Bangun frontend publik profesional dengan standar struktur & kualitas visual setara adgi.or.id.

## Urutan Baca

1. `PRD.md` — pahami scope & prioritas.
2. `SITEMAP.md` — pahami struktur halaman & routing.
3. `DESIGN.md` — pahami eksekusi visual sebelum menulis Blade view.
