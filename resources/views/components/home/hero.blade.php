<section id="home"
  class="relative min-h-[85vh] sm:min-h-[95vh] pt-24 sm:pt-36 md:pt-40 pb-16 sm:pb-16 flex items-center overflow-hidden">

  <div class="absolute inset-0 overflow-hidden hidden lg:block">
    <iframe
      class="absolute top-1/2 left-1/2 w-[150vh] h-[56vw] min-w-full min-h-full -translate-x-1/2 -translate-y-1/2 scale-100"
      id="yt-bg" frameborder="0" allow="autoplay; fullscreen" allowfullscreen
      referrerpolicy="strict-origin-when-cross-origin">
    </iframe>
  </div>

  <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Hero" fetchpriority="high" decoding="async"
    class="absolute inset-0 w-full h-full object-cover object-center lg:hidden">

  <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/90"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full flex flex-col items-center">

    <h1
      class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold leading-snug sm:leading-tight tracking-tight mb-4 sm:mb-6 md:mb-8 bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent max-w-4xl">
      Your Expert Partner in Digital, Event, and Business Solutions
    </h1>

    <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-lg md:max-w-2xl leading-relaxed px-2">
      Kami menyediakan solusi digital inovatif untuk membantu bisnis anda tumbuh lebih cepat di era modern. Mulai
      transformasi anda hari ini.
    </p>

  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const encoded = @json($comproUrl);
      document.getElementById('yt-bg').src = atob(encoded);
    })
  </script>
@endpush
