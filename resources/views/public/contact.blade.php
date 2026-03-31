@extends('layouts.public')

@section('title', 'Kontak Kami | Impost Media')
@section('meta_description',
  'Hubungi Impost Media untuk konsultasi gratis seputar digital marketing, performance ads,
  dan social media management. Kami siap membantu bisnis Anda berkembang.')

@section('content')
  <section class="relative w-full h-[400px] md:h-[560px] overflow-hidden">
    <div class="absolute inset-0 z-0 bg-fixed bg-center bg-cover bg-no-repeat"
      style="background-image: url('{{ asset('img/pages/contact.webp') }}');">
    </div>

    <div class="absolute inset-0 z-10 bg-gradient-to-r from-impost-fifth/80 via-impost-fifth/40 to-transparent"></div>
    <div class="absolute inset-0 z-10 bg-impost-fifth/30"></div>

    <div
      class="relative z-20 h-full flex flex-col justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-6 sm:pb-8 md:pb-14">

      <div class="max-w-2xl flex flex-col gap-3 sm:gap-4">

        <nav class="flex mb-1" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <a href="/"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-white/70 hover:text-white transition-colors duration-200">
                Home
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-white/40 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Kontak</span>
              </div>
            </li>
          </ol>
        </nav>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight">
          Kontak Kami
        </h1>
        <p class="text-white/80 text-xs sm:text-sm md:text-base leading-relaxed max-w-xl text-justify">
          Hubungi kami untuk informasi lebih lanjut atau konsultasi gratis.
        </p>
      </div>

    </div>

  </section>


  <div class="antialiased bg-impost-fifth">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-14">

      {{-- Filter --}}
      <div class="mb-8 sm:mb-10 md:mb-12 max-w-7xl mx-auto">

        {{-- desktop --}}
        <x-public.contact.desktop />

        {{-- mobile  --}}
        <x-public.contact.mobile />

      </div>

    </div>
  </div>
@endsection
