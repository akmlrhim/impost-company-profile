<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PLFLQL9L');
  </script>
  <!-- End Google Tag Manager -->

  {{-- Google Analytics --}}
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z4P6JET6MS"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-Z4P6JET6MS');
  </script>
  {{-- End Google Analytics --}}

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

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
  <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @stack('styles')
</head>

<body class="relative antialiased">

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLFLQL9L" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <div class="fixed inset-0 -z-10">
    <div class="absolute inset-0 bg-gradient-to-br from-black via-black to-neutral-900"></div>

    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-amber-950/20 to-transparent"></div>

    <div class="absolute top-10 right-1/4 w-72 h-72 bg-amber-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 left-1/3 w-64 h-64 bg-yellow-600/10 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 left-10 w-56 h-56 bg-amber-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-1/3 w-80 h-80 bg-yellow-500/8 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 right-10 w-48 h-48 bg-amber-600/12 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/2 left-1/4 w-60 h-60 bg-yellow-600/8 rounded-full blur-3xl"></div>
    <div class="absolute top-20 left-1/2 w-52 h-52 bg-amber-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-44 h-44 bg-yellow-500/10 rounded-full blur-3xl"></div>

    <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-amber-950/10"></div>
  </div>

  <x-partials.public.navbar />

  <main class="relative z-0">
    @yield('content')
  </main>

  <x-partials.public.footer />

  @stack('scripts')

  <script>
    document.addEventListener('contextmenu', e => e.preventDefault());
  </script>

</body>

</html>
