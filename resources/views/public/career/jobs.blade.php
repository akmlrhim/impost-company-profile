@extends('layouts.public')

@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
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
              <span class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2">Karir</span>
            </div>
          </li>
        </ol>
      </nav>

      <section class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

          @forelse($jobs as $job)
            <div
              class="bg-[#111] rounded-2xl shadow-sm transition-all duration-300 overflow-hidden border border-impost-fourth flex flex-col justify-between group hover:-translate-y-2 hover:shadow-[0_10px_30px_-10px_rgba(212,172,60,0.2)]">

              <div class="p-6">
                <div class="flex items-center justify-between mb-5">
                  <div
                    class="w-12 h-12 bg-impost-fourth rounded-xl flex items-center justify-center transition-colors duration-300 group-hover:bg-impost-primary">
                    <svg class="w-6 h-6 text-impost-primary group-hover:text-impost-fifth" fill="none"
                      stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <span
                    class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
										{{ $job->status === 'Open' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                    {{ $job->status }}
                  </span>
                </div>

                <h2 class="text-xl font-bold text-white mb-2 group-hover:text-impost-primary transition-colors">
                  {{ $job->title }}
                </h2>
                <p class="text-white text-sm mb-4 leading-relaxed line-clamp-3">
                  {{ $job->description }}
                </p>

                <div class="space-y-3 mb-6 pt-4 border-t border-impost-fourth">
                  <div class="flex items-center text-white">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xs font-medium">{{ $job->type }}</span>
                  </div>
                  <div class="flex items-center text-white">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-xs font-medium italic">Tutup:
                      {{ \Carbon\Carbon::parse($job->deadline)->translatedFormat('d F Y') }}</span>
                  </div>
                </div>

              </div>

              <div class="p-6 pt-0">
                <a href="{{ route('career.detail', $job->slug) }}"
                  class="block w-full text-center py-3 bg-gradient-to-r from-impost-primary to-impost-secondary text-impost-fifth rounded-xl hover:brightness-110 transition-all duration-300 font-bold shadow-lg text-sm uppercase tracking-wide">
                  Lihat Detail
                </a>
              </div>
            </div>
          @empty
            <div class="col-span-full py-20 text-center">
              <p class="text-white">Belum ada lowongan tersedia saat ini.</p>
            </div>
          @endforelse

        </div>

        <div class="mt-12 text-impost-primary">
          <x-custom-pagination :items="$jobs"></x-custom-pagination>
        </div>
      </section>

    </div>
  </main>
@endsection
