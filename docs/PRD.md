# PRD — Website Publik Impost Media

| | |
|---|---|
| Versi | 1.0 |
| Tanggal | 2026-10-14 |
| Status | Draft untuk review |
| Referensi desain | https://www.adgi.or.id |

---

## 1. Latar Belakang

Impost Media adalah creative agency / media company. Saat ini backend dan model data sudah lengkap (portfolio, services, articles, study cases, team, clients, testimonials, leads, job postings), tetapi **belum ada halaman publik** — root hanya redirect ke `/admin`.

Website dibangun ulang dengan dua tujuan:

1. Menjadi etalase karya dan jasa (portfolio, services, study cases).
2. Menjadi mesin lead generation (form kontak, WhatsApp CTA).

ADGI dipilih sebagai referensi karena pola situsnya cocok untuk organisasi/agency: hero slider yang teatrikal, pernyataan visi-misi yang kuat, grid profil tim, kartu program dengan CTA, dan logo grid klien/mitra.

## 2. Tujuan & Metrik Sukses

### Tujuan Bisnis

- **T1** — Meningkatkan leads masuk via form kontak (`leads` table) minimal 20% dalam 3 bulan setelah rilis.
- **T2** — Membangun kredibilitas melalui portfolio, study cases, dan testimoni klien.
- **T3** — Menjadi kanal rekrutmen (halaman karier dari `job_postings`).

### Metrik Produk

| Metrik | Target awal |
|---|---|
| Leads per bulan | ≥ 10 |
| LCP (mobile) | < 2,5s |
| Bounce rate homepage | < 50% |
| CTR CTA "Hubungi Kami" | ≥ 5% sesi |

## 3. Target & Persona

### P1 — calon klien (CMO/owner bisnis, 28–45 th)

- **Butuh:** bukti kemampuan (portfolio, study case, testimoni), daftar jasa, cara kontak cepat.
- **Perilaku:** scan homepage < 10 detik, langsung cari karya & CTA.
- **Percaya pada:** logo klien, hasil terukur (angka), desain profesional.

### P2 — calon pelamar (desainer/konten kreator, 20–30 th)

- **Butuh:** budaya perusahaan, posisi terbuka, kualifikasi.
- **Perilaku:** datang dari LinkedIn/Instagram, cari halaman karier.

### P3 — pembaca/publik (pelaku industri, mahasiswa DKV)

- **Butuh:** artikel & insight terbaru.
- **Perilaku:** konsumsi konten rutin, share ke media sosial.

## 4. Scope

### 4.1 Dalam Scope

- Semua halaman publik (lihat [SITEMAP.md](SITEMAP.md)).
- Form leads dengan validasi + notifikasi.
- Pencarian & filter portfolio/article.
- SEO on-page (meta, sitemap, Open Graph).
- Dark mode (opsional, tahap 2).

### 4.2 Luar Scope

- Admin panel / CMS (jalur terpisah, sudah ada rencana `/admin`).
- Sistem keanggotaan seperti ADGI (Impost bukan asosiasi).
- Multi-bahasa (Indonesia dulu, i18n tahap 3 bila perlu).
- Komentar publik live — model `Comment` ada, tapi moderasi belum dibuat; tunda.

## 5. Kebutuhan Fungsional

### 5.1 Beranda (Homepage)

| ID | Kebutuhan | Prioritas |
|---|---|---|
| H-01 | Hero slider/banner seperti ADGI: visual full-bleed, ada varian desktop & mobile | P0 |
| H-02 | Statement besar tentang perusahaan (padanan "Visi-Misi" ADGI → positioning Impost) | P0 |
| H-03 | Ringkasan services (3–4 kartu utama) | P0 |
| H-04 | Portfolio unggulan (grid 6–8 karya terbaru) | P0 |
| H-05 | Logo grid klien (mengacu pola logo grid mitra ADGI) | P1 |
| H-06 | Testimoni (slider/carousel) | P1 |
| H-07 | Profil tim ringkas (grid foto + nama + jabatan, pola pengurus ADGI) | P2 |
| H-08 | Artikel terbaru (3 kartu) | P1 |
| H-09 | CTA ganda: form leads + tombol WhatsApp | P0 |
| H-10 | Footer lengkap: kontak, email, sosial media, alamat (pola footer ADGI) | P0 |

### 5.2 Portfolio & Karya

| ID | Kebutuhan | Prioritas |
|---|---|---|
| P-01 | Halaman index: grid karya, dukung media gambar & video (`media_type`) | P0 |
| P-02 | Filter per kategori | P1 |
| P-03 | Halaman detail karya per slug | P0 |

### 5.3 Services

| ID | Kebutuhan | Prioritas |
|---|---|---|
| S-01 | Index services, dikelompokkan per `category`, urut `sort` | P0 |
| S-02 | Detail service per slug dengan deskripsi lengkap + CTA leads | P0 |

### 5.4 Study Cases

| ID | Kebutuhan | Prioritas |
|---|---|---|
| SC-01 | Index study case (kartu dengan cover) | P1 |
| SC-02 | Detail dengan struktur Situation → Solution → Result | P0 |
| SC-03 | Highlight hasil terukur (angka) di kartu | P2 |

### 5.5 Artikel / Blog

| ID | Kebutuhan | Prioritas |
|---|---|---|
| A-01 | Index artikel dengan paginasi, filter kategori | P1 |
| A-02 | Detail artikel per slug, konten HTML (sudah ada `mews/purifier`) | P0 |
| A-03 | Pencarian artikel | P2 |

### 5.6 Tentang Kami

| ID | Kebutuhan | Prioritas |
|---|---|---|
| T-01 | Profil perusahaan: cerita, nilai, positioning | P0 |
| T-02 | Grid tim (foto + nama + jabatan) — pola "Pengurus Pusat" ADGI | P0 |

### 5.7 Kontak & Leads

| ID | Kebutuhan | Prioritas |
|---|---|---|
| C-01 | Form leads: nama, email/telepon, kebutuhan, pesan | P0 |
| C-02 | Validasi via Form Request, simpan ke tabel `leads` | P0 |
| C-03 | Tombol WhatsApp direct (pola CTA WhatsApp ADGI) | P0 |

### 5.8 Karier

| ID | Kebutuhan | Prioritas |
|---|---|---|
| K-01 | Daftar lowongan aktif dari `job_postings` | P2 |
| K-02 | Detail lowongan + cara melamar | P2 |

## 6. Kebutuhan Non-Fungsional

- **Performa:** LCP < 2,5s mobile. Gambar via `intervention/image` untuk resize/WebP. Lazy load semua gambar below-fold.
- **Responsif:** Mobile-first; ADGI bahkan menyediakan aset slider terpisah untuk mobile — kita gunakan `srcset`/art direction.
- **Aksesibilitas:** WCAG 2.2 AA. Kontras teks, alt text, navigasi keyboard, fokus terlihat.
- **SEO:** Meta title/description per halaman (Inertia Head), canonical, Open Graph image, `sitemap.xml`, structured data (Organization, Article). Catatan CSR: tanpa SSR, meta di-inject via `<Head>` Inertia; bila SEO artikel jadi prioritas, naikkan SSR ke Fase 2.
- **Keamanan:** Form pakai rate limiting + Purifier untuk konten artikel. Jangan tampilkan email mentah tanpa proteksi spam.
- **Browser:** 2 versi terakhir Chrome, Firefox, Edge, Safari.

## 7. Batasan Teknis

- Stack baru: Laravel 12 (PHP 8.3) + Inertia 3 + Vue 3 (Composition API, `<script setup>`) + Tailwind CSS 4 + Vite + Ziggy.
- Frontend full SPA via Inertia: controller return `Inertia::render()`, halaman = Vue SFC di `resources/js/Pages/`. Detail rencana teknis: [MIGRATION.md](MIGRATION.md).
- SSR Inertia ditunda (opsional Fase 3) — CSR dulu untuk sederhanakan; struktur Inertia memudahkan nyalakan SSR belakangan.
- Ziggy wajib: semua link di komponen Vue pakai `route('name')`, tidak ada URL hardcode.
- Gunakan model Eloquent yang sudah ada; props Inertia via Form Request / data terkontrol, eager loading untuk hindari N+1.
- Halaman publik di area `/` (guest), admin tetap di `/admin`.
- Perubahan dependency baru (inertia, vue, ziggy, @vitejs/plugin-vue) disetujui dalam perubahan stack ini — di luar itu tetap butuh persetujuan.

## 8. Roadmap

### Fase 0 — Migrasi Stack (prasyarat)

1. Pasang Inertia 3 + Vue 3 + Ziggy, buat middleware `HandleInertiaRequests`, shell `app.blade.php`, Vite config plugin Vue.
2. Layout global Vue: `SiteLayout` (header, footer), navigasi, konfirmasi helloworld page ter-render.
3. Lihat [MIGRATION.md](MIGRATION.md) untuk detail langkah.

### Fase 1 — Fondasi (MVP)

1. Layout global: header, navigasi, footer.
2. Homepage lengkap (H-01 s/d H-05, H-09, H-10).
3. Halaman services + portfolio + detail.
4. Form leads berfungsi.

### Fase 2 — Kedalaman

1. Study cases (index + detail).
2. Artikel (index + detail).
3. Tentang kami + grid tim.
4. Testimoni di homepage.

### Fase 3 — Pendukung

1. Halaman karier.
2. Pencarian & filter lanjutan.
3. SEO teknis lengkap (sitemap, OG, structured data).
4. Dark mode bila brand mengizinkan.

## 9. Pertanyaan Terbuka

1. Aset brand Impost Media — apakah sudah ada brand guideline (logo, warna, font)? **Blokir Fase 1 desain.**
2. Nomor WhatsApp resmi untuk CTA?
3. Konten homepage siapa yang tulis? Perlu copywriting untuk statement besar.
4. Prioritas Fase 2: study case dulu atau artikel dulu?
