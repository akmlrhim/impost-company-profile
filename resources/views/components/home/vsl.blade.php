<section class="py-16 sm:py-20 lg:py-28 im-section-alt" id="vsl">
  <div class="max-w-5xl mx-auto px-4 sm:px-6">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Lihat Bagaimana Kami<br>
        Membantu <span class="text-impost-primary">Bisnis Bertumbuh</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white">
        Khusus untuk business owner yang ingin scale up omzet secara serius dan berkelanjutan.
      </p>
    </div>

    {{-- Video --}}
    <div
      class="relative w-full overflow-hidden rounded-2xl
      shadow-[0_32px_80px_rgba(0,0,0,0.6),0_0_0_1px_rgba(255,255,255,0.06)]">
      <script src="https://fast.wistia.com/player.js" async></script>
      <style>
        wistia-player[media-id='3rfaxyr3ia']:not(:defined) {
          background: center/contain no-repeat url('https://fast.wistia.com/embed/medias/3rfaxyr3ia/swatch');
          display: block;
          filter: blur(5px);
          padding-top: 56.25%;
        }
      </style>
      <wistia-player media-id="3rfaxyr3ia" aspect="1.7777777777777777"></wistia-player>
    </div>

    {{-- CTA --}}
    <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
      <div class="text-center sm:text-left">
        <p class="text-sm text-white mb-3 sm:mb-0">Siap membawa bisnis Anda ke level berikutnya?</p>
      </div>
      <a href="{{ route('vsl-form') }}"
        class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5
          bg-impost-primary text-[#040404] hover:bg-impost-secondary transition-colors duration-150
          whitespace-nowrap w-full sm:w-auto flex-shrink-0">
        Konsultasi Gratis Sekarang
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </a>
    </div>

  </div>
</section>
