@extends('layouts.admin')

@section('content')
  <div class="mx-auto py-4">
    <form id="article-form" action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-6 space-y-3">
        {{-- nama --}}
        <div>
          <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
            Nama Portfolio
          </label>
          <input type="text" id="name" name="name"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('name') }}" placeholder="Masukkan nama portfolio" autocomplete="off" />
          @error('name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

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

        {{-- photos --}}
        <div x-data="{ previews: [] }" class="mt-4">
          <label class="block text-sm font-medium mb-2" for="photos">
            Foto Portfolio
          </label>

          <input type="file" name="photos[]" id="photos" accept="image/*" multiple
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
							previews = [];
							for (let i = 0; i < $event.target.files.length; i++) {
								previews.push(URL.createObjectURL($event.target.files[i]));
							}
						">

          <template x-if="previews.length > 0">
            <div class="mt-4 flex flex-wrap gap-2">
              <template x-for="src in previews" :key="src">
                <img :src="src" class="w-24 h-24 object-cover rounded border border-gray-200 shadow-sm"
                  alt="Preview photo">
              </template>
            </div>
          </template>
        </div>
      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('portfolio.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Simpan Portfolio'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
