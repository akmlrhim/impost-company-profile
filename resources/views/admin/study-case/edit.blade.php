@extends('layouts.admin')

@section('content')
  <x-flash />

  <div class="mx-auto py-4">
    <form action="{{ route('study-case.update', $studyCase) }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">

      @csrf
      @method('PUT')

      <div class="p-6 space-y-3">

        {{-- nama --}}
        <div>
          <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
            Nama study case <span class="text-danger">*</span>
          </label>

          <input type="text" id="name" name="name"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('name', $studyCase->name) }}" autocomplete="off" />

          @error('name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- Kategori  --}}
        <div>
          <label for="category" class="block text-sm font-medium text-gray-900 mb-2">
            Kategori <span class="text-danger">*</span>
          </label>

          <input type="text" id="category" name="category" list="category_list"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('category', $studyCase->category) }}" placeholder="Pilih kategori atau ketik baru..."
            autocomplete="off" />

          <datalist id="category_list">
            @if (isset($categories) && count($categories) > 0)
              @foreach ($categories as $cat)
                <option value="{{ $cat }}">
              @endforeach
            @endif
          </datalist>

          @error('category')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
          <p class="text-xs text-gray-500 mt-1">Ketik untuk membuat kategori baru atau pilih dari daftar.</p>
        </div>
        {{-- End Category  --}}

        {{-- cover --}}
        <div x-data="{ preview: null }">
          <label class="block text-sm font-medium mb-2" for="cover_path">
            Cover
          </label>

          <input type="file" name="cover_path" id="cover_path" accept="image/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
              const file = $event.target.files[0];
              if (file) preview = URL.createObjectURL(file);
            ">

          @error('cover_path')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          {{-- preview baru --}}
          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">Preview cover baru</p>
              <img :src="preview" class="w-40 h-auto rounded-md border border-gray-200 shadow-sm object-cover">
            </div>
          </template>

          {{-- cover lama --}}
          @if ($studyCase->cover_path)
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">Cover saat ini</p>
              <img src="{{ asset('storage/' . $studyCase->cover_path) }}"
                class="w-40 h-auto rounded-md border border-gray-200 shadow-sm object-cover">
            </div>
          @endif
        </div>

        {{-- situation --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2">
            Situasi <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="situation" style="height:150px;">
            {!! old('situation', $studyCase->situation) !!}
          </div>

          <input type="hidden" name="situation" value="{{ old('situation', $studyCase->situation) }}">

          @error('situation')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- solution --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2">
            Solusi <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="solution" style="height:150px;">
            {!! old('solution', $studyCase->solution) !!}
          </div>

          <input type="hidden" name="solution" value="{{ old('solution', $studyCase->solution) }}">

          @error('solution')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- result --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2">
            Hasil <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="result" style="height:150px;">
            {!! old('result', $studyCase->result) !!}
          </div>

          <input type="hidden" name="result" value="{{ old('result', $studyCase->result) }}">

          @error('result')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('study-case.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
          <span x-text="loading ? 'Memperbarui...' : 'Update Study Case'"></span>
        </button>
      </div>

    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('quill/quill.js') }}" defer></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      document.querySelectorAll('.quill-editor').forEach(function(editor) {

        const field = editor.dataset.field;
        const hiddenInput = document.querySelector(`input[name="${field}"]`);

        const quill = new Quill(editor, {
          theme: 'snow',
          placeholder: 'Tulis konten anda di sini...',
          modules: {
            toolbar: [
              [{
                header: [1, 2, 3, 4, 5, 6, false]
              }],
              ['bold', 'italic', 'underline', 'strike'],
              ['blockquote', 'code-block'],
              [{
                list: 'ordered'
              }, {
                list: 'bullet'
              }],
            ]
          }
        });

        // set old value
        if (hiddenInput.value) {
          quill.root.innerHTML = hiddenInput.value;
        }

        // sync ke input hidden
        quill.on('text-change', function() {
          hiddenInput.value = quill.root.innerHTML;
        });

      });
    });
  </script>
@endpush
