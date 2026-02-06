@php
  $studyCases = \App\Models\StudyCase::select('slug', 'name', 'cover_path', 'category', 'result')->latest()->get();
@endphp

<section class="py-20 text-white overflow-hidden" id="study-cases">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="relative mb-12 flex items-center justify-center">

      <div class="max-w-3xl mx-auto text-center z-10 px-4">
        <h2 class="text-3xl md:text-5xl font-bold tracking-tight text-white mb-4 leading-tight">
          Hasil Nyata, <br class="hidden md:block" />
          <span class="text-impost-primary font-header italic font-normal">Bukan Janji Kosong.</span>
        </h2>
        <p class="text-white/80 text-sm md:text-base leading-relaxed max-w-xl mx-auto">
          Bukti autentik dari strategi yang terukur untuk pertumbuhan bisnis Anda.
        </p>
      </div>

      @if ($studyCases->isNotEmpty())
        <div class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 gap-3 z-20">
          <button type="button"
            class="studycase-prev group flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 hover:bg-impost-primary hover:text-black hover:border-impost-primary transition-all duration-300">
            <svg class="w-5 h-5 transform group-hover:-translate-x-0.5 transition-transform" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button type="button"
            class="studycase-next group flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 hover:bg-impost-primary hover:text-black hover:border-impost-primary transition-all duration-300">
            <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      @endif

    </div>

    @if ($studyCases->isNotEmpty())
      <div class="studycase-slider relative w-full overflow-hidden">
        <div class="studycase-track flex h-full">
          @foreach ($studyCases as $case)
            <div class="studycase-slide flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-3 h-auto box-border">
              <a href="{{ route('detail-study-case', $case->slug) }}"
                class="group flex flex-col h-full border border-white/10 bg-white/5 hover:border-impost-primary/50 hover:bg-white/10 rounded-xl p-5 transition-all duration-300">
                <div class="relative w-full aspect-video mb-5 overflow-hidden rounded-lg bg-gray-900">
                  <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 z-10 transition-colors duration-500">
                  </div>
                  @if ($case->cover_path)
                    <img src="{{ asset('storage/' . $case->cover_path) }}" alt="{{ $case->name }}"
                      class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                  @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-800">
                      <span class="text-gray-600 text-xs">No Preview</span>
                    </div>
                  @endif
                </div>

                <div class="flex flex-col flex-1">
                  <div class="mb-3">
                    <span
                      class="inline-block px-2 py-1 bg-impost-primary/10 rounded text-[10px] font-bold tracking-widest uppercase text-impost-primary border border-impost-primary/20">
                      {{ $case->category ?? 'CASE STUDY' }}
                    </span>
                  </div>
                  <h3
                    class="text-lg font-bold text-white group-hover:text-impost-primary mb-3 leading-tight transition-colors">
                    {{ $case->name }}
                  </h3>
                  <div class="text-sm text-gray-400 leading-relaxed line-clamp-3 mb-5">
                    <div class="[&>ul]:list-disc [&>ul]:ml-4 [&>ol]:list-decimal [&>ol]:ml-4">
                      {!! strip_tags($case->result, '<ul><ol><li><p><br><strong><em>') !!}
                    </div>
                  </div>
                  <div class="mt-auto pt-4 border-t border-white/10">
                    <div
                      class="flex items-center text-sm font-medium text-white/60 group-hover:text-impost-primary transition-colors">
                      Lihat Detail
                      <svg class="w-3 h-3 ml-2 transform transition-transform group-hover:translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 8l4 4m0 0l-4 4m4-4H3" />
                      </svg>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex md:hidden justify-center gap-4 mt-8">
        <button type="button"
          class="studycase-prev p-3 rounded-full border border-white/10 text-white active:bg-white/10">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button type="button"
          class="studycase-next p-3 rounded-full border border-white/10 text-white active:bg-white/10">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    @else
      <div class="py-12 text-center border-t border-white/5">
        <p class="text-gray-500 text-sm">Belum ada studi kasus yang ditampilkan.</p>
      </div>
    @endif

    <div class="mt-10 text-center">
      <a href="{{ route('study-case') }}"
        class="inline-flex items-center text-xs font-bold uppercase text-white hover:text-impost-primary transition-colors tracking-wider border-b border-transparent hover:border-impost-primary pb-1">
        Lihat Semua Study Case
        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>
  </div>
</section>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const track = document.querySelector('.studycase-track');
      const slides = Array.from(document.querySelectorAll('.studycase-slide'));
      const prevBtns = document.querySelectorAll('.studycase-prev');
      const nextBtns = document.querySelectorAll('.studycase-next');

      if (!track || slides.length === 0) return;

      let currentIndex = 0;
      let slideWidth = slides[0].getBoundingClientRect().width;
      let isTransitioning = false;
      let autoPlayInterval;

      // Konfigurasi jumlah clone
      const cloneCount = 3;

      // Cloning Slide
      const firstClones = slides.slice(0, cloneCount).map(slide => slide.cloneNode(true));
      const lastClones = slides.slice(-cloneCount).map(slide => slide.cloneNode(true));

      firstClones.forEach(clone => track.appendChild(clone));
      lastClones.reverse().forEach(clone => track.insertBefore(clone, track.firstChild));

      // Reset currentIndex ke slide asli pertama
      currentIndex = cloneCount;

      function updateSlideWidth() {
        const tempSlide = document.querySelector('.studycase-slide');
        if (tempSlide) {
          slideWidth = tempSlide.getBoundingClientRect().width;
          updateTrackPosition(false);
        }
      }

      function updateTrackPosition(transition = true) {
        if (transition) {
          track.style.transition = 'transform 0.5s cubic-bezier(0.25, 1, 0.5, 1)';
        } else {
          track.style.transition = 'none';
        }
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
      }

      // Logic Infinite Loop saat Transisi Selesai
      track.addEventListener('transitionend', () => {
        isTransitioning = false;
        const totalRealSlides = slides.length;

        if (currentIndex >= totalRealSlides + cloneCount) {
          track.style.transition = 'none';
          currentIndex = cloneCount;
          updateTrackPosition(false);
        } else if (currentIndex < cloneCount) {
          track.style.transition = 'none';
          currentIndex = totalRealSlides + cloneCount - 1;
          updateTrackPosition(false);
        }
      });

      // Tombol Next
      function handleNext() {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex++;
        updateTrackPosition(true);
        resetAutoPlay();
      }

      // Tombol Prev
      function handlePrev() {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex--;
        updateTrackPosition(true);
        resetAutoPlay();
      }

      nextBtns.forEach(btn => btn.addEventListener('click', handleNext));
      prevBtns.forEach(btn => btn.addEventListener('click', handlePrev));

      // Autoplay
      function startAutoPlay() {
        autoPlayInterval = setInterval(handleNext, 4000);
      }

      function stopAutoPlay() {
        clearInterval(autoPlayInterval);
      }

      function resetAutoPlay() {
        stopAutoPlay();
        startAutoPlay();
      }

      window.addEventListener('resize', () => {
        updateSlideWidth();
      });

      track.addEventListener('mouseenter', stopAutoPlay);
      track.addEventListener('mouseleave', startAutoPlay);

      let touchStartX = 0;
      let touchEndX = 0;

      track.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoPlay();
      }, {
        passive: true
      });

      track.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchStartX - touchEndX > 50) handleNext();
        if (touchEndX - touchStartX > 50) handlePrev();
        startAutoPlay();
      });

      // Init
      updateSlideWidth();
      startAutoPlay();
    });
  </script>
@endpush
