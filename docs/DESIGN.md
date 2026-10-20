# Arah Desain — Website Impost Media

|                 |                                   |
| --------------- | --------------------------------- |
| Versi           | 2.0                               |
| Tanggal         | 2026-10-15                        |
| Dokumen acuan   | [UI_SLICING.md](UI_SLICING.md)    |
| Status          | Selaras dengan slicing yang dieksekusi |

---

## 1. Ruang Lingkup & Hubungan Dokumen

Dua dokumen ini berbagi peran yang berbeda:

- **[UI_SLICING.md](UI_SLICING.md) — sumber kebenaran teknis.** Memecah halaman menjadi section, ukuran, struktur grid, props komponen, dan daftar aset. Semua angka (lebar kolom, tinggi hero, gap, ukuran font) mengacu ke sana.
- **DESIGN.md (dokumen ini) — arah & prinsip.** Menjelaskan *mengapa* keputusan visual diambil, token yang mengikat seluruh halaman, serta aturan kontras, motion, dan aksesibilitas.

Jika terjadi selisih antara dokumen ini dan UI_SLICING.md, **UI_SLICING.md yang menang** untuk hal teknis (ukuran/layout), dan dokumen ini yang menang untuk prinsip/token.

**Ruang lingkup versi ini:** **Landing page** (8 section — lihat §5). Halaman lain (services, portfolio, study case, artikel, kontak) mengikuti [SITEMAP.md](SITEMAP.md) dan belum termasuk dalam slicing ini.

**Asal-usul visual.** Struktur halaman mengikuti pola layout organisasi/agensi (banner → visi/misi → program → klien) yang semula dipelajari dari adgi.or.id, lalu diganti sepenuhnya dengan identitas **IMPOST MEDIA** dan palet Impost. Prinsipnya tetap: **ambil struktur & ritme, bukan meniru skin/identitas visual pihak lain.**

> ⚠️ Jangan menyalin warna, logo, atau tata letak milik pihak lain 1:1. Palet, logo, dan tipografi yang dipakai adalah milik Impost Media.

## 2. Prinsip Desain

1. **Struktur jelas & grid disiplin** — setiap section memakai pola 2 area: kolom label kiri sempit (±64px) + kolom konten kanan. Konsisten dari section pertama sampai footer.
2. **Tipografi sebagai hero** — headline besar (Visi) dan label kecil yang kontras jadi penanda ritme; hierarki ditegakkan lewat ukuran & berat, bukan warna.
3. **Aksen emas dipakai hemat** — `impost-primary` hanya untuk highlight, ikon, garis aksen, dot aktif, dan tombol. Bukan latar besar.
4. **Konten dulu, UI pendiam** — background mayoritas putih; warna kuat hanya di hero, footer, dan aksen.
5. **Mobile bukan versi kecil** — label section naik ke atas konten, grid mengecil, ukuran display turun (lihat §6).

## 3. Design Tokens (Tailwind CSS 4 — `@theme`)

Tailwind v4: token didefinisikan di CSS (`resources/css/app.css`), bukan `tailwind.config.js`.

### 3.1 Warna (palet Impost)

```css
@theme {
  --color-impost-primary: #d4ac3c;   /* emas — aksen utama */
  --color-impost-secondary: #d09738; /* emas gelap — hover/aktif */
  --color-impost-third: #95774f;     /* cokelat muda — label, border, teks sekunder */
  --color-impost-fourth: #503924;    /* cokelat tua — heading besar, hover kartu */
  --color-impost-fifth: #040404;     /* hitam — hero, footer, teks utama */
}
```

| Token              | Hex       | Pemakaian                                                                     |
| ------------------ | --------- | ----------------------------------------------------------------------------- |
| `impost-primary`   | `#d4ac3c` | Highlight teks Visi, logo, tombol, ikon layanan, garis aksen, dot hero aktif   |
| `impost-secondary` | `#d09738` | Hover/aktif tombol & link                                                      |
| `impost-third`     | `#95774f` | Label section, border/divider, teks sekunder, ikon redup                       |
| `impost-fourth`    | `#503924` | Heading misi/layanan/kartu CTA, background hover kartu layanan                 |
| `impost-fifth`     | `#040404` | Hero, footer, teks utama                                                       |
| `white`            | `#ffffff` | Background halaman, teks di atas background gelap                              |
| `surface`          | —         | Kartu layanan & kartu klien: `bg-impost-primary/10` (emas 10%)                 |

### 3.2 Aturan Kontras

- `impost-primary` di atas putih kontrasnya rendah (±2:1) → hanya untuk **elemen besar/dekoratif** (highlight headline, garis, ikon), **bukan** teks kecil.
- Teks kecil (label section, isi kartu) pakai `impost-third` atau `impost-fourth` di atas putih.
- Tombol ber-background `impost-primary` → teks pakai **`impost-fifth`**, bukan putih.
- Footer gelap (`impost-fifth`) → teks putih, link/ikon aksen `impost-primary`.

### 3.3 Tipografi — satu keluarga font: **Inter**

Seluruh halaman memakai **satu keluarga font** (Inter) untuk semua level. Hierarki dibentuk oleh **ukuran & berat**, bukan pergantian family. Inter dimuat via Bunny Fonts (`fonts.bunny.net`) pada `resources/views/app.blade.php` (weight 400–800). Self-host via `@fontsource/inter` boleh dipertimbangkan belakangan untuk privasi/performa, tanpa mengubah desain.

```css
@theme {
  --font-sans: "Inter", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --font-header: "Inter", ui-sans-serif, system-ui, sans-serif; /* alias — lihat catatan */
}
```

Catatan implementasi: kelas `.font-header` (dipakai di heading) kini hanya menambah `font-weight: 700` + `letter-spacing: -0.01em`, karena family-nya sama dengan body.

Skala tipografi (mengacu UI_SLICING.md §2):

| Token          | Ukuran         | Weight      | Pemakaian                                  |
| -------------- | -------------- | ----------- | ------------------------------------------ |
| `text-display` | ±52px / lh 1.15 | 500–600    | Headline Visi                              |
| `text-intro`   | ±28px / lh 1.2  | 300–400    | Paragraf intro                             |
| `text-h3`      | ±30px          | 700         | Judul poin misi, judul layanan, judul kartu CTA |
| `text-label`   | ±11px          | 700 italic  | Label section                              |
| `text-body-sm` | ±12px / lh 1.4 | 400         | Isi misi, kartu layanan, kartu CTA         |
| `text-footer`  | ±10–11px       | 400         | Teks footer                                |

```css
@theme {
  --text-display: 3.25rem; /* ±52px */
  --text-intro: 1.75rem;   /* ±28px */
}
```

> Token `--text-display` / `--text-intro` belum ada di `app.css` saat ini — tambahkan saat section Visi & Intro dikerjakan.

### 3.4 Spacing, Grid & Radius

```css
@theme {
  --spacing-section: 5rem;        /* jarak antar section (rentang desain ±60–100px) */
  --spacing-gutter: 0.75rem;      /* gap antar kartu (±12px → gap-3) */
  --radius-card: 0;               /* kartu kotak/tegas — tanpa radius */
  --radius-control: 0;            /* tombol juga tanpa radius */
}
```

- **Padding horizontal halaman**: ±40px (`px-10`).
- **Pola grid section**: `grid-cols-[64px_1fr] gap-x-8` — kolom label kiri ±64px, konten mulai di x ≈ 103px.
- **Kartu**: gap ±12px (`gap-3`), padding ±16px (`p-4`), **tanpa radius**.
- Antar item pakai `gap`, bukan `margin`.
- Breakpoint & perubahan grid per ukuran layar: lihat §6.

## 4. Komponen Inti

Semua komponen Vue SFC di `resources/js/Components/`, `<script setup>` + `defineProps` bertipe. Komponen reusable untuk landing page:

| Komponen               | Catatan desain                                                              | Status        |
| ---------------------- | --------------------------------------------------------------------------- | ------------- |
| `SiteHeader.vue`       | Tinggi ±86px; logo kiri menimpa hero; nav ringkas; CTA kontak                | Ada — perlu disesuaikan ke slicing |
| `Hero.vue`             | Satu komponen, 3 mode (`image`/`video`/`slides`); overlay gelap 20–30%; dots & tombol mute opsional | **Belum** — perlu dibuat |
| `SectionRow.vue`       | Pola label kiri + konten kanan; dipakai semua section                        | **Belum**     |
| `ServiceCard.vue`      | Nomor/ikon, judul `text-h3` (`impost-fourth`), deskripsi `text-body-sm`, CTA opsional | Ada — perlu disesuaikan |
| `CtaCard.vue`          | Kartu CTA: judul, deskripsi, tombol "Hubungi Kami"                           | **Belum**     |
| `ClientCard.vue`       | Kartu klien 2 kolom internal + `ClientLogoGrid`                              | **Belum**     |
| `ClientLogoGrid.vue`   | Grid logo ±3–4 kolom, grayscale seragam, berwarna saat hover                 | **Belum**     |
| `Button.vue`           | Dasar tombol: bg `impost-primary`, teks `impost-fifth`, hover `impost-secondary`, tanpa radius | **Belum** |
| `SiteFooter.vue`       | 3 kolom (brand, kontak, alamat) + copyright rata kanan                       | Ada — perlu disesuaikan |
| `LeadForm.vue`         | Submit via Inertia `useForm`/POST, state sukses/error jelas                  | Ada (halaman kontak) |

Komponen yang **tidak** termasuk slicing ini (dan sudah di luar scope landing page): `PortfolioGrid`, `StudyCard`, `ArticleCard`, `TeamCard`, `TestimonialSlider`, `CtaBand`. Bila section terkait ditambahkan nanti, dokumentasikan di sini lebih dulu.

### Contoh Props

```ts
type HeroProps = {
  image?: { desktop: string; mobile?: string; alt: string };
  video?: { mp4: string; webm?: string; poster: string; hasAudio?: boolean };
  slides?: { desktop: string; mobile?: string; alt: string }[];
};
// Mode: video ada -> video; slides ada -> slides; selain itu -> image

type SectionRowProps = { label: string };
type ServiceCardProps = {
  title: string;
  description: string;
  icon?: string;
  href?: string;
  cta?: string; // default "Selengkapnya"
};
type CtaCardProps = { title: string; description: string; ctaLabel: string; ctaHref: string };
type ClientCardProps = { title: string; description?: string; logos: { src: string; alt: string }[] };
```

## 5. Layout Landing Page

Urutan section (detail ukuran & markup di [UI_SLICING.md §3](UI_SLICING.md)):

```
[1] Header         — putih, logo menimpa hero, nav ringkas (Instagram + Kontak)
[2] Hero           — media full-width (image | video | slides) + overlay
[3] Tentang Kami  — label + pernyataan besar (max-width ±1100px) + paragraf pendukung + tautan
[4] Visi           — label kiri + headline display dengan 2 frasa highlight emas
[5] Misi           — label kiri + grid 3 kolom
[6] Layanan        — label kiri + grid kartu layanan (3 kolom desktop)
[7] Klien          — kartu CTA + kartu grid logo klien
[8] Footer         — logo, kontak, alamat, copyright
```

- **Header & Hero** saling menimpa: logo di header diposisikan di atas hero (z-index), varian warna `impost-primary`.
- **Semua section 3–7** memakai `SectionRow` (label kiri `impost-third` italic bold ±11px, konten kanan).
- **Background**: putih, kecuali Hero & Footer (`impost-fifth`).
- Section yang tampil hanya bila datanya ada (mis. Layanan bila ada data service) — hindari section kosong.

## 6. Responsif

Mengacu UI_SLICING.md §7:

| Breakpoint | Perubahan                                                                                          |
| ---------- | -------------------------------------------------------------------------------------------------- |
| ≥1024px    | Layout penuh: label kiri + konten kanan; layanan 3 kolom                                            |
| 768–1023px | Misi 2 kolom, layanan 2 kolom, kartu CTA & klien menumpuk                                          |
| <768px     | Label section naik di atas konten; misi & layanan 1 kolom; `text-display` turun ke ±32px; footer menumpuk vertikal |

- Hero: siapkan versi gambar mobile (±800×900px) lewat `<picture>`.
- Nav: hamburger (state reaktif Vue) di bawah `md`; CTA kontak selalu tampil.

## 7. Motion & Interaksi

- Transisi **150–300ms**, easing `ease-out`.
- **Hero `slides`**: fade ±600ms, auto-slide ±5s, **jeda saat hover**, dot bisa diklik.
- **Hero `video`**: `autoplay muted loop playsinline`; tombol mute membuka suara **hanya setelah klik pengguna**; video jeda saat tab tidak aktif atau hero keluar dari viewport.
- **Kartu layanan hover**: background → `impost-fourth`, teks putih, judul `impost-primary`; atau garis aksen `impost-primary` di bawah judul.
- **Tombol hover**: `impost-secondary`.
- **Nav**: link Instagram buka tab baru; `Kontak` scroll halus ke footer.
- Hindari animasi on-scroll yang rumit; maksimal fade-up ringan bila ditambahkan.

## 8. Aksesibilitas

- Kontras minimum: teks normal 4.5:1, teks besar 3:1 (perhatikan aturan §3.2 — `impost-primary` bukan untuk teks kecil di atas putih).
- Semua kontrol interaktif punya focus ring terlihat.
- **Hero**: overlay gelap 20–30% wajib agar logo emas, dots, dan tombol mute tetap terbaca di atas media apa pun.
- Hormati `prefers-reduced-motion`: tampilkan poster saja tanpa autoplay. Di mobile / koneksi hemat data (`navigator.connection.saveData`), pakai poster agar ringan.
- Video: `muted` + `playsinline` wajib; `preload="metadata"`; `poster` selalu diisi.
- Slider: tombol prev/next + indikator, dukung keyboard, `aria-live` untuk perubahan slide; tombol mute punya `aria-label`.
- Alt text deskriptif untuk semua gambar; ikon dekoratif `aria-hidden="true"`.

## 9. Anti-Pola (jangan lakukan)

- Menyalin warna/logo/tata letak pihak lain 1:1.
- Teks di atas media tanpa overlay/kontras — tidak terbaca.
- Memakai `impost-primary` untuk teks kecil di atas putih — kontras gagal.
- Menambah keluarga font kedua (halaman ini **hanya** Inter).
- Slider otomatis tanpa kontrol — mengganggu pengguna screen reader.
- Memberi radius besar/`rounded-full` pada kartu & tombol yang di slicing seharusnya kotak tegas.
- Section kosong tanpa data (sembunyikan, jangan tampilkan placeholder mentah).

## 10. Hal yang Perlu Dikonfirmasi

Dari UI_SLICING.md §9 — perlu jawaban sebelum/di awal eksekusi:

- [ ] Font brand final: tetap Inter, atau ada font brand lain? (jika ganti, ganti **satu** family saja)
- [ ] Logo final (varian emas untuk header, putih untuk footer) dalam SVG
- [ ] Handle Instagram, email, dan alamat kantor untuk header/footer
- [ ] Teks final Intro, Visi (dua frasa highlight), dan tiga poin Misi
- [ ] Daftar layanan final (judul, deskripsi, ikon, tautan) & jumlahnya → menentukan 2/3/4 kolom
- [ ] Hero: mode awal (image / video / slides), apakah video punya audio (menentukan tombol mute), dan apakah ada teks/CTA di atas media
- [ ] Setuju background kartu `impost-primary/10`, atau mau netral lain
- [ ] Apakah header `sticky`/`fixed` saat scroll
