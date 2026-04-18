@extends('layouts.admin')

@section('content')
  <div class="mx-auto space-y-4 sm:space-y-6">

    <div
      class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-4 sm:p-6 rounded border border-gray-200 shadow-sm">
      <div>
        <div class="flex items-center gap-2 sm:gap-3 mb-1">
          <h1 class="text-lg sm:text-2xl font-bold text-gray-900 leading-tight">{{ $jobvacancy->title }}</h1>

          @if ($jobvacancy->status === 'Active')
            <span
              class="bg-green-100 text-green-700 text-[10px] sm:text-xs px-2 py-0.5 rounded-full font-semibold border border-green-200">
              Active
            </span>
          @else
            <span
              class="bg-gray-100 text-gray-600 text-[10px] sm:text-xs px-2 py-0.5 rounded-full font-semibold border border-gray-200">
              Draft
            </span>
          @endif
        </div>
        <p class="text-xs sm:text-sm text-gray-500">
          Dibuat pada {{ $jobvacancy->created_at->format('d M Y, H:i') }}
        </p>
      </div>

      <div class="flex items-center gap-2 sm:gap-3">
        <a href="{{ route('jobvacancies.index') }}"
          class="px-3 py-1.5 sm:px-4 sm:py-2 bg-white border border-gray-300 text-gray-700 rounded text-xs sm:text-sm font-medium hover:bg-gray-50 transition">
          Kembali
        </a>
        <a href="{{ route('jobvacancies.edit', $jobvacancy) }}"
          class="px-3 py-1.5 sm:px-4 sm:py-2 bg-blue-600 text-white rounded text-xs sm:text-sm font-semibold hover:bg-blue-700 transition shadow-sm flex items-center gap-1.5">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
          Edit Data
        </a>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">

      <div class="lg:col-span-2 space-y-4 sm:space-y-6">
        @if ($jobvacancy->details->count() > 0)
          @foreach ($jobvacancy->details as $detail)
            <div class="bg-white p-4 sm:p-6 rounded border border-gray-200 shadow-sm">
              <h3
                class="text-sm sm:text-base font-bold text-gray-800 uppercase tracking-wide border-b border-gray-100 pb-2 sm:pb-3 mb-3 sm:mb-4 flex items-center gap-2">
                @if ($detail->section == 'Tanggung Jawab')
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                  </svg>
                @elseif($detail->section == 'Kualifikasi')
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                @else
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                    </path>
                  </svg>
                @endif
                {{ $detail->section }}
              </h3>

              <div
                class="prose prose-blue max-w-none text-gray-700 
                       prose-p:text-xs prose-li:text-xs prose-ul:text-xs prose-ol:text-xs 
                       sm:prose-p:text-sm sm:prose-li:text-sm sm:prose-ul:text-sm sm:prose-ol:text-sm
                       prose-p:my-1 prose-ul:my-1 prose-li:my-0 prose-headings:text-xs sm:prose-headings:text-sm">
                {!! $detail->content !!}
              </div>
            </div>
          @endforeach
        @else
          <div class="bg-white p-6 sm:p-8 rounded border border-gray-200 shadow-sm text-center">
            <p class="text-xs sm:text-sm text-gray-500 italic">Belum ada detail poin yang ditambahkan.</p>
          </div>
        @endif
      </div>

      <div class="lg:col-span-1 space-y-4 sm:space-y-6">

        <div class="bg-white p-4 sm:p-5 rounded border border-gray-200 shadow-sm">
          <h3 class="font-semibold text-gray-800 mb-3 sm:mb-4 text-xs sm:text-sm uppercase">Informasi Pekerjaan</h3>

          <div class="space-y-3 sm:space-y-4">
            <div>
              <p class="text-[10px] sm:text-xs text-gray-500 uppercase font-semibold mb-1">Tipe Kerja</p>
              <p class="text-xs sm:text-sm font-medium text-gray-800">{{ $jobvacancy->employment_type }}</p>
            </div>

            <div>
              <p class="text-[10px] sm:text-xs text-gray-500 uppercase font-semibold mb-1">Durasi</p>
              <p class="text-xs sm:text-sm font-medium text-gray-800">{{ $jobvacancy->duration ?? '-' }}</p>
            </div>

            <div>
              <p class="text-[10px] sm:text-xs text-gray-500 uppercase font-semibold mb-2">Sistem Kerja</p>
              <div class="flex flex-wrap gap-1.5 sm:gap-2">
                @if (!empty($jobvacancy->work_arrangements))
                  @foreach ($jobvacancy->work_arrangements as $arrangement)
                    <span
                      class="inline-flex items-center px-2 py-0.5 rounded text-[10px] sm:text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                      {{ $arrangement }}
                    </span>
                  @endforeach
                @else
                  <span class="text-xs sm:text-sm text-gray-400">-</span>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded border border-gray-200 shadow-sm">
          <h3 class="font-semibold text-gray-800 mb-3 sm:mb-4 text-xs sm:text-sm uppercase">Instruksi Lamaran</h3>

          <div class="space-y-2.5 sm:space-y-3">
            <div>
              <p class="text-[10px] sm:text-xs text-gray-500 mb-0.5">Kirim Email ke:</p>
              <a href="mailto:{{ $jobvacancy->apply_email }}"
                class="text-xs sm:text-sm font-medium text-blue-600 hover:underline break-all">
                {{ $jobvacancy->apply_email }}
              </a>
            </div>
            <div>
              <p class="text-[10px] sm:text-xs text-gray-500 mb-0.5">Subjek Email:</p>
              <div class="flex items-center gap-2 bg-gray-50 p-2 rounded border border-gray-200">
                <code
                  class="text-xs sm:text-sm font-mono text-gray-700 select-all">{{ $jobvacancy->apply_subject }}</code>
              </div>
            </div>
          </div>
        </div>

        @if ($jobvacancy->poster)
          <div class="bg-white p-4 sm:p-5 rounded border border-gray-200 shadow-sm">
            <h3 class="font-semibold text-gray-800 mb-2 sm:mb-3 text-xs sm:text-sm uppercase">Poster Lowongan</h3>
            <div class="rounded-lg overflow-hidden border border-gray-200">
              <img src="{{ asset('storage/' . $jobvacancy->poster) }}" alt="Poster {{ $jobvacancy->title }}"
                class="w-full h-auto object-cover hover:scale-105 transition duration-500">
            </div>
            <div class="mt-2 sm:mt-3 text-right">
              <a href="{{ asset('storage/' . $jobvacancy->poster) }}" target="_blank"
                class="text-[10px] sm:text-xs text-blue-500 hover:text-blue-700 font-medium flex justify-end items-center gap-1">
                Lihat Ukuran Penuh
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
              </a>
            </div>
          </div>
        @endif

      </div>
    </div>
  </div>
@endsection
