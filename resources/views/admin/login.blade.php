<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Letiarepa</title>
    @vite(['resources/css/app.css'])
    <style>
        body { background: #0a0a0a; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#0a0a0a]">
    <div class="w-full max-w-sm px-6">
        <div class="text-center mb-8">
            <img src="/letiarepa/images/logo-leti-header.png" alt="Letiarepa" class="h-16 mx-auto mb-4">
            <p class="text-letiarepa-gold/60 text-xs tracking-widest uppercase">Panel Administrativo</p>
        </div>

        <div class="border border-letiarepa-gold/20 rounded-2xl p-8 bg-white/[0.02]">
            @if($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs text-letiarepa-gold/70 uppercase tracking-widest mb-2">Correo</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-transparent border border-letiarepa-gold/30 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-letiarepa-gold transition-colors placeholder-white/20"
                        placeholder="admin@letiarepa.com">
                </div>
                <div>
                    <label class="block text-xs text-letiarepa-gold/70 uppercase tracking-widest mb-2">Contraseña</label>
                    <input type="password" name="password" required
                        class="w-full bg-transparent border border-letiarepa-gold/30 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-letiarepa-gold transition-colors placeholder-white/20"
                        placeholder="••••••••">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="accent-letiarepa-gold">
                    <label for="remember" class="text-xs text-white/50">Recordarme</label>
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-bold text-sm uppercase tracking-widest transition-all">
                    Ingresar
                </button>
            </form>
        </div>

        <p class="text-center text-white/20 text-xs mt-6">
            <a href="{{ route('home') }}" class="hover:text-letiarepa-gold transition-colors">← Volver al sitio</a>
        </p>
    </div>
</body>
</html>
