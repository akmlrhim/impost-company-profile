@extends('layouts.public')

@section('content')
  <main class="pt-24 sm:pt-28 py-8 sm:py-16 bg-impost-fifth antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ route('study-case') }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-white">
              Study Case
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
              <span class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Detail</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mb-12 text-center px-6" data-aos="fade-up">
        <h1
          class="text-2xl md:text-3xl font-bold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent uppercase">
          {{ $studyCase->name }}
        </h1>
      </div>

			
    </div>
  </main>
@endsection
