@extends('layouts.admin')
@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-6 space-y-6">
        {{-- nama lengkap --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label for="fullname" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Lengkap
            </label>
            <input type="text" id="fullname" name="fullname"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('fullname') }}" placeholder="Masukkan nama lengkap" autocomplete="off" />
            @error('fullname')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          {{-- posisi --}}
          <div>
            <label for="position" class="block text-sm font-medium text-gray-900 mb-2">
              Posisi
            </label>
            <input type="text" id="position" name="position"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('position') }}" placeholder="Masukkan posisi" autocomplete="off" />
            @error('position')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          {{-- sort  --}}
          <div>
            <label for="sort_order" class="block text-sm font-medium text-gray-900 mb-2">
              Urutan
            </label>
            <input type="number" id="sort_order" name="sort_order" min="0"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('sort_order') }}" placeholder="Masukkan urutan keberapa?" autocomplete="off" />
            @error('sort_order')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
        </div>
        {{-- end  --}}

        {{-- photo  --}}
        <div x-data="{ preview: null }">
          <label class="block text-sm font-medium mb-2" for="photo">
            Foto Profil
          </label>

          <input type="file" name="photo" id="photo" accept="image/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
					const file = $event.target.files[0];
					if (file) {
						preview = URL.createObjectURL(file);
					}
				">

          @error('photo')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">Preview photo</p>
              <img :src="preview" class="w-40 h-auto rounded-md border border-gray-200 shadow-sm object-cover"
                alt="Preview photo">
            </div>
          </template>
        </div>
        {{-- end  --}}

        {{-- sosmed  --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="instagram_link" class="block text-sm font-medium text-gray-900 mb-2">
              Link Instagram
            </label>
            <input type="url" id="instagram_link" name="instagram_link"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('instagram_link') }}" placeholder="https://www.instagram.com" autocomplete="off" />
            @error('instagram_link')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="linkedin_link" class="block text-sm font-medium text-gray-900 mb-2">
              Link LinkedIn
            </label>
            <input type="url" id="linkedin_link" name="linkedin_link"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('linkedin_link') }}" placeholder="https://www.linkedin.com/in/" autocomplete="off" />
            @error('linkedin_link')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
        </div>
        {{-- end  --}}

      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('teams.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Simpan Team'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
