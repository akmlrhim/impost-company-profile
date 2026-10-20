<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

/**
 * Seeder khusus uji coba tampilan section Layanan di Beranda.
 *
 * Menghapus seluruh data layanan (termasuk data lorem) lalu mengisi 4 layanan
 * contoh dengan gambar sementara dari Unsplash (URL langsung, tanpa upload
 * lokal). Saat cover ada, blok placeholder `impost-primary/20` di kartu
 * otomatis tidak dirender.
 *
 * Jalankan: php artisan db:seed --class=ServiceDemoSeeder
 *
 * Gambar hanya untuk pengujian tampilan; ganti dengan aset resmi sebelum
 * produksi (upload via admin atau isi `cover_path` dengan URL final).
 */
class ServiceDemoSeeder extends Seeder
{
    /**
     * Daftar layanan contoh untuk uji tampilan.
     *
     * @return array<int, array<string, int|string|null>>
     */
    private function data(): array
    {
        return [
            [
                'service_name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Strategi pemasaran digital berbasis data: SEO, iklan berbayar, dan pengelolaan media sosial untuk meningkatkan visibilitas serta konversi brand Anda.',
                'category' => 'digital-marketing',
                'cover_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1200&auto=format&fit=crop',
                'sort' => 1,
            ],
            [
                'service_name' => 'Event Organizer',
                'slug' => 'event-organizer',
                'description' => 'Perencanaan dan eksekusi event korporat, product launching, hingga gathering perusahaan yang tertata, tepat waktu, dan berkesan.',
                'category' => 'event',
                'cover_path' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1200&auto=format&fit=crop',
                'sort' => 2,
            ],
            [
                'service_name' => 'Music & Entertainment Production',
                'slug' => 'music-entertainment-production',
                'description' => 'Produksi panggung, music performance, dan hiburan profesional dengan dukungan sound system, lighting, serta teknisi berpengalaman.',
                'category' => 'music',
                'cover_path' => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?q=80&w=1200&auto=format&fit=crop',
                'sort' => 3,
            ],
            [
                'service_name' => 'Pengadaan Barang & Jasa',
                'slug' => 'pengadaan-barang-jasa',
                'description' => 'Pengadaan katering, alat tulis kantor, hingga perlengkapan pendukung acara dan instansi dengan kualitas terjamin dan tepat guna.',
                'category' => 'procurement',
                'cover_path' => 'https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1200&auto=format&fit=crop',
                'sort' => 4,
            ],
        ];
    }

    public function run(): void
    {
        Service::query()->delete();

        foreach ($this->data() as $service) {
            Service::create($service);
        }
    }
}
