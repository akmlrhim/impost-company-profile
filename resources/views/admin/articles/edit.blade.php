@extends('layouts.admin')
@section('content')
  <x-flash></x-flash>

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

        <div>
          <label class="block text-sm font-medium text-gray-900 mb-2">Status Artikel</label>

          <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
              <input type="radio" id="status_published" name="status" value="published" class="hidden peer" required
                {{ old('status', $article->status ?? '') === 'published' ? 'checked' : '' }}>
              <label for="status_published"
                class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-success-soft peer-checked:border-success-subtle peer-checked:bg-success-soft hover:bg-neutral-secondary-medium peer-checked:text-success-strong">
                <div class="block">
                  <div class="w-full font-semibold">Published</div>
                  <div class="w-full text-sm">Artikel akan langsung ditampilkan ke publik.</div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-8 h-8 ms-3">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
              </label>
            </li>

            <li>
              <input type="radio" id="status_draft" name="status" value="draft" class="hidden peer"
                {{ old('status', $article->status ?? '') === 'draft' ? 'checked' : '' }}>
              <label for="status_draft"
                class="inline-flex items-center justify-between w-full p-5 text-body bg-neutral-primary-soft border border-default rounded-base cursor-pointer peer-checked:hover:bg-warning-soft peer-checked:border-warning-subtle peer-checked:bg-warning-soft hover:bg-neutral-secondary-medium peer-checked:text-warning-strong">
                <div class="block">
                  <div class="w-full font-semibold">Draft</div>
                  <div class="w-full text-sm">Artikel akan disimpan sebagai draft dan tidak akan ditampilkan ke publik.
                  </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-8 h-8 ms-3">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                </svg>
              </label>
            </li>
          </ul>

          @error('status')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
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
        placeholder: 'Tulis konten anda di sini...',
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
