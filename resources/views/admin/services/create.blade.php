@extends('layouts.admin')
@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-6 space-y-6">
        {{-- nama layanan --}}
        <div>
          <label for="service_name" class="block text-sm font-medium text-gray-900 mb-2">
            Nama Layanan
          </label>
          <input type="text" id="service_name" name="service_name"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('service_name') }}" placeholder="Masukkan nama layanan" autocomplete="off" />
          @error('service_name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
        {{-- end  --}}

        {{-- cover  --}}
        <div x-data="{ preview: null }">
          <label class="block text-sm font-medium mb-2" for="cover_path">
            Cover
          </label>

          <input type="file" name="cover_path" id="cover_path" accept="image/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
						const file = $event.target.files[0];
						if (file) {
							preview = URL.createObjectURL(file);
						}
					">

          @error('cover_path')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">Preview cover</p>
              <img :src="preview" class="w-40 h-auto rounded-md border border-gray-200 shadow-sm object-cover"
                alt="Preview cover">
            </div>
          </template>
        </div>
        {{-- end  --}}

        {{-- deskripsi  --}}
        <div>
          <label for="description" class="block text-sm font-medium text-gray-900 mb-2">
            Deskripsi
          </label>
          <textarea id="description" name="description" rows="4" autocomplete="off" autocapitalize="sentence"
            class="w-full h-50 px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            placeholder="Masukkan deskripsi layanan">{{ old('description') }}</textarea>

          @error('description')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
        {{-- end  --}}

      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('services.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Simpan Layanan'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
