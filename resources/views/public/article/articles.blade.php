@extends('layouts.public')

@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
    <div class="mx-auto max-w-7xl">

      <div class="mb-8 md:mb-12 text-center px-6">
        <h1
          class="text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          {{ $title }}
        </h1>
        <p class="text-white text-sm md:text-base max-w-2xl mx-auto">
          Jelajahi koleksi artikel kami tentang berbagai topik menarik dari kami
        </p>
      </div>

      <div class="flex flex-wrap justify-center gap-2 mb-10 px-4">

        <a href="{{ route('article.all') }}"
          class="px-4 py-2 rounded-full text-xs md:text-sm font-bold border transition
        {{ empty($activeCategory)
            ? 'bg-impost-primary text-impost-fifth border-impost-primary'
            : 'border-impost-fourth text-white hover:bg-impost-fourth/40' }}">
          Semua
        </a>

        @foreach ($category as $cat)
          <a href="{{ route('article.all', ['category' => $cat->slug]) }}"
            class="px-4 py-2 rounded-full text-xs md:text-sm font-bold border transition
          {{ ($activeCategory ?? '') === $cat->slug
              ? 'bg-impost-primary text-impost-fifth border-impost-primary'
              : 'border-impost-fourth text-white hover:bg-impost-fourth/40' }}">
            {{ $cat->name }}
          </a>
        @endforeach

      </div>

      <section class="mx-auto w-full max-w-7xl px-2">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-10 md:mb-12">

          @forelse ($articles as $article)
            <article class="group rounded-2xl shadow-sm overflow-hidden border border-impost-fourth flex flex-col">

              <div class="relative h-40 md:h-48 overflow-hidden">

                @if ($article->cover_path)
                  <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                @else
                  <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-scroll-text-icon lucide-scroll-text w-20 h-20 text-gray-400">
                      <path d="M15 12h-5" />
                      <path d="M15 8h-5" />
                      <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                      <path
                        d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                    </svg>
                  </div>
                @endif

                @if ($article->category)
                  <span
                    class="absolute top-3 left-3 z-10 inline-flex items-center rounded-full bg-impost-primary/90 text-impost-fifth text-[10px] md:text-xs font-bold uppercase tracking-wide px-3 py-1 shadow-lg">
                    {{ $article->category->name }}
                  </span>
                @endif

              </div>

              <div class="p-5 md:p-6 flex flex-col flex-1">

                <div
                  class="flex items-center gap-2 text-[10px] uppercase tracking-wider font-bold text-impost-primary mb-3">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span class="text-white">{{ $article->created_at->translatedFormat('d F Y') }}</span>
                  <span class="text-white">•</span>
                  <span class="text-white">{{ $article->created_at->diffForHumans() }}</span>
                </div>

                <h3
                  class="text-lg md:text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-impost-primary transition-colors">
                  {{ $article->title }}
                </h3>

                <p class="text-sm text-white line-clamp-3 mb-6 flex-1 leading-relaxed">
                  {{ Str::limit(strip_tags($article->content), 120) }}
                </p>

                <a href="{{ route('article.detail', $article->slug) }}"
                  class="mt-auto inline-flex items-center justify-center gap-2 text-xs md:text-sm font-bold bg-impost-fourth/30 text-impost-primary border border-impost-fourth rounded-xl px-5 py-3 hover:bg-impost-primary hover:text-impost-fifth transition-all duration-300">
                  BACA SELENGKAPNYA
                </a>

              </div>
            </article>

          @empty
            <div class="col-span-full">
              <x-empty-card item="artikel" />
            </div>
          @endforelse

        </div>

        <x-custom-pagination :items="$articles" />

      </section>

    </div>
  </main>
@endsection
