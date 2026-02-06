@extends('layouts.public')

@section('content')
  <main class="pt-24 sm:pt-42 py-8 sm:py-16 antialiased bg-[#0a0a0a]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      <div class="mb-10 md:mb-14 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-impost-primary font-medium font-header">
          {{ $title }}
        </h1>
        <p class="text-white text-sm md:text-base max-w-3xl mx-auto font-light leading-relaxed">
          Kesempatan karier terbuka untuk anda yang siap berkembang dan berkontribusi bersama IMPOST MEDIA.
        </p>
      </div>

      <section class="w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-12">

          @forelse($jobs as $job)
            <div
              class="group rounded-2xl bg-[#121212] border border-white/5 shadow-sm overflow-hidden hover:border-impost-primary/30 transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between h-full">

              <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                  <div
                    class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center transition-colors duration-300 group-hover:bg-impost-primary/20">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-impost-primary transition-colors" fill="none"
                      stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <span
                    class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                    {{ $job->status === 'Open' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20' }}">
                    {{ $job->status }}
                  </span>
                </div>

                <h2 class="text-xl font-bold text-white mb-3 group-hover:text-impost-primary transition-colors">
                  {{ $job->title }}
                </h2>

                <p class="text-gray-400 text-sm mb-6 leading-relaxed line-clamp-3">
                  {{ $job->description }}
                </p>

                <div class="space-y-3 pt-5 border-t border-white/5">
                  <div class="flex items-center text-gray-300">
                    <svg class="w-4 h-4 mr-3 text-impost-primary" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xs font-medium">{{ $job->type }}</span>
                  </div>
                  <div class="flex items-center text-gray-300">
                    <svg class="w-4 h-4 mr-3 text-impost-primary" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-xs font-medium">Tutup:
                      {{ \Carbon\Carbon::parse($job->deadline)->translatedFormat('d F Y') }}</span>
                  </div>
                </div>
              </div>

              <div class="p-6 pt-0 mt-auto">
                <a href="{{ route('career.detail', $job->slug) }}"
                  class="flex items-center justify-center w-full py-3.5 text-sm font-bold text-impost-primary bg-impost-primary/10 border border-impost-primary/20 rounded-xl hover:bg-impost-primary hover:text-black transition-all duration-300 group/btn">
                  Lihat Detail
                  <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          @empty
            <div class="col-span-full py-12">
              <x-empty-card item="Lowongan kerja" />
            </div>
          @endforelse

        </div>

        <div class="mt-8">
          <x-custom-pagination :items="$jobs" />
        </div>
      </section>

    </div>
  </main>
@endsection
