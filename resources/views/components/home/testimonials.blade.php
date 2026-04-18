@php
  $initialCount = 6;
@endphp

<section class="py-14 sm:py-20 bg-impost-fifth relative" id="testimonials">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16">
      <h2 class="text-2xl sm:text-3xl md:text-5xl font-medium font-header leading-tight text-white mb-2 sm:mb-3">
        Apa Kata <span class="text-impost-primary">Mereka?</span>
      </h2>
      <p class="text-xs sm:text-sm md:text-base text-gray-200 font-light">
        Kepuasan klien adalah bukti nyata dari dedikasi kami.
      </p>
    </div>

    @if (isset($testimonials) && $testimonials->isNotEmpty())
      <div class="relative">
        <div class="columns-1 md:columns-2 lg:columns-3 gap-5 sm:gap-6 space-y-5 sm:space-y-6">
          @foreach ($testimonials as $index => $t)
            <div
              class="testimonial-item break-inside-avoid bg-black/40 border border-white/10 rounded-2xl p-4 sm:p-6 hover:border-impost-primary/50 transition-all duration-300 shadow-xl relative group
              {{ $index >= $initialCount ? 'hidden more-testimonials opacity-0 translate-y-4' : '' }}">

              <div class="flex items-center gap-2.5 sm:gap-3 mb-4 sm:mb-5">
                <div
                  class="w-9 h-9 sm:w-12 sm:h-12 rounded-full bg-impost-fourth flex items-center justify-center text-white font-bold text-sm sm:text-lg flex-shrink-0">
                  {{ substr($t->name, 0, 1) }}
                </div>
                <div class="leading-tight">
                  <h4 class="text-white font-bold text-xs sm:text-sm">{{ $t->name }}</h4>
                  <span class="text-[10px] sm:text-xs text-gray-400 mt-0.5 block">{{ $t->company_name }}</span>
                </div>
              </div>

              <div class="text-gray-200 text-xs sm:text-sm leading-relaxed mb-4 sm:mb-5 font-light italic">
                "{!! $t->content !!}"
              </div>

              @if ($t->media_path)
                <div class="relative w-full rounded-xl overflow-hidden border border-white/10 bg-black/50">
                  @if ($t->media_type === 'video')
                    <video controls preload="none" playsinline class="w-full h-auto max-h-52 sm:max-h-60 object-cover">
                      <source src="{{ asset('storage/' . $t->media_path) }}" type="video/mp4">
                    </video>
                  @else
                    <img src="{{ asset('storage/' . $t->media_path) }}" alt="Testimoni" loading="lazy"
                      class="w-full h-auto object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                  @endif
                </div>
              @endif

            </div>
          @endforeach
        </div>

        @if ($testimonials->count() > $initialCount)
          <div id="fade-overlay"
            class="absolute bottom-0 left-0 w-full h-64 sm:h-80 bg-gradient-to-t from-[#040404] via-[#040404]/90 to-transparent z-20 pointer-events-none transition-opacity duration-500">
          </div>
        @endif
      </div>

      @if ($testimonials->count() > $initialCount)
        <div class="mt-8 sm:mt-12 text-center relative z-30">
          <button type="button" id="btn-toggle-testimonials"
            class="group inline-flex items-center gap-3 sm:gap-4 px-5 sm:px-6 py-2 sm:py-2.5 bg-white/[0.05] hover:bg-white text-white hover:text-black border border-white/10 rounded-full transition-all duration-300 shadow-2xl">
            <div
              class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-impost-primary text-black font-bold flex items-center justify-center">
              <span class="text-[8px]">{{ count($testimonials) }}</span>
            </div>
            <span id="btn-text" class="text-xs sm:text-sm font-semibold tracking-tight">Eksplor Lebih
              Banyak</span>
            <div class="bg-white/10 p-1 rounded-full group-hover:bg-black/10 transition-colors">
              <svg id="btn-icon" class="w-3.5 h-3.5 sm:w-4 sm:h-4 transition-transform duration-300" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
        </div>
      @endif
    @else
      <div
        class="w-full flex items-center justify-center py-12 sm:py-16 border border-white/10 rounded-3xl bg-black/20 mt-6 sm:mt-10">
        <x-empty-card item="Testimoni" />
      </div>
    @endif

  </div>
</section>

@push('scripts')
  <script data-cfasync="false">
    document.addEventListener('DOMContentLoaded', function() {
      const toggleBtn = document.getElementById('btn-toggle-testimonials');
      if (!toggleBtn) return;

      const btnText = document.getElementById('btn-text');
      const btnIcon = document.getElementById('btn-icon');
      const fadeOverlay = document.getElementById('fade-overlay');
      const moreItems = document.querySelectorAll('.more-testimonials');

      let isExpanded = false;

      toggleBtn.addEventListener('click', function() {
        isExpanded = !isExpanded;

        if (isExpanded) {
          moreItems.forEach((item, i) => {
            item.classList.remove('hidden');
            requestAnimationFrame(() => setTimeout(() => {
              item.classList.remove('opacity-0', 'translate-y-4');
              item.classList.add('opacity-100', 'translate-y-0');
            }, i * 50));
          });
          btnText.textContent = 'Sembunyikan';
          btnIcon.style.transform = 'rotate(180deg)';
          if (fadeOverlay) fadeOverlay.style.opacity = '0';
        } else {
          moreItems.forEach(item => {
            item.classList.add('opacity-0', 'translate-y-4');
            setTimeout(() => item.classList.add('hidden'), 300);
          });
          btnText.textContent = 'Eksplor Lebih Banyak';
          btnIcon.style.transform = 'rotate(0deg)';
          if (fadeOverlay) fadeOverlay.style.opacity = '1';
          document.getElementById('testimonials')?.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
@endpush
