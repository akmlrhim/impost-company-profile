@php
  $faqs = [
      [
          'question' => 'Apa itu Agency & apa itu Impost Media?',
          'answer' => '
              <p class="mb-4"><strong>Apa itu Agency?</strong><br>
              Bahasa gampangnya, Agency adalah tim profesional yang Anda bayar untuk membantu mengurus dan mengembangkan bisnis, supaya Anda tidak perlu mengerjakan semuanya sendiri. Sebagai pemilik bisnis, Anda bisa fokus ke produk, operasional, dan pelayanan. Kami yang bantu bagian pengembangan dan pemasaran (digital & sistem).</p>

              <p class="mb-4"><strong>Apa itu Impost Media?</strong><br>
              Impost Media adalah digital marketing agency pionir di Kalimantan Selatan yang berlokasi di Landasan Ulin, Banjarbaru. Kami adalah partner bisnis yang membantu usaha Anda naik level lewat digital marketing, branding, dan sistem penjualan—bukan sekadar posting atau iklan.</p>

              <p>Tujuan kami sederhana: membantu bisnis meningkatkan omzet lewat strategi yang terintegrasi agar bisnis Anda lebih dikenal, lebih dipercaya, dan lebih menghasilkan.</p>
          ',
      ],
      [
          'question' => 'Impost Media jual apa?',
          'answer' =>
              'Kami tidak hanya menjual satu jasa, tapi "ekosistem" solusi digital. Layanan kami meliputi Manajemen Social Media & Konten, Branding, Digital Ads (Google/Meta/TikTok), Marketplace Management, Pembuatan Website & SEO, hingga App Development (Sistem ERP/Kasir). Semuanya adalah alat untuk satu tujuan: mendatangkan pembeli.',
      ],
      [
          'question' => 'Bagaimana cara Impost Media meningkatkan omzet bisnis klien?',
          'answer' =>
              'Kami bekerja dengan merapikan funnel bisnis Anda. Mulai dari memperkenalkan produk ke pasar yang tepat (Traffic), membangun citra yang meyakinkan agar orang percaya (Branding), hingga menata sistem penjualan agar calon pembeli yang datang benar-benar terkonversi menjadi sales (Closing). Kami memastikan promosi tidak salah arah.',
      ],
      [
          'question' => 'Apa ada garansinya bila hasil tidak tercapai?',
          'answer' =>
              'Komitmen kami adalah bekerja berbasis data dan strategi yang terukur. Kami memberikan garansi berupa pengerjaan yang transparan, laporan rutin, dan optimasi terus-menerus. Untuk detail garansi performa spesifik, hal ini biasanya dibahas dalam sesi konsultasi sesuai dengan paket layanan yang diambil.',
      ],
      [
          'question' => 'Berapa tarifnya?',
          'answer' =>
              'Investasi layanan di Impost Media sangat bervariasi tergantung kebutuhan dan skala bisnis Anda. Kami memiliki paket yang disesuaikan untuk UMKM hingga perusahaan besar. Silakan hubungi tim kami untuk mendapatkan penawaran harga terbaik yang sesuai dengan target bisnis Anda.',
      ],
      [
          'question' => 'Apakah Impost Media cocok untuk bisnis saya?',
          'answer' =>
              'Sangat cocok, terutama jika bisnis Anda punya produk yang bagus dan operasional yang jalan, tapi "nggak tumbuh-tumbuh" karena bingung cara promosi atau tidak punya sistem. Kami hadir untuk membereskan masalah promosi yang salah arah, branding asal-asalan, atau jualan digital yang tanpa strategi.',
      ],
      [
          'question' => 'Berapa lama hasilnya bisa saya rasakan?',
          'answer' =>
              'Setiap layanan memiliki timeline berbeda. Untuk Digital Ads, traffic bisa masuk dalam hitungan hari. Namun, untuk hasil yang stabil berupa peningkatan brand awareness dan omzet yang konsisten, biasanya dibutuhkan waktu beberapa bulan untuk proses testing, collecting data, dan optimasi strategi.',
      ],
      [
          'question' => 'Kapan omzet saya sudah mulai bisa naik?',
          'answer' =>
              'Kenaikan omzet biasanya terjadi bertahap setelah fondasi digital (sosmed/web) rapi dan iklan mulai berjalan efektif. Fokus kami adalah pertumbuhan jangka panjang, bukan hanya lonjakan sesaat. Tim kami akan terus memantau grafik performa untuk memastikan tren penjualan Anda bergerak naik.',
      ],
  ];
@endphp

<section class="relative w-full py-20 bg-impost-fifth overflow-hidden">

  <div class="relative max-w-4xl mx-auto px-6 lg:px-8 z-10">
    <div class="text-center mb-16">
      <span
        class="inline-block py-1 px-3 rounded-full bg-impost-primary/10 border border-impost-primary/20 text-impost-primary text-xs font-semibold tracking-wider uppercase mb-4">
        Informasi & Layanan
      </span>
      <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-white mb-6">
        Pertanyaan <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-impost-primary to-yellow-200">Umum</span>
      </h2>
      <p class="text-zinc-400 text-lg max-w-2xl mx-auto leading-relaxed">
        Pahami bagaimana Impost Media membantu bisnis Anda bertumbuh di era digital.
      </p>
    </div>

    <div class="space-y-4">
      @foreach ($faqs as $index => $faq)
        <div
          class="group border border-white/5 rounded-2xl bg-white/5 hover:bg-white/[0.07] transition-all duration-300 overflow-hidden">

          <button onclick="toggleFAQ(this)"
            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
            <span class="text-lg font-medium text-zinc-100 group-hover:text-impost-primary transition-colors pr-8">
              {{ $faq['question'] }}
            </span>

            <span class="relative flex-shrink-0 w-6 h-6 flex items-center justify-center">
              <span
                class="absolute block w-5 h-0.5 bg-zinc-400 group-hover:bg-impost-primary transition-colors duration-300"></span>
              <span
                class="absolute block w-5 h-0.5 bg-zinc-400 group-hover:bg-impost-primary transition-all duration-300 transform rotate-90 icon-v"></span>
            </span>
          </button>

          <div
            class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] opacity-0">
            <div class="px-6 pb-6 pt-0 text-zinc-400 leading-relaxed text-[15px]">
              {!! $faq['answer'] !!}
            </div>
          </div>

        </div>
      @endforeach
    </div>

    <div class="mt-12 text-center">
      <p class="text-zinc-500">Masih ragu atau punya pertanyaan lain?</p>
      <a href="#"
        class="inline-block mt-2 text-impost-primary font-medium hover:underline hover:text-yellow-300 transition-colors">
        Konsultasikan Bisnis Anda Sekarang &rarr;
      </a>
    </div>
  </div>
</section>

<script>
  function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const iconVertical = button.querySelector('.icon-v');
    const allContents = document.querySelectorAll('.faq-content');
    const allIcons = document.querySelectorAll('.icon-v');
    const parent = button.parentElement;

    const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

    // Tutup item lain
    allContents.forEach((item, index) => {
      item.style.maxHeight = '0px';
      item.style.opacity = '0';
      allIcons[index].style.transform = 'rotate(90deg)';
      item.parentElement.classList.remove('bg-white/10', 'border-impost-primary/30');
    });

    // Buka item yang diklik
    if (!isOpen) {
      content.style.maxHeight = content.scrollHeight + 'px';
      content.style.opacity = '1';
      iconVertical.style.transform = 'rotate(0deg)';
      parent.classList.add('bg-white/10', 'border-impost-primary/30');
    }
  }
</script>
