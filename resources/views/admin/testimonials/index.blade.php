@extends('layouts.admin')
@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('testimonials.index') }}" add-route="{{ route('testimonials.create') }}"
    add-label="Tambah Testimoni" />

  <div class="bg-neutral-primary-soft rounded-base border border-default">
    <div class="p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 items-stretch">
        @forelse ($testimonials as $testimonial)
          <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 h-full">

            <div class="p-6 flex flex-col h-full">

              <div class="flex items-start justify-between mb-4">
                <div>
                  <h3 class="font-semibold text-gray-800">{{ $testimonial->name }}</h3>
                  <p class="text-sm text-gray-500">{{ $testimonial->company_name }}</p>
                </div>
              </div>

              <p class="text-black text-sm mb-4">
                {{ $testimonial->content }}
              </p>

              <div class="mt-auto flex space-x-2 pt-4">
                <button onclick="window.location.href='{{ route('testimonials.edit', $testimonial) }}'"
                  class="cursor-pointer flex-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                  Edit
                </button>

                <x-confirm-delete action="{{ route('testimonials.destroy', $testimonial) }}" />
              </div>

            </div>
          </div>
        @empty
          <div class="col-span-full bg-white p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-gray-500 text-md font-medium">Tidak ada testimoni ditemukan</p>
              <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan testimoni baru</p>
            </div>
          </div>
        @endforelse
      </div>

    </div>

    <div class="p-4 border-t border-gray-200">
      {{ $testimonials->links() }}
    </div>
  </div>
@endsection
