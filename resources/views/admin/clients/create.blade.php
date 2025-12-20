@extends('layouts.admin')

@section('content')
  <div class="w-full md:w-2/3 lg:w-1/2">

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-4 sm:p-6 space-y-6">

        <div x-data="{
            previews: [],
            handleFiles(event) {
                this.previews = [];
                Array.from(event.target.files).forEach(file => {
                    if (!file.type.startsWith('image/')) return;
                    this.previews.push(URL.createObjectURL(file));
                });
            }
        }">
          <label for="client_logo" class="block text-sm font-medium text-gray-900 mb-2">
            Client Logo
          </label>

          <input id="client_logo" type="file" name="client_logo[]" multiple accept="image/*"
            @change="handleFiles($event)"
            class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full shadow-xs">

          @error('client_logo.*')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="previews.length">
            <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
              <template x-for="(img, index) in previews" :key="index">
                <div class="border border-gray-200 rounded-md overflow-hidden shadow-sm">
                  <img :src="img" class="w-full h-28 object-contain bg-white" alt="Preview logo">
                </div>
              </template>
            </div>
          </template>
        </div>
      </div>

      <div class="px-4 sm:px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row sm:justify-end gap-3">

        <a href="{{ route('clients.index') }}"
          class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="w-full sm:w-auto cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
          <span x-text="loading ? 'Menyimpan...' : 'Simpan Klien'"></span>
        </button>

      </div>
    </form>

  </div>
@endsection
