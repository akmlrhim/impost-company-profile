@extends('layouts.public')
@section('content')
  <main class="pt-32 sm:pt-36 py-8 sm:py-12 antialiased relative overflow-hidden">

    <div class="px-2 mx-auto max-w-4xl relative z-10">

      <div class="mb-12 text-center">
        <div
          class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-impost-primary to-impost-secondary mb-6 shadow-lg shadow-impost-primary/20">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>

        <h1
          class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-impost-primary via-impost-secondary to-impost-fourth bg-clip-text text-transparent leading-tight">
          Mari Kita Mulai
        </h1>
        <p class="text-gray-300 text-sm md:text-md max-w-2xl mx-auto leading-relaxed">
          Isi data berikut untuk melanjutkan. Data anda akan kami jaga kerahasiaannya dan hanya digunakan untuk keperluan
          komunikasi terkait layanan kami.
        </p>
      </div>

      <div class="bg-gray-800 backdrop-blur-sm rounded-md p-4 sm:p-6 md:p-8 border border-gray-700/50 shadow-md">
        <form action="{{ route('save-leads') }}" method="POST" class="space-y-6">
          @csrf

          <div class="space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-gray-700/50">
              <h2 class="text-lg font-semibold text-white">Informasi Pribadi</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div class="group">
                <label class="block text-sm font-medium text-gray-300 mb-2">
                  Nama Lengkap <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                  </div>
                  <input type="text" name="fullname" value="{{ old('fullname') }}"
                    class="w-full rounded-xl bg-gray-900/50 border border-gray-700 pl-12 pr-4 py-3.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
                    placeholder="Masukkan nama lengkap">
                </div>
                @error('fullname')
                  <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                @enderror
              </div>

              <div class="group">
                <label class="block text-sm font-medium text-gray-300 mb-2">
                  Nomor HP <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <input type="tel" name="phone" value="{{ old('phone') }}"
                    class="w-full rounded-xl bg-gray-900/50 border border-gray-700 pl-12 pr-4 py-3.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
                    placeholder="08xxxxxxxxxx">
                </div>
                @error('phone')
                  <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                @enderror
              </div>

              <div class="group md:col-span-2">
                <label class="block text-sm font-medium text-gray-300 mb-2">
                  Email
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded-xl bg-gray-900/50 border border-gray-700 pl-12 pr-4 py-3.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
                    placeholder="email@contoh.com">
                </div>
                @error('email')
                  <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                @enderror
              </div>
            </div>
          </div>

          <div class="space-y-6 pt-4">
            <div class="flex items-center gap-3 pb-4 border-b border-gray-700/50">
              <h2 class="text-lg font-semibold text-white">Informasi Bisnis</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div class="group">
                <label class="block text-sm font-medium text-gray-300 mb-2">
                  Nama Bisnis <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                  </div>
                  <input type="text" name="business_name" value="{{ old('business_name') }}"
                    class="w-full rounded-xl bg-gray-900/50 border border-gray-700 pl-12 pr-4 py-3.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all"
                    placeholder="Nama bisnis Anda">
                </div>
                @error('business_name')
                  <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                @enderror
              </div>

              <div class="group">
                <label class="block text-sm font-medium text-gray-300 mb-2">
                  Omzet Per Bulan <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <select name="income"
                    class="w-full rounded-xl bg-gray-900 pl-12 pr-4 py-3.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-impost-primary appearance-none">

                    <option value="" disabled selected hidden>
                      Pilih kisaran omzet
                    </option>

                    <option value="<10jt">&lt; 10 Juta</option>
                    <option value="10-50jt">10 – 50 Juta</option>
                    <option value="50-100jt">50 – 100 Juta</option>
                    <option value=">100jt">&gt; 100 Juta</option>
                  </select>

                </div>
                @error('income')
                  <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
                @enderror
              </div>
            </div>
          </div>

          <div class="space-y-5 pt-4">
            <div class="flex items-center gap-3 pb-4 border-b border-gray-700/50">
              <h2 class="text-lg font-semibold text-white">Tujuan <span class="text-red-400">*</span></h2>
            </div>

            <div class="space-y-3">
              @php
                $objectives = [
                    'Branding' => 'Meningkatkan citra dan kepercayaan brand',
                    'Engagement' => 'Mendapatkan interaksi & followers',
                    'Sales ROI' => 'Meningkatkan leads dan penjualan',
                    'Branding & Sales' => 'Branding sekaligus penjualan',
                ];
              @endphp

              @foreach ($objectives as $value => $desc)
                <label
                  class="flex items-center gap-3 p-3 rounded-lg bg-gray-900/30 border border-gray-700/50 cursor-pointer hover:bg-gray-900/50 transition-all has-[:checked]:bg-impost-primary/10 has-[:checked]:border-impost-primary">
                  <input type="checkbox" name="objective[]" value="{{ $value }}"
                    class="w-5 h-5 rounded-md bg-gray-800 border-gray-600 text-impost-primary cursor-pointer"
                    {{ in_array($value, old('objective', [])) ? 'checked' : '' }}>
                  <div class="flex-1">
                    <span class="block font-semibold text-white text-sm">{{ $value }}</span>
                    <span class="block text-xs text-gray-400">{{ $desc }}</span>
                  </div>
                </label>
              @endforeach
            </div>

            @error('objective')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div class="space-y-3 pt-4">
            <label class="flex items-center gap-3 text-sm font-medium text-gray-300">
              Catatan Tambahan
            </label>
            <textarea name="note" rows="4"
              class="w-full rounded-xl bg-gray-900/50 border border-gray-700 px-4 py-3.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-impost-primary focus:border-transparent transition-all resize-none"
              placeholder="Ceritakan lebih detail tentang kebutuhan bisnis Anda...">{{ old('note') }}</textarea>
          </div>

          <div class="pt-6">
            <button type="submit"
              class="group relative w-full rounded-xl bg-gradient-to-r from-impost-primary to-impost-secondary py-4 text-base font-semibold text-white focus:ring-4 focus:ring-impost-primary/30 transition-all overflow-hidden">
              <span class="relative z-10 flex items-center justify-center gap-2">
                Kirim Data
              </span>
              <div
                class="absolute inset-0 bg-gradient-to-r from-impost-secondary to-impost-primary opacity-0 group-hover:opacity-100 transition-opacity">
              </div>
            </button>
          </div>
        </form>
      </div>


    </div>
  </main>
@endsection
