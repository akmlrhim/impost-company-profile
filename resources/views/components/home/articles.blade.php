<section class="max-w-7xl mx-auto px-4 py-16" id="blog">

  <div class="text-center mb-12">
    <h2
      class="text-xl sm:text-2xl lg:text-4xl font-bold pb-1 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent mb-3">
      Artikel</h2>
    <p class="text-white text-xs sm:text-sm lg:text-sm max-w-2xl mx-auto">
      Temukan artikel, tips, dan panduan terbaru untuk membantu Anda berkembang
    </p>
  </div>

  <div class="grid md:grid-cols-3 gap-6">
    @foreach ($articles as $article)
      <article
        class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-lg border-2 border-impost-fourth overflow-hidden flex flex-col">
        <div class="relative h-48">
          @if ($article->cover_path)
            <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
              class="w-full h-full object-cover">
          @else
            <div class="w-full h-full flex items-center justify-center">
              <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
          @endif
        </div>

        <div class="p-6 flex flex-col justify-between flex-1">
          <div>
            <div class="flex items-center gap-2 text-xs mb-3">
              <span class="text-white font-bold">{{ $article->created_at->translatedFormat('d F Y') }}</span>
              <div class="px-0.5 py-0.5 bg-white rounded-full"></div>
              <span class="text-white">{{ $article->created_at->diffForHumans() }}</span>
            </div>
            <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-white mb-2">{{ $article->title }}</h3>
            <p class="text-xs sm:text-sm lg:text-sm font-medium text-white mb-4 line-clamp-2">
              {{ Str::limit(strip_tags($article->content), 100, '...') }}
            </p>
          </div>

          <div class="flex items-center justify-between mt-auto">
            <a href="{{ route('article.detail', $article) }}"
              class="text-impost-third bg-white font-medium leading-5 rounded-md text-xs sm:text-sm px-3 sm:px-4 py-2 sm:py-2.5 hover:bg-impost-third/90 hover:text-white">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </article>
    @endforeach


  </div>

  <div class="text-center mt-12">
    <a href="#"
      class="inline-flex items-center text-xs sm:text-sm font-bold gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-linear-to-r from-impost-primary via-impost-third to-impost-fourth text-white rounded-md">
      Lihat Semua Artikel
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    </a>
  </div>

</section>
