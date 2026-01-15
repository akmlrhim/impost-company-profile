@extends('layouts.admin')
@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('testimonials.store') }}" method="POST"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

          <div>
            <label for="company_name" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Perusahaan
            </label>
            <input type="text" id="company_name" name="company_name"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('company_name') }}" placeholder="Masukkan nama perusahaan" autocomplete="off" />
            @error('company_name')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Lengkap
            </label>
            <input type="text" id="name" name="name"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('name') }}" placeholder="Masukkan nama" autocomplete="off" />
            @error('name')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <!-- Content -->
          <div class="sm:col-span-2">
            <label for="content" class="block text-sm font-medium text-gray-900 mb-2">
              Catatan
            </label>
            <textarea name="content" id="content" rows="8"
              class="w-full p-3.5 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-xs placeholder:text-gray-400">{{ old('content') }}</textarea>
            @error('content')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

        </div>
      </div>


      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
        <a href="{{ route('testimonials.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Simpan Testimoni'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
