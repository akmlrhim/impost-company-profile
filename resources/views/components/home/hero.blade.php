<section id="home" class="relative min-h-[80vh] md:min-h-screen flex items-center overflow-hidden">

  {{-- Background Image with Skeleton --}}
  <div class="absolute inset-0 z-0 bg-zinc-900 animate-pulse" id="hero-skeleton"></div>
  <div class="absolute inset-0 z-0 opacity-0 transition-opacity duration-700" id="hero-bg">
    <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Background" loading="eager" decoding="async"
      class="w-full h-full object-cover object-center" id="hero-img">
    <div class="absolute inset-0 bg-black/65"></div>
  </div>

  {{-- Bottom fade to black --}}
  <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#040404] to-transparent z-[1]"></div>

  {{-- Content --}}
  <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 w-full py-20 md:py-0">
    <div class="max-w-4xl mx-auto text-center space-y-5 sm:space-y-7">

      {{-- Badge --}}
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-white/10 bg-white/5">
        <span class="text-white/70 text-xs sm:text-sm font-medium">Pionir Digital Marketing di Kalimantan</span>
      </div>

      {{-- Headline --}}
      <h1 class="text-2xl sm:text-4xl lg:text-5xl xl:text-6xl font-header leading-[1.15] text-white">
        Naikkan Omzet Bisnis Anda
        <br class="hidden sm:block">
        <span class="text-impost-primary">2–3x dalam 90 Hari</span>
      </h1>

      {{-- Subtitle --}}
      <p class="text-xs sm:text-sm md:text-base lg:text-lg text-white/60 max-w-2xl mx-auto leading-relaxed">
        Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
      </p>

      {{-- CTA --}}
      <div class="pt-2 sm:pt-4 flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
        <a href="{{ route('vsl-form') }}"
          class="w-full sm:w-auto px-8 py-3 sm:py-3.5 bg-impost-primary hover:bg-impost-secondary text-black text-sm sm:text-base font-bold rounded-xl transition-colors duration-300 text-center">
          Konsultasi Sekarang
        </a>
        <a href="#study-cases"
          class="w-full sm:w-auto px-8 py-3 sm:py-3.5 border border-white/15 hover:border-white/30 text-white text-sm sm:text-base font-medium rounded-xl transition-colors duration-300 text-center">
          Lihat Hasil Kami
        </a>
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
      if (img && skeleton && bg) {
        function reveal() {
          skeleton.style.display = 'none';
          bg.style.opacity = '1';
        }
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
      }
    });
  </script>
@endpush
