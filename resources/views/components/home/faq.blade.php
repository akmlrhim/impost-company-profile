@php
  $faqs = [
      [
          'question' => 'Apa tujuan utama layanan Impost Media?',
          'answer' =>
              'Impost Media tidak sekadar menjual jasa, tetapi menggunakan layanan kami sebagai alat strategis untuk satu tujuan besar: mendatangkan calon pembeli, meningkatkan penjualan, dan membangun bisnis yang lebih rapi lewat digital marketing, branding, dan sistem.',
      ],
      [
          'question' => 'Apa itu layanan Manajemen Social Media & Konten?',
          'answer' =>
              'Layanan ini bertujuan membuat bisnis Anda terlihat aktif, profesional, dan menarik di ranah digital. Contohnya melalui posting terarah, konten edukasi, promosi, dan video pendek. Dampaknya, bisnis lebih dikenal, kepercayaan audiens terbangun, dan mendatangkan calon pembeli dari sosial media.',
      ],
      [
          'question' => 'Bagaimana layanan Branding & Brand Foundation membantu bisnis?',
          'answer' =>
              'Kami membantu membangun identitas bisnis yang jelas dan konsisten, mulai dari positioning, logo, hingga brand story. Hal ini membuat bisnis Anda beda dari kompetitor, mudah diingat, menjadi pilihan utama, dan menghindarkan Anda dari perang harga.',
      ],
      [
          'question' => 'Layanan Digital Ads mencakup platform apa saja?',
          'answer' =>
              'Layanan iklan kami mencakup Google Ads, Meta Ads (Instagram & Facebook), TikTok Ads, dan YouTube Ads. Tujuannya untuk menjangkau orang yang tepat dan meningkatkan penjualan berbasis data, sehingga omzet dapat meningkat lebih cepat.',
      ],
      [
          'question' => 'Apa yang dilakukan dalam layanan Marketplace Management?',
          'answer' =>
              'Kami mengoptimalkan toko Anda di Shopee, Tokopedia, atau TikTok Shop melalui optimasi produk, SKU, iklan, dan tampilan. Hasilnya, produk lebih mudah ditemukan, toko lebih dipercaya, dan angka closing meningkat.',
      ],
      [
          'question' => 'Seberapa penting layanan Website & SEO?',
          'answer' =>
              'Sangat penting untuk membangun "rumah digital" bisnis Anda agar terlihat profesional. Melalui website dan landing page yang teroptimasi SEO, value produk tersampaikan dengan baik sehingga calon pembeli lebih yakin sebelum memutuskan membeli.',
      ],
      [
          'question' => 'Jenis aplikasi apa yang bisa dikembangkan (App Development)?',
          'answer' =>
              'Kami mengembangkan sistem untuk efisiensi bisnis seperti CRM, HRIS, ERP, sistem finance, hingga aplikasi instansi. Tujuannya agar operasional kerja lebih rapi, hemat waktu dan biaya, serta organisasi siap untuk berkembang (scale-up).',
      ],
      [
          'question' => 'Apa manfaat layanan Live Stream Management?',
          'answer' =>
              'Layanan ini fokus meningkatkan penjualan secara langsung lewat siaran live di TikTok atau Shopee. Interaksi real-time ini membangun kepercayaan dengan cepat dan mendorong peningkatan penjualan saat live berlangsung.',
      ],
      [
          'question' => 'Bagaimana peran KOL / Endorse Management?',
          'answer' =>
              'Kami membantu membangun awareness dan kepercayaan lewat pihak ketiga (KOL/Influencer) melalui review, testimoni, atau konten UGC yang sesuai target market. Ini membuat brand lebih dipercaya dan menjangkau audiens baru.',
      ],
      [
          'question' => 'Apakah menyediakan layanan Foto & Video Produk?',
          'answer' =>
              'Ya, kami menyediakan layanan foto katalog dan video produk untuk menampilkan bisnis Anda secara menarik. Visual yang meyakinkan akan membuat produk lebih dilirik dan calon pembeli lebih yakin untuk bertransaksi.',
      ],
      [
          'question' => 'Apa fungsi CRM & Sales Pipeline Development?',
          'answer' =>
              'Layanan ini memastikan calon pembeli tidak hilang melalui sistem pencatatan leads dan follow-up yang teratur. Dengan pengelolaan data yang baik, closing rate akan naik dan omzet bisnis menjadi lebih konsisten.',
      ],
      [
          'question' => 'Apa bedanya Customer Service Human dan AI?',
          'answer' =>
              'CS Human fokus pada penanganan serius dan hubungan pelanggan untuk meningkatkan repeat order. Sedangkan CS AI (Chatbot) ditujukan untuk respon cepat 24 jam dan menangani orderan masif, terutama saat high season, agar tidak ada chat yang terlewat.',
      ],
      [
          'question' => 'Apakah Impost Media menyediakan jasa Event Organizer?',
          'answer' =>
              'Ya, kami mendukung kebutuhan event secara menyeluruh, mulai dari launching produk hingga gathering kantor. Kami memastikan event berjalan sesuai harapan dengan penggunaan budget yang efisien.',
      ],
  ];
@endphp

<section class="relative w-full py-20 text-white overflow-hidden">
  <div
    class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-impost-primary/20 blur-[120px] rounded-full opacity-30 pointer-events-none">
  </div>

  <div class="relative max-w-4xl mx-auto px-6 lg:px-8 z-10">
    <div class="text-center mb-16">
      <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-impost-primary mb-6">
        FAQ
      </h2>
    </div>

    <div class="space-y-4">
      @foreach ($faqs as $index => $faq)
        <div
          class="group border border-white/5 rounded-2xl bg-white/5 hover:bg-white/[0.07] transition-all duration-300 overflow-hidden">

          <button onclick="toggleFAQ(this)"
            class="flex items-center justify-between w-full p-6 text-left focus:outline-none">
            <span class="text-md font-medium text-zinc-100 group-hover:text-impost-primary transition-colors pr-8">
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
            <div class="px-6 pb-6 pt-0 text-white leading-relaxed text-[15px]">
              {{ $faq['answer'] }}
            </div>
          </div>

        </div>
      @endforeach
    </div>

    <div class="mt-12 text-center">
      <p class="text-white">Butuh solusi spesifik untuk bisnis Anda?</p>
      <a href="#"
        class="inline-block mt-2 text-impost-primary font-medium hover:underline hover:text-yellow-300 transition-colors">
        Konsultasikan Sekarang &rarr;
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

    allContents.forEach((item, index) => {
      item.style.maxHeight = '0px';
      item.style.opacity = '0';
      allIcons[index].style.transform = 'rotate(90deg)';
      item.parentElement.classList.remove('bg-white/10', 'border-impost-primary/30');
    });

    if (!isOpen) {
      content.style.maxHeight = content.scrollHeight + 'px';
      content.style.opacity = '1';
      iconVertical.style.transform = 'rotate(0deg)';
      parent.classList.add('bg-white/10', 'border-impost-primary/30');
    }
  }
</script>
