@props(['article'])

<article
  class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden flex flex-col h-full group transition-transform duration-300 hover:shadow-xl">

  <div class="h-48 overflow-hidden relative">
    <img src="{{ $article->cover_path ? asset('storage/' . $article->cover_path) : asset('img/article_default.webp') }}"
      class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy"
      decoding="async">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/0 transition-all duration-300"></div>
  </div>

  <div class="p-6 flex flex-col flex-1">
    <div class="text-xs text-gray-500 mb-2">
      {{ $article->created_at->translatedFormat('d F Y') }}
      · {{ $article->created_at->diffForHumans() }}
    </div>

    <h3 class="text-lg font-semibold text-gray-800 mb-2">
      {{ $article->title }}
    </h3>

    <p class="text-sm text-gray-600 line-clamp-3 mb-4">
      {{ Str::limit(strip_tags($article->content), 120) }}
    </p>

    <a href="{{ route('article.detail', $article) }}"
      class="mt-auto inline-flex justify-center text-sm font-semibold bg-impost-third text-white rounded-md px-4 py-2 hover:bg-impost-fourth transition">
      Baca Selengkapnya
    </a>
  </div>
</article>
