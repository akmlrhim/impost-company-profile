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

  <style>
    @supports (backdrop-filter: blur(1px)) {
      .blur-3xl {
        filter: blur(64px);
        transform: translateZ(0);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -webkit-perspective: 1000;
        perspective: 1000;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      .blur-3xl {
        animation: none !important;
        transition: none !important;
      }
    }

    .fixed.-z-10 {
      transform: translate3d(0, 0, 0);
      -webkit-transform: translate3d(0, 0, 0);
    }
  </style>
</head>

<body class="relative antialiased">

  <!-- Meta Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1540709397014048');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1540709397014048&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLFLQL9L" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div class="fixed inset-0 -z-10 overflow-hidden bg-gradient-to-br from-black via-neutral-950 to-neutral-900">

    <div class="absolute inset-0 opacity-30">
      <div class="absolute top-10 right-1/4 w-96 h-96 bg-amber-500 rounded-full blur-[120px]"></div>
      <div class="absolute bottom-10 left-10 w-80 h-80 bg-yellow-500 rounded-full blur-[100px]"></div>
      <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-amber-600 rounded-full blur-[150px]">
      </div>
    </div>

    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/30"></div>
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
