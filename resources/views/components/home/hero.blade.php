<section id="home" class="relative min-h-[75vh] md:min-h-screen flex items-center overflow-hidden">

  <!-- Background Image -->
  <div class="absolute inset-0 z-0 bg-zinc-900 animate-pulse" id="hero-skeleton"></div>
  <div class="absolute inset-0 z-0 opacity-0 transition-opacity duration-700" id="hero-bg">
    <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Background" loading="lazy" decoding="async"
      class="w-full h-full object-cover object-center" id="hero-img">
    <div class="absolute inset-0 bg-black/60"></div>
  </div>

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
          setTimeout(reveal, 1000);
        }
      }
    });
  </script>


  <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 w-full py-16 md:py-0">
    <div class="text-center max-w-6xl mx-auto space-y-4 sm:space-y-6 md:space-y-8">

      <h1 class="font-medium text-xl sm:text-3xl lg:text-4xl xl:text-5xl">
        <span class="inline-block py-1.5 sm:py-2 text-impost-primary font-header leading-snug">
          Naikkan Omzet Bisnis Anda 2–3x dalam 90 Hari dengan Digital Marketing
        </span>
      </h1>

      <p class="text-xs sm:text-sm md:text-base text-white max-w-4xl mx-auto leading-relaxed">
        Bukan sekadar konten atau iklan, tapi sistem pertumbuhan terukur yang bisa diaudit dan dipertanggungjawabkan.
      </p>

      <div class="pt-2 sm:pt-4 flex justify-center">
        <button onclick="window.location.href='{{ route('vsl-form') }}'"
          class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:w-auto px-5 sm:px-8 py-2.5 sm:py-4 bg-impost-primary hover:bg-impost-secondary text-black text-sm sm:text-base md:text-lg font-bold rounded-xl cursor-pointer whitespace-nowrap transition-colors duration-300">
          Konsultasi Sekarang
        </button>
      </div>

    </div>
  </div>

</section>
