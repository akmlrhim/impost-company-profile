@extends('layouts.admin')

@section('content')
  <x-flash />

  <x-search-bar search-route="{{ route('clients.index') }}" add-route="{{ route('clients.create') }}"
    add-label="Tambah Klien" />

  {{-- data view --}}
  <div class="bg-neutral-primary-soft rounded-base border border-default mb-4">
    <div class="p-4">

      @if ($clients->isNotEmpty())
        <x-confirm-delete class="mb-2 bg-red-600 rounded-md text-white text-sm font-medium px-3 py-1 cursor-pointer"
          label="Hapus Semua Data" :action="route('truncate-clients')" message="Apakah anda yakin ingin menghapus semua data?" />
      @endif

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($clients as $client)
          <div class="bg-white rounded-sm shadow-sm overflow-hidden flex flex-col h-full">

            <div class="relative h-48 bg-gray-100 flex items-center justify-center">
              @if ($client->client_logo)
                <img src="{{ asset('storage/' . $client->client_logo) }}" alt="{{ $client->filename ?? 'Logo Klien' }}"
                  loading="lazy"
                  class="w-28 h-28 rounded-full object-contain bg-white p-3 shadow-sm transition-transform duration-200 hover:scale-105">
              @else
                <div class="w-28 h-28 rounded-full bg-gray-200 flex items-center justify-center">
                  <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
              @endif
            </div>

            <div class="p-5 flex flex-col flex-1">
              <h3 class="text-sm font-semibold text-gray-900 mb-2">
                {{ pathinfo(substr($client->filename, strpos($client->filename, '-') + 1), PATHINFO_FILENAME) }}
              </h3>

              <div class="mt-auto flex items-center gap-2">
                <a href="{{ route('clients.edit', $client) }}"
                  class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-impost-primary rounded-sm hover:bg-opacity-90 transition-colors">
                  Edit
                </a>
                <x-confirm-delete :action="route('clients.destroy', $client)" label="Hapus" />
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-1 md:col-span-2 lg:col-span-4 bg-white p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <p class="text-gray-500 text-md font-medium">Tidak ada klien ditemukan</p>
              <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan klien baru</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <div class="p-4 border-t border-gray-200">
      {{ $clients->links() }}
    </div>
  </div>
@endsection
