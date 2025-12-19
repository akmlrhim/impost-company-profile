@extends('layouts.admin')

@section('content')
  <x-flash />

  <div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }" class="bg-neutral-primary-soft rounded-base border border-default mb-4">

    <div class="p-4 flex items-center justify-between gap-4">
      <div class="relative flex-1 max-w-md">
        <form action="{{ route('clients.index') }}" method="GET" class="flex items-center gap-2">
          <div class="relative flex-1">
            <input type="text" name="search" value="{{ request('search') }}"
              class="block w-full pr-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
              placeholder="Masukkan kata kunci, lalu tekan Enter" autocomplete="off">
          </div>

          @if (request('search'))
            <a href="{{ route('clients.index') }}"
              class="px-4 py-2 text-sm rounded-sm bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
              Reset
            </a>
          @endif
        </form>
      </div>

      {{-- tombol buka modal --}}
      <button type="button" @click="open = true"
        class="cursor-pointer px-4 py-2 bg-brand text-white rounded-sm shadow-xs text-sm font-medium hover:bg-brand-dark transition whitespace-nowrap">
        Tambah Klien
      </button>
    </div>

    {{-- data view --}}
    <div class="p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                {{ $client->filename }}
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
          <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-12">
            <div class="flex flex-col items-center justify-center text-center">
              <p class="text-gray-500 text-md font-medium">Tidak ada klien ditemukan</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <div class="p-4 border-t border-gray-200">
      {{ $clients->links() }}
    </div>

    {{-- ================= MODAL ================= --}}
    <div id="add-client" x-show="open" x-cloak tabindex="-1"
      class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

      {{-- overlay --}}
      <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/40"></div>

      <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
          <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
            <h3 class="text-lg font-medium text-heading">Tambah Klien</h3>
            <button type="button" @click="open = false"
              class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 inline-flex justify-center items-center">
              ✕
            </button>
          </div>

          <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="pt-4 md:pt-6">
            @csrf
            <div class="mb-4">
              <label class="block mb-2.5 text-sm font-medium text-heading">Logo Klien</label>
              <input type="file" name="client_logo[]" multiple
                class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs">
              @error('client_logo.*')
                <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
              @enderror
            </div>

            <button type="submit"
              class="text-white bg-brand hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-sm px-4 py-2.5 w-full">
              Simpan
            </button>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
