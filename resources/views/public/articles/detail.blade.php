@extends('layouts.public')

@section('title', ($article->meta_title ?? $article->title) . ' | Impost Media')
@section('meta_description', $article->meta_description ?? Str::limit(strip_tags($article->excerpt ??
  $article->content), 155))

@section('og_title', $article->meta_title ?? $article->title)
@section('og_description', $article->meta_description ?? Str::limit(strip_tags($article->excerpt ?? $article->content),
  155))
@section('og_image', $article->cover_path ? asset('storage/' . $article->cover_path) :
  asset('img/article_default.webp'))
@section('og_type', 'article')

@section('twitter_title', $article->meta_title ?? $article->title)
@section('twitter_description', $article->meta_description ?? Str::limit(strip_tags($article->excerpt ??
  $article->content), 155))
@section('twitter_image', $article->cover_path ? asset('storage/' . $article->cover_path) :
  asset('img/article_default.webp'))

  @push('json-ld')
    @php
      $articleJsonLd = [
          '@context' => 'https://schema.org',
          '@type' => 'BlogPosting',
          'headline' => $article->title,
          'description' =>
              $article->meta_description ?? Str::limit(strip_tags($article->excerpt ?? $article->content), 155),
          'image' => $article->cover_path
              ? asset('storage/' . $article->cover_path)
              : asset('img/article_default.webp'),
          'author' => [
              '@type' => 'Person',
              'name' => $article->written_by ?? 'Impost Media Team',
          ],
          'publisher' => [
              '@type' => 'Organization',
              'name' => 'Impost Media',
              'logo' => [
                  '@type' => 'ImageObject',
                  'url' => asset('img/og_image.png'),
              ],
          ],
          'datePublished' => $article->created_at->toIso8601String(),
          'dateModified' => $article->updated_at->toIso8601String(),
          'mainEntityOfPage' => [
              '@type' => 'WebPage',
              '@id' => url()->current(),
          ],
      ];
    @endphp
    <script type="application/ld+json">{!! json_encode($articleJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  @endpush

  @push('head')
    @if ($article->status == 'draft')
      <meta name="robots" content="noindex, nofollow">
    @else
      <meta name="robots" content="index, follow">
    @endif
  @endpush

@section('content')
  <main class="antialiased pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 bg-[#0a0a0a]">
    <div class="px-3 sm:px-4 mx-auto max-w-7xl">

      <article class="mx-auto w-full max-w-5xl">

        {{-- Breadcrumb --}}
        <div class="mb-4 sm:mb-6">
          <nav class="flex overflow-x-auto whitespace-nowrap scrollbar-hide pb-2 -mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
              <li class="inline-flex items-center">
                <a href="{{ route('home') }}"
                  class="inline-flex items-center text-xs sm:text-sm font-medium text-gray-400 hover:text-white transition-colors">
                  <svg class="w-3.5 h-3.5 mr-2 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                  </svg>
                  Home
                </a>
              </li>
              <li>
                <div class="flex items-center">
                  <svg class="w-3 h-3 text-gray-500 mx-1 flex-shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="m1 9 4-4-4-4" />
                  </svg>
                  <a href="{{ route('article.all') }}"
                    class="ml-1 text-xs sm:text-sm font-medium text-gray-400 hover:text-white transition-colors md:ml-2">Artikel</a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg class="w-3 h-3 text-gray-500 mx-1 flex-shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                      d="m1 9 4-4-4-4" />
                  </svg>
                  <span
                    class="text-xs sm:text-sm font-medium text-white max-w-[150px] sm:max-w-xs md:max-w-sm">{{ $article->title }}</span>
                </div>
              </li>
            </ol>
          </nav>
        </div>

        {{-- Cover Image --}}
        <div class="mb-6 sm:mb-8">
          @if ($article->cover_path)
            <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
              class="w-full h-56 sm:h-72 md:h-96 rounded-lg sm:rounded-md object-cover" />
          @else
            <div
              class="w-full h-48 sm:h-56 md:h-72 bg-gray-800 flex items-center justify-center rounded-lg sm:rounded-md">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="w-14 h-14 sm:w-16 sm:h-16 text-gray-600">
                <path d="M15 12h-5" />
                <path d="M15 8h-5" />
                <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                <path
                  d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
              </svg>
            </div>
          @endif
        </div>

        {{-- Header --}}
        <header class="mb-6 sm:mb-8 text-center">
          <h1 class="mb-4 sm:mb-6 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
            {{ $article->title }}
          </h1>

          <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 text-[10px] md:text-xs text-gray-400">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              <span>{{ $article->written_by }}</span>
            </div>
            <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              <time datetime="{{ $article->created_at->toIso8601String() }}">
                {{ $article->created_at->translatedFormat('d M Y') }}
              </time>
            </div>
            <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
            <span>{{ $article->created_at->diffForHumans() }}</span>
          </div>
        </header>

        {{-- Share Buttons --}}
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-6 sm:mb-8">
          <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank"
            rel="noopener"
            class="flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 bg-[#25D366] hover:bg-[#20BA5A] text-white rounded-full transition-all shadow-sm">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
          </a>

          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
            rel="noopener"
            class="flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 bg-[#1877F2] hover:bg-[#0C63D4] text-white rounded-full transition-all shadow-sm">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>

          <a href="https://x.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}"
            target="_blank" rel="noopener"
            class="flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 bg-black hover:bg-gray-800 text-white rounded-full transition-all shadow-sm">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              fill="currentColor">
              <path
                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
            </svg>
          </a>

          <button onclick="copyArticleLink()" id="copyBtn"
            class="flex items-center gap-1.5 sm:gap-2 px-2.5 py-1.5 sm:px-3 sm:py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-full transition-all shadow-sm">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" id="copyIcon" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
              <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
              <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
            </svg>
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 hidden" id="checkIcon" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="font-medium text-[10px] md:text-xs" id="copyText">Salin</span>
          </button>
        </div>

        {{-- Toast --}}
        <div id="toast"
          class="fixed bottom-4 left-1/2 -translate-x-1/2 bg-gray-900 text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2 sm:gap-3 z-50">
          <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <span class="font-medium text-[10px] md:text-xs">Link berhasil disalin!</span>
        </div>

        {{-- Article Content --}}
        <div class="max-w-none">
          <x-article-content>{!! $article->content !!}</x-article-content>
          <x-home.public-comment :article="$article" />
        </div>
      </article>
    </div>
  </main>

  {{-- Latest Articles --}}
  <aside class="py-10 sm:py-12 md:py-16 bg-[#0a0a0a] border-t border-white/10">
    <div class="px-3 sm:px-4 mx-auto max-w-7xl">
      <h2 class="mb-6 sm:mb-8 text-xl md:text-2xl lg:text-3xl font-bold text-white">
        Artikel Terbaru Lainnya
      </h2>

      @if ($latestArticle->isEmpty())
        <div class="col-span-full py-10 sm:py-12">
          <x-empty-card item="artikel" />
        </div>
      @else
        {{-- Skeleton --}}
        <div id="latest-articles-skeleton" class="animate-pulse">
          {{-- Desktop Skeleton --}}
          <div class="hidden sm:grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
            @for ($i = 0; $i < 4; $i++)
              <div class="w-full bg-[#121212] rounded-lg h-[240px] sm:h-[260px] lg:h-[280px] border border-white/5">
              </div>
            @endfor
          </div>
          {{-- Mobile Skeleton --}}
          <div class="sm:hidden flex gap-2 overflow-hidden">
            <div class="w-full shrink-0 px-1 border border-white/5 rounded-lg h-[280px] bg-[#121212]"></div>
          </div>
        </div>

        {{-- Content --}}
        <div id="latest-articles-content" class="relative opacity-0 transition-opacity duration-500"
          x-data="{
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
                      diff > 0 ? this.nextSlide() : this.prevSlide();
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
                      diff > 0 ? this.nextSlide() : this.prevSlide();
                  }
                  this.isDragging = false;
              }
          }">

          {{-- Desktop Grid --}}
          <div class="hidden sm:grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
            @foreach ($latestArticle as $latest)
              <article
                class="w-full bg-[#121212] border border-white/5 rounded-lg overflow-hidden flex flex-col h-full group hover:border-impost-primary/30 transition-colors">
                <div class="relative h-32 sm:h-36 lg:h-40 bg-gray-800 overflow-hidden">
                  @if ($latest->cover_path)
                    <img src="{{ asset('storage/' . $latest->cover_path) }}" alt="{{ $latest->title }}"
                      class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                  @else
                    <div class="w-full h-full flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" class="w-10 h-10 text-gray-600">
                        <path d="M15 12h-5" />
                        <path d="M15 8h-5" />
                        <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                        <path
                          d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                      </svg>
                    </div>
                  @endif
                </div>

                <div class="p-3 sm:p-4 flex flex-col flex-1">
                  <h3
                    class="text-xs md:text-sm font-semibold text-white mb-2 line-clamp-2 leading-snug group-hover:text-impost-primary transition-colors">
                    {{ $latest->title }}
                  </h3>
                  <p class="text-[10px] md:text-xs text-gray-400 mb-3 line-clamp-2 leading-relaxed flex-1">
                    {{ Str::limit(strip_tags($latest->content), 80) }}
                  </p>
                  <div class="flex items-center justify-between pt-2 border-t border-white/5 mt-auto">
                    <span class="text-[10px] md:text-xs text-gray-500">
                      {{ $latest->created_at->translatedFormat('d M Y') }}
                    </span>
                    <a href="{{ route('article.detail', $latest->slug) }}"
                      class="text-impost-primary hover:text-impost-primary/70 transition text-[10px] md:text-xs font-medium">
                      Baca
                    </a>
                  </div>
                </div>
              </article>
            @endforeach
          </div>

          {{-- Mobile Carousel --}}
          <div class="sm:hidden">
            <div class="overflow-hidden">
              <div
                class="flex transition-transform duration-300 ease-in-out select-none cursor-grab active:cursor-grabbing"
                :style="`transform: translateX(-${currentSlide * 100}%)`" @touchstart="handleTouchStart($event)"
                @touchend="handleTouchEnd($event)" @mousedown="handleMouseDown($event)"
                @mouseup="handleMouseUp($event)" @mouseleave="isDragging = false">

                @foreach ($latestArticle as $latest)
                  <article class="w-full shrink-0 px-1">
                    <div class="bg-[#121212] border border-white/5 rounded-lg overflow-hidden flex flex-col h-full">
                      <div class="relative h-36 bg-gray-800">
                        @if ($latest->cover_path)
                          <img src="{{ asset('storage/' . $latest->cover_path) }}" alt="{{ $latest->title }}"
                            class="w-full h-full object-cover" />
                        @else
                          <img src="{{ asset('img/article_default.webp') }}" alt="{{ $latest->title }}"
                            class="w-full h-full object-cover" />
                        @endif
                      </div>
                      <div class="p-3 flex flex-col flex-1">
                        <h3 class="text-sm font-semibold text-white mb-1.5 line-clamp-2 leading-snug">
                          {{ $latest->title }}
                        </h3>
                        <p class="text-[11px] text-gray-400 mb-2 line-clamp-2 leading-relaxed flex-1">
                          {{ Str::limit(strip_tags($latest->content), 80) }}
                        </p>
                        <div class="flex items-center justify-between pt-2 border-t border-white/5 mt-auto">
                          <span class="text-[10px] text-gray-500">
                            {{ $latest->created_at->translatedFormat('d M Y') }}
                          </span>
                          <a href="{{ route('article.detail', $latest->slug) }}"
                            class="text-impost-primary text-[10px] font-medium">
                            Baca
                          </a>
                        </div>
                      </div>
                    </div>
                  </article>
                @endforeach
              </div>
            </div>
          </div>

        </div>

        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const skeleton = document.getElementById('latest-articles-skeleton');
            const content = document.getElementById('latest-articles-content');
            if (!skeleton || !content) return;

            const imgs = content.querySelectorAll('img');
            let loaded = 0;

            function reveal() {
              skeleton.style.display = 'none';
              content.style.opacity = '1';
            }

            if (!imgs.length) {
              reveal();
              return;
            }

            function onLoad() {
              if (++loaded >= imgs.length) reveal();
            }

            imgs.forEach(img => {
              if (img.complete) {
                onLoad();
              } else {
                img.addEventListener('load', onLoad, {
                  once: true
                });
                img.addEventListener('error', onLoad, {
                  once: true
                });
              }
            });

            setTimeout(reveal, 1500);
          });
        </script>
      @endif
    </div>
  </aside>

  @if (session('success') || $errors->any())
    <script>
      window.location.hash = 'comment-section';
    </script>
  @endif
@endsection

@push('scripts')
  <script>
    function copyArticleLink() {
      const url = "{{ url()->current() }}";
      const copyBtn = document.getElementById('copyBtn');
      const copyText = document.getElementById('copyText');
      const copyIcon = document.getElementById('copyIcon');
      const checkIcon = document.getElementById('checkIcon');
      const toast = document.getElementById('toast');

      navigator.clipboard.writeText(url)
        .then(() => {
          copyIcon.classList.add('hidden');
          checkIcon.classList.remove('hidden');
          copyText.textContent = 'Tersalin!';
          copyBtn.classList.add('bg-green-600', 'hover:bg-green-700');
          copyBtn.classList.remove('bg-gray-700', 'hover:bg-gray-600');

          toast.classList.remove('translate-y-20', 'opacity-0');
          toast.classList.add('translate-y-0', 'opacity-100');

          setTimeout(() => {
            copyIcon.classList.remove('hidden');
            checkIcon.classList.add('hidden');
            copyText.textContent = 'Salin';
            copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
            copyBtn.classList.add('bg-gray-700', 'hover:bg-gray-600');

            toast.classList.add('translate-y-20', 'opacity-0');
            toast.classList.remove('translate-y-0', 'opacity-100');
          }, 2000);
        })
        .catch(err => {
          // console.error('Gagal menyalin:', err);
        });
    }
  </script>
@endpush
