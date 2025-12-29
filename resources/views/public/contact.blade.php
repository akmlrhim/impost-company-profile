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
              <span class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Kontak</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mb-12 text-center">
        <h1
          class="text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          Kontak Kami
        </h1>
        <p class="text-white text-sm md:text-base px-6 mx-auto">
          Hubungi kami untuk informasi lebih lanjut atau konsultasi gratis.
        </p>
      </div>

      <section class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- desktop --}}
        <x-public.contact.desktop />

        {{-- mobile  --}}
        <x-public.contact.mobile />

        <div class="relative rounded-xl  p-5 shadow-sm">

          <div class="flex flex-col items-center text-center gap-1.5">

            <div class="mb-2 flex h-10 w-10 items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6v6l4 2M12 22a10 10 0 100-20 10 10 0 000 20z" />
              </svg>
            </div>

            <p class="text-sm font-semibold text-impost-primary tracking-wide">
              Waktu Pelayanan
            </p>

            <p class="text-2xl font-bold text-impost-primary leading-tight">
              09.00 – 17.00
            </p>

            <p class="text-xs font-medium text-white">
              Senin – Sabtu
            </p>

          </div>
        </div>

      </section>

    </div>
  </main>
@endsection
