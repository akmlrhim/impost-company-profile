@extends('layouts.admin')
@section('content')
  <button type="button" onclick="window.location.href='{{ route('jobpostings.index') }}'"
    class="cursor-pointer inline-flex items-center mb-4 gap-1 px-5 py-2.5 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-md transition">
    Kembali
  </button>

  <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-4 sm:p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">

        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Posisi</label>
          <p class="mt-1 text-gray-900 font-semibold text-lg">{{ $jobPosting->title }}</p>
        </div>

        <div class="md:col-span-2">
          <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Deskripsi</label>
          <p class="mt-1 text-gray-900 text-sm leading-relaxed">{{ $jobPosting->description }}</p>
        </div>

        <div>
          <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tipe</label>
          <p class="mt-1 text-gray-900 font-medium">{{ ucfirst($jobPosting->type) }}</p>
        </div>

        <div>
          <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</label>
          <div class="mt-1">
            <span
              class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-md {{ $jobPosting->status === 'Open' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
              {{ ucfirst($jobPosting->status) }}
            </span>
          </div>
        </div>

        <div>
          <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Link Melamar</label>
          <a href="{{ $jobPosting->apply_link }}" target="_blank"
            class="mt-1 block text-blue-600 hover:underline font-medium text-xs break-all">
            {{ $jobPosting->apply_link }}
          </a>
        </div>

        <div>
          <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Batas Akhir</label>
          <p class="mt-1 text-gray-900 font-medium">
            {{ \Carbon\Carbon::parse($jobPosting->closing_date)->translatedFormat('d F Y') }}
          </p>
        </div>

      </div>

    </div>

    <div class="border-t border-gray-200"></div>

    <div class="p-4 sm:p-6">
      <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide block mb-3">Persyaratan</label>
      <div class="text-gray-900 prose prose-sm max-w-none">
        {!! $jobPosting->requirements !!}
      </div>
    </div>

    <div class="border-t border-gray-200"></div>

    <div class="p-4 sm:p-6">
      <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide block mb-3">Tanggung Jawab</label>
      <div class="text-gray-900 prose prose-sm max-w-none">
        {!! $jobPosting->responsibilities !!}
      </div>
    </div>
  </div>
@endsection
