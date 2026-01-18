@extends('layouts.public')
@section('content')
  <main class="pt-32 sm:pt-36 py-8 sm:py-12 antialiased">

    <div class="px-4 mx-auto max-w-7xl">

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

      </section>

    </div>
  </main>
@endsection
