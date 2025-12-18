@extends('layouts.public')
@section('content')
  <main class="pt-28 pb-16 bg-impost-fifth antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      {{-- Breadcrumb --}}
      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ url('/') }}"
              class="inline-flex items-center text-xs sm:text-sm font-medium text-gray-400 hover:text-white">
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
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <a href="{{ url('/') }}#blog"
                class="ml-1 text-xs sm:text-sm font-medium text-gray-400 hover:text-white md:ml-2">Articles</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <span
                class="ml-1 text-xs sm:text-sm font-medium text-gray-500 md:ml-2">{{ Str::limit($article->title, 30) }}</span>
            </div>
          </li>
        </ol>
      </nav>

      <article class="mx-auto w-full max-w-4xl">

        <div class="mb-8">
          <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=600&fit=crop"
            alt="{{ $article->title }}" class="w-full h-auto rounded-md object-cover">
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
          <section class="mt-16" id="comment-section">
            <div class="mb-8">
              <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-white">
                Komentar <span
                  class="text-sm sm:text-base lg:text-lg font-normal text-gray-500">({{ $article->comments->count() }})</span>
              </h2>
            </div>

            <x-flash />


            {{-- form komentar  --}}
            <div class="bg-gray-900 border border-gray-800 rounded-md p-4 sm:p-6 mb-8">
              <h3 class="text-base sm:text-lg font-semibold text-white mb-4">Tulis Komentar</h3>

              <form class="space-y-4" action="{{ route('article.comment') }}" method="POST">
                @csrf

                {{-- ambil id artikel  --}}
                <input type="hidden" name="article_id" value="{{ $article->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label for="fullname" class="block mb-2 text-xs sm:text-sm font-medium text-gray-300">
                      Nama Lengkap <span class="text-red-400">*</span>
                    </label>
                    <input type="text" id="fullname" name="fullname"
                      class="w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-white bg-gray-950 border border-gray-800 rounded-md focus:ring-1 focus:ring-primary-500 focus:border-primary-500 placeholder-gray-500"
                      placeholder="Masukkan nama lengkap anda" />
                    @error('fullname')
                      <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                    @enderror

                  </div>

                  <div>
                    <label for="email" class="block mb-2 text-xs sm:text-sm font-medium text-gray-300">
                      Email <span class="text-red-400">*</span>
                    </label>
                    <input type="email" id="email" name="email"
                      class="w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-white bg-gray-950 border border-gray-800 rounded-md focus:ring-1 focus:ring-primary-500 focus:border-primary-500 placeholder-gray-500"
                      placeholder="nama@gmail.com" />
                    @error('email')
                      <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                    @enderror
                  </div>
                </div>

                <div>
                  <label for="comment" class="block mb-2 text-xs sm:text-sm font-medium text-gray-300">
                    Komentar <span class="text-red-400">*</span>
                  </label>
                  <textarea id="comment" name="comment" rows="5"
                    class="w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-white bg-gray-950 border border-gray-800 rounded-md focus:ring-1 focus:ring-primary-500 focus:border-primary-500 placeholder-gray-500 resize-none"
                    placeholder="Bagikan pendapat anda..."></textarea>
                  @error('comment')
                    <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                  @enderror
                  <p class="mt-2 text-xs text-gray-500">
                    Komentar anda akan ditinjau sebelum dipublikasikan
                  </p>
                </div>

                <div class="flex items-center justify-between pt-2">
                  <button type="submit"
                    class="py-2 sm:py-2.5 px-4 sm:px-6 text-xs sm:text-sm font-semibold text-white bg-primary-600 rounded-md hover:bg-primary-700 focus:ring-2 focus:ring-primary-500">
                    Kirim Komentar
                  </button>

                  <button type="reset" class="text-xs sm:text-sm text-gray-500 hover:text-white">
                    Reset Form
                  </button>
                </div>
              </form>

            </div>

            <div x-data="{ showAll: false, limit: 3 }" class="space-y-4">
              <h3 class="text-base sm:text-lg font-semibold text-white">
                Semua Komentar
              </h3>

              @forelse ($article->comments as $index => $c)
                <article x-show="showAll || {{ $index }} < limit" x-transition
                  class="bg-gray-900 border border-gray-800 rounded-md p-4 sm:p-5">
                  <div class="flex items-start gap-4">
                    <div class="flex-1 min-w-0">
                      <div class="flex items-center gap-2 mb-2">
                        <h4 class="text-xs sm:text-sm font-semibold text-white">
                          {{ $c->fullname }}
                        </h4>
                        <span class="text-xs text-gray-600">•</span>
                        <time class="text-xs text-gray-500">
                          {{ $c->created_at->diffForHumans() }}
                        </time>
                      </div>

                      <p class="text-xs sm:text-sm text-gray-300 leading-relaxed">
                        {{ $c->comment }}
                      </p>
                    </div>
                  </div>
                </article>
              @empty
                <p class="text-xs sm:text-sm text-gray-500">
                  Belum ada komentar
                </p>
              @endforelse

              @if ($article->comments->count() > 3)
                <div class="pt-2">
                  <button @click="showAll = !showAll"
                    class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 sm:py-2.5
												 text-xs sm:text-sm font-semibold text-white
												 bg-blue-600 hover:bg-blue-500
												 rounded-md transition">
                    <span x-text="showAll ? 'Sembunyikan komentar' : 'Lihat komentar lainnya'"></span>
                  </button>
                </div>
              @endif
            </div>


          </section>
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

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <article
          class="w-full bg-gray-900 border border-gray-700 rounded-md overflow-hidden hover:border-gray-600 transition-colors">

          <div class="relative h-56 bg-gray-800">
            <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=250&fit=crop"
              alt="Our First Office" class="w-full h-full object-cover">
          </div>

          <div class="p-6">

            <h3 class="text-base sm:text-lg lg:text-xl font-semibold text-white mb-3">
              Our First Office
            </h3>

            <p class="text-xs sm:text-sm text-gray-400 mb-4 leading-relaxed">
              Over the past year, Volosoft has undergone many changes, from expanding our team to moving into our first
              dedicated office space.
            </p>

            <div class="flex items-center justify-between pt-3 border-t border-gray-800">

              <span class="text-gray-500 text-xs">
                27 Desember 2029
              </span>

              <a href="#" class="text-blue-700 hover:underline hover:text-blue-600 transition text-xs">
                Selengkapnya &raquo;
              </a>
            </div>

          </div>
        </article>

      </div>
    </div>
  </aside>

  @if (session('success') || $errors->any())
    <script>
      window.location.hash = 'comment-section';
    </script>
  @endif
@endsection
