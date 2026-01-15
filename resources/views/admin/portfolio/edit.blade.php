@extends('layouts.admin')

@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf
      @method('PUT')

      <div class="p-6 space-y-3">
        {{-- juudul --}}
        <div>
          <label for="title" class="block text-sm font-medium text-gray-900 mb-2">
            Judul Portfolio
          </label>
          <input type="text" id="title" name="title"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('title', $portfolio->title) }}" placeholder="Masukkan judul portfolio" autocomplete="off" />
          @error('title')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- kategori --}}
        <div>
          <label for="category_id" class="block text-sm font-medium text-gray-900 mb-2">
            Kategori
          </label>
          <select id="category_id" name="category_id"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow">
            <option value="" disabled selected>Pilih kategori</option>
            @foreach ($category as $id => $name)
              <option value="{{ $id }}"
                {{ old('category_id', $portfolio->category_id) == $id ? 'selected' : '' }}>{{ $name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- cover  --}}
        <div x-data="{
            preview: '{{ $portfolio->cover_path ? asset('storage/' . $portfolio->cover_path) : '' }}',
            oldPreview: '{{ $portfolio->cover_path ? asset('storage/' . $portfolio->cover_path) : '' }}'
        }">
          <label class="block text-sm font-medium mb-2" for="cover_path">
            Cover
          </label>

          <input type="file" name="cover_path" id="cover_path" accept="image/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
						const file = $event.target.files[0];
						if (file) {
							if (preview && preview !== oldPreview) {
								URL.revokeObjectURL(preview);
							}
							preview = URL.createObjectURL(file);
						}
					">

          @error('cover_path')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">
                Preview cover
                <span x-show="preview === oldPreview">(cover saat ini)</span>
              </p>

              <img :src="preview" class="w-40 h-56 rounded-md border border-gray-200 shadow-sm object-cover"
                alt="Preview cover">
            </div>
          </template>
        </div>

        {{-- end  --}}

        {{-- description --}}
        <div>
          <label for="description" class="block text-sm font-medium text-gray-900 mb-2">
            Deskripsi
          </label>
          <textarea id="description" name="description"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            placeholder="Masukkan deskripsi portfolio" rows="4">{{ old('description', $portfolio->description) }}</textarea>
          @error('description')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('portfolio.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Perbarui Portfolio'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
