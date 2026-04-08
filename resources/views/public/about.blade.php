@extends('layouts.public')

@section('title', 'Tentang Kami | Impost Media')
@section('meta_description',
  'CV Impost Media Indonesia adalah All in One Integrated Digital Marketing Agency berpusat
  di Banjarbaru, Kalimantan Selatan. Kami hadir dengan pendekatan data-driven dan jaminan uang kembali.')

  @push('styles')
    <style>
      .hide-scrollbar::-webkit-scrollbar {
        display: none;
      }

      .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }
    </style>
  @endpush

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/about.webp') }}');">
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
                class="inline-flex items-center text-[11px] sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-[11px] sm:text-sm font-medium text-white md:ms-2">Tentang Kami</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-xl sm:text-4xl md:text-5xl font-bold text-white leading-tight">
          Tentang Kami
        </h1>
        <p class="text-white/80 text-xs sm:text-lg leading-relaxed max-w-xl text-justify">
          Kenali perjalanan, visi, dan misi kami yang menjadi fondasi layanan digital marketing,
          event organizer, serta pengadaan barang dan jasa yang kami hadirkan untuk bisnis Indonesia.
        </p>
      </div>

    </div>

  </section>

  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">

      <div class="max-w-5xl mx-auto mb-8 sm:mb-10 md:mb-12">
        <h2 class="mt-2 sm:mt-3 text-sm sm:text-xl md:text-2xl text-impost-primary lg:text-3xl font-bold leading-tight">
          Sekilas Impost Media Indonesia
        </h2>
      </div>

      <div class="mb-10 sm:mb-14 md:mb-16 max-w-5xl mx-auto">
        <div
          class="relative w-full aspect-video rounded-lg sm:rounded-xl md:rounded-2xl overflow-hidden border border-gray-800 shadow-lg">
          <script src="https://fast.wistia.com/player.js" async></script>
          <script src="https://fast.wistia.com/embed/59ntht7a1b.js" async type="module"></script>
          <style>wistia-player[media-id='59ntht7a1b']:not(:defined) { background: center / contain no-repeat
          url('https://fast.wistia.com/embed/medias/59ntht7a1b/swatch'); display: block; filter: blur(5px);
          padding-top:56.25%; }</style>
          <wistia-player media-id="59ntht7a1b" aspect="1.7777777777777777"></wistia-player>
        </div>
      </div>

      <div class="max-w-5xl mx-auto text-justify">
        <p class="text-white/80 text-xs sm:text-lg leading-loose">
          Setiap bisnis punya cerita dan perjalanannya masing-masing. Kami di CV Impost Media Indonesia, atau yang
          lebih
          akrab disapa Impost Media, percaya bahwa langkah pertama yang paling penting untuk membangun sebuah
          brand
          bukanlah langsung berbicara, melainkan mendengarkan.
        </p>

        <p class="mt-4 sm:mt-5 md:mt-6 text-white/80 text-xs sm:text-lg leading-loose">
          Berpusat di Banjarbaru, Kalimantan Selatan, kami hadir sebagai All-in-One Integrated Digital Marketing
          Agency
          sekaligus perusahaan multiservice. Kami mendampingi Anda untuk merapikan makna bisnis dengan mencari
          tahu siapa
          Anda sebenarnya, untuk siapa Anda hadir, dan kesan apa yang ingin Anda tinggalkan di hati audiens saat
          mereka
          berinteraksi dengan Anda.
        </p>

        <p class="mt-4 sm:mt-5 md:mt-6 text-white/80 text-xs sm:text-lg leading-loose">
          Dari pemahaman mendalam itulah, kami mulai merangkai cerita. Kami sangat mengedepankan pemasaran
          berbasis konten
          dan storytelling untuk membangun narasi inti yang konsisten di semua ruang, mulai dari website, media
          sosial,
          hingga komunikasi sehari-hari. Tujuan kami sederhana, yaitu memastikan suara perusahaan Anda terdengar
          jernih,
          membangun identitas merek yang kuat, dan meningkatkan visibilitas Anda secara natural.
        </p>

        <p class="mt-4 sm:mt-5 md:mt-6 text-white/80 text-xs sm:text-lg leading-loose">
          Semangat kami berakar pada satu keyakinan fundamental: Insight to Impact. Perjalanan kami yang berawal
          dari
          dunia kreasi konten mengajarkan satu pelajaran penting, bahwa cerita yang indah harus mampu membawa
          perubahan
          yang terukur. Karena itu, setiap strategi pemasaran dan iklan digital yang kami buat mengusung
          pendekatan
          performance-based advertising. Kami tidak suka menebak-nebak. Setiap kampanye dirancang agar efisien,
          berorientasi pada konversi, dan memberikan hasil yang nyata.
        </p>

        <p class="mt-4 sm:mt-5 md:mt-6 text-white/80 text-xs sm:text-lg leading-loose">
          Kami mendedikasikan diri untuk menjadi rekan kerja yang mengedepankan transparansi dan akuntabilitas.
          Sebagai
          bukti komitmen terhadap pertumbuhan omzet Anda, kami bahkan memberikan jaminan uang kembali (money-back
          guarantee) pada layanan kampanye kami.
        </p>

        <p class="mt-4 sm:mt-5 md:mt-6 text-white/80 text-xs sm:text-lg leading-loose">
          Lebih dari sekadar pemasaran digital, Impost Media juga siap mendukung berbagai kebutuhan bisnis Anda
          melalui
          layanan event organizer, hiburan profesional, hingga pengadaan barang dan jasa. Pada akhirnya, ini
          bukanlah
          sekadar tentang kehadiran Anda di ranah digital atau kesuksesan sebuah acara. Ini adalah komitmen kami
          untuk
          menjadi mitra tepercaya yang membantu Anda mengefisienkan biaya, mendorong pertumbuhan yang
          berkelanjutan, dan
          merawat ikatan yang hangat dengan pelanggan Anda di seluruh Indonesia.
        </p>
      </div>
    </div>

    {{-- BRAND HISTORY  --}}
    <section class="relative w-full min-h-screen flex flex-col pt-24 pb-12 bg-[#0a0a0a] overflow-hidden">

      <div class="absolute inset-0 z-0 bg-center bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('img/pages/brand_history.webp') }}');">
      </div>

      <div class="absolute inset-0 z-10 bg-gradient-to-r from-[#0a0a0a] via-[#0a0a0a]/90 to-[#0a0a0a]/60"></div>

      <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col h-full flex-grow">

        <div class="mb-16">
          <h2 class="text-xl md:text-5xl text-white font-bold leading-tight">
            Brand History
          </h2>
          <p class="mt-4 text-white/80 text-xs sm:text-lg max-w-2xl leading-relaxed text-justify">
            Sebuah perjalanan dari menetapkan arah hingga menciptakan dampak nyata.
          </p>
        </div>

        <div class="w-full overflow-x-auto hide-scrollbar mb-12" id="timeline-scroll-area">
          <div class="relative min-w-[800px] flex items-center py-6" id="timeline-container">

            <div class="absolute top-1/2 left-0 right-0 h-[2px] bg-white/10 -translate-y-1/2 z-0"></div>

            <div id="progress-line"
              class="absolute top-1/2 left-0 h-[2px] bg-impost-primary -translate-y-1/2 z-0 transition-all duration-500 ease-out"
              style="width: 0px;"></div>

            <div class="relative z-10 flex justify-between w-full">

              <button class="timeline-btn relative flex flex-col items-center gap-4 w-32 focus:outline-none group"
                data-target="tab-1" onclick="changeTab(this, true)">
                <span class="text-[11px] sm:text-sm font-medium text-impost-primary transition-colors duration-300">One
                  Direction</span>
                <div
                  class="indicator-dot w-4 h-4 rounded-full bg-impost-primary ring-4 ring-[#0a0a0a] transition-all duration-300 shadow-[0_0_12px_rgba(var(--impost-primary-rgb),0.8)]">
                </div>
              </button>

              <button class="timeline-btn relative flex flex-col items-center gap-4 w-32 focus:outline-none group"
                data-target="tab-2" onclick="changeTab(this, true)">
                <span
                  class="text-[11px] sm:text-sm font-medium text-white/40 transition-colors duration-300 group-hover:text-white/80">Built
                  as a System</span>
                <div
                  class="indicator-dot w-4 h-4 rounded-full bg-white/20 ring-4 ring-[#0a0a0a] transition-all duration-300 group-hover:bg-white/50">
                </div>
              </button>

              <button class="timeline-btn relative flex flex-col items-center gap-4 w-32 focus:outline-none group"
                data-target="tab-3" onclick="changeTab(this, true)">
                <span
                  class="text-[11px] sm:text-sm font-medium text-white/40 transition-colors duration-300 group-hover:text-white/80">Consistent</span>
                <div
                  class="indicator-dot w-4 h-4 rounded-full bg-white/20 ring-4 ring-[#0a0a0a] transition-all duration-300 group-hover:bg-white/50">
                </div>
              </button>

              <button class="timeline-btn relative flex flex-col items-center gap-4 w-32 focus:outline-none group"
                data-target="tab-4" onclick="changeTab(this, true)">
                <span
                  class="text-[11px] sm:text-sm font-medium text-white/40 transition-colors duration-300 group-hover:text-white/80">Data-Driven</span>
                <div
                  class="indicator-dot w-4 h-4 rounded-full bg-white/20 ring-4 ring-[#0a0a0a] transition-all duration-300 group-hover:bg-white/50">
                </div>
              </button>

              <button class="timeline-btn relative flex flex-col items-center gap-4 w-32 focus:outline-none group"
                data-target="tab-5" onclick="changeTab(this, true)">
                <span
                  class="text-[11px] sm:text-sm font-medium text-white/40 transition-colors duration-300 group-hover:text-white/80">Expert
                  Partner</span>
                <div
                  class="indicator-dot w-4 h-4 rounded-full bg-white/20 ring-4 ring-[#0a0a0a] transition-all duration-300 group-hover:bg-white/50">
                </div>
              </button>

              <button class="timeline-btn relative flex flex-col items-center gap-4 w-32 focus:outline-none group"
                data-target="tab-6" onclick="changeTab(this, true)">
                <span
                  class="text-[11px] sm:text-sm font-medium text-white/40 transition-colors duration-300 group-hover:text-white/80">Insight
                  to Impact</span>
                <div
                  class="indicator-dot w-4 h-4 rounded-full bg-white/20 ring-4 ring-[#0a0a0a] transition-all duration-300 group-hover:bg-white/50">
                </div>
              </button>

            </div>
          </div>
        </div>

        <div class="relative w-full max-w-6xl mt-4 pb-10 min-h-[200px]">

          <div id="tab-1"
            class="tab-content relative transition-all duration-500 opacity-100 translate-y-0 pointer-events-auto">
            <h3 class="text-lg md:text-4xl font-bold text-white mb-5">One Direction</h3>
            <p class="text-white/80 text-xs sm:text-lg leading-relaxed text-justify">
              Impost Media lahir dari satu arah yang jelas. Bukan untuk sekadar hadir di ruang digital, tetapi
              untuk membantu mengarahkan pertumbuhan bisnis dengan tujuan yang terstruktur dan terukur.
              Di tengah dunia digital marketing yang sering bergerak reaktif, kami memilih satu kompas di
              dalam satu atap: pertumbuhan yang dibentuk. Setiap analisis, strategi, eksekusi, dan keputusan
              tidak berjalan sendiri. Semuanya bergerak menuju akhir tujuan yang sama.
              Satu arah ini membuat kami terfokus, tidak mudah tergoda dengan tren sesaat, tidak terpecah oleh
              vanity metriks semata. Karena bagi kami, digital marketing bernilai ketika ia mampu mendorong
              bisnis untuk melangkah lebih jauh.
            </p>
          </div>

          <div id="tab-2"
            class="tab-content absolute top-0 left-0 w-full transition-all duration-500 opacity-0 translate-y-4 pointer-events-none">
            <h3 class="text-lg md:text-4xl font-bold text-white mb-5">Built as a System</h3>
            <p class="text-white/80 text-xs sm:text-lg leading-relaxed text-justify">
              Impost Media tidak dibangun sebagai individu. Ia dibangun sebagai sebuah sistem.
              Sistem yang menjadi sebuah alat untuk menghubungkan riset, hasil analisis, strategi, eksekusi,
              distribusi, dan evaluasi dalam satu alur kerja yang rapi dan terstruktur. Setiap perjalanannya
              saling
              menopang, memastikan pertumbuhannya tidak bergantung pada momentum, tetapi pada fondasi.
              Melalui pendekatan seperti sistem ini membuat kami mampu bekerja secara efisien; menghemat
              waktu, menekan biaya yang tidak perlu, dan meminimalisir trial-error yang sering menghambat
              dan membebani bisnis.
            </p>
          </div>

          <div id="tab-3"
            class="tab-content absolute top-0 left-0 w-full transition-all duration-500 opacity-0 translate-y-4 pointer-events-none">
            <h3 class="text-lg md:text-4xl font-bold text-white mb-5">Consistent Positioning</h3>
            <p class="text-white/80 text-xs sm:text-lg leading-relaxed text-justify">
              Kami percaya, brand yang kuat tidak dibangun dari konten yang ramai, tetapi dari posisi yang
              konsisten.
              Impost Media mengembangkan positioning framework yang menjaga brand tetap berada pada
              jalurnya, jelas dalam pesan, relevan dengan market, dan konsisten di setiap channelnya.
              Dengan fondasi seperti ini, setiap strategi dan komunikasi memiliki arah. Setiap output yang
              dihasilkan mampu memperkuat persepsi, dan setiap campaign berperan besar dalam satu kesatuan
              aktivitas.
            </p>
          </div>

          <div id="tab-4"
            class="tab-content absolute top-0 left-0 w-full transition-all duration-500 opacity-0 translate-y-4 pointer-events-none">
            <h3 class="text-lg md:text-4xl font-bold text-white mb-5">Data-Driven Approach</h3>
            <p class="text-white/80 text-xs sm:text-lg leading-relaxed text-justify">
              Setiap keputusan yang kami ambil berangkat dari data, bukan asumsi semata atupun intuisi sesaat.
              Kami menggunakan data untuk membaca perilaku market, mengukur performa, dan
              menyempurnakannya menjadi strategi secara berkelanjutan. Pendekatan seperti ini membuktikan
              setiap langkah dapat dipertanggungjawabkan dan setiap hasil dapat dipantau berkala.
              Bagi kami, data bukan sekadar angka. Ia adalah bahasa bisnis yang menjadi jembatan strategi
              dengan impact yang nyata.

            </p>
          </div>

          <div id="tab-5"
            class="tab-content absolute top-0 left-0 w-full transition-all duration-500 opacity-0 translate-y-4 pointer-events-none">
            <h3 class="text-lg md:text-4xl font-bold text-white mb-5">Your Expert Partner</h3>
            <p class="text-white/80 text-xs sm:text-lg leading-relaxed text-justify">
              Kami bukan sekadar pembuat konten. Kami hadir sebagai partner ahli.
              Tim Impost Media memiliki praktisi berpengalaman yang memahami bisnis, bukan hanya sekadar
              pengisi channel. Kami bekerja fleksibel, adaptif, dan kolaboratif dengan menyesuaikan strategi
              dengan fase pertumbuhan bisnis yang dikelola.
              Bahkan dalam skema kerja tertentu, hasil menjadi dasar dari kolaborasi. Karena kepercayaan kami
              pada sistem yang dibangun cukup kuat untuk berbagi risiko, bukan sekadar menagih jasa
            </p>
          </div>

          <div id="tab-6"
            class="tab-content absolute top-0 left-0 w-full transition-all duration-500 opacity-0 translate-y-4 pointer-events-none">
            <div class="flex items-center gap-4 mb-5">
              <h3 class="text-lg md:text-4xl font-bold text-white">Insight to Impact</h3>
            </div>
            <p class="text-white/80 text-xs sm:text-lg leading-relaxed text-justify">
              Pada akhirnya, semua bermuara pada dampak.
              Insight kami olah menjadi strategi. Strategi diterjemahkan menjadi aksi. Dan aksi kami ukur
              melalui pertumbuhan bisnis yang nyata.
              Insight to Impact. Proses terstruktur yang mengubah pemahaman menjadi hasil.
              Impost Media berdiri untuk bisnis, property, pertambangan, enterprise, hingga holding company
              yang tidak hanya ingin terlihat berkembang. Dengan All In One-Integrated Services dan 360
              Marketing, kami akan membawanya benar-benar bertumbuh dengan arah yang jelas, sistem yang
              kuat dan terstruktur, dan dampak yang berkelanjutan.
            </p>
          </div>

        </div>
      </div>
    </section>


    {{-- VISI MISI  --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">
      <div class="mt-10 sm:mt-14 md:mt-24 max-w-5xl mx-auto">
        <div class="max-w-5xl mx-auto mb-2 sm:mb-3 md:mb-4">
          <h2
            class="mt-2 sm:mt-3 text-sm sm:text-xl md:text-2xl lg:text-3xl font-bold leading-tight text-impost-primary">
            Visi
          </h2>
        </div>

        <p class="text-white/80 text-xs sm:text-lg leading-loose text-justify">
          Menjadi mitra multiservice terpercaya di Indonesia melalui layanan bisnis, event, dan pengadaan yang
          profesional serta berorientasi pada hasil.
        </p>
      </div>

      <div class="mt-10 sm:mt-14 md:mt-24 max-w-5xl mx-auto">
        <div class="max-w-5xl mx-auto mb-2 sm:mb-3 md:mb-4">
          <h2
            class="mt-2 sm:mt-3 text-sm sm:text-xl md:text-2xl lg:text-3xl font-bold leading-tight text-impost-primary">
            Misi
          </h2>
        </div>

        <ol
          class="space-y-2 text-xs sm:text-lg text-white/80 leading-relaxed list-decimal list-outside pl-4 text-justify">
          <li>Memberikan layanan digital marketing berbasis data yang membantu brand tumbuh, dikenal luas, dan
            meningkatkan konversi secara nyata.</li>
          <li>Menyediakan solusi event organizer, hiburan profesional, hingga music performance & production untuk
            mendukung berbagai kebutuhan klien.</li>
          <li>Mendukung kebutuhan acara dan instansi melalui layanan pengadaan barang dan jasa, seperti katering,
            alat
            tulis kantor, serta perlengkapan pendukung lainnya dengan kualitas yang terjamin dan tepat guna.
          </li>
        </ol>
      </div>
    </div>



    {{-- LOGO  --}}


  </div>
@endsection

@push('scripts')
  <script>
    let autoPlayInterval;
    let currentIndex = 0;
    const intervalTime = 4000;

    function changeTab(btnElement, isUserClick = false) {
      const buttons = document.querySelectorAll('.timeline-btn');
      const contents = document.querySelectorAll('.tab-content');
      const targetId = btnElement.getAttribute('data-target');
      const progressBar = document.getElementById('progress-line');

      buttons.forEach((btn, index) => {
        if (btn === btnElement) {
          currentIndex = index;
        }
        btn.querySelector('span').className =
          "text-[11px] sm:text-sm font-medium text-white/40 transition-colors duration-300 group-hover:text-white/80";
        btn.querySelector('.indicator-dot').className =
          "indicator-dot w-4 h-4 rounded-full bg-white/20 ring-4 ring-[#0a0a0a] transition-all duration-300 group-hover:bg-white/50";
      });

      btnElement.querySelector('span').className =
        "text-[11px] sm:text-sm font-medium text-impost-primary transition-colors duration-300";
      btnElement.querySelector('.indicator-dot').className =
        "indicator-dot w-4 h-4 rounded-full bg-impost-primary ring-4 ring-[#0a0a0a] transition-all duration-300 shadow-[0_0_12px_rgba(var(--impost-primary-rgb),0.8)]";

      const btnLeft = btnElement.offsetLeft;
      const btnWidth = btnElement.offsetWidth;
      progressBar.style.width = (btnLeft + (btnWidth / 2)) + 'px';

      const scrollContainer = document.getElementById('timeline-scroll-area');
      if (scrollContainer) {
        const scrollPos = btnLeft - (scrollContainer.clientWidth / 2) + (btnWidth / 2);
        scrollContainer.scrollTo({
          left: scrollPos,
          behavior: 'smooth'
        });
      }

      contents.forEach(content => {
        content.classList.remove('relative', 'opacity-100', 'translate-y-0', 'pointer-events-auto');
        content.classList.add('absolute', 'top-0', 'left-0', 'w-full', 'opacity-0', 'translate-y-4',
          'pointer-events-none');
      });

      const targetContent = document.getElementById(targetId);
      targetContent.classList.remove('absolute', 'top-0', 'left-0', 'w-full', 'opacity-0', 'translate-y-4',
        'pointer-events-none');
      targetContent.classList.add('relative', 'opacity-100', 'translate-y-0', 'pointer-events-auto');

      if (isUserClick) {
        resetAutoPlay();
      }
    }

    function startAutoPlay() {
      autoPlayInterval = setInterval(() => {
        const buttons = document.querySelectorAll('.timeline-btn');
        currentIndex++;
        if (currentIndex >= buttons.length) {
          currentIndex = 0;
        }
        changeTab(buttons[currentIndex], false);
      }, intervalTime);
    }

    function resetAutoPlay() {
      clearInterval(autoPlayInterval);
      startAutoPlay();
    }

    document.addEventListener('DOMContentLoaded', () => {
      const firstBtn = document.querySelector('.timeline-btn');
      if (firstBtn) {
        setTimeout(() => {
          changeTab(firstBtn, false);
          startAutoPlay();
        }, 100);
      }
    });
  </script>
@endpush
