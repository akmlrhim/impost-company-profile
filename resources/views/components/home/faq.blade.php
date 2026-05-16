@php
  $faqs = [
    ['q'=>'Apa itu Agency & apa itu Impost Media?','a'=>'<p class="mb-3"><strong class="text-white">Apa itu Agency?</strong><br>Agency adalah tim profesional yang Anda bayar untuk membantu mengurus dan mengembangkan bisnis. Sebagai pemilik bisnis, Anda fokus ke produk & operasional. Kami yang bantu bagian pemasaran digital & sistem.</p><p class="mb-3"><strong class="text-white">Apa itu Impost Media?</strong><br>Impost Media adalah digital marketing agency pionir di Kalimantan Selatan, berlokasi di Banjarbaru. Kami partner bisnis yang membantu usaha naik level lewat digital marketing, branding, dan sistem penjualan.</p><p>Tujuan kami: membantu bisnis meningkatkan omzet lewat strategi terintegrasi agar lebih dikenal, dipercaya, dan menghasilkan.</p>'],
    ['q'=>'Impost Media jual apa?','a'=>'Kami menawarkan "ekosistem" solusi digital: Manajemen Social Media & Konten, Branding, Digital Ads (Google/Meta/TikTok), Marketplace Management, Website & SEO, hingga App Development. Semuanya untuk satu tujuan: mendatangkan pembeli.'],
    ['q'=>'Bagaimana cara Impost Media meningkatkan omzet bisnis klien?','a'=>'Kami merapikan funnel bisnis Anda — dari memperkenalkan produk ke pasar yang tepat (Traffic), membangun citra yang meyakinkan (Branding), hingga menata sistem penjualan agar calon pembeli terkonversi menjadi sales (Closing).'],
    ['q'=>'Apa ada garansinya bila hasil tidak tercapai?','a'=>'Komitmen kami adalah bekerja berbasis data dan strategi terukur dengan pengerjaan transparan, laporan rutin, dan optimasi terus-menerus. Detail garansi performa spesifik dibahas dalam sesi konsultasi sesuai paket layanan.'],
    ['q'=>'Berapa tarifnya?','a'=>'Investasi sangat bervariasi tergantung kebutuhan dan skala bisnis, mulai dari UMKM hingga perusahaan besar. Hubungi tim kami untuk mendapatkan penawaran terbaik sesuai target bisnis Anda.'],
    ['q'=>'Apakah Impost Media cocok untuk bisnis saya?','a'=>'Sangat cocok jika bisnis Anda punya produk bagus dan operasional jalan, tapi tidak tumbuh karena bingung cara promosi atau tidak punya sistem. Kami hadir membereskan masalah promosi salah arah, branding asal-asalan, atau jualan digital tanpa strategi.'],
    ['q'=>'Berapa lama hasilnya bisa saya rasakan?','a'=>'Setiap layanan memiliki timeline berbeda. Digital Ads bisa mendatangkan traffic dalam hitungan hari. Namun untuk hasil stabil berupa peningkatan brand awareness dan omzet konsisten, biasanya butuh beberapa bulan untuk testing, collecting data, dan optimasi.'],
    ['q'=>'Kapan omzet saya mulai bisa naik?','a'=>'Kenaikan omzet terjadi bertahap setelah fondasi digital rapi dan iklan berjalan efektif. Fokus kami adalah pertumbuhan jangka panjang — tim kami terus memantau performa untuk memastikan tren penjualan bergerak naik.'],
  ];
@endphp

<section class="py-16 sm:py-20 lg:py-24 bg-impost-fifth">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Two-column layout on large screens --}}
    <div class="grid lg:grid-cols-[1fr_1.6fr] gap-12 lg:gap-16 items-start">

      {{-- Left: sticky header --}}
      <div class="lg:sticky lg:top-28">
        <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-4">FAQ</p>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-5">
          Pertanyaan <br><span class="text-impost-primary">yang Sering Ditanyakan</span>
        </h2>
        <p class="text-base font-medium leading-relaxed text-white mb-8">
          Tidak menemukan jawaban yang Anda cari? Tim kami siap membantu.
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-7 py-3 text-white border-2 border-white/25 hover:border-white/60 transition-colors duration-150 cursor-pointer whitespace-nowrap">
          Hubungi Kami
        </a>
      </div>

      {{-- Right: accordion --}}
      <div class="space-y-2">
        @foreach ($faqs as $i => $faq)
          <div class="faq-item group border border-white/8 rounded-2xl overflow-hidden bg-white/[0.025] transition-all duration-250">
            <button onclick="toggleFAQ(this)"
              class="flex items-center justify-between w-full px-5 sm:px-6 py-4 sm:py-5 text-left focus:outline-none">
              <span class="text-sm font-medium leading-relaxed font-bold text-white pr-6 leading-snug">{{ $faq['q'] }}</span>
              <svg class="w-5 h-5 flex-shrink-0 text-white/50 group-hover:text-impost-primary transition-all duration-250 chevron-icon"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div class="faq-content max-h-0 overflow-hidden transition-all duration-400 ease-in-out opacity-0">
              <div class="px-5 sm:px-6 pb-5 sm:pb-6 text-sm font-medium leading-relaxed text-white leading-relaxed">
                {!! $faq['a'] !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>
</section>

@push('json-ld')
  @php
    $faqJsonLd = ['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>array_map(fn($f)=>['@type'=>'Question','name'=>$f['q'],'acceptedAnswer'=>['@type'=>'Answer','text'=>strip_tags($f['a'])]], $faqs)];
  @endphp
  <script type="application/ld+json">{!! json_encode($faqJsonLd, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

<script>
  (function(){
    function toggleFAQ(btn) {
      const content = btn.nextElementSibling;
      const chevron = btn.querySelector('.chevron-icon');
      const parent  = btn.parentElement;
      const isOpen  = content.style.maxHeight && content.style.maxHeight !== '0px';

      document.querySelectorAll('.faq-item').forEach(item => {
        const c = item.querySelector('.faq-content');
        const ch = item.querySelector('.chevron-icon');
        c.style.maxHeight='0px'; c.style.opacity='0';
        ch.style.transform='rotate(0deg)';
        item.style.borderColor='';
        item.style.backgroundColor='';
      });

      if (!isOpen) {
        content.style.maxHeight = content.scrollHeight+'px';
        content.style.opacity   = '1';
        chevron.style.transform = 'rotate(180deg)';
        parent.style.borderColor = 'rgba(212,172,60,0.3)';
        parent.style.backgroundColor = 'rgba(212,172,60,0.04)';
      }
    }
    window.toggleFAQ = toggleFAQ;
  })();
</script>
