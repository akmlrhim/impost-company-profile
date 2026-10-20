<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Hapus data contoh lama, lalu isi artikel berita yang siap tampil
     * di halaman Beranda dengan gambar dari Unsplash (URL absolut).
     */
    public function run(): void
    {
        Comment::query()->delete();
        Article::query()->delete();
        ArticleCategory::query()->delete();

        $categories = collect([
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing'],
            ['name' => 'Event & Entertainment', 'slug' => 'event-entertainment'],
            ['name' => 'Pengadaan', 'slug' => 'pengadaan'],
            ['name' => 'Branding', 'slug' => 'branding'],
        ])->mapWithKeys(fn (array $item): array => [
            $item['slug'] => ArticleCategory::create($item)->id,
        ]);

        $articles = [
            [
                'title' => 'Tren Digital Marketing 2026: Strategi yang Wajib Dikuasai Brand Lokal',
                'slug' => 'tren-digital-marketing-2026-strategi-brand-lokal',
                'category' => 'digital-marketing',
                'author' => 'Tasdik Permadi',
                'cover' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Dari pencarian berbasis AI sampai komunitas mikro, lanskap pemasaran digital bergerak cepat. Brand lokal yang berani merapikan strateginya sejak awal tahun akan selangkah lebih maju dari kompetitornya.',
                'content' => "Lanskap pemasaran digital terus bergerak, dan 2026 menjadi tahun ketika banyak tren yang sebelumnya opsional berubah menjadi standar. Pencarian berbasis AI, konten pendek yang otentik, dan komunitas mikro kini menjadi tiga kekuatan utama yang membentuk keputusan konsumen.\n\nBagi brand lokal di Kalimantan Selatan, pergeseran ini justru membuka peluang. Konsumen semakin mencari merek yang terasa dekat, jujur, dan konsisten menyuarakan nilainya. Iklan besar bukan lagi satu-satunya jalan; kombinasi konten edukatif, ulasan pelanggan, dan kehadiran di komunitas yang tepat sering kali memberi hasil yang lebih tahan lama.\n\nLangkah pertama yang perlu dilakukan adalah merapikan fondasi: memastikan profil bisnis akurat, situs cepat diakses, dan pesan brand selaras di semua kanal. Setelah itu, ukur setiap kampanye dengan data. Brand yang berani mengukur akan tahu strategi mana yang benar-benar mendatangkan pelanggan, bukan sekadar angka kesan.",
            ],
            [
                'title' => 'Pentingnya Branding Konsisten untuk UMKM Kalimantan Selatan',
                'slug' => 'pentingnya-branding-konsisten-untuk-umkm-kalsel',
                'category' => 'branding',
                'author' => 'Nadia Rahmawati',
                'cover' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Banyak UMKM punya produk bagus tetapi kalah saing karena tampilannya berubah-ubah di setiap kanal. Konsistensi visual dan pesan adalah investasi termurah untuk terlihat profesional.',
                'content' => "Produk bagus saja tidak cukup. Di rak marketplace yang penuh sesak, pelanggan menilai dalam hitungan detik, dan yang pertama dilihat adalah kesan visual serta kejelasan pesan. UMKM yang tampil konsisten terasa lebih terpercaya meski skala usahanya masih kecil.\n\nKonsistensi dimulai dari hal sederhana: satu logo resmi, palet warna tetap, gaya bahasa yang sama di caption, kemasan, hingga balasan pesan pelanggan. Ketika semua titik temu terasa seragam, pelanggan lebih mudah mengingat dan merekomendasikan merek tersebut.\n\nBranding bukan biaya, melainkan aset. Setiap konten yang konsisten hari ini adalah tabungan pengenalan merek untuk tahun-tahun berikutnya. Mulailah dari panduan sederhana satu halaman, lalu disiplin memakainya di semua kanal.",
            ],
            [
                'title' => 'Event Organizer Profesional: Kunci Acara Korporat yang Berkesan',
                'slug' => 'event-organizer-profesional-kunci-acara-korporat-berkesan',
                'category' => 'event-entertainment',
                'author' => 'Rizky Ananda',
                'cover' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Acara korporat yang sukses tidak lahir dari kebetulan. Run-down yang rapi, koordinasi teknis, dan manajemen risiko adalah tiga hal yang membedakan penyelenggara profesional dari sekadar pelaksana.',
                'content' => "Acara korporat adalah wajah perusahaan di depan klien, mitra, dan karyawan. Karena itu, setiap detail dari panggung, pencahayaan, alur tamu, sampai durasi tiap sesi harus diperlakukan sebagai bagian dari komunikasi merek.\n\nPenyelenggara profesional bekerja dengan run-down yang presisi, tim teknis yang berlatih, serta rencana cadangan untuk hal-hal yang tidak terduga, mulai dari cuaca hingga gangguan peralatan. Ketenangan selama acara berlangsung adalah hasil dari persiapan yang panjang.\n\nBagi perusahaan, bekerja sama dengan event organizer berarti membeli ketenangan. Fokus manajemen bisa tetap pada konten dan relasi, sementara eksekusi teknis ditangani tim yang rutin menangani panggung yang sama setiap minggu.",
            ],
            [
                'title' => 'SEO atau Iklan Berbayar? Begini Cara Memilih yang Tepat',
                'slug' => 'seo-atau-iklan-berbayar-cara-memilih-yang-tepat',
                'category' => 'digital-marketing',
                'author' => 'Bayu Setiawan',
                'cover' => 'https://images.unsplash.com/photo-1560439514-4e9645039924?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Iklan memberi hasil cepat, SEO membangun aset jangka panjang. Jawabannya jarang berupa salah satu; yang benar adalah proporsi yang sesuai dengan tahap pertumbuhan bisnis Anda.',
                'content' => "Pertanyaan ini muncul di hampir setiap meeting pemasaran. Iklan berbayar menjanjikan hasil instan: hari ini tayang, besok ada leads. SEO bekerja lambat, tetapi hasilnya menjadi aset yang terus menghasilkan tanpa biaya klik.\n\nBisnis baru biasanya butuh dorongan awal, sehingga iklan masuk akal untuk menguji pasar dan mengumpulkan data kata kunci. Setelah pola permintaan mulai terbaca, konten SEO mengambil alih untuk kata kunci yang persaingannya realistis dan nilai konversinya tinggi.\n\nKuncinya adalah mengukur biaya per akuisisi dari kedua jalur. Ketika data sudah bicara, keputusan tidak lagi menjadi perdebatan selera, melainkan alokasi anggaran yang jelas.",
            ],
            [
                'title' => 'Musik Performance Live: Menghidupkan Suasana Acara Brand Anda',
                'slug' => 'musik-performance-live-menghidupkan-suasana-acara-brand',
                'category' => 'event-entertainment',
                'author' => 'Salsabila Putri',
                'cover' => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Musik live bukan sekadar hiburan penutup. Pemilihan repertoar dan tata panggung yang tepat bisa mengubah acara biasa menjadi pengalaman yang dibicarakan para tamu berminggu-minggu.',
                'content' => "Hampir semua orang ingat acara dari suasananya, dan musik adalah pembentuk suasana yang paling cepat bekerja. Dalam event brand, penampilan live yang terkurasi membantu mengantar tamu dari sesi formal yang kaku menuju momen bersosialisasi yang hangat.\n\nPemilihan repertoar perlu disesuaikan dengan karakter acara: akustik lembut untuk dinner korporat, energi panggung penuh untuk peluncuran produk. Tata suara dan pencahayaan yang benar membuat perbedaan besar antara hiburan yang menyatu dengan acara dan sekadar musik yang mengeras.\n\nTim production yang berpengalaman memastikan semua unsur itu saling terhubung, dari sound check hingga koordinasi dengan MC, sehingga momen puncak acara terasa alami.",
            ],
            [
                'title' => 'Pengadaan Barang dan Jasa yang Tepat Guna untuk Acara Instansi',
                'slug' => 'pengadaan-barang-dan-jasa-tepat-guna-acara-instansi',
                'category' => 'pengadaan',
                'author' => 'Hendra Gunawan',
                'cover' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Konsumsi, ATK, hingga perlengkapan teknis acara pemerintah menuntut ketepatan dokumen dan mutu. Penyedia yang paham proses pengadaan membuat kegiatan berjalan tanpa drama administratif.',
                'content' => "Kegiatan instansi memiliki standar administrasi yang ketat. Setiap barang yang masuk harus tercatat, spesifikasinya jelas, dan serah terimanya terdokumentasi. Di sinilah penyedia pengadaan yang paham proses membuat perbedaan besar.\n\nKatering untuk rapat pleno, alat tulis kantor untuk kegiatan sosialisasi, sampai perlengkapan teknis panggung semuanya menuntut ketepatan waktu dan kelengkapan dokumen. Keterlambatan kecil pada satu item bisa menggeser jadwal acara secara keseluruhan.\n\nMitra pengadaan yang baik bekerja dengan prinsip tepat guna: mutu sesuai kebutuhan, harga sesuai pagu, dan serah terima tepat waktu. Instansi tinggal fokus pada penyelenggaraan kegiatan, bukan mengejar kelengkapan berkas.",
            ],
            [
                'title' => 'Content Marketing: Cara Brand Kecil Bicara Seperti Brand Besar',
                'slug' => 'content-marketing-cara-brand-kecil-bicara-seperti-brand-besar',
                'category' => 'branding',
                'author' => 'Melati Anggraini',
                'cover' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Brand besar tidak menang karena anggaran saja, tetapi karena ceritanya konsisten. Dengan kerangka konten yang benar, brand kecil bisa tampil sekelas di feed yang sama.',
                'content' => "Brand besar tampil kelas di feed Anda bukan karena kebetulan, melainkan karena kerangka komunikasi yang disiplin. Ada sudut pandang yang konsisten, format yang berulang, dan jadwal yang bisa diandalkan.\n\nBrand kecil bisa meniru disiplin yang sama tanpa anggaran besar. Mulai dari tiga pilar konten: edukasi seputar bidang usaha, cerita di balik layar, dan bukti sosial dari pelanggan. Rotasikan ketiganya agar feed tidak terasa seperti katalog promosi.\n\nKonsistensi satu bulan sudah memberi sinyal kepada algoritma dan audiens bahwa merek Anda serius. Dari sana, evaluasi bulanan berbasis jangkauan dan interaksi akan menunjukkan pilar mana yang paling banyak menumbuhkan audiens.",
            ],
            [
                'title' => 'Dari Brief ke Panggung: Alur Kerja Tim Event Impost Media',
                'slug' => 'dari-brief-ke-panggung-alur-kerja-tim-event-impost-media',
                'category' => 'event-entertainment',
                'author' => 'Fajar Nugraha',
                'cover' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Di balik acara yang berjalan mulus ada proses yang terstruktur: pemetaan kebutuhan, survei lokasi, gladi teknis, hingga evaluasi pasca acara. Ini alur kerja yang kami jalankan di setiap proyek.',
                'content' => "Setiap acara dimulai dari brief sederhana, tetapi yang mengubahnya menjadi panggung yang siap digunakan adalah proses. Tahap pertama adalah memetakan tujuan acara, jumlah tamu, dan hasil yang diharapkan penyelenggara.\n\nSurvei lokasi membantu tim menentukan tata panggung, jalur tamu, dan kebutuhan daya. Setelah itu gladi teknis menjadi momen penting untuk memastikan suara, cahaya, dan run-down berjalan sesuai jadwal tanpa tumpang tindih.\n\nPasca acara, tim melakukan evaluasi terbuka: apa yang berjalan baik, apa yang perlu diperbaiki. Dokumentasi ini menjadi dasar perbaikan untuk acara berikutnya, dan itulah sebabnya acara kedua selalu lebih mulus dari yang pertama.",
            ],
            [
                'title' => 'Mengukur Keberhasilan Kampanye Digital dengan Data, Bukan Perasaan',
                'slug' => 'mengukur-keberhasilan-kampanye-digital-dengan-data',
                'category' => 'digital-marketing',
                'author' => 'Tasdik Permadi',
                'cover' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1600&auto=format&fit=crop',
                'excerpt' => 'Jangkauan tinggi belum tentu berarti kampanye berhasil. Tanpa indikator yang jelas sejak awal, anggaran pemasaran mudah habis untuk angka yang terlihat bagus tetapi tidak menjual.',
                'content' => "Banyak kampanye dihentikan atau diperpanjang hanya karena kesan sesaat: konten terasa seru atau sebaliknya. Padahal keberhasilan kampanye digital adalah pertanyaan teknis yang jawabannya ada di data.\n\nMulailah dengan menetapkan satu indikator utama yang selaras dengan tujuan bisnis, misalnya jumlah prospek masuk atau biaya per akuisisi. Metrik pendukung seperti jangkauan dan interaksi boleh dipantau, tetapi tidak boleh menggantikan indikator utama.\n\nEvaluasi rutin mingguan membuat anggaran bergerak ke kanal yang terbukti membawa hasil. Dalam beberapa siklus, keputusan pemasaran yang tadinya berbasis perasaan berubah menjadi keputusan berbasis bukti.",
            ],
        ];

        $publishedAt = now()->subDays(1);

        foreach ($articles as $index => $item) {
            $article = Article::create([
                'title' => $item['title'],
                'slug' => $item['slug'],
                'content' => $item['content'],
                'cover_path' => $item['cover'],
                'excerpt' => $item['excerpt'],
                'meta_title' => $item['title'],
                'meta_description' => $item['excerpt'],
                'status' => 'published',
                'category_id' => $categories[$item['category']],
                'written_by' => $item['author'],
            ]);

            // Urutkan artikel terbaru dulu di Beranda.
            $article->forceFill(['created_at' => $publishedAt->copy()->subDays($index * 2)])->save();
        }
    }
}
