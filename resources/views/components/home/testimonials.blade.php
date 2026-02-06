@php
  $initialCount = 6;
@endphp

<section class="py-20 bg-impost-fifth relative" id="testimonials">
  <div class="max-w-7xl mx-auto px-5 sm:px-6 relative z-10">

    <div class="text-center max-w-3xl mx-auto mb-16">
      <h2 class="text-3xl md:text-5xl font-medium font-header leading-tight text-white mb-3">
        Apa Kata <span class="text-impost-primary">Mereka?</span>
      </h2>
      <p class="text-gray-200 text-md font-light">
        Kepuasan klien adalah bukti nyata dari dedikasi kami.
      </p>
    </div>

    @if (isset($testimonials) && $testimonials->isNotEmpty())
      <div class="relative">
        <div id="testimonial-masonry"
          class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6 transition-all duration-700">
          @foreach ($testimonials as $index => $t)
            <div
              class="testimonial-item break-inside-avoid bg-black/40 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-impost-primary/50 transition-all duration-300 shadow-xl relative group 
                            {{ $index >= $initialCount ? 'hidden more-testimonials opacity-0 translate-y-4' : '' }}">

              <div class="flex items-center gap-3 mb-5">
                <div
                  class="w-12 h-12 rounded-full bg-impost-fourth flex items-center justify-center text-white font-bold text-lg backdrop-blur-sm">
                  {{ substr($t->name, 0, 1) }}
                </div>
                <div class="leading-tight">
                  <h4 class="text-white font-bold text-sm">{{ $t->name }}</h4>
                  <span class="text-xs text-gray-400 mt-1 block">{{ $t->company_name }}</span>
                </div>
              </div>

              <div class="text-gray-200 text-sm leading-relaxed mb-5 font-light italic">
                "{!! $t->content !!}"
              </div>

              @if ($t->media_path)
                <div class="relative w-full rounded-xl overflow-hidden border border-white/10 bg-black/50">
                  @if ($t->media_type === 'video')
                    <video controls preload="metadata" playsinline class="w-full h-auto max-h-60 object-cover">
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
            class="absolute bottom-0 left-0 w-full h-80 bg-gradient-to-t from-[#040404] via-[#040404]/90 to-transparent z-20 pointer-events-none transition-opacity duration-500">
          </div>
        @endif
      </div>

      @if ($testimonials->count() > $initialCount)
        <div class="mt-12 text-center relative z-30" id="load-more-testimonials-container">
          <button type="button" id="btn-toggle-testimonials"
            class="group inline-flex items-center gap-4 px-6 py-2.5 bg-white/[0.05] hover:bg-white backdrop-blur-md text-white hover:text-black border border-white/10 rounded-full transition-all duration-300 shadow-2xl">

            <div class="flex -space-x-2 items-center">
              <div
                class="w-7 h-7 rounded-full bg-impost-primary text-black font-bold flex items-center justify-center overflow-hidden">
                <span class="text-[8px]">{{ count($testimonials) }}</span>
              </div>
            </div>
            <span id="btn-text" class="text-sm font-semibold tracking-tight">Eksplor Lebih Banyak</span>

            <div class="bg-white/10 p-1 rounded-full group-hover:bg-black/10 transition-colors">
              <svg id="btn-icon" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </button>
        </div>
      @endif
    @else
      <div
        class="max-w-2xl mx-auto text-center py-20 px-6 border border-white/10 rounded-3xl bg-black/20 backdrop-blur-md">
        <h3 class="text-xl font-bold text-white mb-2">Belum Ada Testimoni</h3>
        <p class="text-gray-400">Pendapat klien kami akan muncul segera.</p>
      </div>
    @endif
  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleBtn = document.getElementById('btn-toggle-testimonials');
      const btnText = document.getElementById('btn-text');
      const btnIcon = document.getElementById('btn-icon');
      const fadeOverlay = document.getElementById('fade-overlay');
      const moreItems = document.querySelectorAll('.more-testimonials');

      let isExpanded = false;

      if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
          isExpanded = !isExpanded;

          if (isExpanded) {
            moreItems.forEach((item, index) => {
              item.classList.remove('hidden');
              setTimeout(() => {
                item.classList.remove('opacity-0', 'translate-y-4');
                item.classList.add('opacity-100', 'translate-y-0');
              }, index * 50);
            });

            btnText.textContent = 'Sembunyikan';
            btnIcon.style.transform = 'rotate(180deg)';
            if (fadeOverlay) fadeOverlay.style.opacity = '0';
          } else {
            moreItems.forEach((item) => {
              item.classList.add('opacity-0', 'translate-y-4');
              setTimeout(() => item.classList.add('hidden'), 300);
            });

            btnText.textContent = 'Eksplor Lebih Banyak';
            btnIcon.style.transform = 'rotate(0deg)';
            if (fadeOverlay) fadeOverlay.style.opacity = '1';

            document.getElementById('testimonials').scrollIntoView({
              behavior: 'smooth'
            });
          }
        });
      }
    });
  </script>
@endpush
