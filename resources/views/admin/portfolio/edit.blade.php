@extends('layouts.admin')

@section('content')
  <div class="mx-auto py-4">
    <form id="article-form" action="{{ route('portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf
      @method('PUT')

      <div class="p-6 space-y-3">
        {{-- nama --}}
        <div>
          <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
            Nama Portfolio
          </label>
          <input type="text" id="name" name="name"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('name', $portfolio->name) }}" placeholder="Masukkan nama portfolio" autocomplete="off" />
          @error('name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- cover  --}}
        <div x-data="{ preview: '{{ $portfolio->cover_path ? asset('storage/' . $portfolio->cover_path) : '' }}' }">
          <label class="block text-sm font-medium mb-2">Cover</label>

          <input type="file" name="cover_path" accept="image/*"
            class="w-full text-sm border border-gray-300 rounded-sm"
            @change="preview = URL.createObjectURL($event.target.files[0])">

          @error('cover_path')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-3">
              <p class="text-xs text-gray-500 mb-1">Preview cover</p>
              <img :src="preview" class="w-40 rounded-md border object-cover">
            </div>
          </template>
        </div>
        {{-- end  --}}

        {{-- photos --}}
        @if ($portfolio->photos->count())
          <div>
            <p class="text-sm font-medium mb-2">Foto Saat Ini</p>
            <div class="flex flex-wrap gap-3">
              @foreach ($portfolio->photos as $photo)
                <div class="relative">
                  <img src="{{ asset('storage/' . $photo->photo_path) }}" class="w-24 h-24 object-cover rounded border">
                  <label class="absolute top-1 right-1 bg-white rounded px-1 text-xs">
                    <input type="checkbox" name="delete_photos[]" value="{{ $photo->id }}"
                      class="scale-50 rounded-md border-danger">
                    Hapus
                  </label>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <div x-data="{ previews: [] }">
          <label class="block text-sm font-medium mb-2">
            Tambah Foto Portfolio
          </label>

          <input type="file" name="photos[]" multiple accept="image/*"
            class="w-full text-sm border border-gray-300 rounded-sm"
            @change="
            previews = [];
            [...$event.target.files].forEach(file => previews.push(URL.createObjectURL(file)))
          ">

          <template x-if="previews.length">
            <div class="mt-3 flex flex-wrap gap-2">
              <template x-for="src in previews" :key="src">
                <img :src="src" class="w-24 h-24 object-cover rounded border">
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

          <span x-text="loading ? 'Menyimpan...' : 'Update Portfolio'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
