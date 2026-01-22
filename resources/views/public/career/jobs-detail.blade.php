@extends('layouts.public')

@section('content')
  <main class="pt-18 sm:pt-32 py-8 sm:py-16 antialiased bg-[#0a0a0a]">
    <div class="px-4 mx-auto max-w-5xl">

      <div class="mb-8">
        <a href="{{ route('careers') }}"
          class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-impost-primary transition-colors group">
          <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Kembali ke Lowongan
        </a>
      </div>

      <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6 mb-10">
        <div>
          <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">
            {{ $job->title }}
          </h1>

          <div class="flex flex-wrap items-center gap-3">
            <span
              class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
              {{ $job->status === 'Open' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20' }}">
              {{ ucfirst($job->status) }}
            </span>
            <span
              class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/5 text-gray-300 border border-white/10">
              {{ ucfirst($job->type) }}
            </span>
          </div>
        </div>

        <a href="{{ $job->apply_link }}" target="_blank"
          class="hidden md:inline-flex items-center justify-center px-8 py-3 text-sm font-bold text-black bg-impost-primary rounded-xl hover:bg-white transition-all duration-300 shadow-[0_0_15px_rgba(var(--impost-primary),0.3)]">
          Lamar Sekarang
          <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </a>
      </div>

      <div class="bg-[#121212] border border-white/5 rounded-2xl overflow-hidden mb-10 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-white/5">

          <div class="p-6 flex items-start gap-4">
            <div class="p-3 bg-white/5 rounded-lg text-impost-primary">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-1">Tipe Pekerjaan</p>
              <p class="text-base font-semibold text-white">{{ ucfirst($job->type) }}</p>
            </div>
          </div>

          <div class="p-6 flex items-start gap-4">
            <div class="p-3 bg-white/5 rounded-lg text-impost-primary">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-1">Status</p>
              <p class="text-base font-semibold text-white">{{ ucfirst($job->status) }}</p>
            </div>
          </div>

          <div class="p-6 flex items-start gap-4">
            <div class="p-3 bg-white/5 rounded-lg text-impost-primary">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-1">Batas Akhir</p>
              <p class="text-base font-semibold text-white">
                {{ \Carbon\Carbon::parse($job->deadline)->translatedFormat('d F Y') }}
              </p>
            </div>
          </div>

        </div>
      </div>

      <div class="bg-[#121212] border border-white/5 rounded-2xl p-6 md:p-10 space-y-10">

        <div>
          <div class="flex items-center mb-4">
            <span class="w-1 h-6 bg-impost-primary rounded-full mr-3"></span>
            <h2 class="text-lg font-bold text-white uppercase tracking-wider">Deskripsi Pekerjaan</h2>
          </div>
          <div class="text-gray-300 leading-relaxed text-sm md:text-base">
            {{ $job->description }}
          </div>
        </div>

        <div>
          <div class="flex items-center mb-4">
            <span class="w-1 h-6 bg-impost-primary rounded-full mr-3"></span>
            <h2 class="text-lg font-bold text-white uppercase tracking-wider">Persyaratan</h2>
          </div>
          <div
            class="prose prose-invert prose-sm md:prose-base max-w-none text-gray-300 prose-headings:text-white prose-strong:text-white prose-a:text-impost-primary hover:prose-a:text-white">
            {!! $job->requirements !!}
          </div>
        </div>

        <div>
          <div class="flex items-center mb-4">
            <span class="w-1 h-6 bg-impost-primary rounded-full mr-3"></span>
            <h2 class="text-lg font-bold text-white uppercase tracking-wider">Tanggung Jawab</h2>
          </div>
          <div
            class="prose prose-invert prose-sm md:prose-base max-w-none text-gray-300 prose-headings:text-white prose-strong:text-white prose-a:text-impost-primary hover:prose-a:text-white">
            {!! $job->responsibilities !!}
          </div>
        </div>

      </div>

      <div
        class="fixed bottom-0 left-0 right-0 p-4 bg-[#0a0a0a]/90 backdrop-blur-md border-t border-white/10 md:hidden z-50">
        <a href="{{ $job->apply_link }}" target="_blank"
          class="flex items-center justify-center w-full py-3.5 text-sm font-bold text-black bg-impost-primary rounded-xl shadow-lg">
          Lamar Sekarang
        </a>
      </div>

    </div>
  </main>
@endsection
