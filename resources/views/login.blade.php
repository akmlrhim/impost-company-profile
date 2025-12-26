<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Login Pages' }}</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

</head>

<body>

  <div class="min-h-screen flex flex-col items-center justify-center px-6 py-8 bg-gray-900">
    <a href="#"
      class="flex items-center text-2xl font-semibold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-primary bg-clip-text text-transparent">
      <img class="w-36 mb-2 object-cover" src="{{ asset('img/logo_impost_putih.webp') }}" alt="logo">
    </a>

    <div class="w-full rounded-lg shadow bg-gray-800 border border-gray-700 sm:max-w-md xl:p-0">
      <div class="p-6 space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-white md:text-2xl">
          Login
        </h1>

        <x-flash />

        <form class="space-y-6" action="{{ route('login') }}" method="POST" x-data="{
            loading: false,
            submitLogin() {
                this.loading = true;
                getRecaptchaToken((token) => {
                    document.getElementById('g-recaptcha-response').value = token;
                    this.$el.submit();
                });
            }
        }"
          @submit.prevent="submitLogin">
          @csrf

          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-300">
              <span>Email</span>
              <span class="text-red-500 ml-1">*</span>
            </label>
            <input type="email" id="email" name="email"
              class="text-sm bg-gray-700 border border-gray-600 text-white rounded-sm block w-full p-2"
              placeholder="name@company.com" value="{{ old('email') }}" autocomplete="off" />
            @error('email')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-300">
              <span>Password</span>
              <span class="text-red-500 ml-1">*</span>
            </label>
            <input type="password" id="password" name="password"
              class="text-sm bg-gray-700 border border-gray-600 text-white rounded-sm block w-full p-2"
              placeholder="••••••••" />
            @error('password')
              <x-invalid-feedback>{{ $message }}</x-invalid-feedback>
            @enderror
          </div>

          <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

          <button type="submit" :disabled="loading"
            class="cursor-pointer w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-sm text-sm px-5 py-2.5 disabled:opacity-50 disabled:cursor-not-allowed">
            <span x-text="loading ? 'Memproses...' : 'Login'"></span>
          </button>

          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            <a href="{{ route('home') }}"
              class="font-medium text-primary-600 hover:underline dark:text-primary-500">Kembali ke Impost Media ?</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  {{-- script  --}}
  <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer>
  </script>

  <script>
    function getRecaptchaToken(callback) {
      grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
          action: 'login'
        }).then(function(token) {
          callback(token);
        }).catch(function(error) {
          alert("Gagal memuat keamanan Recaptcha, silakan refresh halaman.");
        });
      });
    }
  </script>

</body>

</html>
