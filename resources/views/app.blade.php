<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Impost Media') }}</title>

        {{-- Favicon: satu sumber desain (emas). Urutan penting, SVG didahulukan. --}}
        {{-- Cache-busting: URL berubah saat file berubah, agar browser tidak menampilkan favicon lama --}}
        {{-- (public/.htaccess memakai `immutable` 1 tahun untuk aset statis). --}}
        @php
            $vSvg = @filemtime(public_path('favicon/favicon.svg')) ?: 1;
            $vIco = @filemtime(public_path('favicon/favicon.ico')) ?: 1;
            $vPng = @filemtime(public_path('favicon/apple-touch-icon.png')) ?: 1;
        @endphp

        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}?v={{ $vSvg }}">
        <link rel="icon" href="{{ asset('favicon/favicon.ico') }}?v={{ $vIco }}" sizes="16x16 32x32 48x48 64x64 128x128 256x256">
        <link rel="apple-touch-icon" href="{{ asset('favicon/apple-touch-icon.png') }}?v={{ $vPng }}">
        <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap">

        {{-- Tema: default gelap; kelas `light` dipasang sebelum paint agar tidak flash. --}}
        <script>
            (function () {
                try {
                    if (localStorage.getItem("impost-theme") === "light") {
                        document.documentElement.classList.add("light");
                    }
                } catch (e) {}
            })();
        </script>

        @routes
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>
