@extends('layouts.admin')
@section('content')
  <div class="mx-auto py-4">
    <form action="{{ route('users.store') }}" method="POST"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf

      <div class="p-6">
        <div class="w-full sm:w-1/2 space-y-3">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
              Nama Lengkap
            </label>
            <input type="text" id="name" name="name"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('name') }}" placeholder="Masukkan nama lengkap" autocomplete="off" />
            @error('name')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
              Email
            </label>
            <input type="email" id="email" name="email"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('email') }}" placeholder="Masukkan email" autocomplete="off" />
            @error('email')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
              Password
            </label>
            <input type="password" id="password" name="password"
              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow"
              value="{{ old('password') }}" placeholder="Masukkan password" autocomplete="off" />
            @error('password')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>
        </div>

      </div>

      <div class="px-6 py-4 sm:w-1/2 w-full bg-gray-50 border-t border-gray-200 flex justify-start gap-3">
        <a href="{{ route('users.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Batal
        </a>

        <button type="submit" :disabled="loading"
          class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

          <span x-text="loading ? 'Menyimpan...' : 'Simpan User'"></span>
        </button>
      </div>
    </form>
  </div>
@endsection
