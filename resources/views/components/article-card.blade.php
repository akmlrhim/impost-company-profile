@props(['article'])

<article
  class="bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth rounded-lg border-2 border-impost-fourth overflow-hidden flex flex-col h-full">

  <div class="h-48 sm:h-40 overflow-hidden">
    <img src="{{ $article->cover_path ? asset('storage/' . $article->cover_path) : asset('img/article_default.webp') }}"
      class="w-full h-full object-cover" loading="lazy" decoding="async">
  </div>

  <div class="p-4 flex flex-col flex-1">
    <div class="text-[11px] sm:text-xs text-white mb-2">
      {{ $article->created_at->translatedFormat('d F Y') }}
      · {{ $article->created_at->diffForHumans() }}
    </div>

    <h3 class="text-sm sm:text-base font-semibold text-white mb-2">
      {{ $article->title }}
    </h3>

    <p class="text-xs sm:text-sm text-white line-clamp-2 mb-4">
      {{ Str::limit(strip_tags($article->content), 100) }}
    </p>

    <a href="{{ route('article.detail', $article) }}"
      class="mt-auto inline-flex justify-center text-xs sm:text-sm font-semibold bg-white text-impost-third rounded-md px-4 py-2 hover:bg-impost-third hover:text-white transition">
      Baca Selengkapnya
    </a>
  </div>
</article>
