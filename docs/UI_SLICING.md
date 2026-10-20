# UI Slicing — Landing Page IMPOST MEDIA

Dokumen ini memecah desain halaman menjadi section, komponen, design token, dan daftar aset. Struktur dan ukuran diperkirakan dari screenshot referensi (lebar kanvas ±1008px) dan perlu diverifikasi ulang terhadap file desain asli (Figma).

> **Revisi 1:** tiga section "Pengurus" diganti satu section **Layanan**.
> **Revisi 2:** palet warna memakai palet **Impost** (emas/cokelat/hitam).
> **Revisi 3:** hero berisi **gambar** (bukan video), tombol mute dihapus.
> **Revisi 5:** hero mendukung **gambar dan video secara opsional** (satu komponen, mode ditentukan lewat props/data). Tombol mute kembali, tetapi hanya tampil pada mode video.
> **Revisi 4:** seluruh identitas ADGI diganti **IMPOST MEDIA**. Teks khusus ADGI (profil organisasi, keanggotaan, kontak, alamat, mitra kampus) diganti **teks draf / placeholder** yang ditandai `[ ... ]` atau "(draf)".

---

## 1. Ringkasan Struktur Halaman

| No  | Section | Background                                  | Komponen Utama                                                                   |
| --- | ------- | ------------------------------------------- | -------------------------------------------------------------------------------- |
| 1   | Header  | Putih                                       | Logo IMPOST MEDIA, nav link                                                      |
| 2   | Hero    | `impost-fifth` (fallback di belakang media) | Media full-width (gambar **atau** video), overlay, dots dan tombol mute opsional |
| 3   | Tentang Kami | Putih                                   | Label + pernyataan besar (brand tebal) + paragraf pendukung + tautan "Pelajari Lebih Lanjut" |
| 4   | Visi    | Putih                                       | Label + headline besar dengan highlight `impost-primary`                         |
| 5   | Misi    | Putih                                       | 3 kartu pilar (ikon SVG + paragraf)                                              |
| 6   | Layanan | Putih                                       | Grid kartu layanan                                                               |
| 7   | Klien   | Putih                                       | Kartu CTA + kartu grid logo klien                                                |
| 8   | Footer  | `impost-fifth`                              | Logo, kontak, alamat, copyright                                                  |

Layout umum: setiap section memakai grid 2 area. Kolom kiri sempit (±100px) untuk **label section** (italic, bold, kecil), kolom kanan untuk konten.

---

## 2. Design Tokens

### Warna (palet Impost)

```css
--color-impost-primary: #d4ac3c;
--color-impost-secondary: #d09738;
--color-impost-third: #95774f;
--color-impost-fourth: #503924;
--color-impost-fifth: #040404;
```

| Token              | Hex                                           | Pemakaian                                                                                                  |
| ------------------ | --------------------------------------------- | ---------------------------------------------------------------------------------------------------------- |
| `impost-primary`   | `#d4ac3c`                                     | Warna aksen utama: highlight teks Visi, logo, background tombol, ikon layanan, garis aksen, dot hero aktif |
| `impost-secondary` | `#d09738`                                     | State hover/active tombol, gradasi aksen bersama primary                                                   |
| `impost-third`     | `#95774f`                                     | Label section kecil, border/divider, teks sekunder, ikon redup                                             |
| `impost-fourth`    | `#503924`                                     | Heading besar (misi, layanan, kartu CTA), hover kartu layanan                                              |
| `impost-fifth`     | `#040404`                                     | Hero, footer, teks utama                                                                                   |
| `--color-white`    | `#FFFFFF`                                     | Background halaman, teks di atas background gelap                                                          |
| `--color-surface`  | `impost-primary` 10% (`bg-impost-primary/10`) | Background kartu layanan dan kartu klien/CTA                                                               |

### Catatan Kontras

- `impost-primary` di atas putih kontrasnya rendah (±2:1). Pakai untuk elemen besar/dekoratif (highlight headline, garis, ikon), **bukan** teks kecil.
- Teks kecil (label section, isi kartu) pakai `impost-third` atau `impost-fourth` di atas putih.
- Tombol background `impost-primary`: teks pakai **`impost-fifth`**, bukan putih.
- Footer gelap (`impost-fifth`): teks putih, link/ikon aksen `impost-primary`.

### Tipografi

Font sans-serif geometris modern (mirip _Sharp Grotesk / Aeonik / Neue Montreal_). Sesuaikan dengan font brand IMPOST MEDIA.

| Token          | Ukuran                  | Weight         | Pemakaian                                       |
| -------------- | ----------------------- | -------------- | ----------------------------------------------- |
| `text-display` | ±52px / lh 1.15         | Regular–Medium | Headline Visi                                   |
| `text-h3`      | ±30px                   | Bold           | Judul poin misi, judul layanan, judul kartu CTA |
| `text-label`   | 12px → 14px (lg)        | Bold italic    | Label section                                   |
| `text-body-sm` | 14px → 16px (lg) / lh 1.6 | Regular      | Isi misi, kartu layanan, kartu CTA              |
| `text-footer`  | 12px → 14px (lg)        | Regular        | Teks footer                                     |

> **Catatan keterbacaan:** teks isi tidak lebih kecil dari 14px, dan naik ke 16px pada layar ≥1024px (`lg`).
> Hindari `text-xs` (12px) untuk paragraf di desktop.

### Spacing & Layout

- **Lebar container landing**: `max-w-[1440px]` (Header, Footer, dan semua section). Padding horizontal ±24px (mobile) / ±40px (≥640px)
- Padding horizontal halaman: ±40px
- Kolom label kiri: ±64px, konten mulai di x ≈ 103px
- Jarak antar section: ±60–100px
- Kartu layanan dan kartu CTA: gap ±12px, padding ±16px

---

## 3. Slicing per Section

### 3.1 Header

- **Tinggi**: ±86px, background putih
- **Kiri**: Logo **IMPOST MEDIA** (besar, ±165×135px), **menimpa** area hero (overlap ke bawah, posisi absolut/z-index di atas hero). Varian warna: `impost-primary`
- **Kanan**: nav link `@[handle_instagram]` (link Instagram) dan `Kontak` (anchor ke footer), bold ±12px, warna `impost-fifth`, hover `impost-secondary`
- Posisi: kemungkinan `sticky`/`fixed` (verifikasi perilaku scroll)

### 3.2 Hero

- Full-width, tinggi ±375px (desktop), background `impost-fifth` sebagai fallback saat media belum termuat
- Satu komponen `<Hero>` dengan **dua mode media yang opsional**. Mode ditentukan lewat data/props, sehingga bisa diganti tanpa mengubah layout:

| Mode                | Isi                                                       | Kontrol tampil                   |
| ------------------- | --------------------------------------------------------- | -------------------------------- |
| `image` (default)   | Satu gambar `object-fit: cover`                           | Tidak ada                        |
| `video`             | Video `autoplay muted loop playsinline` + gambar `poster` | Tombol mute/unmute (kanan bawah) |
| `slides` (opsional) | Beberapa gambar bergantian (fade)                         | Pagination dots (kiri bawah)     |

- Prioritas jika keduanya diisi: **video dipakai, gambar menjadi poster dan fallback**. Jika video gagal dimuat atau tidak didukung, tampilkan gambar
- **Gambar**: `object-fit: cover`, fokus crop di tengah (siapkan `object-position` bila subjek tidak di tengah). Rekomendasi ±2400×1000px (rasio ±2.4:1), WebP/AVIF, di bawah ±300KB; siapkan versi mobile (mis. 800×900px) lewat `<picture>`
- **Video**: `object-fit: cover`, rekomendasi ±1920×800px, durasi 10–20 detik (loop mulus), MP4 H.264 (utama) + WebM (cadangan), di bawah ±5–8MB. Jika video dimute selamanya, buang track audio agar file lebih kecil; tombol mute hanya relevan bila audio dipertahankan
- **Aturan video**: wajib `muted` dan `playsinline` agar autoplay diizinkan browser; `preload="metadata"`; `poster` selalu diisi; hormati `prefers-reduced-motion` (tampilkan poster saja, tanpa autoplay); di mobile atau koneksi hemat data (`navigator.connection.saveData`) pakai poster agar ringan
- **Overlay gelap tipis** (`impost-fifth` 20–30%) berlaku untuk semua mode agar logo emas di pojok kiri atas (yang menimpa hero), dots, dan tombol mute tetap terbaca di atas media apa pun
- **Pagination dots** (kiri bawah, dot aktif `impost-primary` solid, sisanya outline putih): hanya mode `slides`
- **Tombol mute/unmute** (ikon speaker putih, kanan bawah): hanya mode `video` yang memiliki audio

```ts
type HeroProps = {
  image?: { desktop: string; mobile?: string; alt: string };
  video?: { mp4: string; webm?: string; poster: string; hasAudio?: boolean };
  slides?: { desktop: string; mobile?: string; alt: string }[];
};
// Mode: video ada -> video; slides ada -> slides; selain itu -> image
```

```html
<!-- Mode image -->
<section class="relative h-[375px] w-full overflow-hidden bg-impost-fifth">
  <picture>
    <source media="(min-width: 768px)" srcset="/images/hero-desktop.webp" />
    <img
      src="/images/hero-mobile.webp"
      alt="Deskripsi gambar hero"
      class="h-full w-full object-cover"
      fetchpriority="high"
    />
  </picture>
  <div class="absolute inset-0 bg-impost-fifth/25"></div>
</section>

<!-- Mode video -->
<section class="relative h-[375px] w-full overflow-hidden bg-impost-fifth">
  <video
    class="h-full w-full object-cover motion-reduce:hidden"
    autoplay
    muted
    loop
    playsinline
    preload="metadata"
    poster="/images/hero-poster.webp"
  >
    <source src="/videos/hero.webm" type="video/webm" />
    <source src="/videos/hero.mp4" type="video/mp4" />
  </video>
  <!-- Fallback untuk prefers-reduced-motion -->
  <img
    src="/images/hero-poster.webp"
    alt="Deskripsi gambar hero"
    class="hidden h-full w-full object-cover motion-reduce:block"
  />
  <div class="absolute inset-0 bg-impost-fifth/25"></div>
  <!-- Tombol mute: render hanya jika video punya audio -->
  <button
    type="button"
    aria-label="Aktifkan suara"
    class="absolute bottom-4 right-6 text-white"
  >
    <!-- ikon speaker -->
  </button>
</section>
```

### 3.3 Tentang Kami

- **Label** `Tentang Kami` di kiri-atas section (`impost-third`, italic, bold kecil)
- **Layout 2 kolom** (mengikuti referensi): kiri pernyataan besar, kanan paragraf pendukung
  - Kiri (`lg:grid-cols-[1.8fr_1fr]`): pernyataan besar `text-2xl`/`lg:text-4xl`, nama brand **tebal** (`<strong>`), warna `impost-fifth`
  - Kanan: paragraf pendukung (`text-base`/`lg:text-lg`, `impost-fifth/70`) + tautan **"Pelajari Lebih Lanjut →"** menuju `route('about')` (bold, panah `impost-secondary`, hover geser kanan)
- Teks:
  > **Pernyataan:** **Impost Media** adalah All-in-One Integrated Digital Marketing Agency sekaligus perusahaan multiservice yang membantu bisnis Indonesia bertumbuh dengan arah yang jelas, sistem yang kuat, dan dampak yang berkelanjutan.
  > **Paragraf:** Berpusat di Banjarbaru, Kalimantan Selatan, kami mendampingi bisnis untuk merapikan makna, membangun identitas merek yang kuat, dan meningkatkan visibilitas secara natural.
- Implementasi: komponen `Landing/AboutIntro.vue`. Ini satu-satunya `h1` di halaman Beranda.

### 3.4 Visi

- Label: `Visi` (`impost-third`, italic, bold kecil) di kolom kiri
- **Headline** `text-display`, rata kiri (tanpa indent) sejajar dengan paragraf pendukung, dengan **satu frasa highlight** `impost-primary`
- **Paragraf pendukung** di bawah headline (`text-base`/`text-lg`, `impost-fifth`, lebar maks ±1100px)
- Teks (final):
  > **Headline:** Menjadi **<primary>Mitra Multiservice</primary>** Terpercaya
  > **Paragraf:** Menjadi mitra multiservice terpercaya di Indonesia melalui layanan bisnis, event, dan pengadaan yang profesional serta berorientasi pada hasil.
- Implementasi: `<span class="text-impost-primary">` untuk frasa aksen

### 3.5 Misi

- Label: `Misi`
- **Judul seksi** di atas grid: `Tiga Pilar Komitmen Kami` (`text-3xl` bold, `impost-fourth`)
- Grid 3 kolom; setiap kolom **dibungkus kartu** (`bg-impost-primary/10`, padding `p-5`, tanpa radius) berisi **ikon SVG** + paragraf `text-body-sm` warna `impost-fifth`
- Ikon: Heroicons v2 outline, 24×24, `stroke-width: 1.6`, di dalam kotak emas `h-11 w-11` (`bg-impost-primary`, ikon `impost-fifth`). Nomor urut `1/2/3` **tidak lagi dipakai**.
- Tanpa judul per kolom (paragraf sudah deskriptif)
- Implementasi: komponen `Landing/MissionCard.vue` (prop `icon`: `analytics` | `event` | `procurement`, prop `variant`: `light` | `dark`)

| Ikon          | Isi                                                                                                                    |
| ------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `analytics`   | Memberikan layanan digital marketing berbasis data yang membantu brand tumbuh, dikenal luas, dan meningkatkan konversi secara nyata. |
| `event`       | Menyediakan solusi event organizer, hiburan profesional, hingga music performance & production untuk mendukung berbagai kebutuhan klien. |
| `procurement` | Mendukung kebutuhan acara dan instansi melalui layanan pengadaan barang dan jasa, seperti katering, alat tulis kantor, serta perlengkapan pendukung lainnya dengan kualitas yang terjamin dan tepat guna. |

### 3.6 Layanan (revisi: mengikuti referensi Danantara "Lingkup Kerja")

- Label: `Layanan` (`impost-third`, italic, bold kecil) di **kiri-atas section** (bukan kolom kiri)
- Di bawahnya: **pernyataan besar** lebar penuh (`max-w-[1000px]`, `text-2xl` sm:`text-3xl` lg:`text-4xl`, `font-normal`)
- Grid kartu: `sm:grid-cols-2 lg:grid-cols-4`, gap 12px
- Struktur satu kartu (`ServiceTile`):
  1. Judul layanan: `text-lg` lg:`text-xl`, `font-medium` (tidak tebal), `impost-fourth`
  2. Deskripsi singkat: `text-sm`, `impost-fifth/70`
  3. Gambar cover mengisi bagian bawah kartu (`h-52` lg:`h-60`, `object-cover`, `loading="lazy"`); tepi atas gambar melebur ke latar kartu lewat `mask-image: linear-gradient(to bottom, transparent, black 40%)` sehingga tidak ada garis batas kaku
- **State hover** (referensi kartu gelap Danantara): kartu berubah `impost-fifth`, judul putih, deskripsi `white/70`; seluruh kartu lift `y: -4`
- Sumber data: tabel `services` (`service_name`, `slug`, `description`, `cover_path`); `HomeController` mengirim semuanya
- Tanpa cover (nullable): blok warna `impost-primary/20` sebagai placeholder
- Background kartu putih (`bg-white`), sudut membulat besar `rounded-2xl` (16px), tanpa border

```ts
type ServiceCard = {
  title: string;
  description: string;
  image: { src: string; alt: string } | null; // dari cover_path, null = placeholder
};
```
### 3.7 Klien _(menggantikan section Keanggotaan milik desain referensi)_

- Label: `Klien`
- Dua kartu berdampingan, background `bg-impost-primary/10`

**Kartu 1 — CTA** (lebih sempit, ±240px)

- Heading `[Judul CTA]` (`impost-fourth`, bold), mis. "Mulai Proyek Anda"
- Teks: `[Deskripsi singkat 3–5 baris.]`
- Tombol `Hubungi Kami`: background `impost-primary`, teks `impost-fifth`, hover `impost-secondary`, kecil (±40×25px), tanpa radius

**Kartu 2 — Klien** (lebih lebar, ±575px, 2 kolom internal)

- Kiri: heading `[Judul Klien]`, mis. "Dipercaya Oleh", teks `[Deskripsi singkat]`
- Kanan: **grid logo klien** (±3–4 kolom, tata letak tidak rata/masonry sederhana, logo warna asli atau grayscale seragam)
- Jumlah logo: ±14 pada desain referensi; sesuaikan dengan daftar klien yang boleh ditampilkan

### 3.8 Footer

- Background `impost-fifth`, tinggi ±215px, teks putih, link/aksen `impost-primary`
- **Kolom kiri**
  - Logo IMPOST MEDIA (putih atau `impost-primary`) + wordmark `IMPOST MEDIA` (uppercase, letter-spacing lebar, 2 baris: IMPOST / MEDIA)
- **Kolom tengah — Kontak**
  - `[email@domain.com]` (mailto)
  - `instagram.com/[handle]`
- **Kolom kanan — Alamat**
  > `[Alamat kantor IMPOST MEDIA]`
- **Baris bawah (rata kanan)**: `© 2026 IMPOST MEDIA. All Rights Reserved.` warna `impost-third`

---

## 4. Pohon Komponen (Saran)

```
<Page>
├── <Header>
│   ├── <Logo />
│   └── <Nav> (@[handle], Kontak)
├── <Hero> (mode image | video | slides + overlay; <HeroDots /> dan <MuteButton /> opsional)
├── <AboutIntro> (label + pernyataan besar + paragraf + tautan "Pelajari Lebih Lanjut")
├── <SectionRow label="Visi">
│   └── <VisionHeadline />
├── <SectionRow label="Misi">
│   └── <MissionCard /> ×3 (ikon SVG + paragraf, dibungkus kartu)
├── <SectionRow label="Layanan">
│   └── <ServiceGrid> → <ServiceCard /> ×n
├── <SectionRow label="Klien">
│   ├── <CtaCard />
│   └── <ClientCard> + <ClientLogoGrid />
└── <Footer>
```

Komponen reusable: `SectionRow` (label kiri + konten kanan), `ServiceCard`, `CtaCard`, `ClientCard`, `Button`.

### Contoh Props

```ts
type SectionRowProps = { label: string; children: React.ReactNode };
type ServiceCardProps = Service; // lihat tipe Service di bagian 3.6
type CtaCardProps = {
  title: string;
  description: string;
  ctaLabel: string;
  ctaHref: string;
};
type ClientCardProps = {
  title: string;
  description?: string;
  logos: { src: string; alt: string }[];
};
```

---

## 5. Daftar Aset untuk Diekspor

| Aset                                | Format             | Catatan                                                                                                         |
| ----------------------------------- | ------------------ | --------------------------------------------------------------------------------------------------------------- |
| Logo IMPOST MEDIA (header)          | SVG                | Varian `impost-primary`                                                                                         |
| Logo IMPOST MEDIA (footer)          | SVG                | Varian putih + wordmark                                                                                         |
| Gambar hero                         | WebP/AVIF          | Versi desktop (±2400×1000px) dan mobile (±800×900px); jumlah gambar mengikuti keputusan satu gambar atau slider |
| Video hero (opsional)               | MP4 H.264 + WebM   | ±1920×800px, 10–20 detik, di bawah ±5–8MB; buang audio jika tidak dipakai                                       |
| Poster video (wajib bila ada video) | WebP/AVIF          | Frame pertama atau gambar hero; juga dipakai sebagai fallback mobile dan reduced-motion                         |
| Ikon mute / unmute (opsional)       | SVG                | Hanya jika video memiliki audio                                                                                 |
| Ikon layanan (opsional)             | SVG                | Satu per layanan, ±32px, `currentColor` agar warna mengikuti token                                              |
| Logo klien                          | SVG/PNG transparan | Pastikan izin penggunaan logo dari klien                                                                        |

---

## 6. Perilaku & Interaksi

- **Hero**: mode image statis; mode slides auto-slide ±5 detik dengan fade, dots bisa diklik, jeda saat hover; mode video autoplay muted loop, tombol mute membuka suara hanya setelah klik pengguna, dan video jeda saat tab tidak aktif atau hero keluar dari viewport
- **Nav**: header `fixed` di atas (`z-50`, tinggi 86px, border bawah tipis); `main` diberi `pt-[86px]` supaya Hero tidak tertutup; link Instagram membuka tab baru, `Kontak` scroll halus ke footer (`#kontak` memakai `scroll-mt-[96px]` agar tidak berakhir di belakang header)
- **Kartu layanan**: hover background berubah ke `impost-fourth` dengan teks putih dan judul `impost-primary`, atau garis aksen `impost-primary` di bawah judul
- **Tombol (Hubungi Kami / Selengkapnya)**: hover `impost-secondary`; tautkan ke halaman, form, atau WhatsApp

### 6.1 Animasi (motion-v)

Library: **`motion-v`** v2 (port Framer Motion untuk Vue 3). Dipakai di halaman publik **Beranda** dan **Tentang** saja.

- **Komponen**: `Components/Motion/Reveal.vue` (muncul saat masuk viewport), `StaggerGroup.vue` (container berurutan), `StaggerItem.vue` (anak)
- **Preset bersama** di `resources/js/motion/presets.js`: `fadeUp`, `fadeIn`, `fadeDown`, `scaleIn`, `staggerContainer()`, `VIEWPORT`
- **Pemicu**: `useInView` + `:animate="inView ? 'visible' : 'hidden'"`. Jangan pakai `while-in-view` pada container karena variant tidak merambat ke anak (terbukti lewat pengujian: anak tertinggal di `opacity: 0`)
- **Viewport**: `{ once: true, amount: "some", margin: "0px 0px -80px 0px" }`, yaitu sekali jalan, dan section yang lebih tinggi dari viewport tetap ter-trigger
- **Pola `variants` tanpa `initial`**: kartu (`ServiceTile`, `MissionCard`, `CtaCard`, `ClientCard`) hanya memasang `:variants`, sehingga urutannya dikendalikan `StaggerGroup` induk dan tetap tampil normal bila dipakai di luar grup
- **Aksesibilitas**: `MotionConfig :reducedMotion="'user'"` di `resources/js/app.js`; saat OS meminta reduce-motion, animasi transform entrance dinonaktifkan otomatis dan hanya opacity yang tersisa (diverifikasi: 0 elemen tersangkut di opacity 0). Gesture `whileHover` tidak tercakup config tersebut, jadi dinonaktifkan manual lewat `useReducedMotion()` di `presets.js`
- **Hover**: `ServiceTile` lift `y: -4` saat kursor di atas kartu; sisa hover (perubahan warna) tetap CSS
- **Entrance media**: `Hero` mode image dan poster video memakai `fadeIn` saat load; mode slides sengaja tidak, karena opacity antar-slide sudah dikontrol CSS
- **Nilai**: `duration` 0.45–0.6s, `ease` `[0.22, 1, 0.36, 1]`, `stagger` 0.06–0.12s
- **Catatan bundle**: chunk `StaggerGroup` ±129 kB (gzip ±42 kB) memuat runtime motion; hanya dimuat halaman yang memakainya

---

## 7. Catatan Responsif (Usulan)

| Breakpoint | Perubahan                                                                                                          |
| ---------- | ------------------------------------------------------------------------------------------------------------------ |
| ≥1024px    | Layout seperti desain (label kiri + konten kanan), layanan 3 kolom                                                 |
| 768–1023px | Misi menjadi 2 kolom, layanan 2 kolom, kartu CTA dan klien menumpuk                                                |
| <768px     | Label section naik di atas konten, misi dan layanan 1 kolom, display text turun ke ±32px, footer menumpuk vertikal |

---

## 8. Implementasi Tailwind v4 (Contoh)

```css
@import "tailwindcss";

@theme {
  --color-impost-primary: #d4ac3c;
  --color-impost-secondary: #d09738;
  --color-impost-third: #95774f;
  --color-impost-fourth: #503924;
  --color-impost-fifth: #040404;
  --font-sans: "NamaFontBrand", ui-sans-serif, system-ui, sans-serif;
  --text-display: 3.25rem;
  --text-intro: 1.75rem;
}
```

```html
<!-- Section Layanan -->
<section class="grid grid-cols-[64px_1fr] gap-x-8 px-10 py-16">
  <h2 class="text-[11px] font-bold italic text-impost-third">Layanan</h2>
  <div class="grid gap-3 md:grid-cols-2 lg:grid-cols-3">
    <article
      class="group bg-impost-primary/10 p-4 transition-colors hover:bg-impost-fourth"
    >
      <h3
        class="text-3xl font-bold text-impost-fourth group-hover:text-impost-primary"
      >
        Judul Layanan
      </h3>
      <p
        class="mt-3 text-xs leading-snug text-impost-fifth group-hover:text-white"
      >
        Deskripsi singkat layanan.
      </p>
      <a
        href="#"
        class="mt-4 inline-block bg-impost-primary px-3 py-1.5 text-xs font-bold text-impost-fifth hover:bg-impost-secondary"
      >
        Selengkapnya
      </a>
    </article>
  </div>
</section>

<!-- Headline Visi (draf) -->
<p class="text-display leading-[1.15] text-impost-fifth">
  Menjadi
  <span class="text-impost-primary">mitra digital</span> terpercaya yang
  membantu brand tumbuh dengan strategi kreatif dan
  <span class="text-impost-primary">hasil yang terukur</span>
</p>
```

---

## 9. Hal yang Perlu Dikonfirmasi

- [ ] Font brand IMPOST MEDIA dan weight tepatnya
- [ ] Logo final (varian emas untuk header, putih untuk footer) dalam SVG
- [ ] Handle Instagram, email, dan alamat kantor untuk header/footer
- [ ] Teks final section Tentang Kami (saat ini diambil dari impostmedia.com/about — perlu verifikasi/disetujui brand)
- [x] Halaman `/about` dibuat (route `about`, `AboutController`, `Pages/About.vue`) dengan konten lengkap dari impostmedia.com/about; nav `/about` di header & footer kini aktif
- [ ] Daftar layanan final (judul, deskripsi, ikon, tautan) dan jumlahnya, untuk menentukan 2, 3, atau 4 kolom
- [ ] Section Klien (CTA + logo klien): sesuai keinginan, atau diganti section lain (mis. Portofolio, Tim, Testimoni)
- [ ] Hero: mode awal yang dipakai (image, video, atau slides), apakah video memiliki audio (menentukan perlu tidaknya tombol mute), dan apakah ada teks/CTA di atas media
- [ ] Warna background kartu: setuju memakai `impost-primary` 10%, atau ingin netral lain
- [ ] Apakah header sticky saat scroll
