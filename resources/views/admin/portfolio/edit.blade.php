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

        {{-- media  --}}
        <div x-data="{
            preview: '{{ $portfolio->media_path ? Storage::url($portfolio->media_path) : '' }}',
            oldPreview: '{{ $portfolio->media_path ? Storage::url($portfolio->media_path) : '' }}',
            fileType: '{{ Str::startsWith($portfolio->media_type ?? '', 'video') ? 'video' : 'image' }}'
        }">
          <label class="block text-sm font-medium mb-2" for="media_path">
            Media
          </label>

          <input type="file" name="media_path" id="media_path" accept="image/*,video/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
									const file = $event.target.files[0];
									if (file) {
											if (preview && preview !== oldPreview) {
													URL.revokeObjectURL(preview);
											}
											preview = URL.createObjectURL(file);
											fileType = file.type.startsWith('image/') ? 'image' : 'video';
									}
							">
          @error('media_path')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">
                Preview media
                <span x-show="preview === oldPreview" class="text-indigo-600 font-semibold">(Saat ini)</span>
              </p>

              <template x-if="fileType === 'image'">
                <img :src="preview" class="w-40 h-56 rounded-md border border-gray-200 shadow-sm object-cover"
                  alt="Preview image">
              </template>

              <template x-if="fileType === 'video'">
                <video :src="preview" class="w-full max-w-md h-auto rounded-md border border-gray-200 shadow-sm"
                  controls>
                </video>
              </template>
            </div>
          </template>
        </div>
        {{-- end  --}}

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
