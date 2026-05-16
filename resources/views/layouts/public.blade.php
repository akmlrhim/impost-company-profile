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

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18050432705"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-18050432705');
  </script>
  <!-- End Google tag (gtag.js) -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  @stack('head')

  <title>@yield('title')</title>
  <meta name="description" content="@yield('meta_description', 'Solusi digital marketing all-in-one profesional di Banjarmasin & Banjarbaru. Tingkatkan bisnis Anda bersama Impost Media.')">
  <meta name="keywords"
    content="digital marketing banjarmasin, digital marketing banjarbaru, digital marketing, digital marketing kalimantan, digital marketing kalimantan selatan, seo banjarmasin, impost media, impost">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Impost Media">
  <link rel="canonical" href="@yield('canonical', url()->current())">
  <link rel="alternate" hreflang="id" href="{{ url()->current() }}">
  <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

  <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
  <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('og_title', 'Impost Media | Agensi Digital Marketing di Kalimantan Selatan')">
  <meta property="og:description" content="@yield('og_description', 'Partner terbaik untuk kebutuhan bisnis dan pemasaran digital bisnis Anda di Kalimantan Selatan.')">
  <meta property="og:image" content="@yield('og_image', asset('img/og_image.png'))">
  <meta property="og:site_name" content="Impost Media">
  <meta property="og:locale" content="id_ID">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="@yield('twitter_title', 'Impost Media | Agensi Digital Marketing')">
  <meta name="twitter:description" content="@yield('twitter_description', 'Partner terbaik untuk pemasaran digital bisnis Anda di Kalimantan Selatan.')">
  <meta name="twitter:image" content="@yield('twitter_image', asset('img/og_image.png'))">

  <meta name="theme-color" content="#040404">

  <meta name="facebook-domain-verification" content="yohcjpxw25wp3igygjcrugwvqnlfek" />

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

  @php
    $defaultJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Impost Media',
        'alternateName' => 'CV Impost Media Indonesia',
        'url' => url('/'),
        'logo' => asset('img/og_image.png'),
        'image' => asset('img/og_image.png'),
        'description' => 'All in One Integrated Digital Marketing Agency di Banjarbaru, Kalimantan Selatan.',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => config('contact.address.street'),
            'addressLocality' => config('contact.address.city'),
            'addressRegion' => config('contact.address.region'),
            'postalCode' => config('contact.address.postal_code'),
            'addressCountry' => config('contact.address.country'),
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => config('contact.whatsapp.admin.display'),
            'contactType' => 'customer service',
            'availableLanguage' => ['Indonesian', 'English'],
        ],
        'sameAs' => [
            config('contact.socials.instagram.url'),
            config('contact.socials.facebook.url'),
            config('contact.socials.linkedin.url'),
        ],
    ];

    $websiteJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'Impost Media',
        'alternateName' => 'Impost Media Indonesia',
        'url' => url('/'),
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Impost Media',
        ],
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => route('article.all') . '?search={search_term_string}',
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];

    $siteNavJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'itemListElement' => [
            ['@type' => 'SiteNavigationElement', 'position' => 1, 'name' => 'Home', 'url' => url('/')],
            ['@type' => 'SiteNavigationElement', 'position' => 2, 'name' => 'Tentang Kami', 'url' => route('about')],
            ['@type' => 'SiteNavigationElement', 'position' => 3, 'name' => 'Portfolio', 'url' => route('portfolio')],
            ['@type' => 'SiteNavigationElement', 'position' => 4, 'name' => 'Study Case', 'url' => route('study-case')],
            ['@type' => 'SiteNavigationElement', 'position' => 5, 'name' => 'Artikel', 'url' => route('article.all')],
            ['@type' => 'SiteNavigationElement', 'position' => 6, 'name' => 'Karir', 'url' => route('careers')],
            ['@type' => 'SiteNavigationElement', 'position' => 7, 'name' => 'Kontak', 'url' => route('contact')],
        ],
    ];

    $breadcrumbs = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => url('/'),
            ],
        ],
    ];

    if (isset($breadcrumbItems) && is_array($breadcrumbItems)) {
        $pos = 2;
        foreach ($breadcrumbItems as $crumb) {
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => $pos,
                'name' => $crumb['name'],
                'item' => $crumb['url'],
            ];
            $pos++;
        }
    } elseif (isset($title) && $title !== 'Home') {
        $breadcrumbs['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $title,
            'item' => url()->current(),
        ];
    }
  @endphp
  <script type="application/ld+json">{!! json_encode($defaultJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($websiteJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($siteNavJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  <script type="application/ld+json">{!! json_encode($breadcrumbs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  @stack('json-ld')

</head>

<body class="relative antialiased min-h-screen bg-impost-fifth text-white overflow-x-hidden">

  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLFLQL9L" height="0" width="0"
      style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <x-partials.public.navbar />

  <main class="relative z-0">
    @yield('content')
  </main>

  <x-partials.public.footer />

  @stack('scripts')

</body>

</html>
