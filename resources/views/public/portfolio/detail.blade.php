@extends('layouts.public')

@section('content')
  <main class="pt-24 sm:pt-28 py-8 sm:py-16 bg-impost-fifth antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-white">
              Portfolio
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
              <span class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Gallery</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mb-12 text-center px-6" data-aos="fade-up">
        <h1
          class="text-2xl md:text-3xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent uppercase">
          {{ $portfolio->name }}
        </h1>
      </div>

      <section class="mx-auto w-full max-w-7xl px-6" x-data="{
          open: false,
          images: @js($portfolio->photos->pluck('photo_path')),
          index: 0,
          startX: 0,
          openImage(i) {
              this.index = i
              this.open = true
          },
          next() {
              this.index = (this.index + 1) % this.images.length
          },
          prev() {
              this.index = (this.index - 1 + this.images.length) % this.images.length
          }
      }">

        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
          @forelse ($portfolio->photos as $p)
            <div class="group overflow-hidden rounded-base cursor-zoom-in break-inside-avoid" data-aos="fade-up"
              data-aos-delay="{{ $loop->index * 100 }}">
              <img src="{{ asset('storage/' . $p->photo_path) }}" loading="lazy" alt="{{ $portfolio->name }}"
                @click="openImage({{ $loop->index }})"
                class="w-full transition-transform duration-500 ease-out group-hover:scale-105">
            </div>
          @empty
            <div class="col-span-full text-center py-16">
              <p class="text-gray-400 text-md">Belum ada portfolio yang ditampilkan</p>
            </div>
          @endforelse
        </div>

        <div x-show="open" x-cloak x-transition @keydown.escape.window="open = false"
          @keydown.arrow-right.window="next()" @keydown.arrow-left.window="prev()"
          class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm">
          <div class="absolute inset-0" @click="open = false"></div>

          <img :src="'{{ asset('storage') }}/' + images[index]"
            class="relative max-w-[90vw] max-h-[90vh] rounded-xl shadow-2xl select-none"
            @touchstart="startX = $event.touches[0].clientX"
            @touchend="
            if ($event.changedTouches[0].clientX - startX > 50) prev()
            if (startX - $event.changedTouches[0].clientX > 50) next()
          ">

          <button @click="prev()" class="absolute left-6 text-white text-4xl hover:opacity-80 select-none">
            ‹
          </button>

          <button @click="next()" class="absolute right-6 text-white text-4xl hover:opacity-80 select-none">
            ›
          </button>

          <button @click="open = false" class="absolute top-6 right-6 text-white text-3xl hover:opacity-80">
            &times;
          </button>
        </div>

      </section>

    </div>
  </main>
@endsection
