@extends('layouts.admin')

@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('testimonials.index') }}" add-route="{{ route('testimonials.create') }}"
    add-label="Tambah Testimoni" />

  <div class="bg-neutral-primary-soft rounded-base border border-default">
    <div class="p-6">

      {{-- Grid Layout: Diubah ke 3 kolom di layar besar agar lebih rapi --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">

        @forelse ($testimonials as $testimonial)
          <div
            class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col h-full group">

            @if ($testimonial->media_path)
              <div class="relative w-full aspect-video bg-gray-100 border-b border-gray-100">
                @if ($testimonial->media_type === 'video')
                  <video controls class="w-full h-full object-cover">
                    <source src="{{ asset('storage/' . $testimonial->media_path) }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                  </video>
                  <div class="absolute top-2 right-2 bg-black/50 p-1.5 rounded-full backdrop-blur-sm pointer-events-none">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                  </div>
                @else
                  <img src="{{ asset('storage/' . $testimonial->media_path) }}" alt="{{ $testimonial->name }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                @endif
              </div>
            @else
              <div
                class="w-full h-24 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-100 flex items-center justify-center">
                <span class="text-xs text-gray-400 font-medium italic">Tanpa Media</span>
              </div>
            @endif

            {{-- 2. BAGIAN KONTEN --}}
            <div class="p-5 flex flex-col flex-1">

              {{-- Header: Nama & Perusahaan --}}
              <div class="mb-3">
                <h3 class="font-bold text-gray-900 line-clamp-1" title="{{ $testimonial->name }}">
                  {{ $testimonial->name }}
                </h3>
                <div class="flex items-center gap-1.5 mt-0.5">
                  <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                  <p class="text-xs font-medium text-blue-600 truncate">
                    {{ $testimonial->company_name }}
                  </p>
                </div>
              </div>

              <div class="relative mb-4">
                <svg class="absolute top-0 left-0 w-6 h-6 text-gray-100 -translate-x-2 -translate-y-2 transform"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M14.017 21L14.017 18C14.017 16.0547 15.6896 15.5422 16.2798 14.8601C16.8699 14.1779 16.5753 12.8125 15.9852 12.8125H14.5103C13.4285 12.8125 12.5432 11.9272 12.5432 10.8454V7.40698C12.5432 6.32512 13.4285 5.43986 14.5103 5.43986H18.9348C20.0166 5.43986 20.9019 6.32512 20.9019 7.40698V11.8314C20.9019 15.6565 17.7554 21 14.017 21ZM5.16335 21L5.16335 18C5.16335 16.0547 6.83594 15.5422 7.42608 14.8601C8.01622 14.1779 7.72159 12.8125 7.13145 12.8125H5.6566C4.57473 12.8125 3.68945 11.9272 3.68945 10.8454V7.40698C3.68945 6.32512 4.57473 5.43986 5.6566 5.43986H10.0811C11.1629 5.43986 12.0482 6.32512 12.0482 7.40698V11.8314C12.0482 15.6565 8.90176 21 5.16335 21Z" />
                </svg>
                <p class="text-gray-600 text-sm italic pl-4 line-clamp-3 leading-relaxed relative z-10">
                  "{{ $testimonial->content }}"
                </p>
              </div>

              {{-- Tombol Aksi --}}
              <div class="mt-auto pt-4 border-t border-gray-100 flex items-center gap-2">
                <button onclick="window.location.href='{{ route('testimonials.edit', $testimonial) }}'"
                  class="text-yellow-700 cursor-pointer flex-1 inline-flex justify-center items-center gap-1.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-3 py-1.5 rounded-md text-xs font-medium transition-all shadow-sm">
                  Edit
                </button>

                {{-- Component Delete --}}
                <div class="flex-1">
                  <x-confirm-delete action="{{ route('testimonials.destroy', $testimonial) }}"
                    class="w-full cursor-pointer text-red-600 justify-center items-center gap-1.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-3 py-1.5 rounded-md text-xs font-medium transition-all shadow-sm" />
                </div>
              </div>

            </div>
          </div>
        @empty
          {{-- Empty State --}}
          <div class="col-span-full bg-white rounded-lg border border-dashed border-gray-300 p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <h3 class="text-gray-900 font-medium text-lg">Belum ada testimoni</h3>
              <p class="text-gray-500 text-sm mt-1 max-w-sm">Mulai kumpulkan kepercayaan klien dengan menambahkan
                testimoni pertama Anda.</p>
              <a href="{{ route('testimonials.create') }}"
                class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Tambah Testimoni
              </a>
            </div>
          </div>
        @endforelse
      </div>

    </div>

    @if ($testimonials->hasPages())
      <div class="p-4 border-t border-gray-200 bg-gray-50">
        {{ $testimonials->links() }}
      </div>
    @endif
  </div>
@endsection
