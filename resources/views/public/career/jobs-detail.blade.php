@extends('layouts.public')
@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased">
    <div class="px-4 mx-auto max-w-7xl">

      <section class="w-full">
        <div class="max-w-5xl mx-auto">

          <button onclick="window.location.href='{{ route('careers') }}'"
            class="flex cursor-pointer items-center text-sm sm:text-base text-white hover:text-white transition-colors mb-5">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
          </button>

          <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5 mb-8">
            <div>
              <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3">
                {{ $job->title }}
              </h1>

              <div class="flex flex-wrap items-center gap-2">
                <span
                  class="inline-flex items-center px-3 py-1 rounded-full text-[11px] sm:text-xs font-semibold bg-emerald-500/20 text-white">
                  {{ ucfirst($job->status) }}
                </span>
                <span
                  class="inline-flex items-center px-3 py-1 rounded-full text-[11px] sm:text-xs font-semibold bg-impost-primary/20 text-white">
                  {{ ucfirst($job->type) }}
                </span>
              </div>
            </div>

            <a href="{{ $job->apply_link }}" target="_blank"
              class="hidden sm:block px-5 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-md bg-impost-secondary hover:bg-impost-primary text-white font-semibold rounded-md">
              Lamar Sekarang
            </a>
          </div>

          <div class="bg-impost-fifth rounded-md shadow-xl overflow-hidden mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-slate-700">

              <div class="bg-impost-fifth p-5 sm:p-6">
                <p class="text-xs sm:text-sm text-white mb-1">Tipe Pekerjaan</p>
                <p class="text-sm sm:text-base md:text-lg font-semibold text-white">{{ ucfirst($job->type) }}</p>
              </div>

              <div class="bg-impost-fifth p-5 sm:p-6">
                <p class="text-xs sm:text-sm text-white mb-1">Status</p>
                <p class="text-sm sm:text-base md:text-lg font-semibold text-white">{{ ucfirst($job->status) }}</p>
              </div>

              <div class="bg-impost-fifth p-5 sm:p-6">
                <p class="text-xs sm:text-sm text-white mb-1">Batas Akhir</p>
                <p class="text-sm sm:text-base md:text-lg font-semibold text-white">
                  {{ \Carbon\Carbon::parse($job->closing_date)->translatedFormat('d F Y') }}</p>
              </div>

            </div>
          </div>

          <div class="mb-8">
            <div class="flex items-center mb-3">
              <div class="w-1 h-5 sm:h-6 bg-impost-primary rounded-full mr-3"></div>
              <h2 class="text-md uppercase tracking-widest font-bold text-white">Deskripsi Pekerjaan
              </h2>
            </div>

            <div class="text-sm sm:text-md text-white leading-relaxed">
              {{ $job->description }}
            </div>
          </div>

          <div class="mb-8">
            <div class="flex items-center mb-3">
              <div class="w-1 h-5 sm:h-6 bg-impost-primary rounded-full mr-3"></div>
              <h2 class="text-md uppercase tracking-widest font-bold text-white">Persyaratan</h2>
            </div>

            <div
              class="prose prose-sm sm:prose-base prose-invert max-w-none prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ul:list-disc prose-ol:list-decimal prose-a:text-blue-400 hover:prose-a:text-blue-300 prose-strong:text-white">
              {!! $job->requirements !!}
            </div>

          </div>

          <div class="mb-10">
            <div class="flex items-center mb-3">
              <div class="w-1 h-5 sm:h-6 bg-impost-primary rounded-full mr-3"></div>
              <h2 class="text-md uppercase tracking-widest font-bold text-white">Tanggung Jawab</h2>
            </div>

            <div
              class="prose prose-sm sm:prose-base prose-invert max-w-none prose-headings:text-white prose-p:text-white prose-li:text-white prose-li:marker:text-white prose-ul:list-disc prose-ol:list-decimal prose-a:text-blue-400 hover:prose-a:text-blue-300 prose-strong:text-white">
              {!! $job->responsibilities !!}
            </div>

          </div>

          <div class="block sm:hidden sticky bottom-4 z-10">
            <a href="{{ $job->apply_link }}" target="_blank"
              class="block w-full text-center px-4 py-2 text-md bg-impost-secondary hover:bg-impost-primary text-white font-semibold rounded-sm">
              Lamar Sekarang
            </a>
          </div>

        </div>
      </section>

    </div>
  </main>
@endsection
