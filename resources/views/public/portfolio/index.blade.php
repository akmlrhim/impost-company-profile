@extends('layouts.public')
@section('content')
  <main class="pt-24 sm:pt-28 py-8 sm:py-16 bg-impost-fifth antialiased">
    <div class="px-4 mx-auto max-w-7xl">

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
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <span class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Portfolio</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mb-12 text-center px-6" data-aos="fade-up">
        <h1
          class="text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          Portfolio
        </h1>
        <p class="text-white text-sm md:text-base max-w-2xl mx-auto">
          Karya-karya yang telah kami kerjakan untuk berbagai kebutuhan dan industri.
        </p>
      </div>

      <section class="mx-auto w-full max-w-7xl px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-10 md:mb-12">
          @forelse ($portfolio as $p)
            <a href="{{ route('portfolio.detail', $p) }}" class="group">
              <div class="relative rounded-xl overflow-hidden cursor-pointer aspect-[4/3]" data-aos="fade-up"
                data-aos-delay="{{ $loop->index * 100 }}">

                <img src="{{ asset('storage/' . $p->cover_path) }}" alt="{{ $p->name }}" loading="lazy"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                <div
                  class="absolute inset-0 bg-linear-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                  <div class="p-6 w-full">
                    <h3
                      class="text-xl md:text-2xl font-semibold text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                      {{ $p->name }}
                    </h3>
                  </div>
                </div>

              </div>
            </a>
          @empty
            <div class="col-span-full text-center py-16">
              <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-gray-400 text-md">Belum ada portfolio yang ditampilkan</p>
            </div>
          @endforelse
        </div>


        <x-custom-pagination :items="$portfolio" />
      </section>

    </div>
  </main>
@endsection
