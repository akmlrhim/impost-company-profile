@extends('layouts.public')
@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex items-center gap-2 sm:gap-3 text-xs sm:text-sm text-white">

          <li>
            <a href="{{ url('/') }}"
              class="flex items-center gap-1.5 font-medium hover:text-impost-primary transition">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
              </svg>
              Home
            </a>
          </li>

          <li class="flex items-center text-white/70">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" />
            </svg>
          </li>

          <li>
            <a href="{{ route('careers') }}" class="font-medium hover:text-impost-primary transition">
              Karir
            </a>
          </li>

          <li class="flex items-center text-white/70">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" />
            </svg>
          </li>

          <li aria-current="page" class="font-semibold text-white">
            {{ $job->title }}
          </li>

        </ol>
      </nav>


      <section class="w-full">

      </section>

    </div>
  </main>
@endsection
