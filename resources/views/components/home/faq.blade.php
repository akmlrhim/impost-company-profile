@php
  $faqs = [
      [
          'question' => 'Apa itu Agency & apa itu Impost Media?',
          'answer' => '
      <p class="mb-3"><strong>Apa itu Agency?</strong><br>Agency adalah tim profesional yang Anda bayar untuk membantu mengurus dan mengembangkan bisnis. Sebagai pemilik bisnis, Anda fokus ke produk & operasional. Kami yang bantu bagian pemasaran digital & sistem.</p>
      <p class="mb-3"><strong>Apa itu Impost Media?</strong><br>Impost Media adalah digital marketing agency pionir di Kalimantan Selatan, berlokasi di Landasan Ulin, Banjarbaru. Kami adalah partner bisnis yang membantu usaha naik level lewat digital marketing, branding, dan sistem penjualan.</p>
      <p>Tujuan kami: membantu bisnis meningkatkan omzet lewat strategi terintegrasi agar lebih dikenal, dipercaya, dan menghasilkan.</p>
    ',
      ],
      [
          'question' => 'Impost Media jual apa?',
          'answer' =>
              'Kami menawarkan "ekosistem" solusi digital: Manajemen Social Media & Konten, Branding, Digital Ads (Google/Meta/TikTok), Marketplace Management, Website & SEO, hingga App Development (Sistem ERP/Kasir). Semuanya untuk satu tujuan: mendatangkan pembeli.',
      ],
      [
          'question' => 'Bagaimana cara Impost Media meningkatkan omzet bisnis klien?',
          'answer' =>
              'Kami merapikan funnel bisnis Anda — dari memperkenalkan produk ke pasar yang tepat (Traffic), membangun citra yang meyakinkan (Branding), hingga menata sistem penjualan agar calon pembeli terkonversi menjadi sales (Closing).',
      ],
      [
          'question' => 'Apa ada garansinya bila hasil tidak tercapai?',
          'answer' =>
              'Komitmen kami adalah bekerja berbasis data dan strategi terukur dengan pengerjaan transparan, laporan rutin, dan optimasi terus-menerus. Detail garansi performa spesifik dibahas dalam sesi konsultasi sesuai paket layanan.',
      ],
      [
          'question' => 'Berapa tarifnya?',
          'answer' =>
              'Investasi sangat bervariasi tergantung kebutuhan dan skala bisnis, mulai dari UMKM hingga perusahaan besar. Hubungi tim kami untuk mendapatkan penawaran terbaik sesuai target bisnis Anda.',
      ],
      [
          'question' => 'Apakah Impost Media cocok untuk bisnis saya?',
          'answer' =>
              'Sangat cocok jika bisnis Anda punya produk bagus dan operasional jalan, tapi tidak tumbuh karena bingung cara promosi atau tidak punya sistem. Kami hadir membereskan masalah promosi salah arah, branding asal-asalan, atau jualan digital tanpa strategi.',
      ],
      [
          'question' => 'Berapa lama hasilnya bisa saya rasakan?',
          'answer' =>
              'Setiap layanan memiliki timeline berbeda. Digital Ads bisa mendatangkan traffic dalam hitungan hari. Namun untuk hasil stabil berupa peningkatan brand awareness dan omzet konsisten, biasanya butuh beberapa bulan untuk testing, collecting data, dan optimasi.',
      ],
      [
          'question' => 'Kapan omzet saya sudah mulai bisa naik?',
          'answer' =>
              'Kenaikan omzet biasanya terjadi bertahap setelah fondasi digital rapi dan iklan berjalan efektif. Fokus kami adalah pertumbuhan jangka panjang. Tim kami terus memantau performa untuk memastikan tren penjualan bergerak naik.',
      ],
  ];
@endphp

<section class="relative w-full py-14 sm:py-20 bg-impost-fifth overflow-hidden">
  <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 z-10">

    <div class="text-center mb-10 sm:mb-16">
      <h2
        class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium font-header text-impost-primary tracking-tight mb-2 sm:mb-4">
        Frequently Asked <span class="text-impost-primary">Question</span>
      </h2>
    </div>

    <div class="space-y-3 sm:space-y-4">
      @foreach ($faqs as $faq)
        <div
          class="faq-item group border border-white/5 rounded-xl sm:rounded-2xl bg-white/5 hover:bg-white/[0.07] transition-all duration-300 overflow-hidden">

          <button onclick="toggleFAQ(this)"
            class="flex items-center justify-between w-full px-4 sm:px-6 py-3.5 sm:py-5 text-left focus:outline-none">
            <span
              class="text-sm sm:text-base md:text-lg font-semibold text-zinc-100 group-hover:text-impost-primary transition-colors pr-6 sm:pr-8">
              {{ $faq['question'] }}
            </span>
            <svg
              class="w-5 h-5 sm:w-6 sm:h-6 flex-shrink-0 text-zinc-400 group-hover:text-impost-primary transition-all duration-300 transform chevron-icon"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div
            class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] opacity-0">
            <div class="px-4 sm:px-6 pb-4 sm:pb-6 pt-0 text-white leading-relaxed text-sm sm:text-base md:text-lg">
              {!! $faq['answer'] !!}
            </div>
          </div>

        </div>
      @endforeach
    </div>

  </div>
</section>

@push('json-ld')
  @php
    $faqJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(function ($faq) {
            return [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($faq['answer']),
                ],
            ];
        }, $faqs),
    ];
  @endphp
  <script type="application/ld+json">{!! json_encode($faqJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

<script>
  (function() {
    function toggleFAQ(button) {
      const content = button.nextElementSibling;
      const chevron = button.querySelector('.chevron-icon');
      const parent = button.parentElement;
      const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

      document.querySelectorAll('.faq-item').forEach(item => {
        const c = item.querySelector('.faq-content');
        const ch = item.querySelector('.chevron-icon');
        c.style.maxHeight = '0px';
        c.style.opacity = '0';
        ch.style.transform = 'rotate(0deg)';
        item.classList.remove('bg-white/10', 'border-impost-primary/30');
      });

      if (!isOpen) {
        content.style.maxHeight = content.scrollHeight + 'px';
        content.style.opacity = '1';
        chevron.style.transform = 'rotate(180deg)';
        parent.classList.add('bg-white/10', 'border-impost-primary/30');
      }
    }

    window.toggleFAQ = toggleFAQ;
  })();
</script>
