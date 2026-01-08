<section class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 md:py-10" id="blog">

  <div class="mb-8 sm:mb-10 md:mb-12 text-center" data-aos="fade-up">
    <h2
      class="font-header pb-2 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-3 sm:mb-4">
      Artikel
    </h2>
    <p class="text-white text-sm sm:text-base md:text-lg max-w-2xl lg:max-w-3xl mx-auto leading-relaxed px-2">
      Temukan artikel, tips, dan panduan terbaru untuk membantu anda berkembang
    </p>
  </div>

  @if ($articles->count() === 0)
    <div class="flex justify-center">
      <x-empty-card item="artikel" />
    </div>
  @else
    {{-- mobile --}}
    <div x-data="blogSlider({{ $articles->count() }})" x-init="init()" class="block sm:hidden">
      <div class="relative">
        <div x-ref="slider"
          class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth gap-4 px-1 py-2">
          @foreach ($articles as $article)
            <div class="w-[calc(100%-2rem)] shrink-0 snap-center">
              <x-article-card :article="$article" />
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center gap-2 mt-6">
        <template x-for="i in total" :key="i">
          <button @click="goTo(i - 1)" class="h-2 rounded-full transition-all duration-300"
            :class="active === i - 1 ? 'w-8 bg-impost-primary' : 'w-2 bg-white/30'">
          </button>
        </template>
      </div>
    </div>

    {{-- desktop  --}}
    <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-7 lg:gap-8" data-aos="fade-up"
      data-aos-stagger="100">
      @foreach ($articles as $article)
        <div class="h-full" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
          <x-article-card :article="$article" />
        </div>
      @endforeach
    </div>

    <div class="text-center mt-10 sm:mt-12 md:mt-14" data-aos="fade-up">
      <a href="{{ route('article.all') }}"
        class="inline-flex items-center gap-2 px-5 py-2.5 bg-impost-fourth rounded-md text-white shadow-md text-md font-medium hover:scale-105 hover:bg-impost-secondary transition">
        Lihat Semua Artikel
        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  @endif
</section>

@push('scripts')
  <script>
    function blogSlider(totalItems) {
      return {
        active: 0,
        total: totalItems,
        observer: null,

        init: function() {
          const slider = this.$refs.slider
          const items = [...slider.children]

          this.observer = new IntersectionObserver(
            (entries) => {
              entries.forEach((entry) => {
                if (entry.isIntersecting) {
                  this.active = items.indexOf(entry.target)
                }
              })
            }, {
              root: slider,
              threshold: 0.6
            }
          )

          items.forEach((el) => this.observer.observe(el))
        },

        goTo: function(index) {
          const slider = this.$refs.slider
          const cardWidth = slider.querySelector('.snap-center').offsetWidth
          const gap = 16 // 4 * 4px (gap-4)
          slider.scrollTo({
            left: index * (cardWidth + gap),
            behavior: 'smooth'
          })
        }
      }
    }
  </script>
@endpush
