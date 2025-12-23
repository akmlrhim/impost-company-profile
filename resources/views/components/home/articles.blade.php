<section class="max-w-7xl mx-auto px-4 py-16" id="blog">

  <div class="text-center mb-12">
    <h2
      class="text-xl sm:text-2xl lg:text-4xl font-bold pb-1 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-3">
      Artikel
    </h2>
    <p class="text-white text-xs sm:text-sm lg:text-base max-w-2xl mx-auto">
      Temukan artikel, tips, dan panduan terbaru untuk membantu anda berkembang
    </p>
  </div>

  {{-- mobile --}}
  <div x-data="{
      active: 0,
      total: {{ $articles->count() }}
  }" class="md:hidden">
    <div x-ref="slider" class="flex overflow-x-auto snap-x snap-mandatory no-scrollbar gap-3 pb-1 scroll-smooth"
      @scroll.debounce.100ms="
				active = Math.round($el.scrollLeft / $el.offsetWidth)
			">
      @foreach ($articles as $article)
        <div class="w-full shrink-0 snap-center px-12">
          <article
            class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-lg border-2 border-impost-fourth overflow-hidden">
            <div class="relative h-32">
              @if ($article->cover_path)
                <img src="{{ asset('storage/' . $article->cover_path) }}" class="w-full h-full object-cover">
              @else
                <img src="{{ asset('img/article_default.webp') }}" alt="default" class="w-full h-full object-cover">
              @endif
            </div>

            <div class="p-4 flex flex-col flex-1">
              <div class="text-[11px] text-white mb-2">
                {{ $article->created_at->translatedFormat('d F Y') }}
                · {{ $article->created_at->diffForHumans() }}
              </div>

              <h3 class="text-sm font-semibold text-white mb-2">
                {{ $article->title }}
              </h3>

              <p class="text-xs text-white line-clamp-2 mb-4">
                {{ Str::limit(strip_tags($article->content), 90) }}
              </p>

              <a href="{{ route('article.detail', $article) }}"
                class="mt-auto inline-block text-xs font-medium bg-white text-impost-third rounded-md px-3 py-2 text-center">
                Baca Selengkapnya
              </a>
            </div>
          </article>
        </div>
      @endforeach
    </div>

    {{-- indicator --}}
    <div class="flex justify-center gap-2 mt-4">
      <template x-for="i in total" :key="i">
        <button
          @click="
            active = i - 1;
            $refs.slider.scrollTo({
              left: (i - 1) * $refs.slider.offsetWidth,
              behavior: 'smooth'
            });
          "
          class="h-2 rounded-full transition-all"
          :class="active === i - 1 ? 'w-6 bg-impost-primary' : 'w-2 bg-white/40'"></button>
      </template>
    </div>
  </div>

  {{-- desktop --}}
  <div class="hidden md:grid md:grid-cols-3 gap-6">
    @foreach ($articles as $article)
      <article
        class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-lg border-2 border-impost-fourth overflow-hidden flex flex-col">
        <div class="relative h-48">
          @if ($article->cover_path)
            <img src="{{ asset('storage/' . $article->cover_path) }}" class="w-full h-full object-cover">
          @else
            <img src="{{ asset('img/article_default.webp') }}" alt="default" class="w-full h-full object-cover">
          @endif
        </div>

        <div class="p-4 flex flex-col flex-1">
          <div class="flex items-center gap-2 text-xs text-white mb-3">
            <span class="font-bold">
              {{ $article->created_at->translatedFormat('d F Y') }}
            </span>
            <span>·</span>
            <span>{{ $article->created_at->diffForHumans() }}</span>
          </div>

          <h3 class="text-base font-semibold text-white mb-2">
            {{ $article->title }}
          </h3>

          <p class="text-sm text-white line-clamp-2 mb-4">
            {{ Str::limit(strip_tags($article->content), 100) }}
          </p>

          <a href="{{ route('article.detail', $article) }}"
            class="mt-auto inline-flex items-center justify-center text-sm font-medium bg-white text-impost-third rounded-md px-4 py-2 hover:bg-impost-third hover:text-white">
            Baca Selengkapnya
          </a>
        </div>
      </article>
    @endforeach
  </div>

  <div class="text-center mt-6">
    <a href="{{ route('article.all') }}"
      class="inline-flex items-center text-xs sm:text-sm font-bold gap-2 px-4 sm:px-6 py-2.5 bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth text-white rounded-md">
      Lihat Semua Artikel
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </a>
  </div>

</section>
