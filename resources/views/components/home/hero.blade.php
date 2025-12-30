<section id="home"
  class="relative sm:min-h-[95vh] pt-32 sm:pt-36 md:pt-40 pb-12 sm:pb-16 flex items-center overflow-hidden">

  <div class="absolute inset-0 overflow-hidden hidden lg:block">
    <iframe
      class="absolute top-1/2 left-1/2 w-[150vh] h-[56vw] min-w-full min-h-full -translate-x-1/2 -translate-y-1/2 scale-100"
      id="yt-bg" frameborder="0" allow="autoplay; fullscreen" allowfullscreen
      referrerpolicy="strict-origin-when-cross-origin">
    </iframe>
  </div>

  <img src="{{ asset('img/Front_Cover_IM.webp') }}" alt="Impost Media Hero" fetchpriority="high" decoding="async"
    class="absolute inset-0 w-full h-full object-cover object-top lg:hidden">

  <div class="absolute inset-0 bg-linear-to-b from-black/70 via-black/60 to-black/90"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 text-center w-full">
    <h1
      class="text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-snug sm:leading-tight tracking-tight mb-8 sm:mb-10 md:mb-12 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
      Your Expert Partner in Digital, Event, and Business Solutions
    </h1>

    <p class="text-md sm:text-lg md:text-lg text-gray-200 max-w-xl md:max-w-2xl mx-auto leading-relaxed">
      Kami menyediakan solusi digital inovatif untuk membantu bisnis anda tumbuh lebih cepat di era modern. Mulai
      transformasi anda hari ini.
    </p>
  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const encoded = @json($ytEncoded);
      document.getElementById('yt-bg').src = atob(encoded);
    })
  </script>
@endpush
