<section class="max-w-7xl mx-auto px-4 py-6" id="blog">

  <div class="mb-6 sm:mb-10 text-center">
    <h2
      class="text-xl sm:text-2xl lg:text-4xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-2">
      Artikel
    </h2>
    <p class="text-white text-xs sm:text-sm lg:text-base max-w-2xl mx-auto">
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
      <div class="px-6">
        <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth gap-4">
          @foreach ($articles as $article)
            <div class="w-full shrink-0 snap-center">
              <x-article-card :article="$article" />
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center gap-2 mt-4">
        <template x-for="i in total" :key="i">
          <button @click="goTo(i - 1)" class="h-2 rounded-full transition-all"
            :class="active === i - 1 ? 'w-6 bg-impost-primary' : 'w-2 bg-white/40'">
          </button>
        </template>
      </div>
    </div>

    {{-- desktop  --}}
    <div class="hidden sm:grid grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($articles as $article)
        <x-article-card :article="$article" />
      @endforeach
    </div>

    <div class="text-center mt-10">
      <a href="{{ route('article.all') }}"
        class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 lg:px-6 lg:py-3 text-[11px] sm:text-xs md:text-sm font-bold bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth text-white rounded-md hover:opacity-90 transition-opacity">
        Lihat Semua Artikel
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
          this.$refs.slider.scrollTo({
            left: index * this.$refs.slider.clientWidth,
            behavior: 'smooth'
          })
        }
      }
    }
  </script>
@endpush
