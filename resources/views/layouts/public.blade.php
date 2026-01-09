<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @stack('head')

  <title>IMPOST MEDIA - {{ $title ?? 'Home Page' }}</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

  <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}" />
  <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
  <meta name="apple-mobile-web-app-title" content="IMPOST MEDIA" />
  <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @stack('styles')
</head>

<body class="bg-impost-fifth relative">
  <div style="position: absolute; inset: 0; pointer-events: none; overflow: hidden;">

    <!-- Grid Pattern -->
    <div
      style="position: absolute; inset: 0; opacity: 0.05; background-image: linear-gradient(#d4ac3c 1px, transparent 1px), linear-gradient(90deg, #d4ac3c 1px, transparent 1px); background-size: 40px 40px;">
    </div>
  </div>

  <x-partials.public.navbar />


  <main>
    @yield('content')
  </main>


  <x-partials.public.footer />

  @stack('scripts')

  <script>
    document.addEventListener('contextmenu', e => e.preventDefault());
  </script>

</body>

</html>
