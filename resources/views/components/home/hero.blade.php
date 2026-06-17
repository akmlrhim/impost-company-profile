<section id="home" class="relative flex flex-col overflow-hidden pt-14 md:pt-28 min-h-[calc(100svh-0px)] sm:min-h-screen">

  {{-- Background image --}}
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-zinc-900 animate-pulse" id="hero-skeleton"></div>
    <div class="absolute inset-0 opacity-0 transition-opacity duration-700" id="hero-bg">
      <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media" loading="eager" decoding="async"
        class="w-full h-full object-cover object-center" id="hero-img">
      <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/50 to-impost-fifth"></div>
    </div>
  </div>

  {{-- Content --}}
  <div class="relative z-10 flex-1 flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 sm:py-20 md:py-28 lg:py-36">

      <div class="text-center max-w-4xl mx-auto">

        <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-[4.25rem] font-bold leading-[1.1] text-white mb-6">
          Naikkan Omzet Bisnis Anda<br>
          <span class="text-impost-primary">2–3× dalam 90 Hari</span>
        </h1>

        <p class="text-base sm:text-lg font-medium leading-relaxed text-white max-w-2xl mx-auto mb-8">
          Bukan sekadar konten atau iklan, melainkan sistem pertumbuhan terukur yang bisa diaudit dan
          dipertanggungjawabkan secara data.
        </p>

        {{-- CTAs --}}
        <div class="flex flex-col sm:flex-row gap-3 justify-center mb-6">
          <a href="{{ route('vsl-form') }}"
            class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5
              bg-impost-primary text-[#040404] hover:bg-impost-secondary transition-colors duration-150 whitespace-nowrap">
            Konsultasi Gratis
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
          <a href="#study-cases"
            class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-7 py-3.5
              text-white border-2 border-white/30 hover:border-white/70 transition-colors duration-150 whitespace-nowrap">
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
