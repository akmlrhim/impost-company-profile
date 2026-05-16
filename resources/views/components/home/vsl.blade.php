<section class="py-16 sm:py-20 lg:py-24 im-section-alt" id="vsl">
  <div class="max-w-5xl mx-auto px-4 sm:px-6">

    {{-- Section header --}}
    <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
	<p class="text-impost-primary uppercase tracking-[0.15em] mb-3">Video Presentasi</p>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Lihat Bagaimana Kami Membantu
        <span class="text-impost-primary"> Bisnis Bertumbuh Terukur</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white">
        Khusus untuk business owner yang ingin scale up omzet secara serius dan berkelanjutan.
      </p>
    </div>

    {{-- Video container — DESIGN.md card-feature-photo: rounded.xxxl, no border --}}
    <div class="relative w-full overflow-hidden rounded-[2rem] aspect-video shadow-[0_40px_100px_rgba(0,0,0,0.7)]">
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

    {{-- CTA below video --}}
    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="{{ route('vsl-form') }}" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-8 py-3.5 bg-[#d4ac3c] text-[#040404] hover:bg-[#d09738] transition-colors duration-150 cursor-pointer whitespace-nowrap w-full sm:w-auto">
        Konsultasi Sekarang
      </a>
    </div>

  </div>
</section>
