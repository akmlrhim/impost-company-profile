@extends('layouts.public')

@section('title', 'Kontak Kami | Impost Media')
@section('meta_description',
  'Hubungi Impost Media untuk konsultasi gratis seputar digital marketing, performance ads,
  dan social media management. Kami siap membantu bisnis Anda berkembang.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased bg-[#0a0a0a]">

    <div class="px-4 mx-auto max-w-7xl">

      <div class="mb-12 text-center">
        <h1 class="text-xl sm:text-3xl md:text-4xl font-bold mb-4 text-impost-primary">
          Kontak Kami
        </h1>
        <p class="text-white text-xs sm:text-sm md:text-base px-6 mx-auto">
          Hubungi kami untuk informasi lebih lanjut atau konsultasi gratis.
        </p>
      </div>

      <section class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- desktop --}}
        <x-public.contact.desktop />

        {{-- mobile  --}}
        <x-public.contact.mobile />

      </section>

    </div>
  </main>
@endsection
