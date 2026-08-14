<!DOCTYPE html>
<html lang="{{ __('html.lang') }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="whatsapp-number" content="{{ config('whatsapp.number', '584141578602') }}">
    <title>{{ __('site.title') }}</title>
    <meta property="og:title" content="{{ __('site.title') }}" />
    <meta property="og:description" content="{{ __('site.tagline') }}" />
    <meta property="og:image" content="{{ asset('letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png') }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ __('site.title') }}" />
    <meta name="twitter:description" content="{{ __('site.tagline') }}" />
    <meta name="twitter:image" content="{{ asset('letiarepa/images/arepas/AREPA-DE-PABELLON-MINIATURA.png') }}" />
    <link rel="icon" type="image/png" href="/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.4/css/all.min.css"
        integrity="sha512-Po1+I/5d8+CByWj1mcwZhCzZ9g7qL5k6UKgoDLjnF0p5Sl+kODsnxJzyf5uCt8Tki8MPRSk5zY5Zy5qT9q0u/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>

<body class="min-h-screen flex flex-col bg-letiarepa-black selection:bg-letiarepa-gold selection:text-black">

    <x-layout.header />
    <x-layout.mobile-nav />
    <x-layout.cart-sidebar />

    <main class="flex-1">
        @yield('content')
    </main>

    <x-layout.footer />

    @stack('scripts')
</body>

</html>