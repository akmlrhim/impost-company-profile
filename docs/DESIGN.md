# Arah Desain — Website Impost Media

| | |
|---|---|
| Versi | 1.0 |
| Tanggal | 2026-10-14 |
| Referensi utama | https://www.adgi.or.id |

---

## 1. Analisis Referensi ADGI

Pola yang diambil dari adgi.or.id dan dipetakan ke kebutuhan Impost Media:

| Pola ADGI | Padanan Impost Media |
|---|---|
| Hero slider full-bleed dengan aset terpisah desktop/mobile | Hero banner karya unggulan, art direction beda layout mobile |
| Statement besar organisasi (Visi/Misi) sebagai headline tipografis | Positioning statement Impost: satu kalimat besar tentang agensi |
| Kartu program (ADGI Pro / ADGI Edu) dengan CTA per kartu | Kartu services dengan CTA "Diskusikan Proyek" |
| Grid pengurus: foto + nama + jabatan | Grid team: foto + nama + jabatan |
| Logo grid mitra (kampus) | Logo grid klien (`clients`) — sinyal kepercayaan |
| CTA WhatsApp langsung di nav + kartu | CTA WhatsApp + form leads |
| Footer multi-kolom: logo, kontak, email, sosmed, alamat | Footer identik strukturnya |

Prinsip yang dipegang ADGI: **struktur jelas, tipografi jadi hero, grid rapi, foto orang di atas warna netral**. Kita ikut prinsip ini, bukan hasil visual meniru persis.

> ⚠️ Jangan menyalin warna/identitas visual ADGI (asosiasi desain — publik desain akan menandainya). Ambil struktur & ritme, bukan skin.

## 2. Prinsip Desain

1. **Karya dulu** — layout memberi ruang untuk gambar/video portfolio; kromatik UI pendiam supaya karya menang.
2. **Tipografi sebagai suara** — headline besar, tegas, hierarki jelas (ADGI memakai ini untuk Visi/Misi).
3. **Grid disiplin** — 12 kolom, max-width kontainer, spacing konsisten dari token.
4. **CTA selalu terlihat** — minimal satu aksi kontak terlihat di setiap viewport panjang (pola WhatsApp ADGI).
5. **Mobile bukan versi kecil** — art direction mobile sendiri untuk hero & grid.

## 3. Design Tokens (Tailwind CSS 4 — `@theme`)

Tailwind v4: token didefinisikan di CSS, bukan `tailwind.config.js`. Simpan di `resources/css/app.css`.

### 3.1 Warna

Warna final menunggu brand guideline resmi. Nilai di bawah adalah placeholder rasional (netral gelap + aksen oranye-merah khas agency media):

```css
@theme {
  /* Netral */
  --color-ink: oklch(0.16 0.01 260);        /* teks utama / bg gelap */
  --color-ink-soft: oklch(0.28 0.01 260);   /* teks sekunder */
  --color-paper: oklch(0.98 0.003 260);     /* bg terang */
  --color-line: oklch(0.90 0.004 260);      /* border/pembatas */

  /* Aksen brand — ganti dengan warna resmi */
  --color-brand: oklch(0.63 0.22 35);       /* aksen utama */
  --color-brand-deep: oklch(0.48 0.19 30);   /* aksen hover/aktif */
  --color-brand-tint: oklch(0.96 0.03 35);  /* latar aksen lembut */
}
```

Aturan penggunaan:

- Aksen brand hanya untuk CTA, link aktif, dan highlight — bukan latar besar.
- Foto/karya = warna. UI netral.

### 3.2 Tipografi

| Level | Kelas Tailwind (pembentukan) | Kegunaan |
|---|---|---|
| Display | `text-5xl md:text-7xl font-extrabold tracking-tight` | Hero, statement besar |
| H1 | `text-4xl md:text-5xl font-bold` | Judul halaman |
| H2 | `text-2xl md:text-3xl font-bold` | Judul section |
| H3 | `text-xl font-semibold` | Judul kartu |
| Body | `text-base md:text-lg text-ink-soft leading-relaxed` | Paragraf |
| Caption | `text-sm text-ink-soft` | Meta, label |

- Pilih 2 font saja: display (grotesque tebal, mis. varian variabel font modern) + body yang nyaman baca panjang.
- Muat self-hosted (`@fontsource/*` via npm atau file lokal di `resources/fonts` + `@font-face`) — jangan Google Fonts CDN demi privasi & performa.

### 3.3 Spacing & Radius

```css
@theme {
  --spacing-section: 6rem;   /* padding-y antar section desktop */
  --spacing-section-mobile: 3.5rem;
  --radius-card: 1rem;        /* kartu */
  --radius-pill: 9999px;      /* tombol CTA */
}
```

- Antar item pakai `gap`, bukan margin (konvensi Tailwind project ini).
- Section dipisah `--spacing-section`, konten dalam section pakai grid 12 kolom.

## 4. Komponen Inti

Semua komponen Vue SFC di `resources/js/Components/`, pakai `<script setup>` + TypeScript bila tim setuju (minimal JS murni + `defineProps` bertipe):

| Komponen | Catatan desain |
|---|---|
| `HeroSlider.vue` | Full-bleed, `srcset` desktop/mobile, autoplay pelan, pause on hover |
| `ServiceCard.vue` | Cover, judul, deskripsi singkat, CTA ke detail |
| `PortfolioGrid.vue` | Grid masonry/2:2:3, dukung `media_type` video |
| `PortfolioCard.vue` | Hover: zoom pelan + overlay judul |
| `StudyCard.vue` | Cover + badge "Result" angka highlight |
| `ArticleCard.vue` | Cover, kategori, tanggal, judul, excerpt |
| `TeamCard.vue` | Foto potret rasio 3:4, nama + jabatan di bawah (pola ADGI) |
| `ClientLogoGrid.vue` | Grayscale, berwarna saat hover, wrap di semua ukuran |
| `TestimonialSlider.vue` | Quote + nama + perusahaan |
| `CtaBand.vue` | Band warna brand + CTA ganda (form & WhatsApp) |
| `LeadForm.vue` | Submit via Inertia `useForm`/POST, state sukses/error jelas |
| `SiteHeader.vue` | Sticky, logo kiri, nav tengah/kanan, CTA WhatsApp tombol |
| `SiteFooter.vue` | Multi kolom: brand, kontak, tautan, alamat, sosial |

## 5. Layout per Halaman

### 5.1 Beranda

```
[Header sticky + CTA]
[Hero slider — full viewport]
[Statement besar — 1 kalimat positioning, tipografi display]
[Services — 3-4 kartu]
[Portfolio unggulan — grid 6-8]
[Logo klien — band grayscale]
[Study case pilihan — 2-3 kartu]
[Testimoni — carousel]
[Tim ringkas — grid foto]
[Artikel terbaru — 3 kartu]
[CTA band — form + WhatsApp]
[Footer]
```

Urutan boleh disesuaikan, tapi hero → statement → services → portfolio adalah urutan wajib (pola ADGI: banner → visi/misi → program).

### 5.2 Detail Study Case

Struktur naratif 3 babak mengikuti field model `StudyCase`:

1. **Situation** — konteks klien & masalah, tipografi besar.
2. **Solution** — pendekatan, visual pendukung.
3. **Result** — angka/bukti, styling paling menonjol.
4. CTA band di bawah.

### 5.3 Detail Artikel

Konten HTML dari `purifier`, max-width bacaan `prose` (~70ch), cover di atas, meta (kategori, tanggal) di bawah judul.

## 6. Responsif

| Breakpoint | Perilaku |
|---|---|
| `< sm` | 1 kolom, nav hamburger (Alpine), hero art direction mobile |
| `sm–lg` | 2 kolom kartu |
| `≥ lg` | Grid penuh 12 kolom, nav horizontal, hero desktop |
| `≥ xl` | Kontainer max-width, tipografi naik 1 level |

## 7. Motion

- Transisi 150–300ms, easing default (`ease-out`).
- Hover kartu: scale gambar `1.02–1.05` + overlay — pelan, tidak mengganggu.
- Slider hero: crossfade 600ms, autoplay 5–6s.
- Hindari animasi on-scroll yang rumit; maksimal fade-up ringan bila ditambahkan.

## 8. Aksesibilitas

- Kontras minimum: teks normal 4.5:1, teks besar 3:1.
- Semua kontrol interactive punya focus ring terlihat.
- Slider: tombol prev/next + indikator, dukung keyboard, `aria-live` untuk perubahan slide.
- Alt text deskriptif semua gambar karya; foto tim alt = nama orang.
- Ikon dekoratif `aria-hidden="true"`.

## 9. Anti-Pola (jangan lakukan)

- Hero dengan teks di atas foto tanpa overlay/kontras — tidak terbaca.
- Logo klien berwarna penuh — jadi rebutan perhatian, pakai grayscale + hover berwarna.
- Font display lebih dari 2 family.
- Slider otomatis tanpa kontrol — mengganggu pengguna screen reader.
- Menyalin warna/tata letak ADGI 1:1.
