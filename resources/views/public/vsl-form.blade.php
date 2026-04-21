@extends('layouts.public')

@section('title', 'Konsultasi Gratis | Impost Media')
@section('meta_description',
  'Mulai perjalanan digital marketing bisnis Anda bersama Impost Media. Isi form konsultasi
  gratis dan dapatkan strategi terbaik untuk pertumbuhan bisnis Anda.')

@section('content')
  <main class="relative overflow-hidden pt-20 pb-6 antialiased sm:pt-28 sm:pb-12 md:pt-32">
    <div class="relative z-10 mx-auto max-w-7xl px-4 font-sans">

      <div class="mb-6 text-center sm:mb-8">
        <h1 class="mb-2 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-impost-primary sm:mb-3">
          Mari Kita Mulai
        </h1>
        <p class="mx-auto max-w-xl text-sm sm:text-base md:text-lg leading-relaxed text-gray-400">
          Isi data berikut untuk melanjutkan. Privasi data Anda terjamin aman bersama kami.
        </p>
      </div>

      <div class="p-5 md:p-8">
        <form action="{{ route('save-leads') }}" method="POST" class="space-y-5" x-data="{
            loading: false,
            submitForm() {
                this.loading = true;
                getRecaptchaToken((token) => {
                    if (token) {
                        document.getElementById('g-recaptcha-response').value = token;
                        this.$el.submit();
                    } else {
                        this.loading = false;
                    }
                });
            }
        }"
          @submit.prevent="submitForm">
          @csrf
          <x-flash />
          <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

          <div class="space-y-4">
            <h2 class="border-b border-white/10 pb-2 text-lg font-semibold text-gray-200">
              Informasi Pribadi
            </h2>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
              <div class="group">
                <label class="mb-1.5 block text-sm font-medium text-gray-400">
                  Nama Lengkap <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-500 transition-colors group-focus-within:text-impost-primary"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                  </div>
                  <input type="text" name="fullname" value="{{ old('fullname') }}" placeholder="Nama lengkap"
                    class="w-full rounded-lg border border-white/10 bg-white/5 py-2.5 pl-10 pr-3 text-sm text-gray-200 transition-all placeholder:text-gray-500 focus:border-impost-primary focus:outline-none focus:ring-1 focus:ring-impost-primary">
                </div>
                @error('fullname')
                  <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <div class="group">
                <label class="mb-1.5 block text-sm font-medium text-gray-400">
                  Nomor HP <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-500 transition-colors group-focus-within:text-impost-primary"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"
                    class="w-full rounded-lg border border-white/10 bg-white/5 py-2.5 pl-10 pr-3 text-sm text-gray-200 transition-all placeholder:text-gray-500 focus:border-impost-primary focus:outline-none focus:ring-1 focus:ring-impost-primary">
                </div>
                @error('phone')
                  <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <div class="group md:col-span-2">
                <label class="mb-1.5 block text-sm font-medium text-gray-400">Email</label>
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-500 transition-colors group-focus-within:text-impost-primary"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <input type="email" name="email" value="{{ old('email') }}" placeholder="alamat@email.com"
                    class="w-full rounded-lg border border-white/10 bg-white/5 py-2.5 pl-10 pr-3 text-sm text-gray-200 transition-all placeholder:text-gray-500 focus:border-impost-primary focus:outline-none focus:ring-1 focus:ring-impost-primary">
                </div>
                @error('email')
                  <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="space-y-4 pt-2">
            <h2 class="border-b border-white/10 pb-2 text-lg font-semibold text-gray-200">
              Informasi Bisnis
            </h2>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
              <div class="group">
                <label class="mb-1.5 block text-sm font-medium text-gray-400">
                  Nama Bisnis <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-500 transition-colors group-focus-within:text-impost-primary"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                  </div>
                  <input type="text" name="business_name" value="{{ old('business_name') }}" placeholder="Nama bisnis"
                    class="w-full rounded-lg border border-white/10 bg-white/5 py-2.5 pl-10 pr-3 text-sm text-gray-200 transition-all placeholder:text-gray-500 focus:border-impost-primary focus:outline-none focus:ring-1 focus:ring-impost-primary">
                </div>
                @error('business_name')
                  <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <div class="group">
                <label class="mb-1.5 block text-sm font-medium text-gray-400">
                  Omzet Per Bulan <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-500 transition-colors group-focus-within:text-impost-primary"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <select name="income"
                    class="w-full cursor-pointer appearance-none rounded-lg border border-white/10 bg-white/5 py-2.5 pl-10 pr-8 text-sm text-gray-200 focus:border-impost-primary focus:outline-none focus:ring-1 focus:ring-impost-primary">
                    <option value="" disabled selected class="bg-gray-800 text-gray-400">Pilih kisaran omzet
                    </option>
                    <option value="<10jt" {{ old('income') == '<10jt' ? 'selected' : '' }}
                      class="bg-gray-800 text-gray-200">&lt; 10 Juta</option>
                    <option value="10-50jt" {{ old('income') == '10-50jt' ? 'selected' : '' }}
                      class="bg-gray-800 text-gray-200">10 – 50 Juta</option>
                    <option value="50-100jt" {{ old('income') == '50-100jt' ? 'selected' : '' }}
                      class="bg-gray-800 text-gray-200">50 – 100 Juta</option>
                    <option value=">100jt" {{ old('income') == '>100jt' ? 'selected' : '' }}
                      class="bg-gray-800 text-gray-200">&gt; 100 Juta</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </div>
                </div>
                @error('income')
                  <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="space-y-3 pt-2">
            <h2 class="border-b border-white/10 pb-2 text-lg font-semibold text-gray-200">
              Tujuan Utama <span class="text-red-400">*</span>
            </h2>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
              @php
                $objectives = [
                    'Branding' => 'Meningkatkan citra brand',
                    'Engagement' => 'Mendapatkan interaksi',
                    'Sales ROI' => 'Meningkatkan leads/sales',
                    'All In One' => 'Branding & Penjualan',
                ];
              @endphp

              @foreach ($objectives as $value => $desc)
                <label
                  class="relative flex cursor-pointer items-center rounded-lg border border-white/10 bg-white/5 p-3 transition-all hover:bg-white/10 has-[:checked]:border-impost-primary/50 has-[:checked]:bg-impost-primary/10 has-[:checked]:ring-1 has-[:checked]:ring-impost-primary/30">
                  <input type="checkbox" name="objective[]" value="{{ $value }}"
                    class="h-4 w-4 rounded border-gray-500 bg-transparent text-impost-primary focus:ring-impost-primary focus:ring-offset-0"
                    {{ in_array($value, old('objective', [])) ? 'checked' : '' }}>
                  <div class="ml-3">
                    <span class="block text-sm font-medium text-gray-200">{{ $value }}</span>
                    <span class="block text-xs text-gray-400">{{ $desc }}</span>
                  </div>
                </label>
              @endforeach
            </div>
            @error('objective')
              <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
            @enderror
          </div>

          <div class="space-y-2 pt-2">
            <label class="block text-sm font-medium text-gray-400">Catatan Tambahan</label>
            <textarea name="note" rows="3" placeholder="Ceritakan detail kebutuhan Anda..."
              class="w-full resize-none rounded-lg border border-white/10 bg-white/5 px-3 py-2.5 text-sm text-gray-200 transition-all placeholder:text-gray-500 focus:border-impost-primary focus:outline-none focus:ring-1 focus:ring-impost-primary">{{ old('note') }}</textarea>
          </div>

          <div class="pt-4">
            <button type="submit" :disabled="loading"
              class="w-full rounded-lg bg-gradient-to-r from-impost-primary to-impost-secondary py-3 text-sm font-bold text-white shadow-lg transition-all duration-200 hover:opacity-90 hover:shadow-impost-primary/25 active:scale-[0.99] disabled:cursor-not-allowed disabled:opacity-50">
              <span x-text="loading ? 'Memproses...' : 'Kirim Data Sekarang'"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection

@push('scripts')
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
  </script>
  <script>
    function getRecaptchaToken(callback) {
      if (typeof grecaptcha === 'undefined') {
        console.error("Recaptcha belum dimuat.");
        callback(null);
        return;
      }
      grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
            action: 'submit'
          })
          .then(function(token) {
            callback(token);
          })
          .catch(function(error) {
            console.error("Recaptcha Error:", error);
            callback(null);
          });
      });
    }
  </script>
@endpush
