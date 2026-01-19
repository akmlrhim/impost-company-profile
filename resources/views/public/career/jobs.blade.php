@extends('layouts.public')

@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      <div class="mb-8 md:mb-12 text-center px-6">
        <h1
          class="text-3xl md:text-4xl font-bold mb-4 bg-linear-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent">
          {{ $title }}
        </h1>
        <p class="text-white text-sm md:text-base max-w-5xl mx-auto">
          Kesempatan karier terbuka untuk anda yang siap berkembang dan berkontribusi bersama IMPOST MEDIA.
        </p>
      </div>

      <section class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

          @forelse($jobs as $job)
            <div
              class="rounded-2xl shadow-sm transition-all duration-300 overflow-hidden border border-impost-fourth flex flex-col justify-between group">

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
            <div class="col-span-full">
              <x-empty-card item="Lowongan kerja" />
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
