@extends('layouts.public')
@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
    <div class="mx-auto max-w-7xl">

      <div class="mb-8 md:mb-12 text-center px-6">
        <h1
          class="text-3xl md:text-4xl uppercase font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          {{ $title }}
        </h1>
      </div>

      <section class="mx-auto w-full max-w-7xl px-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 py-6">

          @forelse ($studyCase as $s)
            <a href="{{ route('detail-study-case', $s->slug) }}">
              <div class="group relative overflow-hidden rounded-2xl aspect-[4/3] cursor-pointer">
                @if ($s->cover_path)
                  <img src="{{ asset('storage/' . $s->cover_path) }}"
                    class="w-full h-full object-cover transition-transform duration-500 md:group-hover:scale-110">
                @else
                  <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-briefcase-icon lucide-briefcase w-20 h-20 text-gray-400">
                      <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                      <rect width="20" height="14" x="2" y="6" rx="2" />
                    </svg>
                  </div>
                @endif

                <div
                  class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity duration-300">
                  <div
                    class="absolute bottom-0 left-0 right-0 p-6 translate-y-0 md:translate-y-4 md:group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-white text-md font-bold mb-2">
                      {{ $s->name }}
                    </h3>
                  </div>
                </div>
              </div>
            </a>
          @empty
            <div class="col-span-full">
              <x-empty-card item="Study Case" />
            </div>
          @endforelse


        </div>

        <x-custom-pagination :items="$studyCase" />
      </section>
    </div>
  </main>
@endsection
