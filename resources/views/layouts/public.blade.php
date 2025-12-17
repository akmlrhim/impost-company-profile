<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>IMPOST MEDIA - {{ $title ?? 'Home Page' }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" sizes="192x192" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

  @stack('styles')
</head>

<body class="bg-impost-fifth" x-data="pageLoader()">

  <x-loader />

  <x-partials.public.navbar />

  <main>
    @yield('content')
  </main>

  <x-partials.public.footer />

  @stack('scripts')
</body>

</html>
