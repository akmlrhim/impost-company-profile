@extends('layouts.public')

@section('title', $job->title . ' | Impost Media')
@section('meta_description',
  'Lowongan kerja ' .
  $job->title .
  ' di Impost Media. Lihat detail pekerjaan, kualifikasi,
  dan cara melamar.')

@section('og_type', 'article')

@push('json-ld')
  @php
    $jobPostingJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'JobPosting',
        'title' => $job->title,
        'description' => $job->title . ' - Lowongan kerja di Impost Media',
        'datePosted' => $job->created_at->toIso8601String(),
        'employmentType' => strtoupper(str_replace(' ', '_', $job->employment_type ?? 'FULL_TIME')),
        'hiringOrganization' => [
            '@type' => 'Organization',
            'name' => 'Impost Media',
            'sameAs' => url('/'),
            'logo' => asset('img/og_image.png'),
        ],
        'jobLocation' => [
            '@type' => 'Place',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Jl. Kawamara No.3, Landasan Ulin Tengah',
                'addressLocality' => 'Banjarbaru',
                'addressRegion' => 'Kalimantan Selatan',
                'postalCode' => '70724',
                'addressCountry' => 'ID',
            ],
        ],
    ];

    // Add remote job location if applicable
    if (!empty($job->work_arrangements) && in_array('Remote', $job->work_arrangements)) {
        $jobPostingJsonLd['jobLocationType'] = 'TELECOMMUTE';
    }

    if ($job->status !== 'Active') {
        $jobPostingJsonLd['validThrough'] = $job->updated_at->toIso8601String();
    }
  @endphp
  <script type="application/ld+json">{!! json_encode($jobPostingJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased bg-impost-fifth min-h-screen">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="mb-4 sm:mb-6">
        <nav class="flex overflow-x-auto whitespace-nowrap scrollbar-hide pb-2 -mb-2" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
              <a href="{{ route('home') }}"
                class="inline-flex items-center text-xs sm:text-sm font-medium text-gray-400 hover:text-white transition-colors">
                <svg class="w-3.5 h-3.5 mr-2 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Home
              </a>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="w-3 h-3 text-gray-500 mx-1 flex-shrink-0" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('careers') }}"
                  class="ml-1 text-xs sm:text-sm font-medium text-gray-400 hover:text-white transition-colors md:ml-2">Karir</a>
              </div>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="w-3 h-3 text-gray-500 mx-1 flex-shrink-0" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span
                  class="ml-1 text-xs sm:text-sm font-medium text-white md:ml-2 line-clamp-1 max-w-[150px] sm:max-w-xs md:max-w-md lg:max-w-lg">{{ $job->title }}</span>
              </div>
            </li>
          </ol>
        </nav>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-12">

        <div class="lg:col-span-2 space-y-6 sm:space-y-8">

          <div class="border-b border-impost-fourth pb-6">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-3 sm:mb-4">
              {{ $job->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-3 sm:gap-4 text-xs sm:text-sm">
              <div class="flex items-center gap-1.5 text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Diposting {{ $job->created_at->format('d M Y') }}</span>
              </div>

              @if ($job->status === 'Active')
                <span
                  class="px-2 py-0.5 rounded-full bg-impost-primary/10 text-impost-primary border border-impost-primary/20 text-[10px] sm:text-xs font-semibold uppercase tracking-wide">
                  Sedang Dibuka
                </span>
              @else
                <span
                  class="px-2 py-0.5 rounded-full bg-red-900/20 text-red-400 border border-red-900/30 text-[10px] sm:text-xs font-semibold uppercase tracking-wide">
                  Ditutup
                </span>
              @endif
            </div>
          </div>

          @if ($job->details->count() > 0)
            <div class="space-y-6 sm:space-y-8">
              @foreach ($job->details as $detail)
                <div class="bg-impost-fifth border border-impost-fourth rounded-lg p-4 sm:p-8">

                  <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-impost-primary mb-4 sm:mb-6 flex items-center gap-3">
                    <span class="p-1.5 sm:p-2 bg-impost-primary/10 rounded-lg text-impost-primary">
                      <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                      </svg>
                    </span>
                    {{ $detail->section }}
                  </h3>

                  <div
                    class="prose prose-invert max-w-none 
                  prose-p:text-xs sm:prose-p:text-sm 
                  prose-ul:text-xs sm:prose-ul:text-sm 
                  prose-ol:text-xs sm:prose-ol:text-sm 
                  prose-li:text-xs sm:prose-li:text-sm 
                  prose-headings:text-sm sm:prose-headings:text-base
                  prose-p:text-gray-300 prose-p:leading-relaxed
                  prose-headings:text-white 
                  prose-strong:text-impost-primary
                  prose-ul:text-gray-300 prose-li:marker:text-impost-fourth
                  prose-a:text-impost-primary prose-a:no-underline hover:prose-a:underline">
                    {!! $detail->content !!}
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div class="p-6 sm:p-8 border border-dashed border-impost-fourth rounded-lg text-center">
              <p class="text-sm text-gray-500">Detail informasi belum tersedia.</p>
            </div>
          @endif

        </div>

        <div class="lg:col-span-1">
          <div class="sticky top-24 sm:top-32 space-y-6">

            <div
              class="bg-impost-fifth border border-impost-fourth rounded-lg p-5 sm:p-6 shadow-lg shadow-impost-primary/5">
              <h4
                class="text-white font-bold uppercase tracking-wider text-xs sm:text-sm mb-4 sm:mb-5 border-b border-impost-fourth pb-3">
                Ringkasan Pekerjaan
              </h4>

              <div class="space-y-4">
                <div class="flex items-start gap-3">
                  <div class="mt-0.5 sm:mt-1">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                      </path>
                    </svg>
                  </div>
                  <div>
                    <p class="text-[10px] sm:text-xs text-gray-500 uppercase font-semibold">Tipe Kerja</p>
                    <p class="text-sm sm:text-base text-white font-medium">{{ $job->employment_type }}</p>
                  </div>
                </div>

                <div class="flex items-start gap-3">
                  <div class="mt-0.5 sm:mt-1">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                      </path>
                    </svg>
                  </div>
                  <div>
                    <p class="text-[10px] sm:text-xs text-gray-500 uppercase font-semibold mb-1">Sistem</p>
                    <div class="flex flex-wrap gap-1.5 sm:gap-2">
                      @if (!empty($job->work_arrangements))
                        @foreach ($job->work_arrangements as $arrangement)
                          <span
                            class="inline-block px-2 py-0.5 rounded text-[10px] bg-impost-primary/20 text-impost-primary border border-impost-primary/30">
                            {{ $arrangement }}
                          </span>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="bg-gradient-to-br from-impost-primary to-impost-secondary rounded-lg p-5 sm:p-6 shadow-lg text-impost-fifth">
              <h4 class="font-bold text-base sm:text-lg mb-3 sm:mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                  </path>
                </svg>
                Cara Melamar
              </h4>

              <div class="space-y-3 sm:space-y-4">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded border border-white/10">
                  <p class="text-[10px] sm:text-xs font-semibold opacity-70 uppercase mb-0.5">Kirim CV ke Email:</p>
                  <a href="mailto:{{ $job->apply_email }}"
                    class="font-bold text-sm sm:text-lg hover:underline break-all">
                    {{ $job->apply_email }}
                  </a>
                </div>

                <div class="bg-white/20 backdrop-blur-sm p-3 rounded border border-white/10">
                  <p class="text-[10px] sm:text-xs font-semibold opacity-70 uppercase mb-0.5">Subjek Email:</p>
                  <code
                    class="block bg-impost-fifth/80 text-impost-primary p-2 rounded text-xs sm:text-sm font-mono select-all">
                    {{ $job->apply_subject }}
                  </code>
                </div>
              </div>
            </div>

            @if ($job->poster)
              <div class="bg-impost-fifth border border-impost-fourth rounded-lg p-2" x-data="{ showLightbox: false }">
                <div class="relative group overflow-hidden rounded cursor-pointer"
                  @click="showLightbox = true; document.body.style.overflow = 'hidden'">
                  <img src="{{ asset('storage/' . $job->poster) }}" alt="Poster {{ $job->title }}"
                    class="w-full h-auto object-cover object-top opacity-90 transition duration-500 group-hover:scale-105 group-hover:opacity-100">

                  <div
                    class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <span
                      class="flex items-center gap-2 text-white bg-impost-primary px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                      </svg>
                      Perbesar Poster
                    </span>
                  </div>
                </div>

                <template x-teleport="body">
                  <div x-show="showLightbox" x-cloak
                    @click.self="showLightbox = false; document.body.style.overflow = 'auto'"
                    @keydown.escape.window="showLightbox = false; document.body.style.overflow = 'auto'"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/98 backdrop-blur-md"
                    style="margin: 0 !important; padding: 0 !important;">

                    <button @click="showLightbox = false; document.body.style.overflow = 'auto'"
                      class="fixed top-4 right-4 sm:top-6 sm:right-6 z-[100000] p-2 sm:p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all hover:scale-110 active:scale-95">
                      <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>

                    <div class="relative w-full h-full flex items-center justify-center p-4 sm:p-8">
                      <div @click.stop x-show="showLightbox"
                        x-transition:enter="transition ease-out duration-300 delay-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="relative max-w-[95vw] max-h-[90vh]">
                        <img src="{{ asset('storage/' . $job->poster) }}" alt="Poster {{ $job->title }}"
                          class="w-auto h-auto max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl ring-1 ring-white/10">
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            @endif

          </div>
        </div>

      </div>
    </div>
  </main>
@endsection
