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
          <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
              <a href="/"
                class="text-[11px] sm:text-sm font-medium text-white/70 hover:text-white transition-colors">Home</a>
            </li>
            <li aria-current="page">
              <div class="flex items-center text-white">
                <svg class="w-3 h-3 text-white/40 mx-1" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-[11px] sm:text-sm font-medium">Tentang Kami</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">Tentang Kami</h1>
        <p class="text-white/80 text-sm md:text-base lg:text-lg leading-relaxed max-w-xl">
          Kenali perjalanan, visi, dan misi kami yang menjadi fondasi layanan digital marketing, event organizer, serta
          pengadaan barang dan jasa yang kami hadirkan untuk bisnis Indonesia.
        </p>
      </div>
    </div>
  </section>

  <div class="antialiased bg-impost-fifth">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">

      <div class="max-w-5xl mx-auto mb-8 md:mb-12">
        <h2 class="text-lg lg:text-xl text-impost-primary font-bold tracking-wide uppercase">
          Sekilas Impost Media Indonesia
        </h2>
      </div>

      <div class="mb-12 md:mb-20 max-w-5xl mx-auto">
        <div
          class="relative w-full aspect-video rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-black/20">
          <script src="https://fast.wistia.com/player.js" async></script>
          <script src="https://fast.wistia.com/embed/59ntht7a1b.js" async type="module"></script>
          <wistia-player media-id="59ntht7a1b" aspect="1.7777777777777777"></wistia-player>
        </div>
      </div>

      <div class="max-w-5xl mx-auto space-y-6 md:space-y-8">
        <p class="text-white/80 text-sm md:text-base lg:text-lg leading-loose">
          Setiap bisnis punya cerita dan perjalanannya masing-masing. Kami di CV Impost Media Indonesia percaya bahwa
          langkah pertama yang paling penting untuk membangun sebuah brand bukanlah langsung berbicara, melainkan
          mendengarkan.
        </p>
        <p class="text-white/80 text-sm md:text-base lg:text-lg leading-loose">
          Berpusat di Banjarbaru, Kalimantan Selatan, kami hadir sebagai All-in-One Integrated Digital Marketing Agency.
          Kami mendampingi Anda untuk merapikan makna bisnis dengan mencari tahu siapa Anda sebenarnya, untuk siapa Anda
          hadir, dan kesan apa yang ingin Anda tinggalkan.
        </p>
        <p
          class="text-white/80 text-sm md:text-base lg:text-lg leading-loose font-medium text-white italic border-l-4 border-impost-primary pl-6 py-2 bg-white/5">
          Semangat kami berakar pada satu keyakinan fundamental: Insight to Impact.
        </p>
        <p class="text-white/80 text-sm md:text-base lg:text-lg leading-loose">
          Kami mendedikasikan diri untuk menjadi rekan kerja yang mengedepankan transparansi. Sebagai bukti komitmen
          terhadap pertumbuhan omzet Anda, kami memberikan jaminan uang kembali (money-back guarantee) pada layanan
          kampanye kami.
        </p>
      </div>
    </div>

    <section class="relative w-full py-20 md:py-32 bg-[#0a0a0a] overflow-hidden">
      <div class="absolute inset-0 z-0 opacity-40 bg-center bg-cover"
        style="background-image: url('{{ asset('img/pages/brand_history.webp') }}');"></div>
      <div class="absolute inset-0 z-10 bg-gradient-to-b from-[#0a0a0a] via-[#0a0a0a]/90 to-[#0a0a0a]"></div>

      <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-16">
          <h2 class="text-2xl md:text-4xl lg:text-5xl text-white font-bold">Brand History</h2>
          <p class="mt-4 text-white/60 text-sm md:text-base lg:text-lg max-w-2xl leading-relaxed">
            Sebuah perjalanan dari menetapkan arah hingga menciptakan dampak nyata.
          </p>
        </div>

        <div class="w-full overflow-x-auto hide-scrollbar mb-12" id="timeline-scroll-area">
          <div class="relative min-w-[900px] flex items-center py-10" id="timeline-container">
            <div class="absolute top-1/2 left-0 right-0 h-px bg-white/10 -translate-y-1/2"></div>
            <div id="progress-line"
              class="absolute top-1/2 left-0 h-0.5 bg-impost-primary -translate-y-1/2 transition-all duration-700 ease-in-out">
            </div>

            <div class="relative z-10 flex justify-between w-full">
              @foreach (['One Direction', 'Built as a System', 'Consistent', 'Data-Driven', 'Expert Partner', 'Insight to Impact'] as $index => $label)
                <button class="timeline-btn flex flex-col items-center gap-6 w-40 group outline-none"
                  data-target="tab-{{ $index + 1 }}" onclick="changeTab(this, true)">
                  <span
                    class="text-[11px] sm:text-xs font-bold uppercase tracking-widest text-white/40 group-hover:text-white transition-all">{{ $label }}</span>
                  <div
                    class="indicator-dot w-3 h-3 rounded-full bg-white/20 ring-8 ring-transparent group-hover:ring-white/5 transition-all">
                  </div>
                </button>
              @endforeach
            </div>
          </div>
        </div>

        <div class="relative w-full max-w-4xl min-h-[260px] mx-auto">
          @php
            $histories = [
                [
                    'One Direction',
                    'Impost Media lahir dari satu arah yang jelas. Bukan untuk sekadar hadir di ruang digital, tetapi untuk membantu mengarahkan pertumbuhan bisnis dengan tujuan yang terstruktur dan terukur.',
                ],
                [
                    'Built as a System',
                    'Impost Media tidak dibangun sebagai individu. Ia dibangun sebagai sebuah sistem yang menghubungkan riset, analisis, dan eksekusi dalam satu alur kerja yang rapi.',
                ],
                [
                    'Consistent Positioning',
                    'Kami percaya brand yang kuat dibangun dari posisi yang konsisten. Positioning framework kami menjaga brand tetap berada pada jalurnya.',
                ],
                [
                    'Data-Driven Approach',
                    'Setiap keputusan berangkat dari data. Kami menggunakan data untuk membaca perilaku market dan menyempurnakannya menjadi strategi berkelanjutan.',
                ],
                [
                    'Your Expert Partner',
                    'Kami hadir sebagai partner ahli. Tim kami terdiri dari praktisi berpengalaman yang memahami bisnis, bukan sekadar pengisi konten.',
                ],
                [
                    'Insight to Impact',
                    'Semua bermuara pada dampak. Insight diolah menjadi strategi, strategi menjadi aksi, dan aksi diukur melalui pertumbuhan nyata.',
                ],
            ];
          @endphp

          @foreach ($histories as $index => $history)
            <div id="tab-{{ $index + 1 }}"
              class="tab-content {{ $index === 0 ? 'relative opacity-100' : 'absolute top-0 left-0 w-full opacity-0 pointer-events-none' }} transition-all duration-700 translate-y-4">
              <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-white mb-4">{{ $history[0] }}</h3>
              <p class="text-white/70 text-sm md:text-base lg:text-lg leading-loose">{{ $history[1] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
      <div class="grid md:grid-cols-2 gap-16 md:gap-24 max-w-5xl mx-auto">
        <div>
          <h2 class="text-lg lg:text-xl font-bold text-impost-primary uppercase tracking-tighter mb-6">Visi</h2>
          <p class="text-white/80 text-sm md:text-base lg:text-lg leading-relaxed">
            Menjadi mitra multiservice terpercaya di Indonesia melalui layanan bisnis, event, dan pengadaan yang
            profesional serta berorientasi pada hasil.
          </p>
        </div>
        <div>
          <h2 class="text-lg lg:text-xl font-bold text-impost-primary uppercase tracking-tighter mb-6">Misi</h2>
          <ul class="space-y-4 text-sm md:text-base lg:text-lg text-white/80 list-disc pl-5">
            <li>Layanan digital marketing berbasis data untuk pertumbuhan brand dan konversi nyata.</li>
            <li>Solusi event organizer dan produksi musik profesional untuk kebutuhan klien.</li>
            <li>Pengadaan barang dan jasa dengan kualitas terjamin dan tepat guna untuk instansi.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
