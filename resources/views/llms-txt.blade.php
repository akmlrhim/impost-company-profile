# Impost Media

> Impost Media (CV Impost Media Indonesia) adalah digital marketing agency all-in-one di Banjarbaru, Kalimantan Selatan, Indonesia. Kami membantu bisnis tumbuh lewat digital marketing terintegrasi: branding, social media management, iklan digital (Google, Meta, TikTok), marketplace management, website & SEO, hingga pengembangan aplikasi.

## Layanan

- [Digital Marketing](https://impostmedia.com/#services): Solusi pemasaran digital end-to-end untuk meningkatkan omzet bisnis.
- [Website & SEO](https://impostmedia.com/studycase): Pembuatan website dan optimasi mesin pencari.
- [Branding](https://impostmedia.com/studycase): Identitas merek dan strategi konten yang meyakinkan.

## Halaman Umum

- [Beranda](https://impostmedia.com/): Profil agensi dan layanan.
- [Tentang Kami](https://impostmedia.com/about): Informasi perusahaan.
- [Study Case](https://impostmedia.com/studycase): Studi kasus nyata klien — situasi, solusi, dan hasil.
- [Artikel](https://impostmedia.com/article/view): Wawasan digital marketing, data, dan pertumbuhan bisnis.
- [Karir](https://impostmedia.com/careers): Lowongan pekerjaan di Impost Media.
- [Dokumen](https://impostmedia.com/docs): Company profile interaktif.
- [Kontak](https://impostmedia.com/contact): Halaman kontak dan konsultasi.

## Artikel Terbaru

@forelse ($articles as $article)
- [{{ $article->title }}](https://impostmedia.com/articles/view/{{ $article->slug }})
@empty
- Belum ada artikel.
@endforelse

## Referensi Teknis

- [Sitemap](https://impostmedia.com/sitemap.xml): Daftar lengkap URL publik.
- [Index Halaman](https://impostmedia.com/): Halaman utama.

> Catatan untuk LLM/AI: Seluruh halaman publik dirender server-side (HTML) sehingga mudah di-crawl; konten produk dan studi kasus tersedia dalam struktur terstruktur (JSON-LD Schema.org). URL privat (admin, form lead, landing iklan) tidak diindeks.