@extends('layouts.admin')
@section('content')
  <div class="mx-auto py-4">
    <form id="article-form" action="{{ route('articles.update', $article->slug) }}" method="POST"
      enctype="multipart/form-data" class="bg-white rounded-lg border border-gray-200 overflow-hidden"
      x-data="{
          loading: false,
          syncQuill() {
              const editor = document.querySelector('#editor .ql-editor');
              let html = editor.innerHTML;
      
              if (html === '<p><br></p>' || html.trim() === '') {
                  html = '';
              }
      
              document.getElementById('quill-content-input').value = html;
          }
      }" @submit="syncQuill(); loading = true">
      @csrf
      @method('PUT')

      <div class="p-6 space-y-6">
        {{-- judul artikel --}}
        <div>
          <label for="title" class="block text-sm font-medium text-gray-900 mb-2">
            Judul
          </label>
          <input type="text" id="title" name="title"
            class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
            value="{{ old('title', $article->title) }}" placeholder="Masukkan judul artikel" autocomplete="off" />
          @error('title')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
        {{-- end  --}}

        {{-- cover  --}}
        <div x-data="{
            preview: '{{ $article->cover_path ? asset('storage/' . $article->cover_path) : '' }}'
        }">
          <label class="block text-sm font-medium mb-2">Cover</label>

          <input type="file" name="cover_path" accept="image/*"
            class="w-full text-sm rounded-sm border border-gray-300"
            @change="
						const file = $event.target.files[0];
						if (file) preview = URL.createObjectURL(file);
					" />

          @error('cover_path')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror

          <template x-if="preview">
            <div class="mt-4">
              <p class="text-xs text-gray-500 mb-2">Preview cover</p>
              <img :src="preview" class="w-40 rounded border object-cover">
            </div>
          </template>
        </div>
        {{-- end  --}}

        {{-- content  --}}
        <div>
          <label for="editor" class="block text-sm font-medium text-gray-900 mb-2">
            Konten / Isi artikel
          </label>

          <div id="editor" style="height: 300px;">
            {!! old('content', $article->content) !!}
          </div>

          <input type="hidden" name="content" id="quill-content-input" value="{{ old('content', $article->content) }}" />

          @error('content')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>
        {{-- end  --}}

      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('articles.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Update Artikel'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('quill/quill.js') }}" defer></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Tulis konten Anda di sini...',
        modules: {
          toolbar: {
            container: [
              [{
                'header': [1, 2, 3, 4, 5, 6, false]
              }],
              ['bold', 'italic', 'underline', 'strike'],
              ['blockquote', 'code-block'],
              [{
                'list': 'ordered'
              }, {
                'list': 'bullet'
              }],
              [{
                'color': []
              }, {
                'background': []
              }],
              ['link', 'image'],
              ['clean']
            ],
            handlers: {
              'image': imageHandler
            }
          }
        }
      });

      function imageHandler() {
        var range = quill.getSelection();
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = function() {
          var file = input.files[0];
          uploadFile(file, range);
        };
      }

      function uploadFile(file, range) {
        const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenElement) {
          alert('Kesalahan: Konfigurasi CSRF Token hilang.');
          return;
        }

        var formData = new FormData();
        formData.append("image", file);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ route('editor.upload') }}", true);

        xhr.setRequestHeader("X-CSRF-TOKEN", csrfTokenElement.content);

        xhr.onload = function() {
          if (xhr.status === 200) {
            try {
              var response = JSON.parse(xhr.responseText);
              var imageUrl = response.url;

              quill.insertEmbed(range.index, 'image', imageUrl);
              quill.setSelection(range.index + 1);
            } catch (e) {
              alert('Gagal mengupload: Respon server tidak valid.');
            }
          } else {
            alert('Gagal mengupload gambar. (Status: ' + xhr.status + ')');
          }
        };

        xhr.onerror = function() {
          alert('Kesalahan jaringan.');
        };

        xhr.send(formData);
      }
    });
  </script>
@endpush
