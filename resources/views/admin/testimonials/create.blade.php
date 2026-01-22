@extends('layouts.admin')

@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="testimonialForm()"
      @submit.prevent="submitForm">
      @csrf

      <div class="p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

          <div>
            <label for="company_name" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Perusahaan <span class="text-red-500">*</span>
            </label>
            <input type="text" id="company_name" name="company_name"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('company_name') }}" placeholder="Masukkan nama perusahaan" autocomplete="off" />
            @error('company_name')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Klien <span class="text-red-500">*</span>
            </label>
            <input type="text" id="name" name="name"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('name') }}" placeholder="Masukkan nama orang" autocomplete="off" />
            @error('name')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-900 mb-2">
              Foto / Video Testimoni (Opsional)
            </label>

            <div
              class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:bg-gray-50 transition-colors relative">
              <div class="space-y-1 text-center" x-show="!previewUrl">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                  aria-hidden="true">
                  <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600 justify-center">
                  <label for="media-upload"
                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                    <span>Upload file</span>
                    <input id="media-upload" name="media" type="file" class="sr-only" accept="image/*,video/*"
                      @change="handleFileChange">
                  </label>
                  <p class="pl-1">atau drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, MP4 up to 20MB</p>
              </div>

              <div x-show="previewUrl" class="relative w-full flex flex-col items-center" x-cloak>

                <button type="button" @click="removeFile"
                  class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-100 text-red-600 rounded-full p-1 hover:bg-red-200 z-10">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>

                <template x-if="isImage">
                  <img :src="previewUrl" class="max-h-64 rounded-lg shadow-sm object-contain">
                </template>

                <template x-if="isVideo">
                  <video :src="previewUrl" controls class="max-h-64 rounded-lg shadow-sm w-full"></video>
                </template>

                <p class="mt-2 text-sm text-gray-500" x-text="fileName"></p>
              </div>
            </div>
            @error('media')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="sm:col-span-2">
            <label for="content" class="block text-sm font-medium text-gray-900 mb-2">
              Isi Testimoni <span class="text-red-500">*</span>
            </label>
            <textarea name="content" id="content" rows="6"
              class="w-full p-3.5 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm placeholder:text-gray-400"
              placeholder="Tuliskan pengalaman klien disini...">{{ old('content') }}</textarea>
            @error('content')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

        </div>
      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('testimonials.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2 transition-colors shadow-sm">
          <span x-text="loading ? 'Menyimpan...' : 'Simpan Testimoni'"></span>
        </button>
      </div>
    </form>
  </div>

  <script>
    function testimonialForm() {
      return {
        loading: false,
        previewUrl: null,
        isImage: false,
        isVideo: false,
        fileName: '',

        handleFileChange(event) {
          const file = event.target.files[0];
          if (!file) return;

          if (file.size > 20 * 1024 * 1024) {
            alert('Ukuran file terlalu besar (Max 20MB)');
            event.target.value = '';
            return;
          }

          this.previewUrl = URL.createObjectURL(file);
          this.fileName = file.name;
          this.isImage = file.type.startsWith('image/');
          this.isVideo = file.type.startsWith('video/');
        },

        removeFile() {
          this.previewUrl = null;
          this.isImage = false;
          this.isVideo = false;
          this.fileName = '';
          document.getElementById('media-upload').value = '';
        },

        submitForm() {
          this.loading = true;
          this.$el.submit();
        }
      }
    }
  </script>
@endsection
