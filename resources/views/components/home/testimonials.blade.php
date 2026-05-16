@php $initialCount = 6; @endphp

<section class="py-16 sm:py-20 lg:py-24 im-section-alt" id="testimonials">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
      <p class="text-xs font-bold text-impost-primary uppercase tracking-[0.15em] mb-3">Suara Klien</p>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
        Apa Kata <span class="text-impost-primary">Mereka?</span>
      </h2>
      <p class="text-base font-medium leading-relaxed text-white">
        Kepuasan klien adalah bukti nyata dari dedikasi dan sistem yang kami bangun.
      </p>
    </div>

    @if (isset($testimonials) && $testimonials->isNotEmpty())

      {{-- Masonry grid --}}
      <div class="relative">
        <div class="columns-1 md:columns-2 lg:columns-3 gap-4 sm:gap-5 space-y-4 sm:space-y-5">
          @foreach ($testimonials as $index => $t)
            <div
              class="break-inside-avoid bg-white/[0.04] border border-white/[0.08] rounded-2xl hover:border-white/[0.15] transition-colors duration-200 p-5 sm:p-6 transition-all duration-300 relative group
              {{ $index >= $initialCount ? 'hidden more-testimonials opacity-0 translate-y-4' : '' }}">

              {{-- Quote mark --}}
              <div class="text-impost-primary/20 text-5xl leading-none font-bold mb-2 select-none">"</div>

              {{-- Quote text --}}
              <div class="text-sm font-medium leading-relaxed text-white leading-relaxed mb-5 italic">
                {!! $t->content !!}
              </div>

              {{-- Media --}}
              @if ($t->media_path)
                <div class="w-full rounded-xl overflow-hidden border border-white/6 mb-5 bg-black/20">
                  @if ($t->media_type === 'video')
                    <video controls preload="none" playsinline class="w-full h-auto max-h-48 object-cover">
                      <source src="{{ asset('storage/' . $t->media_path) }}" type="video/mp4">
                    </video>
                  @else
                    <img src="{{ asset('storage/' . $t->media_path) }}" alt="Testimoni" loading="lazy"
                      class="w-full h-auto object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                  @endif
                </div>
              @endif

              {{-- Author --}}
              <div class="flex items-center gap-3 pt-4 border-t border-white/6">
                <div
                  class="w-9 h-9 rounded-full bg-impost-primary/15 border border-impost-primary/25 flex items-center justify-center font-bold text-impost-primary text-sm flex-shrink-0">
                  {{ strtoupper(substr($t->name, 0, 1)) }}
                </div>
                <div>
                  <p class="font-bold text-white text-sm leading-tight">{{ $t->name }}</p>
                  <p class="text-xs font-medium text-white/50 mt-0.5">{{ $t->company_name }}</p>
                </div>
              </div>

            </div>
          @endforeach
        </div>
      </div>

      {{-- Load more --}}
      @if ($testimonials->count() > $initialCount)
        <div class="mt-10 text-center relative z-30">
          <button type="button" id="btn-toggle-testimonials" class="inline-flex items-center justify-center gap-2 text-sm font-bold rounded-full px-4 py-2 bg-white/[0.06] text-white border border-white/10 hover:bg-white/10 transition-all duration-150 cursor-pointer whitespace-nowrap gap-3">
            <div
              class="w-6 h-6 rounded-full bg-impost-primary text-black text-xs font-bold flex items-center justify-center">
              {{ count($testimonials) }}
            </div>
            <span id="btn-text" class="text-sm font-bold">Eksplor Lebih Banyak</span>
            <svg id="btn-icon" class="w-3.5 h-3.5 transition-transform duration-300" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
        </div>
      @endif
    @else
      <div class="flex items-center justify-center py-20 border border-white/6 rounded-[2rem] bg-white/2">
        <x-empty-card item="Testimoni" />
      </div>
    @endif

  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const btn = document.getElementById('btn-toggle-testimonials');
      if (!btn) return;
      const btnText = document.getElementById('btn-text');
      const btnIcon = document.getElementById('btn-icon');
      const overlay = document.getElementById('fade-overlay');
      const moreItems = document.querySelectorAll('.more-testimonials');
      let expanded = false;

      btn.addEventListener('click', () => {
        expanded = !expanded;
        if (expanded) {
          moreItems.forEach((item, i) => {
            item.classList.remove('hidden');
            requestAnimationFrame(() => setTimeout(() => {
              item.classList.remove('opacity-0', 'translate-y-4');
              item.classList.add('opacity-100', 'translate-y-0');
            }, i * 50));
          });
          if (btnText) btnText.textContent = 'Sembunyikan';
          if (btnIcon) btnIcon.style.transform = 'rotate(180deg)';
          if (overlay) overlay.style.opacity = '0';
        } else {
          moreItems.forEach(item => {
            item.classList.add('opacity-0', 'translate-y-4');
            setTimeout(() => item.classList.add('hidden'), 300);
          });
          if (btnText) btnText.textContent = 'Eksplor Lebih Banyak';
          if (btnIcon) btnIcon.style.transform = 'rotate(0deg)';
          if (overlay) overlay.style.opacity = '1';
          document.getElementById('testimonials')?.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
@endpush
