@extends('layouts.public')
@section('content')
  <main class="pt-32 sm:pt-36 py-8 sm:py-12 bg-impost-fifth antialiased">

    <div class="px-4 mx-auto max-w-7xl">

      <div class="mb-12 text-center">
        <h1
          class="font-header text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
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
