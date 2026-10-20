# Sitemap & Arsitektur Informasi — Impost Media

|         |            |
| ------- | ---------- |
| Versi   | 1.0        |
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

Route publik tetap didefinisikan di `routes/web.php` (Laravel tetap sumber kebenaran URL), tapi controller me-render halaman Vue via `Inertia::render()`. Contoh bentuk akhir:

```php
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

// Pola sama untuk portfolio, study-cases, articles, careers.
```

Contoh controller:

```php
public function index()
{
    return Inertia::render('Services/Index', [
        'services' => Service::query()->orderBy('sort')->get(),
    ]);
}
```

Catatan:

- Semua route `show` pakai route key binding `slug` (semua model sudah `getRouteKeyName() = 'slug'`).
- Nama route wajib — semua link di komponen Vue pakai `route()` dari Ziggy, bukan URL hardcode.
- `LeadsController@store` via POST `/contact`, pakai Form Request + rate limiting; submit dari Vue via `useForm`/`router.post` Inertia.
- Middleware `HandleInertiaRequests` terdaftar di `bootstrap/app.php` untuk group `web`.
- Route `/admin` dipindahkan ke bawah prefix/group sendiri, `/` tidak lagi redirect ke `/admin`.
- Halaman halaman = page Vue dengan nama path: `Services/Index` → `resources/js/Pages/Services/Index.vue`.

## 3. Pemetaan Model → Halaman/Section

| Model               | Dipakai di               | Catatan query                                         |
| ------------------- | ------------------------ | ----------------------------------------------------- |
| `Service`           | `/services`, homepage    | Urut `sort`, eager tidak perlu (belum ada relasi)     |
| `Portfolio`         | `/portfolio`, homepage   | `category` harus eager load, filter via `category_id` |
| `PortfolioCategory` | Filter portfolio         | —                                                     |
| `StudyCase`         | `/study-cases`, homepage | —                                                     |
| `Article`           | `/articles`, homepage    | Eager `category`, paginasi, `latest()`                |
| `ArticleCategory`   | Filter artikel           | —                                                     |
| `Team`              | `/about`, homepage       | Grid foto + nama + jabatan                            |
| `Client`            | Homepage band logo       | Semua aktif, grayscale                                |
| `Testimonial`       | Homepage                 | Carousel                                              |
| `Leads`             | `/contact` store         | Tulis-saja untuk publik                               |
| `JobPosting`        | `/careers`               | Hanya lowongan aktif                                  |
| `Comment`           | —                        | Ditunda, lihat PRD 4.2                                |

## 4. Struktur Frontend (Inertia + Vue 3)

```
resources/
├── js/
│   ├── app.js                    → createInertiaApp + Ziggy
│   ├── Components/               → komponen dari DESIGN.md §4
│   │   ├── HeroSlider.vue
│   │   ├── ServiceCard.vue
│   │   ├── PortfolioGrid.vue
│   │   ├── PortfolioCard.vue
│   │   ├── StudyCard.vue
│   │   ├── ArticleCard.vue
│   │   ├── TeamCard.vue
│   │   ├── ClientLogoGrid.vue
│   │   ├── TestimonialSlider.vue
│   │   ├── CtaBand.vue
│   │   ├── LeadForm.vue
│   │   ├── SiteHeader.vue
│   │   └── SiteFooter.vue
│   ├── Layouts/
│   │   └── SiteLayout.vue        → layout publik (header, footer, <slot/>)
│   └── Pages/
│       ├── Home.vue
│       ├── Services/
│       │   ├── Index.vue
│       │   └── Show.vue
│       ├── Portfolio/
│       │   ├── Index.vue
│       │   └── Show.vue
│       ├── StudyCases/
│       │   ├── Index.vue
│       │   └── Show.vue
│       ├── Articles/
│       │   ├── Index.vue
│       │   └── Show.vue
│       ├── About.vue
│       ├── Careers/
│       │   ├── Index.vue
│       │   └── Show.vue
│       └── Contact.vue
├── css/
│   └── app.css                   → Tailwind 4 (@import "tailwindcss" + @theme tokens)
└── views/
    └── app.blade.php              → satu-satunya Blade: shell HTML + @vite + @inertia
```

Konvensi page Vue:

- `<script setup>` Composition API.
- Data dari server via `defineProps`; link via `route()` (Ziggy); meta via `<Head>` dari `@inertiajs/vue3`.
- Nama page = path controller `Inertia::render('Services/Index')` → `Pages/Services/Index.vue`.
- Error views (404 dll.) tetap Blade `resources/views/errors/` — halaman error Laravel tidak lewat Inertia.

## 5. Navigasi Header

```
[Logo Impost]   Services | Portfolio | Study Cases | Artikel | Tentang | Karier   [WA] [Hubungi Kami]
```

- Mobile: hamburger (state reaktif Vue) → drawer dari kanan/kiri.
- CTA "Hubungi Kami" selalu tampil di semua breakpoint.
- Navigasi pakai `<Link>` dari `@inertiajs/vue3` dengan `href` dari `route()` Ziggy — SPA navigation tanpa reload.

## 6. Footer

Pola footer ADGI:

- Kolom 1: logo + tagline.
- Kolom 2: navigasi utama.
- Kolom 3: kontak — email, WhatsApp, alamat.
- Kolom 4: sosial media.
- Baris bawah: copyright + tautan legal bila ada.

## 7. URL & SEO

- Slug unik, lowercase, hyphen.
- Setiap halaman set meta title + description via komponen `<Head>` Inertia (helper `useSEO` bila perlu).
- `/sitemap.xml` mencakup semua index + detail (tetap dibangun di sisi Laravel).
- 404 pakai view error kustom (sudah ada `resources/views/errors/404.blade.php`).
