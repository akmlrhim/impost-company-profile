@extends('layouts.admin')

@section('content')
  <x-flash />

  <div class="mx-auto py-4">
    <form action="{{ route('study-case.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-6 space-y-3">
        {{-- nama --}}
        <div>
          <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
            Nama study case <span class="text-danger">*</span>
          </label>
          <input type="text" id="name" name="name"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('name') }}" placeholder="Masukkan nama study case" autocomplete="off" />
          @error('name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- cover  --}}
        <div x-data="{ preview: null }">
          <label class="block text-sm font-medium mb-2" for="cover_path">
            Cover <span class="text-danger">*</span>
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

        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2" for="situation">
            Situasi <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="situation" style="height:150px;">
            {!! old('situation') !!}
          </div>

          <input type="hidden" name="situation" value="{{ old('situation') }}">

          @error('situation')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- solusi --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2" for="solution">
            Solusi <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="solution" style="height:150px;">
            {!! old('solution') !!}
          </div>
          <input type="hidden" name="solution" value="{{ old('solution') }}">

          @error('solution')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        {{-- hasil --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-900 mb-2" for="result">
            Hasil <span class="text-danger">*</span>
          </label>

          <div class="quill-editor" data-field="result" style="height:150px;">
            {!! old('result') !!}
          </div>
          <input type="hidden" name="result" value="{{ old('result') }}">

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

          <span x-text="loading ? 'Menyimpan...' : 'Simpan Study Case'"></span>
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
