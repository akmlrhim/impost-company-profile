@extends('layouts.public')

@section('title', 'Syarat & Ketentuan Layanan | Impost Media')
@section('meta_description',
  'Baca syarat dan ketentuan layanan CV. Impost Media Indonesia - mengatur hubungan antara
  Impost Media dan klien untuk seluruh paket dan layanan digital marketing.')

@section('content')
  <section id="tnc-hero" class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/legal.webp') }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-2xl flex flex-col gap-3 sm:gap-4">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Syarat & Ketentuan</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="font-bold text-white leading-tight" style="font-size: clamp(1.5rem, 3.5vw, 2.5rem) !important;">
          Syarat & Ketentuan
        </h1>
        <p class="text-white text-sm md:text-base lg:text-lg leading-relaxed max-w-xl">
          Dokumen resmi yang mengatur hubungan layanan antara <span class="text-white font-medium">CV. Impost Media
            Indonesia</span> dengan klien. Berlaku untuk seluruh paket dan layanan.
        </p>
      </div>

    </div>
  </section>

  <div class="bg-impost-fifth">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">

      {{-- Sections --}}
      <div class="space-y-10 sm:space-y-12">

        <div id="s1">
          <div class="text-sm font-semibold text-white mb-3">1. Definisi &amp; Ruang Lingkup</div>
          <div class="space-y-3 text-sm text-white leading-relaxed">
            <p>Syarat dan Ketentuan ini mengatur hubungan antara <span class="text-white font-medium">CV. Impost Media
                Indonesia</span> ("Impost Media", "kami") dengan pihak klien yang menggunakan layanan digital marketing,
              branding, dan pengembangan digital kami.</p>
            <p>Dengan menandatangani Surat Penawaran, Perjanjian Kerja Sama (PKS), atau melakukan pembayaran pertama (DP),
              klien dianggap telah membaca, memahami, dan menyetujui seluruh isi dokumen ini.</p>
            <p>Impost Media melayani dua segmen utama: <span class="text-white font-medium">UMKM</span> (usaha kecil dan
              bisnis baru merintis) dan <span class="text-white font-medium">Brand / Perusahaan</span> yang memiliki
              struktur bisnis lebih berkembang.</p>
          </div>
        </div>

        <div id="s2">
          <div class="text-sm font-semibold text-white mb-3">2. Paket &amp; Layanan</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Impost Media menyediakan layanan berikut. Detail paket dan harga tercantum dalam Surat
              Penawaran resmi:</p>
            <ul class="space-y-2">
              @php
                $services = [
                    [
                        'Content & Social Media Management',
                        'Pembuatan dan pengelolaan konten, feed design, video/reels, kalender konten, dan laporan bulanan.',
                    ],
                    [
                        'Performance Marketing (Ads)',
                        'Pengelolaan iklan Meta Ads, TikTok Ads, dan Marketplace Ads, mencakup ads testing, campaign monitoring, landing page, dan monthly report.',
                    ],
                    [
                        'Branding & Growth System',
                        'Brand Story, Mini Brand Guideline, Full Brand Guideline, dan Logo Design.',
                    ],
                    [
                        'Marketplace Optimization',
                        'Optimasi toko Shopee, Tokopedia, dan TikTok Shop dari A–Z, mencakup riset pasar, desain banner, listing produk, iklan, dan laporan.',
                    ],
                    [
                        'Live Stream Management',
                        'Pengelolaan live stream dengan host profesional, studio, dan lighting.',
                    ],
                    [
                        'App Development & Website',
                        'Landing page, website company profile, website full sales funnel, hingga custom web/mobile app.',
                    ],
                    [
                        'CRM, Sales Pipeline & CS AI',
                        'Setup sistem CRM terintegrasi, pipeline penjualan, dan layanan customer service berbasis AI maupun tim manusia.',
                    ],
                    ['Add-On', 'Foto produk, foto katalog, dokumentasi event, KOL management, dan mentoring bisnis.'],
                ];
              @endphp
              @foreach ($services as [$name, $desc])
                <li class="flex items-start gap-2.5">
                  <span class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span>
                  <span><span class="text-white font-medium">{{ $name }}</span> - {{ $desc }}</span>
                </li>
              @endforeach
            </ul>
            <p class="mt-3 text-xs text-white italic">Ketentuan paket Custom ditetapkan berdasarkan diskusi dan disepakati
              dalam PKS sebelum pekerjaan dimulai.</p>
          </div>
        </div>

        <div id="s3">
          <div class="text-sm font-semibold text-white mb-3">3. Kontrak &amp; Durasi</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Durasi minimum kontrak berbeda tergantung jenis layanan:</p>
            <ul class="space-y-2 mb-4">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">Social Media Management:</span> minimal 1 (satu) tahun.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">Performance Marketing – Ads dengan Jaminan ROI:</span> minimal 3 (tiga)
                  bulan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">Live Stream Management:</span> mengikuti paket yang dipilih, dapat
                  diperpanjang.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">Layanan one-time</span> (branding, website, foto): tidak terikat
                  kontrak bulanan.</span></li>
            </ul>
            <div class="border-l-2 border-yellow-500/30 pl-4 text-xs text-white">Pembatalan sebelum masa minimum berakhir
              tidak membebaskan klien dari kewajiban pembayaran sisa periode.</div>
          </div>
        </div>

        <div id="s4">
          <div class="text-sm font-semibold text-white mb-3">4. Harga &amp; Pembayaran</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Harga tercantum dalam Surat Penawaran resmi dan dapat berubah sewaktu-waktu. Seluruh harga
              belum termasuk PPN 12%.</p>
            <ul class="space-y-2">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Uang muka (DP) wajib dibayarkan
                  sebelum pekerjaan dimulai, dengan besaran sesuai kesepakatan dalam PKS.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Untuk layanan bulanan, pembayaran
                  dilakukan di awal setiap bulan sebelum periode layanan berjalan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Keterlambatan lebih dari 7 hari
                  kerja dapat mengakibatkan penundaan atau penghentian sementara layanan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Impost Media tidak memberikan
                  pengembalian dana atas pekerjaan yang telah dikerjakan dan/atau disetujui klien.</span></li>
            </ul>
          </div>
        </div>

        <div id="s5">
          <div class="text-sm font-semibold text-white mb-3">5. Biaya Iklan (Ad Budget)</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Semua paket Performance Marketing hanya mencakup biaya layanan pengelolaan. Biaya iklan
              sepenuhnya ditanggung dan dibayarkan langsung oleh klien kepada platform terkait.</p>
            <ul class="space-y-2 mb-3">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Impost Media tidak bertanggung
                  jawab atas perubahan kebijakan atau performa algoritma dari platform iklan pihak ketiga.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Klien wajib menyediakan akses Ads
                  Manager atau Business Manager yang diperlukan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Untuk layanan CS AI, biaya
                  subscription platform AI dibayarkan langsung oleh klien kepada penyedia layanan.</span></li>
            </ul>
            <p class="text-xs text-white italic">Rekomendasi minimum budget iklan akan disampaikan sebelum kampanye
              dimulai.</p>
          </div>
        </div>

        <div id="s6">
          <div class="text-sm font-semibold text-white mb-3">6. Garansi &amp; Jaminan Hasil</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Impost Media memberikan jaminan hasil pada kondisi-kondisi berikut:</p>
            <ul class="space-y-2 mb-4">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">Jaminan ROI Positif:</span> berlaku untuk kontrak minimum 3 bulan,
                  dengan asumsi budget iklan memadai dan klien memenuhi seluruh kewajiban.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">Moneyback Guarantee:</span> berlaku sesuai ketentuan spesifik yang
                  tercantum dalam PKS.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span><span
                    class="text-white font-medium">KPI per Paket:</span> target ditetapkan berdasarkan paket yang dipilih
                  dan disepakati sebelum layanan dimulai.</span></li>
            </ul>
            <div class="italic text-xs text-white">Jaminan tidak berlaku apabila klien
              tidak memenuhi kewajiban, budget di bawah minimum, atau ada perubahan kebijakan platform di luar kendali
              Impost Media.</div>
          </div>
        </div>

        <div id="s7">
          <div class="text-sm font-semibold text-white mb-3">7. Kewajiban Klien</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Kelancaran layanan bergantung pada keterlibatan aktif klien. Klien wajib:</p>
            <ul class="space-y-2">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Menyediakan aset (foto, video,
                  logo, materi brand) sesuai timeline yang disepakati.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Memberikan akses akun media
                  sosial, Ads Manager, marketplace, atau platform lain yang dibutuhkan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Memberikan persetujuan konten
                  atau revisi dalam waktu maksimal 2×24 jam setelah pengajuan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Melakukan pembayaran sesuai
                  jadwal yang ditetapkan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Memastikan semua informasi produk
                  dan materi yang diberikan adalah akurat dan tidak melanggar hukum.</span></li>
            </ul>
          </div>
        </div>

        <div id="s8">
          <div class="text-sm font-semibold text-white mb-3">8. Revisi &amp; Persetujuan Konten</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Jumlah revisi mengikuti ketentuan paket yang dipilih. Revisi di luar batas dikenakan biaya
              tambahan.</p>
            <ul class="space-y-2">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Revisi adalah perubahan pada
                  konten yang sudah sesuai brief awal. Perubahan brief menyeluruh dianggap proyek baru.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Konten yang tidak mendapat
                  respons dalam 2×24 jam dianggap disetujui dan dapat langsung dipublikasikan.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Untuk layanan website dan
                  branding, revisi desain mengikuti ketentuan paket masing-masing.</span></li>
            </ul>
          </div>
        </div>

        <div id="s9">
          <div class="text-sm font-semibold text-white mb-3">9. Hak Kekayaan Intelektual</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Seluruh hasil kerja menjadi hak milik klien setelah seluruh kewajiban pembayaran
              diselesaikan.</p>
            <ul class="space-y-2">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Sebelum pelunasan, Impost Media
                  mempertahankan hak atas seluruh materi yang diproduksi.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Impost Media berhak menggunakan
                  hasil kerja yang telah dipublikasikan sebagai portofolio, kecuali klien menyatakan keberatan tertulis
                  sebelum PKS ditandatangani.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Klien menjamin semua aset yang
                  diserahkan bebas dari klaim hak cipta pihak ketiga.</span></li>
            </ul>
          </div>
        </div>

        <div id="s10">
          <div class="text-sm font-semibold text-white mb-3">10. Kerahasiaan &amp; Data</div>
          <div class="space-y-3 text-sm text-white leading-relaxed">
            <p>Impost Media berkomitmen menjaga kerahasiaan informasi bisnis klien, termasuk data omset, strategi, dan
              materi kampanye. Informasi tersebut tidak akan diungkapkan kepada pihak ketiga tanpa persetujuan tertulis
              klien, kecuali diwajibkan oleh hukum.</p>
            <p>Akses akun (password, token, API key) yang diberikan klien wajib diganti setelah masa kerja sama berakhir.
            </p>
            <p>Data pribadi yang diproses melalui layanan CRM dan CS AI tunduk pada ketentuan UU Perlindungan Data Pribadi
              (UU PDP) Republik Indonesia.</p>
          </div>
        </div>

        <div id="s11">
          <div class="text-sm font-semibold text-white mb-3">11. Batasan Tanggung Jawab</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Impost Media tidak memberikan jaminan atas hasil di luar KPI yang telah disepakati. Hasil
              aktual dapat dipengaruhi kondisi pasar, kompetitor, dan perubahan algoritma platform.</p>
            <ul class="space-y-2">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Impost Media tidak bertanggung
                  jawab atas kerugian akibat klien tidak memenuhi kewajiban penyediaan aset.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Total tanggung jawab finansial
                  tidak melebihi jumlah yang dibayarkan klien dalam 3 bulan terakhir.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Impost Media tidak bertanggung
                  jawab atas pemblokiran akun atau perubahan kebijakan platform pihak ketiga.</span></li>
            </ul>
          </div>
        </div>

        <div id="s12">
          <div class="text-sm font-semibold text-white mb-3">12. Penghentian Layanan</div>
          <div class="text-sm text-white leading-relaxed">
            <p class="mb-3">Klien dapat mengajukan penghentian layanan dengan pemberitahuan tertulis minimal 30 hari
              sebelumnya. Penghentian sebelum masa minimum tidak membebaskan kewajiban pembayaran sisa periode.</p>
            <p class="mb-2 text-white text-xs uppercase tracking-wide">Impost Media berhak menghentikan layanan apabila:
            </p>
            <ul class="space-y-2 mb-3">
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Klien tidak melakukan pembayaran
                  lebih dari 14 hari kerja setelah jatuh tempo.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Klien menggunakan layanan untuk
                  aktivitas yang melanggar hukum atau merugikan pihak lain.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Klien melakukan pelecehan atau
                  intimidasi terhadap tim Impost Media.</span></li>
              <li class="flex items-start gap-2.5"><span
                  class="mt-2 w-1 h-1 rounded-full bg-white flex-shrink-0"></span><span>Klien berulang kali tidak
                  memenuhi kewajiban penyediaan aset sehingga pekerjaan tidak dapat dijalankan.</span></li>
            </ul>
            <p class="text-xs text-white italic">Setelah layanan berakhir, seluruh aset dan file hasil kerja yang telah
              dilunasi akan diserahkan dalam 7 hari kerja.</p>
          </div>
        </div>

        <div id="s13">
          <div class="text-sm font-semibold text-white mb-3">13. Penyelesaian Sengketa</div>
          <div class="space-y-3 text-sm text-white leading-relaxed">
            <p>Syarat dan Ketentuan ini tunduk pada hukum yang berlaku di Republik Indonesia. Segala sengketa diselesaikan
              melalui musyawarah mufakat dalam waktu 30 hari sejak sengketa disampaikan secara tertulis.</p>
            <p>Apabila musyawarah tidak mencapai kesepakatan, penyelesaian dilakukan melalui lembaga mediasi atau
              pengadilan yang berwenang di wilayah Kalimantan Selatan, Indonesia.</p>
          </div>
        </div>

      </div>

      {{-- Footer --}}
      <div class="border-t border-white/5 mt-12 pt-7">
        <p class="text-xs text-white leading-relaxed">
          CV. Impost Media Indonesia - Studio: Jl. Kawamara, Landasan Ulin Tengah, Banjarbaru, Kalimantan Selatan.
          Head Office: Jl. Sungai Wain Km 15, Balikpapan.<br>
          <a href="mailto:adm.impostmedia@gmail.com"
            class="text-white hover:text-white transition-colors">adm.impostmedia@gmail.com</a>
          &nbsp;&middot;&nbsp; (+62) 812-5744-4623
          &nbsp;&middot;&nbsp; <a href="https://impostmedia.com"
            class="text-white hover:text-white transition-colors">impostmedia.com</a>
        </p>
      </div>

    </div>{{-- end max-w-3xl --}}
  </div>{{-- end bg --}}
@endsection
