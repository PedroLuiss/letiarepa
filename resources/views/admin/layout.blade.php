<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Panel')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-[#0a0a0a] text-white">

    {{-- Overlay móvil --}}
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/60 z-30 hidden lg:hidden" onclick="closeSidebar()"></div>

    {{-- Sidebar --}}
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-[#111] border-r border-letiarepa-gold/10 flex flex-col z-40 -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="p-5 border-b border-letiarepa-gold/10 flex items-center justify-between">
            <div>
                <img src="/letiarepa/images/logo-leti-header.png" alt="Letiarepa" class="h-10">
                <p class="text-letiarepa-gold/40 text-[10px] tracking-widest uppercase mt-1">Admin</p>
            </div>
            <button onclick="closeSidebar()" class="lg:hidden text-white/40 hover:text-white p-1">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.products.index') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                      {{ request()->routeIs('admin.products*') ? 'bg-letiarepa-gold/10 text-letiarepa-gold' : 'text-white/50 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                Productos
            </a>
            <a href="{{ route('admin.guide') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors
                      {{ request()->routeIs('admin.guide') ? 'bg-letiarepa-gold/10 text-letiarepa-gold' : 'text-white/50 hover:text-white hover:bg-white/5' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Guía de uso
            </a>
        </nav>

        <div class="p-4 border-t border-letiarepa-gold/10">
            <p class="text-white/30 text-xs mb-3 truncate">{{ auth()->user()->email }}</p>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full text-left text-xs text-white/40 hover:text-red-400 transition-colors flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    {{-- Contenido principal --}}
    <div class="lg:ml-64 min-h-screen flex flex-col">
        {{-- Header --}}
        <header class="h-14 border-b border-letiarepa-gold/10 flex items-center px-4 sm:px-8 bg-[#0a0a0a]/90 backdrop-blur sticky top-0 z-20">
            <button onclick="openSidebar()" class="lg:hidden mr-3 text-white/50 hover:text-letiarepa-gold transition-colors p-1">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <h1 class="text-sm font-bold text-letiarepa-gold uppercase tracking-widest truncate">@yield('title', 'Panel')</h1>
            <div class="ml-auto shrink-0">
                <a href="{{ route('home') }}" target="_blank" class="text-xs text-white/30 hover:text-letiarepa-gold transition-colors">
                    Ver sitio →
                </a>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

    <script>
    function openSidebar() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');
        document.getElementById('sidebar-overlay').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('sidebar-overlay').classList.add('hidden');
        document.body.style.overflow = '';
    }
    </script>
</body>
</html>
