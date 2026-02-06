@php
  $faqs = $faqs ?? [
      [
          'question' => 'Layanan apa saja yang disediakan?',
          'answer' =>
              'Leads menyediakan layanan digital marketing yang dirancang untuk mendorong pertumbuhan bisnis secara berkelanjutan. Layanan kami meliputi pengelolaan media sosial, iklan digital (Meta Ads, Google Ads, dan platform lainnya), SEO, pembuatan website dan landing page, serta pengembangan strategi dan konten digital. Seluruh layanan disesuaikan dengan kebutuhan, target, dan karakter bisnis klien.',
      ],
      [
          'question' => 'Bagaimana alur kerja sama dengan Leads?',
          'answer' =>
              'Kerja sama diawali dengan sesi konsultasi untuk memahami model bisnis, target market, dan tujuan klien. Selanjutnya kami melakukan analisis, menyusun strategi, dan mempresentasikan project brief melalui meeting. Setelah strategi disepakati, tim kami akan menjalankan eksekusi secara bertahap, disertai monitoring, optimasi, serta update dan laporan performa secara berkala.',
      ],
      [
          'question' => 'Kapan hasil dari digital marketing bisa dirasakan?',
          'answer' =>
              'Hasil digital marketing bergantung pada jenis layanan yang digunakan. Untuk iklan digital, peningkatan traffic atau leads umumnya dapat terlihat dalam beberapa minggu. Sementara untuk strategi jangka panjang seperti SEO dan branding, hasil optimal biasanya dicapai dalam beberapa bulan. Fokus kami adalah menghasilkan pertumbuhan yang konsisten dan berkelanjutan.',
      ],
      [
          'question' => 'Apakah layanan ini cocok untuk bisnis saya?',
          'answer' =>
              'Layanan Leads dapat digunakan oleh berbagai skala bisnis, mulai dari UMKM, startup, hingga perusahaan besar. Strategi kampanye akan disesuaikan dengan omzet, kondisi bisnis, serta target KPI masing-masing klien agar hasil yang diperoleh tetap efektif dan efisien.',
      ],
      [
          'question' => 'Berapa tarif layanan pengelolaan media sosial?',
          'answer' =>
              'Tarif layanan pengelolaan media sosial di Leads dimulai dari 1 juta rupiah hingga puluhan juta rupiah per bulan. Penentuan biaya disesuaikan dengan kebutuhan bisnis, target KPI, tingkat kompleksitas campaign, serta strategi yang paling tepat untuk mencapai tujuan klien.',
      ],
      [
          'question' => 'Apakah klien mendapatkan laporan dan evaluasi?',
          'answer' =>
              'Ya. Setiap klien akan menerima laporan performa secara rutin yang mencakup perkembangan kampanye, analisis hasil, serta rekomendasi strategi lanjutan. Laporan disusun secara transparan dan mudah dipahami sebagai dasar evaluasi dan pengambilan keputusan.',
      ],
      [
          'question' => 'Apa yang membedakan Leads dengan agensi lain?',
          'answer' =>
              'Leads mengutamakan pendekatan strategis berbasis data, transparansi, dan komunikasi yang profesional. Kami tidak hanya menjalankan kampanye, tetapi berfokus pada pencapaian tujuan bisnis klien secara nyata. Bagi kami, keberhasilan klien adalah prioritas utama.',
      ],
  ];
@endphp

<section class="relative w-full max-w-7xl mb-12 mx-auto px-4 mt-10 md:mt-16 py-20 sm:px-6 lg:px-8">
  <div class="mx-auto">
    <div class="text-center mb-12">
      <h2 class="text-3xl sm:text-5xl font-extrabold text-impost-primary mb-2">
        FAQ
      </h2>
      <div class="h-1 w-20 bg-impost-primary mx-auto rounded-full"></div>
    </div>

    <div class="space-y-4">
      @foreach ($faqs as $faq)
        <div
          class="bg-impost-fifth rounded-xl shadow-lg border border-gray-800 overflow-hidden transition-all duration-300 hover:border-impost-primary/50 group">

          <button onclick="toggleFAQ(this)"
            class="cursor-pointer w-full px-4 py-2 text-left flex justify-between items-center bg-impost-fifth hover:bg-zinc-900 transition-colors gap-4">

            <span class="font-medium text-md text-impost-primary group-hover:text-yellow-400 transition-colors">
              {{ $faq['question'] ?? ($faq->question ?? '') }}
            </span>

            <div class="p-2 rounded-full bg-gray-800 group-hover:bg-impost-primary transition-colors">
              <svg class="w-4 h-4 text-white group-hover:text-black transform transition-transform duration-300"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </button>

          <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="px-6 pb-6 text-sm md:text-md text-white border-t border-gray-800 pt-4 leading-relaxed">
              {{ $faq['answer'] ?? ($faq->answer ?? '') }}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    const allContents = document.querySelectorAll('.faq-content');
    const allIcons = document.querySelectorAll('button svg');

    allContents.forEach((item, index) => {
      if (item === content) {
        if (item.style.maxHeight && item.style.maxHeight !== '0px') {
          item.style.maxHeight = '0px';
          allIcons[index].style.transform = 'rotate(0deg)';
        } else {
          item.style.maxHeight = item.scrollHeight + 'px';
          allIcons[index].style.transform = 'rotate(180deg)';
        }
      } else {
        item.style.maxHeight = '0px';
        allIcons[index].style.transform = 'rotate(0deg)';
      }
    });
  }
</script>
