<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="whatsapp-number" content="{{ config('whatsapp.number', '584141578602') }}">
    <title>Leti Arepa | Sabores de Venezuela en Orlando</title>
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