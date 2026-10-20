<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobVacancySeeder extends Seeder
{
    public function run(): void
    {
        // Cascade delete via FK constraint (job_vacancy_details.job_id onDelete cascade)
        JobVacancy::query()->delete();

        // All values match the admin form exactly:
        //   employment_type → 'Full-time' | 'Part-time' | 'Internship' | 'Contract'
        //   work_arrangements → 'Onsite' | 'WFA' | 'Remote'
        //   status → 'Active' | 'Draft'
        //   detail section → 'Deskripsi Pekerjaan' | 'Tanggung Jawab' | 'Kualifikasi' | 'Benefit'

        $jobs = [
            [
                'title' => 'Social Media Manager',
                'employment_type' => 'Full-time',
                'work_arrangements' => ['Onsite', 'WFA'],
                'duration' => null,
                'apply_email' => 'career@impostmedia.id',
                'apply_subject' => 'Lamaran - Social Media Manager',
                'status' => 'Active',
                'details' => [
                    ['section' => 'Deskripsi Pekerjaan', 'sort_order' => 1, 'content' => '<p>Kami mencari Social Media Manager berpengalaman yang siap membangun dan mengelola identitas digital klien-klien terbaik kami. Anda akan bertanggung jawab atas strategi konten, pertumbuhan akun, dan pelaporan performa secara menyeluruh.</p>'],
                    ['section' => 'Tanggung Jawab',      'sort_order' => 2, 'content' => '<ul><li>Membuat dan mengeksekusi strategi konten bulanan untuk berbagai platform (Instagram, TikTok, Facebook, LinkedIn)</li><li>Mengelola jadwal posting dan memastikan konsistensi branding klien</li><li>Berkolaborasi dengan tim kreatif untuk produksi konten foto dan video</li><li>Memantau tren dan algoritma platform secara aktif</li><li>Menyusun laporan performa akun mingguan dan bulanan</li></ul>'],
                    ['section' => 'Kualifikasi',         'sort_order' => 3, 'content' => '<ul><li>Pengalaman minimal 2 tahun sebagai Social Media Manager</li><li>Memiliki portofolio akun yang sudah dikelola (minimal 3 akun aktif)</li><li>Mahir menggunakan Meta Business Suite dan TikTok Ads Manager</li><li>Mampu membaca dan menganalisis data analytics platform</li><li>Kemampuan copywriting yang kuat dalam Bahasa Indonesia</li></ul>'],
                    ['section' => 'Benefit',             'sort_order' => 4, 'content' => '<ul><li>Gaji kompetitif sesuai pengalaman</li><li>Fleksibilitas kerja hybrid (WFO & WFA)</li><li>Akses ke tools premium (Canva Pro, Meta Business, dll.)</li><li>Peluang growth karir yang jelas</li></ul>'],
                ],
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'employment_type' => 'Full-time',
                'work_arrangements' => ['Onsite'],
                'duration' => null,
                'apply_email' => 'career@impostmedia.id',
                'apply_subject' => 'Lamaran - Digital Marketing Specialist',
                'status' => 'Active',
                'details' => [
                    ['section' => 'Deskripsi Pekerjaan', 'sort_order' => 1, 'content' => '<p>Bergabunglah sebagai Digital Marketing Specialist dan jadilah tulang punggung kampanye iklan berbayar kami. Anda akan mengelola Google Ads, Meta Ads, dan TikTok Ads untuk berbagai klien dari industri yang beragam.</p>'],
                    ['section' => 'Tanggung Jawab',      'sort_order' => 2, 'content' => '<ul><li>Merencanakan, menjalankan, dan mengoptimasi kampanye iklan berbayar (Google, Meta, TikTok)</li><li>Melakukan riset audiens, kata kunci, dan kompetitor</li><li>Membuat laporan performa campaign beserta rekomendasi optimasi</li><li>A/B testing materi iklan dan landing page</li></ul>'],
                    ['section' => 'Kualifikasi',         'sort_order' => 3, 'content' => '<ul><li>Pengalaman minimal 1–2 tahun mengelola paid ads (Google Ads & Meta Ads)</li><li>Memiliki sertifikasi Google Ads atau Meta Blueprint (nilai plus)</li><li>Familiar dengan Google Analytics 4, Meta Pixel, Looker Studio</li><li>Kemampuan analitis yang kuat dan teliti terhadap data</li></ul>'],
                    ['section' => 'Benefit',             'sort_order' => 4, 'content' => '<ul><li>Gaji pokok + bonus performa</li><li>Fasilitas kerja lengkap di kantor Banjarbaru</li><li>Training dan sertifikasi ditanggung perusahaan</li></ul>'],
                ],
            ],
            [
                'title' => 'Content Creator (Video & Foto)',
                'employment_type' => 'Full-time',
                'work_arrangements' => ['Onsite', 'WFA'],
                'duration' => null,
                'apply_email' => 'career@impostmedia.id',
                'apply_subject' => 'Lamaran - Content Creator',
                'status' => 'Active',
                'details' => [
                    ['section' => 'Deskripsi Pekerjaan', 'sort_order' => 1, 'content' => '<p>Kami membutuhkan Content Creator kreatif yang mampu memproduksi konten video dan foto berkualitas tinggi untuk platform TikTok, Instagram Reels, dan YouTube Shorts.</p>'],
                    ['section' => 'Tanggung Jawab',      'sort_order' => 2, 'content' => '<ul><li>Memproduksi konten video pendek untuk platform TikTok, Instagram Reels, dan YouTube Shorts</li><li>Melakukan sesi foto produk dan dokumentasi brand</li><li>Editing video menggunakan CapCut, Premiere Pro, atau DaVinci Resolve</li><li>Mengikuti tren konten dan mengusulkan ide-ide segar</li></ul>'],
                    ['section' => 'Kualifikasi',         'sort_order' => 3, 'content' => '<ul><li>Portofolio konten video/foto yang kuat (wajib dilampirkan)</li><li>Menguasai minimal satu software editing video</li><li>Memiliki insting estetika visual yang baik</li><li>Mampu bekerja dalam deadline yang ketat</li></ul>'],
                    ['section' => 'Benefit',             'sort_order' => 4, 'content' => '<ul><li>Gaji kompetitif + insentif konten viral</li><li>Akses peralatan foto/video kantor</li><li>Atmosfer kerja kreatif dan dinamis</li></ul>'],
                ],
            ],
            [
                'title' => 'Graphic Designer',
                'employment_type' => 'Full-time',
                'work_arrangements' => ['Onsite', 'WFA'],
                'duration' => null,
                'apply_email' => 'career@impostmedia.id',
                'apply_subject' => 'Lamaran - Graphic Designer',
                'status' => 'Active',
                'details' => [
                    ['section' => 'Deskripsi Pekerjaan', 'sort_order' => 1, 'content' => '<p>Sebagai Graphic Designer di Impost Media, Anda akan menghidupkan identitas visual klien kami — mulai dari desain feed Instagram, materi iklan digital, hingga aset branding yang konsisten dan profesional.</p>'],
                    ['section' => 'Tanggung Jawab',      'sort_order' => 2, 'content' => '<ul><li>Membuat desain konten media sosial (feed, story, banner iklan)</li><li>Mengembangkan identitas visual dan branding guidelines klien</li><li>Mendesain materi marketing: brosur, poster, presentasi</li><li>Menjaga konsistensi visual sesuai brand guide masing-masing klien</li></ul>'],
                    ['section' => 'Kualifikasi',         'sort_order' => 3, 'content' => '<ul><li>Pengalaman minimal 1 tahun sebagai Graphic Designer</li><li>Menguasai Adobe Illustrator, Photoshop, dan/atau Figma</li><li>Memiliki portofolio desain yang beragam (wajib dilampirkan)</li><li>Paham prinsip tipografi, warna, dan komposisi visual</li></ul>'],
                    ['section' => 'Benefit',             'sort_order' => 4, 'content' => '<ul><li>Gaji sesuai pengalaman dan portofolio</li><li>Langganan Adobe Creative Cloud ditanggung</li><li>Jam kerja fleksibel dengan sistem hybrid</li></ul>'],
                ],
            ],
            [
                'title' => 'SEO & Website Specialist',
                'employment_type' => 'Contract',
                'work_arrangements' => ['Remote'],
                'duration' => '6 Bulan',
                'apply_email' => 'career@impostmedia.id',
                'apply_subject' => 'Lamaran - SEO & Website Specialist',
                'status' => 'Active',
                'details' => [
                    ['section' => 'Deskripsi Pekerjaan', 'sort_order' => 1, 'content' => '<p>Kami membuka posisi kontrak untuk SEO & Website Specialist yang akan membantu klien kami mendominasi hasil pencarian organik. Bekerja secara remote dengan target peningkatan traffic organik yang terukur.</p>'],
                    ['section' => 'Tanggung Jawab',      'sort_order' => 2, 'content' => '<ul><li>Melakukan audit SEO on-page dan off-page</li><li>Riset kata kunci dan analisis kompetitor</li><li>Optimasi konten website sesuai best practice SEO terbaru</li><li>Monitoring dan pelaporan peringkat keyword bulanan</li></ul>'],
                    ['section' => 'Kualifikasi',         'sort_order' => 3, 'content' => '<ul><li>Pengalaman minimal 2 tahun di bidang SEO</li><li>Familiar dengan Ahrefs, SEMrush, Google Search Console, dan GA4</li><li>Track record peningkatan traffic organik yang bisa diverifikasi</li></ul>'],
                    ['section' => 'Benefit',             'sort_order' => 4, 'content' => '<ul><li>Rate kontrak kompetitif</li><li>100% remote, kerja dari mana saja</li><li>Peluang perpanjangan kontrak atau konversi ke full-time</li></ul>'],
                ],
            ],
            [
                'title' => 'Web Developer (Laravel)',
                'employment_type' => 'Full-time',
                'work_arrangements' => ['Onsite', 'WFA'],
                'duration' => null,
                'apply_email' => 'career@impostmedia.id',
                'apply_subject' => 'Lamaran - Web Developer Laravel',
                'status' => 'Active',
                'details' => [
                    ['section' => 'Deskripsi Pekerjaan', 'sort_order' => 1, 'content' => '<p>Bergabunglah dengan tim development kami dan bantu membangun website dan aplikasi web berkualitas tinggi untuk klien dari berbagai industri.</p>'],
                    ['section' => 'Tanggung Jawab',      'sort_order' => 2, 'content' => '<ul><li>Membangun dan memelihara website klien menggunakan Laravel</li><li>Mengintegrasikan API pihak ketiga (payment gateway, CRM, marketing tools)</li><li>Optimasi performa dan keamanan aplikasi web</li><li>Mendokumentasikan kode dan proses teknis</li></ul>'],
                    ['section' => 'Kualifikasi',         'sort_order' => 3, 'content' => '<ul><li>Pengalaman minimal 1–2 tahun dengan Laravel/PHP</li><li>Memahami HTML, CSS, JavaScript, dan Tailwind CSS</li><li>Familiar dengan MySQL/PostgreSQL dan Eloquent ORM</li><li>Pengalaman dengan Git dan workflow kolaborasi tim</li></ul>'],
                    ['section' => 'Benefit',             'sort_order' => 4, 'content' => '<ul><li>Gaji kompetitif sesuai level pengalaman</li><li>Mentoring dari senior developer</li><li>Fleksibilitas WFA setelah masa probation</li></ul>'],
                ],
            ],
        ];

        foreach ($jobs as $jobData) {
            $details = $jobData['details'];
            unset($jobData['details']);

            $jobData['slug'] = Str::slug($jobData['title']).'-'.Str::random(5);

            $job = JobVacancy::create($jobData);

            foreach ($details as $detail) {
                $job->details()->create($detail);
            }
        }
    }
}
