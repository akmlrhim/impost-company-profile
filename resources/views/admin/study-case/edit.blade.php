{{-- resources/views/study-case/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
  <x-flash />

  <div class="mx-auto py-4">
    <form action="{{ route('study-case.update', $studyCase->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">

      @csrf
      @method('PUT')

      <div class="p-6 space-y-3">
        <div>
          <label class="block text-sm font-medium mb-2">Nama study case</label>
          <input name="name" value="{{ old('name', $studyCase->name) }}" class="w-full px-3 py-2.5 border rounded-md">
          @error('name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div x-data="{ preview: null }">
          <label class="block text-sm font-medium mb-2">Cover</label>
          <input type="file" name="cover_path" accept="image/*"
            @change="preview = URL.createObjectURL($event.target.files[0])" class="w-full border rounded">

          @if ($studyCase->cover_path)
            <img src="{{ asset('storage/' . $studyCase->cover_path) }}" class="mt-3 w-40 rounded border">
          @endif

          <template x-if="preview">
            <img :src="preview" class="mt-3 w-40 rounded border">
          </template>
        </div>

        <div>
          <label class="block text-sm font-medium mb-2">Situasi</label>
          <textarea name="situation" rows="4" class="w-full border rounded p-3">{{ old('situation', $studyCase->situation) }}</textarea>
        </div>

        <div>
          <label class="block text-sm font-medium mb-2">Solusi</label>
          <textarea name="solution" rows="4" class="w-full border rounded p-3">{{ old('solution', $studyCase->solution) }}</textarea>
        </div>

        <div>
          <label class="block text-sm font-medium mb-2">Hasil</label>
          <textarea name="result" rows="4" class="w-full border rounded p-3">{{ old('result', $studyCase->result) }}</textarea>
        </div>

        <div x-data="{ previews: [] }">
          <label class="block text-sm font-medium mb-2">Foto study case</label>
          <input type="file" name="photos[]" multiple accept="image/*"
            @change="
						previews = [];
						for (let i = 0; i < $event.target.files.length; i++) {
							previews.push(URL.createObjectURL($event.target.files[i]));
						}
					"
            class="w-full border rounded">

          @if ($studyCase->photos->count())
            <div class="mt-4 flex gap-2 flex-wrap">
              @foreach ($studyCase->photos as $photo)
                <img src="{{ asset('storage/' . $photo->photo_path) }}" class="w-24 h-24 object-cover rounded border">
              @endforeach
            </div>
          @endif

          <template x-if="previews.length">
            <div class="mt-4 flex gap-2 flex-wrap">
              <template x-for="src in previews" :key="src">
                <img :src="src" class="w-24 h-24 object-cover rounded border">
              </template>
            </div>
          </template>
        </div>
      </div>

      <div class="px-6 py-4 bg-gray-50 border-t flex justify-end gap-3">
        <a href="{{ route('study-case.index') }}" class="px-4 py-2 border rounded">
          Batal
        </a>
        <button type="submit" :disabled="loading"
          class="px-4 py-2 bg-blue-600 text-white rounded disabled:opacity-50">
          <span x-text="loading ? 'Menyimpan...' : 'Update Study Case'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
