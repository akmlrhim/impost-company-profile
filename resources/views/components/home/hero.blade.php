<section id="home" class="relative min-h-screen flex flex-col overflow-hidden">

  <div class="absolute inset-0 z-0 bg-zinc-900 animate-pulse" id="hero-skeleton"></div>
  <div class="absolute inset-0 z-0 opacity-0 transition-opacity duration-700" id="hero-bg">
    <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media" loading="eager" decoding="async"
      class="w-full h-full object-cover object-center" id="hero-img">
    <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/55 to-black/30"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-impost-fifth via-transparent to-transparent"></div>
  </div>

  <div class="relative z-10 flex-1 flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-32 md:py-40 lg:py-0">

      <div class="max-w-3xl space-y-6 sm:space-y-8">

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white">
          Naikkan Omzet <br class="hidden sm:block">
          Bisnis Anda<br>
          <span class="text-impost-primary">2–3× dalam 90 Hari</span>
        </h1>

        <p class="text-lg font-medium leading-relaxed text-white max-w-xl">
          Bukan sekadar konten atau iklan, melainkan sistem pertumbuhan terukur yang bisa diaudit dan
          dipertanggungjawabkan secara data.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 pt-2">
          <a href="{{ route('vsl-form') }}" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5 bg-[#d4ac3c] text-[#040404] hover:bg-[#d09738] transition-colors duration-150 cursor-pointer whitespace-nowrap">
            Konsultasi Gratis
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
          <a href="#study-cases" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-7 py-3 text-white border-2 border-white/25 hover:border-white/60 transition-colors duration-150 cursor-pointer whitespace-nowrap">
            Lihat Hasil Klien
          </a>
        </div>

      </div>
    </div>
  </div>

</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const img = document.getElementById('hero-img');
      const skeleton = document.getElementById('hero-skeleton');
      const bg = document.getElementById('hero-bg');

      function reveal() {
        if (skeleton) skeleton.style.display = 'none';
        if (bg) bg.style.opacity = '1';
      }
      if (!img || !bg) return;
      if (img.complete) reveal();
      else {
        img.addEventListener('load', reveal, {
          once: true
        });
        img.addEventListener('error', reveal, {
          once: true
        });
        setTimeout(reveal, 1500);
      }
    });
  </script>
@endpush
