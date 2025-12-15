<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Login Pages' }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

  @stack('styles')
</head>

<body>

  <div class="min-h-screen flex flex-col items-center justify-center px-6 py-8 bg-gray-900">
    <a href="#"
      class="flex items-center text-2xl font-semibold bg-linear-to-r from-impost-primary via-impost-secondary to-impost-primary bg-clip-text text-transparent">
      <img class="w-32 h-32 mr-2" src="{{ asset('img/logo_impost_putih.png') }}" alt="logo">
    </a>

    <div class="w-full rounded-lg shadow bg-gray-800 border border-gray-700 sm:max-w-md xl:p-0">
      <div class="p-6 space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-white md:text-2xl">
          Login
        </h1>

        <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
          @csrf

          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-300">
              Email
            </label>
            <input type="email" id="email" placeholder="name@company.com" autocomplete="off" name="email"
              class="text-sm bg-gray-700 border border-gray-600 text-white placeholder-gray-400 rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
            @error('email')
              <span class="mt-2.5 text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-300">
              Password
            </label>
            <input type="password" id="password" placeholder="••••••••" autocomplete="off" name="password"
              class="text-sm bg-gray-700 border border-gray-600 text-white placeholder-gray-400 rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
            @error('password')
              <span class="mt-2.5 text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-sm text-sm px-5 py-2.5">
            Login
          </button>

          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            <a href="{{ route('home') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
              Kembali ke Impost Media ?
            </a>
          </p>
        </form>
      </div>
    </div>
  </div>


  @stack('scripts')

</body>

</html>
