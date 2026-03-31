@extends('layouts.public')

@section('title', 'Konsultasi Gratis | Impost Media')
@section('meta_description',
  'Mulai perjalanan digital marketing bisnis Anda bersama Impost Media. Isi form konsultasi
  gratis dan dapatkan strategi terbaik untuk pertumbuhan bisnis Anda.')

@section('content')
  <main class="pt-20 sm:pt-28 md:pt-32 py-6 sm:py-12 antialiased relative overflow-hidden">

    <div class="px-4 mx-auto max-w-7xl relative z-10 font-sans">
      <div class="mb-6 sm:mb-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-3 text-impost-primary leading-tight">
          Mari Kita Mulai
        </h1>
        <p class="text-gray-400 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
          Isi data berikut untuk melanjutkan. Privasi data Anda terjamin aman bersama kami.
        </p>
      </div>

      <div class="backdrop-blur-md rounded-xl border border-white/10 shadow-2xl bg-gray-900/40 p-4 sm:p-5 md:p-8">
        <x-flash />
        <form action="{{ route('save-leads') }}" method="POST" class="space-y-4 sm:space-y-5" x-data="{
            loading: false,
            submitForm() {
                this.loading = true;
                getRecaptchaToken((token) => {
                    document.getElementById('g-recaptcha-response').value = token;
                    this.$el.submit();
                });
            }
        }"
          @submit.prevent="submitForm">
          <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
          @csrf

          <div class="space-y-3 sm:space-y-4">
            <h2 class="text-sm sm:text-base font-semibold text-gray-200 border-b border-white/10 pb-2">Informasi Pribadi
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
              <div class="group">
                <label class="block text-[10px] sm:text-xs font-medium text-gray-400 mb-1 sm:mb-1.5">Nama Lengkap <span
                    class="text-red-400">*</span></label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                  </div>
                  <input type="text" name="fullname" value="{{ old('fullname') }}"
                    class="w-full rounded-lg bg-white/5 border border-white/10 pl-9 sm:pl-10 pr-3 py-2 sm:py-2.5 text-xs sm:text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-impost-primary focus:border-impost-primary transition-all"
                    placeholder="Nama lengkap">
                </div>
                @error('fullname')
                  <p class="mt-1 text-[10px] sm:text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <div class="group">
                <label class="block text-[10px] sm:text-xs font-medium text-gray-400 mb-1 sm:mb-1.5">Nomor HP <span
                    class="text-red-400">*</span></label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <input type="tel" name="phone" value="{{ old('phone') }}"
                    class="w-full rounded-lg bg-white/5 border border-white/10 pl-9 sm:pl-10 pr-3 py-2 sm:py-2.5 text-xs sm:text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-impost-primary focus:border-impost-primary transition-all"
                    placeholder="08xxxxxxxxxx">
                </div>
                @error('phone')
                  <p class="mt-1 text-[10px] sm:text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <div class="group md:col-span-2">
                <label class="block text-[10px] sm:text-xs font-medium text-gray-400 mb-1 sm:mb-1.5">Email</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded-lg bg-white/5 border border-white/10 pl-9 sm:pl-10 pr-3 py-2 sm:py-2.5 text-xs sm:text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-impost-primary focus:border-impost-primary transition-all"
                    placeholder="alamat@email.com">
                </div>
                @error('email')
                  <p class="mt-1 text-[10px] sm:text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="space-y-3 sm:space-y-4 pt-1 sm:pt-2">
            <h2 class="text-sm sm:text-base font-semibold text-gray-200 border-b border-white/10 pb-2">Informasi Bisnis
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
              <div class="group">
                <label class="block text-[10px] sm:text-xs font-medium text-gray-400 mb-1 sm:mb-1.5">Nama Bisnis <span
                    class="text-red-400">*</span></label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                  </div>
                  <input type="text" name="business_name" value="{{ old('business_name') }}"
                    class="w-full rounded-lg bg-white/5 border border-white/10 pl-9 sm:pl-10 pr-3 py-2 sm:py-2.5 text-xs sm:text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-impost-primary focus:border-impost-primary transition-all"
                    placeholder="Nama bisnis">
                </div>
                @error('business_name')
                  <p class="mt-1 text-[10px] sm:text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>

              <div class="group">
                <label class="block text-[10px] sm:text-xs font-medium text-gray-400 mb-1 sm:mb-1.5">Omzet Per Bulan <span
                    class="text-red-400">*</span></label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg
                      class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500 group-focus-within:text-impost-primary transition-colors"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <select name="income"
                    class="w-full rounded-lg bg-white/5 border border-white/10 pl-9 sm:pl-10 pr-8 py-2 sm:py-2.5 text-xs sm:text-sm text-gray-200 focus:outline-none focus:ring-1 focus:ring-impost-primary focus:border-impost-primary appearance-none cursor-pointer">
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
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-500" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </div>
                </div>
                @error('income')
                  <p class="mt-1 text-[10px] sm:text-xs text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="space-y-2 sm:space-y-3 pt-1 sm:pt-2">
            <h2 class="text-sm sm:text-base font-semibold text-gray-200 border-b border-white/10 pb-2">Tujuan Utama <span
                class="text-red-400">*</span></h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3">
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
                  class="relative flex items-center p-2.5 sm:p-3 rounded-lg border border-white/10 cursor-pointer bg-white/5 hover:bg-white/10 transition-all has-[:checked]:bg-impost-primary/10 has-[:checked]:border-impost-primary/50 has-[:checked]:ring-1 has-[:checked]:ring-impost-primary/30">
                  <input type="checkbox" name="objective[]" value="{{ $value }}"
                    class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded border-gray-500 text-impost-primary focus:ring-offset-0 focus:ring-impost-primary bg-transparent"
                    {{ in_array($value, old('objective', [])) ? 'checked' : '' }}>
                  <div class="ml-2.5 sm:ml-3">
                    <span class="block text-xs sm:text-sm font-medium text-gray-200">{{ $value }}</span>
                    <span class="block text-[10px] sm:text-xs text-gray-400">{{ $desc }}</span>
                  </div>
                </label>
              @endforeach
            </div>
            @error('objective')
              <p class="mt-1 text-[10px] sm:text-xs text-red-400">{{ $message }}</p>
            @enderror
          </div>

          <div class="space-y-1.5 sm:space-y-2 pt-1 sm:pt-2">
            <label class="block text-[10px] sm:text-xs font-medium text-gray-400">Catatan Tambahan</label>
            <textarea name="note" rows="3"
              class="w-full rounded-lg bg-white/5 border border-white/10 px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm text-gray-200 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-impost-primary focus:border-impost-primary transition-all resize-none"
              placeholder="Ceritakan detail kebutuhan Anda...">{{ old('note') }}</textarea>
          </div>

          <div class="pt-3 sm:pt-4">
            <button type="submit" :disabled="loading"
              class="w-full rounded-lg bg-gradient-to-r from-impost-primary to-impost-secondary py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-white shadow-lg hover:shadow-impost-primary/25 hover:opacity-90 active:scale-[0.99] transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
              <span x-text="loading ? 'Memproses...' : 'Kirim Data Sekarang'"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  @if (session('success'))
    <div id="success-modal" tabindex="-1"
      class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-80 transition-opacity duration-300 opacity-0 backdrop-blur-sm">
      <div class="relative p-4 w-full max-w-sm">
        <div
          class="relative bg-gray-900 border border-gray-800 rounded-xl shadow-2xl text-center p-5 sm:p-6 transform transition-all scale-90 duration-300"
          id="modal-card">
          <div
            class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-3 sm:mb-4 text-green-400 bg-gray-800 border border-gray-700 rounded-full flex items-center justify-center shadow-[0_0_10px_rgba(74,222,128,0.2)]">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
          </div>
          <h3 class="mb-1.5 sm:mb-2 text-base sm:text-lg font-bold text-white tracking-tight">Berhasil Terkirim!</h3>
          <p class="mb-3 sm:mb-4 text-xs sm:text-sm text-gray-400 font-light leading-relaxed">{{ session('success') }}
          </p>
          <div class="flex items-center justify-center gap-2">
            <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-bounce"></div>
            <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-bounce [animation-delay:-0.15s]"></div>
            <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-bounce [animation-delay:-0.3s]"></div>
            <span class="ml-1 text-[10px] sm:text-xs text-green-400 font-medium">Mengalihkan ke WhatsApp...</span>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById('success-modal');
        const modalCard = document.getElementById('modal-card');

        setTimeout(() => {
          modal.classList.remove('opacity-0');
          modalCard.classList.remove('scale-90');
          modalCard.classList.add('scale-100');
        }, 50);

        @if (session('wa_url'))
          setTimeout(function() {
            window.location.href = "{!! session('wa_url') !!}";
          }, 3000);
        @endif
      });
    </script>
  @endif
@endsection

@push('scripts')
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
  <script>
    function getRecaptchaToken(callback) {
      if (typeof grecaptcha === 'undefined') {
        alert("Recaptcha belum dimuat, silakan refresh halaman.");
        document.querySelector('form').__x.$data.loading = false;
        return;
      }
      grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
          action: 'submit'
        }).then(function(token) {
          callback(token);
        }).catch(function(error) {
          alert("Gagal memuat keamanan Recaptcha, silakan refresh halaman.");
          document.querySelector('form').__x.$data.loading = false;
        });
      });
    }
  </script>
@endpush
