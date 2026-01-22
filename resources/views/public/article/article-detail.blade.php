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
    content="{{ $article->cover_path ? asset('storage/' . $article->cover_path) : asset('img/article_default.webp') }}">

  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <main class="antialiased pt-18 sm:pt-32 py-8 sm:py-16 bg-[#0a0a0a]">
    <div class="px-2 mx-auto max-w-7xl">

      <article class="mx-auto w-full max-w-5xl">

        <button onclick="window.location.href='{{ route('article.all') }}'"
          class="flex cursor-pointer items-center text-sm sm:text-base text-white hover:text-white transition-colors mb-5">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Kembali
        </button>

        <div class="mb-8">
          @if ($article->cover_path)
            <img src="{{ asset('storage/' . $article->cover_path) }}" alt="{{ $article->title }}"
              class="w-full h-96 rounded-md object-cover" />
          @else
            <div class="w-full h-72 bg-gray-200 flex items-center justify-center rounded-md">
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
        </div>

        <header class="mb-8 text-center">
          <h1 class="mb-6 text-xl sm:text-2xl lg:text-4xl font-bold text-white">
            {{ $article->title }}
          </h1>

          <div class="flex flex-wrap items-center justify-center gap-3 text-xs sm:text-sm text-white">
            <div class="flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              <span>{{ $article->written_by }}</span>
            </div>
            <span class="w-1 h-1 bg-white rounded-full"></span>

            <div class="flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              <time datetime="{{ $article->created_at->toIso8601String() }}">
                {{ $article->created_at->translatedFormat('d F Y') }}
              </time>
            </div>

            <span class="w-1 h-1 bg-white rounded-full"></span>

            <span>
              {{ $article->created_at->diffForHumans() }}
            </span>
          </div>
        </header>

        <div class="flex flex-wrap justify-center gap-3 mb-8">

          <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank"
            rel="noopener"
            class="group flex items-center gap-2 px-2 py-2 bg-[#25D366] hover:bg-[#20BA5A] text-white rounded-full transition-all duration-200 shadow-sm hover:shadow-md">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
          </a>

          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
            rel="noopener"
            class="group flex items-center gap-2 px-2 py-2 bg-[#1877F2] hover:bg-[#0C63D4] text-white rounded-full transition-all duration-200 shadow-sm hover:shadow-md">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>

          <a href="https://x.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}"
            target="_blank" rel="noopener"
            class="group flex items-center gap-2 px-2 py-2 bg-black hover:bg-gray-800 text-white rounded-full transition-all duration-200 shadow-sm hover:shadow-md">

            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
            </svg>
          </a>

          <button onclick="copyArticleLink()" id="copyBtn"
            class="group flex items-center gap-2 px-2 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-full transition-all duration-200 shadow-sm hover:shadow-md">
            <svg class="w-5 h-5" id="copyIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2">
              <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
              <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
            </svg>
            <svg class="w-5 h-5 hidden" id="checkIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="font-medium text-sm" id="copyText">Salin Link</span>
          </button>

        </div>

        <div id="toast"
          class="fixed bottom-4 left-1/2 -translate-x-1/2 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-3">
          <span class="font-medium text-xs sm:text-sm">Link berhasil disalin!</span>
        </div>



        <div class="max-w-none">

          {{-- isi artikel  --}}
          <x-article-content>{!! $article->content !!}</x-article-content>

          {{-- komentar section  --}}
          <x-home.public-comment :article="$article" />

        </div>
      </article>
    </div>
  </main>

  {{-- latest article  --}}
  <aside class="py-16 bg-impost-fifth border-b border-white">
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
            <article class="w-full border border-impost-fourth rounded-md overflow-hidden flex flex-col h-full group">

              <div class="relative bg-gray-800 shrink-0">
                @if ($latest->cover_path)
                  <img src="{{ asset('storage/' . $latest->cover_path) }}" alt="{{ $latest->title }}"
                    class="w-full h-full rounded-md object-cover" />
                @else
                  <div class="w-full h-36 bg-gray-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-scroll-text-icon lucide-scroll-text w-12 h-12 text-gray-400">
                      <path d="M15 12h-5" />
                      <path d="M15 8h-5" />
                      <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                      <path
                        d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                    </svg>
                  </div>
                @endif
              </div>

              <div class="p-6 flex flex-col flex-1">
                <h3 class="text-md font-semibold text-white mb-3 line-clamp-2 min-h-12 group-hover:text-impost-primary">
                  {{ $latest->title }}
                </h3>

                <p class="text-xs text-white mb-4 leading-relaxed line-clamp-2 min-h-10">
                  {{ Str::limit(strip_tags($latest->content), 100) }}
                </p>

                <div class="flex items-center justify-between pt-3 border-t border-gray-800 mt-auto">
                  <span class="text-white text-xs">
                    {{ $latest->created_at->translatedFormat('d F Y') }}
                  </span>

                  <a href="{{ route('article.detail', $latest->slug) }}"
                    class="text-impost-primary hover:underline hover:text-impost-primary/50 transition text-xs">
                    Selengkapnya &raquo;
                  </a>
                </div>
              </div>
            </article>
          @empty
            <div class="col-span-full">
              <x-empty-card item="artikel" />
            </div>
          @endforelse
        </div>

        {{-- mobile  --}}
        <div class="sm:hidden">
          <div class="overflow-hidden">
            <div
              class="flex transition-transform duration-300 ease-in-out select-none cursor-grab active:cursor-grabbing"
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
            copyText.textContent = 'Salin Link';
            copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
            copyBtn.classList.add('bg-gray-700', 'hover:bg-gray-600');

            toast.classList.add('translate-y-20', 'opacity-0');
            toast.classList.remove('translate-y-0', 'opacity-100');
          }, 2000);
        })
        .catch(err => {
          console.error('Gagal menyalin:', err);
        });
    }
  </script>
@endpush
