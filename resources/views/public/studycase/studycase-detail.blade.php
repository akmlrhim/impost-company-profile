@extends('layouts.public')

@section('content')
  <main class="antialiased pt-20 sm:pt-28 pb-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6">

      <div class="mx-auto mb-10">
        <button onclick="window.location.href='{{ route('study-case') }}'"
          class="group inline-flex items-center gap-2 text-sm sm:text-base text-white transition-all duration-300">
          <svg class="w-4 h-4 sm:w-5 sm:h-5 transition-transform group-hover:-translate-x-0.5" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Kembali
        </button>
      </div>

      <section class="relative h-[45vh] sm:h-[55vh] overflow-hidden rounded-2xl sm:rounded-3xl mb-16 sm:mb-20 group">
        <img src="{{ asset('storage/' . $studyCase->cover_path) }}" alt="{{ $studyCase->name }}"
          class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent"></div>

        <div class="relative z-10 flex items-end h-full px-6 sm:px-12 pb-10">
          <h1 class="text-white text-xl sm:text-2xl md:text-3xl font-bold max-w-4xl leading-tight">
            {{ $studyCase->name }}
          </h1>
        </div>
      </section>

      <div class="mx-auto max-w-7xl space-y-16 sm:space-y-20">

        <section>
          <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-white flex items-center gap-3">
            <span class="w-1 h-8 bg-yellow-500 rounded-full"></span>
            Situation
          </h2>
          <div
            class="prose prose-sm md:prose-base prose-invert max-w-none prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ol:text-white prose-ul:text-white prose-a:text-yellow-400 hover:prose-a:text-yellow-300 prose-strong:text-white">
            {!! $studyCase->situation !!}
          </div>

        </section>

        <section>
          <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-white flex items-center gap-3">
            <span class="w-1 h-8 bg-blue-500 rounded-full"></span>
            Solution
          </h2>
          <div
            class="prose prose-sm md:prose-base prose-invert max-w-none prose-headings:font-semibold prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ol:text-white prose-ul:text-white prose-p:leading-relaxed prose-a:text-blue-400 hover:prose-a:text-blue-300 prose-strong:text-white">
            {!! $studyCase->solution !!}
          </div>

        </section>

        <section>
          <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-white flex items-center gap-3">
            <span class="w-1 h-8 bg-green-500 rounded-full"></span>
            Result
          </h2>
          <div
            class="prose prose-sm md:prose-base prose-invert max-w-none prose-headings:font-semibold prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ol:text-white prose-ul:text-white prose-p:leading-relaxed prose-a:text-green-400 hover:prose-a:text-green-300 prose-strong:text-white">
            {!! $studyCase->result !!}
          </div>

        </section>

      </div>

    </div>
  </main>
@endsection
