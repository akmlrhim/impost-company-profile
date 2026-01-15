@extends('layouts.public')

@push('head')
  @if ($article->status == 'draft')
    <meta name="robots" content="noindex, nofollow">
  @else
    <meta name="robots" content="index, follow">
  @endif

  <meta name="description"
    content="{{ $article->meta_description ?? Str::limit(strip_tags($article->excerpt ?? $article->content), 155) }}">

  <meta property="og:title" content="{{ $article->meta_title ?? $article->title }}">
  <meta property="og:description"
    content="{{ $article->meta_description ?? Str::limit(strip_tags($article->excerpt ?? $article->content), 155) }}">
  <meta property="og:image"
    content="{{ $article->cover_path ? asset('storage/.' . $article->cover_path) : asset('img/article_default.webp') }}">

  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <main class="antialiased pt-18 sm:pt-32 py-8 sm:py-16">
    <div class="px-2 mx-auto max-w-7xl">

      <div class="mb-4">
        <a href="{{ route('article.all') }}" class="text-blue-400 hover:underline text-sm">
          &leftarrow; Kembali ke halaman artikel</a>
      </div>


      <article class="mx-auto w-full max-w-4xl">
        <div class="mb-8">
          @if ($article->cover_path)
            <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
              class="w-full h-56 rounded-md object-cover" />
          @else
            <img src="{{ asset('img/article_default.webp') }}" width="400" height="250" alt="{{ $article->title }}"
              class="w-full h-48 rounded-md object-cover" />
          @endif
        </div>

        <header class="mb-8 text-center">
          <h1 class="mb-6 text-xl sm:text-2xl lg:text-4xl font-bold text-white">
            {{ $article->title }}
          </h1>

          <div class="flex items-center justify-center gap-3 text-xs sm:text-sm text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <time datetime="{{ $article->created_at->toIso8601String() }}">
              {{ $article->created_at->translatedFormat('d F Y') }}
            </time>
            <span class="w-1 h-1 bg-white rounded-full"></span>
            <span>
              {{ $article->created_at->diffForHumans() }}
            </span>
          </div>
        </header>

        <div class="max-w-none">

          <x-article-content>{!! $article->content !!}</x-article-content>

          {{-- komentar section  --}}
          <x-home.public-comment :article="$article" />

        </div>
      </article>
    </div>
  </main>

  {{-- latest article  --}}
  <aside class="py-16 border-t border-gray-800">
    <div class="px-3 mx-auto max-w-7xl">
      <h2 class="mb-10 text-lg sm:text-xl lg:text-2xl font-bold text-white">
        Artikel Terbaru Lainnya
      </h2>

      <div class="relative" x-data="{
          currentSlide: 0,
          totalSlides: {{ count($latestArticle) }},
          startX: 0,
          isDragging: false,
      
          goToSlide(index) {
              this.currentSlide = index;
          },
      
          nextSlide() {
              this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
          },
      
          prevSlide() {
              this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
          },
      
          handleTouchStart(e) {
              this.startX = e.touches[0].clientX;
              this.isDragging = true;
          },
      
          handleTouchEnd(e) {
              if (!this.isDragging) return;
              const endX = e.changedTouches[0].clientX;
              const diff = this.startX - endX;
      
              if (Math.abs(diff) > 50) {
                  if (diff > 0) {
                      this.nextSlide();
                  } else {
                      this.prevSlide();
                  }
              }
              this.isDragging = false;
          },
      
          handleMouseDown(e) {
              this.startX = e.clientX;
              this.isDragging = true;
          },
      
          handleMouseUp(e) {
              if (!this.isDragging) return;
              const endX = e.clientX;
              const diff = this.startX - endX;
      
              if (Math.abs(diff) > 50) {
                  if (diff > 0) {
                      this.nextSlide();
                  } else {
                      this.prevSlide();
                  }
              }
              this.isDragging = false;
          }
      }">

        <div class="hidden sm:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          @forelse ($latestArticle as $latest)
            <article
              class="w-full bg-gray-900 border border-gray-700 rounded-md overflow-hidden hover:border-gray-600 transition-colors flex flex-col h-full">

              <div class="relative bg-gray-800 shrink-0">
                @if ($latest->cover_path)
                  <img src="{{ asset('storage/' . $latest->cover_path) }}" alt="{{ $latest->title }}"
                    class="w-full h-full rounded-md object-cover" />
                @else
                  <img src="{{ asset('img/article_default.webp') }}" width="400" height="250"
                    alt="{{ $latest->title }}" class="w-full h-full rounded-md object-cover" />
                @endif
              </div>

              <div class="p-6 flex flex-col flex-1">
                <h3 class="text-base sm:text-lg lg:text-xl font-semibold text-white mb-3 line-clamp-2 min-h-12">
                  {{ $latest->title }}
                </h3>

                <p class="text-xs sm:text-sm text-white mb-4 leading-relaxed line-clamp-2 min-h-10">
                  {{ Str::limit(strip_tags($latest->content), 100) }}
                </p>

                <div class="flex items-center justify-between pt-3 border-t border-gray-800 mt-auto">
                  <span class="text-white text-xs">
                    {{ $latest->created_at->translatedFormat('d F Y') }}
                  </span>

                  <a href="{{ route('article.detail', $latest->slug) }}"
                    class="text-blue-700 hover:underline hover:text-blue-600 transition text-xs">
                    Selengkapnya &raquo;
                  </a>
                </div>
              </div>
            </article>
          @empty
            <x-empty-card item="artikel" />
          @endforelse
        </div>

        {{-- mobile  --}}
        <div class="sm:hidden">
          <div class="overflow-hidden">
            <div class="flex transition-transform duration-300 ease-in-out select-none cursor-grab active:cursor-grabbing"
              :style="`transform: translateX(-${currentSlide * 100}%)`" @touchstart="handleTouchStart($event)"
              @touchend="handleTouchEnd($event)" @mousedown="handleMouseDown($event)" @mouseup="handleMouseUp($event)"
              @mouseleave="isDragging = false">

              @forelse ($latestArticle as $index => $latest)
                <article class="w-full shrink-0 px-2">
                  <div class="bg-gray-900 border border-gray-700 rounded-md overflow-hidden flex flex-col h-full">

                    <div class="relative h-40 sm:h-56 bg-gray-800 shrink-0">
                      @if ($latest->cover_path)
                        <img src="{{ asset('storage/' . $latest->cover_path) }}" alt="{{ $latest->title }}"
                          class="w-full h-full rounded-md object-cover" />
                      @else
                        <img src="{{ asset('img/article_default.webp') }}" alt="{{ $latest->title }}"
                          class="w-full h-full rounded-md object-cover" />
                      @endif
                    </div>

                    <div class="p-4 sm:p-6 flex flex-col flex-1">
                      <h3 class="text-base sm:text-lg font-semibold text-white mb-2 line-clamp-2 min-h-10">
                        {{ $latest->title }}
                      </h3>

                      <p class="text-xs sm:text-sm text-white mb-3 leading-relaxed line-clamp-2 min-h-8">
                        {{ Str::limit(strip_tags($latest->content), 100) }}
                      </p>

                      <div class="flex items-center justify-between pt-3 border-t border-gray-800 mt-auto">
                        <span class="text-white text-xs">
                          {{ $latest->created_at->translatedFormat('d F Y') }}
                        </span>

                        <a href="{{ route('article.detail', $latest->slug) }}"
                          class="text-blue-700 hover:underline hover:text-blue-600 transition text-xs">
                          Selengkapnya &raquo;
                        </a>
                      </div>
                    </div>
                  </div>
                </article>
              @empty
                <x-empty-card item="artikel" />
              @endforelse
            </div>
          </div>

          @if (count($latestArticle) > 0)
            <div class="flex justify-center gap-2 mt-4">
              @foreach ($latestArticle as $index => $latest)
                <button @click="goToSlide({{ $index }})" class="rounded-full transition-all duration-300"
                  :class="currentSlide === {{ $index }} ? 'bg-blue-600 w-6 h-2' : 'bg-gray-600 w-2 h-2'"
                  aria-label="Go to slide {{ $index + 1 }}">
                </button>
              @endforeach
            </div>
          @endif
        </div>

      </div>

    </div>
  </aside>

  @if (session('success') || $errors->any())
    <script>
      window.location.hash = 'comment-section';
    </script>
  @endif
@endsection
