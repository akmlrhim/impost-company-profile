# Sitemap & Arsitektur Informasi — Impost Media

| | |
|---|---|
| Versi | 1.0 |
| Tanggal | 2026-10-14 |

---

## 1. Struktur Halaman

```
/                       → Beranda
/services               → Daftar layanan
/services/{slug}        → Detail layanan            (Model: Service)
/portfolio              → Daftar karya
/portfolio/{slug}       → Detail karya              (Model: Portfolio)
/study-cases            → Daftar study case
/study-cases/{slug}     → Detail study case         (Model: StudyCase)
/articles               → Daftar artikel (+filter kategori, paginasi)
/articles/{slug}        → Detail artikel            (Model: Article)
/about                  → Tentang kami + grid tim   (Model: Team)
/careers                → Daftar lowongan
/careers/{slug}         → Detail lowongan           (Model: JobPosting)
/contact                → Form leads + info kontak  (Model: Leads)
/admin                  → Admin (di luar scope dokumen ini)
```

## 2. Routing

Route publik di `routes/web.php`, dilindungi prefix bebas tapi konsisten. Contoh bentuk akhir:

```php
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// Pola sama untuk portfolio, study-cases, articles, careers.
```

Catatan:

- Semua route `show` pakai route key binding `slug` (semua model sudah `getRouteKeyName() = 'slug'`).
- Nama route wajib — semua link pakai `route()`, bukan URL hardcode.
- `LeadsController@store` via POST `/contact`, pakai Form Request + rate limiting.
- Route `/admin` dipindahkan ke bawah prefix/group sendiri, `/` tidak lagi redirect ke `/admin`.

## 3. Pemetaan Model → Halaman/Section

| Model | Dipakai di | Catatan query |
|---|---|---|
| `Service` | `/services`, homepage | Urut `sort`, eager tidak perlu (belum ada relasi) |
| `Portfolio` | `/portfolio`, homepage | `category` harus eager load, filter via `category_id` |
| `PortfolioCategory` | Filter portfolio | — |
| `StudyCase` | `/study-cases`, homepage | — |
| `Article` | `/articles`, homepage | Eager `category`, paginasi, `latest()` |
| `ArticleCategory` | Filter artikel | — |
| `Team` | `/about`, homepage | Grid foto + nama + jabatan |
| `Client` | Homepage band logo | Semua aktif, grayscale |
| `Testimonial` | Homepage | Carousel |
| `Leads` | `/contact` store | Tulis-saja untuk publik |
| `JobPosting` | `/careers` | Hanya lowongan aktif |
| `Comment` | — | Ditunda, lihat PRD 4.2 |

## 4. Struktur View Blade

```
resources/views/
├── components/           → komponen dari DESIGN.md §4
│   ├── hero-slider.blade.php
│   ├── service-card.blade.php
│   ├── portfolio-grid.blade.php
│   ├── portfolio-card.blade.php
│   ├── study-card.blade.php
│   ├── article-card.blade.php
│   ├── team-card.blade.php
│   ├── client-logo-grid.blade.php
│   ├── testimonial-slider.blade.php
│   ├── cta-band.blade.php
│   ├── lead-form.blade.php
│   ├── site-header.blade.php
│   └── site-footer.blade.php
├── layouts/
│   └── site.blade.php     → layout publik (header, footer, @vite)
├── home.blade.php
├── services/
│   ├── index.blade.php
│   └── show.blade.php
├── portfolio/
│   ├── index.blade.php
│   └── show.blade.php
├── study-cases/
│   ├── index.blade.php
│   └── show.blade.php
├── articles/
│   ├── index.blade.php
│   └── show.blade.php
├── about.blade.php
├── careers/
│   ├── index.blade.php
│   └── show.blade.php
└── contact.blade.php
```

## 5. Navigasi Header

```
[Logo Impost]   Services | Portfolio | Study Cases | Artikel | Tentang | Karier   [WA] [Hubungi Kami]
```

- Mobile: hamburger (Alpine.js) → drawer dari kanan/kiri.
- CTA "Hubungi Kami" selalu tampil di semua breakpoint.

## 6. Footer

Pola footer ADGI:

- Kolom 1: logo + tagline.
- Kolom 2: navigasi utama.
- Kolom 3: kontak — email, WhatsApp, alamat.
- Kolom 4: sosial media.
- Baris bawah: copyright + tautan legal bila ada.

## 7. URL & SEO

- Slug unik, lowercase, hyphen.
- Setiap halaman punya meta title + description (helper atau package SEO bila disetujui).
- `/sitemap.xml` mencakup semua index + detail.
- 404 pakai view error kustom (sudah ada `resources/views/errors/404.blade.php`).
