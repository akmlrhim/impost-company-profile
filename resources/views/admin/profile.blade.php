@extends('layouts.admin')

@section('content')
  <x-flash />

  <div class="mx-auto py-4 space-y-4">

    {{-- Profile Form  --}}
    <form action="{{ route('profile.update') }}" method="POST"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf
      @method('PATCH')

      <div class="p-6 space-y-6 w-full sm:w-1/2">

        <h1 class="text-md sm:text-2xl font-bold">Profile</h1>

        <div>
          <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Email</label>
          <input type="email" id="email" name="email"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            placeholder="Masukkan email" value="{{ Auth::user()->email }}" autocomplete="off" />
          @error('email')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div>
          <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
          <input type="name" id="name" name="name"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
            placeholder="Masukkan nama" autocomplete="off" value="{{ Auth::user()->name }}" />
          @error('name')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div class="py-4 bg-gray-50 border-t border-gray-200 flex justify-start gap-3">
          <button type="submit" :disabled="loading"
            class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

            <span x-text="loading ? 'Menyimpan...' : 'Simpan Profil'"></span>
          </button>
        </div>
      </div>
    </form>

    {{-- Password Form  --}}
    <form action="{{ route('password.update') }}" method="POST" id="password-form"
      class="bg-white rounded-lg border border-gray-200 overflow-hidden" x-data="{ loading: false }"
      @submit.prevent="loading = true; $el.submit()">
      @csrf
      @method('PATCH')

      <div class="p-6 space-y-6 w-full sm:w-1/2">

        <h1 class="text-md sm:text-2xl font-bold">Password</h1>

        <div x-data="{ showCurrentPassword: false }">
          <label for="current_password" class="block mb-2.5 text-sm font-medium text-heading">Password Saat ini</label>
          <div class="relative">
            <input :type="showCurrentPassword ? 'text' : 'password'" id="current_password" name="current_password"
              class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 pr-10 shadow-xs placeholder:text-body"
              placeholder="Masukkan password saat ini" autocomplete="off" />
            <button type="button" @click="showCurrentPassword = !showCurrentPassword"
              class="absolute inset-y-0 right-0 flex items-center pr-3 text-body hover:text-heading transition-colors">
              <svg x-show="!showCurrentPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <svg x-show="showCurrentPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
              </svg>
            </button>
          </div>
          @error('current_password')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div x-data="{ showNewPassword: false }">
          <label for="new_password" class="block mb-2.5 text-sm font-medium text-heading">Password Baru</label>
          <div class="relative">
            <input :type="showNewPassword ? 'text' : 'password'" id="new_password" name="new_password"
              class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 pr-10 shadow-xs placeholder:text-body"
              placeholder="Masukkan password baru" autocomplete="off" />
            <button type="button" @click="showNewPassword = !showNewPassword"
              class="absolute inset-y-0 right-0 flex items-center pr-3 text-body hover:text-heading transition-colors">
              <svg x-show="!showNewPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <svg x-show="showNewPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
              </svg>
            </button>
          </div>
          @error('new_password')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div x-data="{ showConfirmPassword: false }">
          <label for="confirm_password" class="block mb-2.5 text-sm font-medium text-heading">Konfirmasi
            Password</label>
          <div class="relative">
            <input :type="showConfirmPassword ? 'text' : 'password'" id="confirm_password" name="confirm_password"
              class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 pr-10 shadow-xs placeholder:text-body"
              placeholder="Masukkan konfirmasi password baru" autocomplete="off" />
            <button type="button" @click="showConfirmPassword = !showConfirmPassword"
              class="absolute inset-y-0 right-0 flex items-center pr-3 text-body hover:text-heading transition-colors">
              <svg x-show="!showConfirmPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <svg x-show="showConfirmPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
              </svg>
            </button>
          </div>
          @error('confirm_password')
            <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
          @enderror
        </div>

        <div class="py-4 bg-gray-50 border-t border-gray-200 flex justify-start gap-3">
          <button type="submit" :disabled="loading"
            class="cursor-pointer px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">

            <span x-text="loading ? 'Menyimpan...' : 'Simpan Password'"></span>
          </button>
        </div>
      </div>
    </form>


  </div>
@endsection
