@extends('layouts.public')
@section('content')
  <main class="sm:pt-28 pt-20 pb-16 bg-impost-fifth antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      {{-- Breadcrumb --}}
      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ url('/') }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-white">
              <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                </path>
              </svg>
              Home
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <a href="{{ url('/') }}#blog"
                class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Articles</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <span
                class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">{{ Str::limit($article->title, 30) }}</span>
            </div>
          </li>
        </ol>
      </nav>

      <article class="mx-auto w-full max-w-4xl">

        <div class="mb-8">
          @if ($article->cover_path)
            <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
              class="w-full h-48 rounded-md object-cover" />
          @else
            <img src="{{ asset('img/article_default.webp') }}" width="400" height="250" alt="{{ $article->title }}"
              class="w-full h-48 rounded-md object-cover" />
          @endif
        </div>

        <header class="mb-8">
          <h1 class="mb-6 text-xl sm:text-2xl lg:text-4xl font-bold leading-tight text-white">
            {{ $article->title }}
          </h1>

          <div class="flex items-center gap-3 text-xs sm:text-sm text-gray-400">
            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <time datetime="{{ $article->created_at->toIso8601String() }}" class="text-gray-300">
              {{ $article->created_at->translatedFormat('d F Y') }}
            </time>
            <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
            <span class="text-gray-400">
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
  <aside class="py-16 bg-gray-900 border-t border-gray-800">
    <div class="px-4 mx-auto max-w-7xl">
      <h2 class="mb-10 text-lg sm:text-xl lg:text-2xl font-bold text-white">
        Latest Articles
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

              <div class="relative h-56 bg-gray-800 shrink-0">
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
