@extends('layouts.public')

@section('title', $job->title . ' | Impost Media')
@section('meta_description',
  'Lowongan kerja ' . $job->title . ' di Impost Media. Lihat detail pekerjaan, kualifikasi, dan cara melamar.')
@section('og_type', 'article')

@push('json-ld')
  @php
    $jobPostingJsonLd = [
      '@context'          => 'https://schema.org',
      '@type'             => 'JobPosting',
      'title'             => $job->title,
      'description'       => $job->title . ' - Lowongan kerja di Impost Media',
      'datePosted'        => $job->created_at->toIso8601String(),
      'employmentType'    => strtoupper(str_replace(' ', '_', $job->employment_type ?? 'FULL_TIME')),
      'hiringOrganization'=> ['@type'=>'Organization','name'=>'Impost Media','sameAs'=>url('/'),'logo'=>asset('img/og_image.png')],
      'jobLocation'       => ['@type'=>'Place','address'=>['@type'=>'PostalAddress','streetAddress'=>'Jl. Kawamara No.3, Landasan Ulin Tengah','addressLocality'=>'Banjarbaru','addressRegion'=>'Kalimantan Selatan','postalCode'=>'70724','addressCountry'=>'ID']],
    ];
    if (!empty($job->work_arrangements) && in_array('Remote', $job->work_arrangements)) $jobPostingJsonLd['jobLocationType'] = 'TELECOMMUTE';
    if ($job->status !== 'Active') $jobPostingJsonLd['validThrough'] = $job->updated_at->toIso8601String();
  @endphp
  <script type="application/ld+json">{!! json_encode($jobPostingJsonLd, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
<div class="bg-impost-fifth min-h-screen pt-24 sm:pt-32 pb-16 sm:pb-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-1.5 text-xs text-white/40 mb-8 sm:mb-12" aria-label="Breadcrumb">
      <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <a href="{{ route('careers') }}" class="hover:text-white transition-colors">Karir</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <span class="text-white/60 line-clamp-1">{{ $job->title }}</span>
    </nav>

    {{-- Two-column grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_340px] gap-10 lg:gap-16 items-start">

      {{-- ── LEFT: Main content ────────────────────────────────────────────── --}}
      <div>

        {{-- Job header --}}
        <div class="mb-10 sm:mb-12 pb-8 border-b border-white/[0.08]">

          {{-- Status + type chips --}}
          <div class="flex flex-wrap items-center gap-2 mb-5">
            @if ($job->status === 'Active')
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-emerald-500/15 text-emerald-400 border border-emerald-500/25">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                Sedang Dibuka
              </span>
            @else
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-red-500/15 text-red-400 border border-red-500/25">
                Ditutup
              </span>
            @endif

            <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-impost-primary/15 text-impost-primary border border-impost-primary/25">
              {{ $job->employment_type }}
            </span>

            @if (!empty($job->work_arrangements))
              @foreach ($job->work_arrangements as $arr)
                <span class="px-3 py-1 rounded-full text-[11px] font-semibold border border-white/[0.12] text-white/60">
                  {{ $arr }}
                </span>
              @endforeach
            @endif
          </div>

          {{-- Title --}}
          <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight mb-4">{{ $job->title }}</h1>

          {{-- Meta row --}}
          <div class="flex items-center gap-4 text-sm text-white/40">
            <span class="flex items-center gap-1.5">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              Diposting {{ $job->created_at->format('d M Y') }}
            </span>
            <span class="flex items-center gap-1.5">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              Banjarbaru, Kalimantan Selatan
            </span>
          </div>
        </div>

        {{-- Detail sections - editorial style (no per-section cards) --}}
        @if ($job->details->count() > 0)
          <div class="space-y-10 sm:space-y-12">
            @foreach ($job->details as $detail)
              <div class="{{ !$loop->first ? 'pt-10 sm:pt-12 border-t border-white/[0.07]' : '' }}">

                {{-- Section heading with gold left accent --}}
                <div class="flex items-center gap-3 mb-5">
                  <span class="w-0.5 h-5 rounded-full bg-impost-primary shrink-0"></span>
                  <h2 class="text-lg font-bold text-white">{{ $detail->section }}</h2>
                </div>

                <div class="prose prose-invert max-w-none
                  prose-p:text-white prose-p:leading-relaxed prose-p:text-sm sm:prose-p:text-base
                  prose-ul:text-white prose-ul:text-sm sm:prose-ul:text-base
                  prose-li:text-white prose-li:leading-relaxed prose-li:my-1
                  prose-li:marker:text-impost-primary
                  prose-strong:text-white prose-strong:font-bold
                  prose-a:text-impost-primary prose-a:no-underline hover:prose-a:underline">
                  {!! $detail->content !!}
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="py-12 text-center border border-dashed border-white/[0.08] rounded-2xl">
            <p class="text-sm text-white/30">Detail informasi belum tersedia.</p>
          </div>
        @endif

        {{-- Mobile apply CTA --}}
        <div class="mt-12 lg:hidden bg-[#d4ac3c] rounded-2xl p-6">
          <h3 class="font-bold text-black mb-4">Tertarik bergabung?</h3>
          <p class="text-sm text-black/70 mb-5 leading-relaxed">
            Kirim CV dan portofolio terbaikmu ke email di bawah ini.
          </p>
          <a href="mailto:{{ $job->apply_email }}?subject={{ urlencode($job->apply_subject) }}"
            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full
              bg-black text-white text-sm font-bold hover:bg-[#111] transition-colors">
            Lamar Sekarang
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
          </a>
        </div>

      </div>

      {{-- ── RIGHT: Sticky sidebar ──────────────────────────────────────────── --}}
      <div class="hidden lg:block">
        <div class="sticky top-28 space-y-4">

          {{-- Job summary --}}
          <div class="bg-white/[0.04] border border-white/[0.08] rounded-2xl p-6">
            <p class="text-[10px] font-bold text-white/30 uppercase tracking-widest mb-5">Ringkasan Posisi</p>

            <div class="space-y-4">

              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-white/[0.05] flex items-center justify-center shrink-0">
                  <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                  </svg>
                </div>
                <div>
                  <p class="text-[10px] text-white/35 uppercase tracking-wide font-semibold mb-1">Tipe Pekerjaan</p>
                  <p class="text-sm font-bold text-white">{{ $job->employment_type }}</p>
                </div>
              </div>

              @if (!empty($job->work_arrangements))
                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-xl bg-white/[0.05] flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <div>
                    <p class="text-[10px] text-white/35 uppercase tracking-wide font-semibold mb-1.5">Sistem Kerja</p>
                    <div class="flex flex-wrap gap-1.5">
                      @foreach ($job->work_arrangements as $arr)
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold
                          bg-impost-primary/15 text-impost-primary border border-impost-primary/25">
                          {{ $arr }}
                        </span>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif

              @if ($job->duration)
                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-xl bg-white/[0.05] flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  </div>
                  <div>
                    <p class="text-[10px] text-white/35 uppercase tracking-wide font-semibold mb-1">Durasi</p>
                    <p class="text-sm font-bold text-white">{{ $job->duration }}</p>
                  </div>
                </div>
              @endif

              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-white/[0.05] flex items-center justify-center shrink-0">
                  <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                </div>
                <div>
                  <p class="text-[10px] text-white/35 uppercase tracking-wide font-semibold mb-1">Diposting</p>
                  <p class="text-sm font-bold text-white">{{ $job->created_at->format('d M Y') }}</p>
                </div>
              </div>

            </div>
          </div>

          {{-- Apply card --}}
          <div class="bg-[#d4ac3c] rounded-2xl p-6">
            <h3 class="font-bold text-black mb-1">Tertarik bergabung?</h3>
            <p class="text-xs text-black/60 leading-relaxed mb-5">
              Kirim CV dan portofolio terbaikmu ke email berikut.
            </p>

            <div class="space-y-3 mb-5">
              <div class="bg-black/10 rounded-xl p-3">
                <p class="text-[10px] font-bold text-black/50 uppercase tracking-wide mb-1">Email</p>
                <a href="mailto:{{ $job->apply_email }}"
                  class="text-sm font-bold text-black hover:underline break-all">
                  {{ $job->apply_email }}
                </a>
              </div>
              <div class="bg-black/10 rounded-xl p-3">
                <p class="text-[10px] font-bold text-black/50 uppercase tracking-wide mb-1">Subject Email</p>
                <code class="text-xs text-black font-mono leading-relaxed select-all block">
                  {{ $job->apply_subject }}
                </code>
              </div>
            </div>

            <a href="mailto:{{ $job->apply_email }}?subject={{ urlencode($job->apply_subject) }}"
              class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full
                bg-black text-white text-sm font-bold hover:bg-[#111] transition-colors">
              Lamar Sekarang
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
              </svg>
            </a>
          </div>

          {{-- Poster with lightbox --}}
          @if ($job->poster)
            <div class="bg-white/[0.04] border border-white/[0.08] rounded-2xl overflow-hidden"
              x-data="{ showLightbox: false }">

              <div class="relative group cursor-pointer" @click="showLightbox = true; document.body.style.overflow = 'hidden'">
                <img src="{{ asset('storage/' . $job->poster) }}" alt="Poster {{ $job->title }}"
                  class="w-full h-auto object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300
                  flex items-center justify-center">
                  <span class="flex items-center gap-2 bg-impost-primary text-black text-xs font-bold px-4 py-2 rounded-full">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                    </svg>
                    Perbesar
                  </span>
                </div>
              </div>

              <template x-teleport="body">
                <div x-show="showLightbox" x-cloak
                  @click.self="showLightbox = false; document.body.style.overflow = 'auto'"
                  @keydown.escape.window="showLightbox = false; document.body.style.overflow = 'auto'"
                  x-transition:enter="transition ease-out duration-200"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition ease-in duration-150"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/95 backdrop-blur-md p-4">

                  <button @click="showLightbox = false; document.body.style.overflow = 'auto'"
                    class="fixed top-5 right-5 z-[100000] w-10 h-10 rounded-full bg-white/10 hover:bg-white/20
                      text-white flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                  </button>

                  <div @click.stop
                    x-transition:enter="transition ease-out duration-200 delay-75"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="max-w-[90vw] max-h-[90vh]">
                    <img src="{{ asset('storage/' . $job->poster) }}" alt="Poster {{ $job->title }}"
                      class="w-auto h-auto max-w-full max-h-[90vh] object-contain rounded-2xl shadow-2xl">
                  </div>
                </div>
              </template>
            </div>
          @endif

          {{-- Back link --}}
          <a href="{{ route('careers') }}"
            class="flex items-center gap-2 text-xs font-semibold text-white/35 hover:text-white/70 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke semua lowongan
          </a>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection
