@extends('admin.layout')
@section('title', 'Guía de uso')

@section('content')
@php
function guideSection(int $n, string $title, string $content): string {
    return ''; // solo para referencia, usamos blade directo
}
@endphp

<div class="max-w-3xl mx-auto space-y-4">

    {{-- Intro --}}
    <div class="border border-letiarepa-gold/20 rounded-2xl p-6 bg-letiarepa-gold/5 flex items-start gap-4">
        <div class="w-10 h-10 rounded-xl bg-letiarepa-gold/20 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-letiarepa-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <div>
            <h2 class="text-letiarepa-gold font-bold text-base mb-1">Bienvenido al Panel de Administración</h2>
            <p class="text-white/60 text-sm leading-relaxed">Desde aquí puedes gestionar todos los productos del menú: cambiar precios, actualizar imágenes, editar descripciones y activar o desactivar productos. Esta guía te explica paso a paso cómo hacerlo.</p>
        </div>
    </div>

    {{-- Macro para secciones acordeón --}}
    @php
    $sections = [
        [
            'n' => 1,
            'title' => 'Ver todos los productos',
            'html' => '
                <p class="mb-3">En el menú lateral izquierdo, haz clic en <strong class="text-letiarepa-gold">Productos</strong>. Verás la lista completa de todos los platos del menú.</p>
                <ul class="space-y-2">
                    <li class="flex items-start gap-2"><span class="text-letiarepa-gold">→</span><span>Filtra por categoría usando los botones en la parte superior (Arepas, Parrillas, Bebidas, etc.).</span></li>
                    <li class="flex items-start gap-2"><span class="text-letiarepa-gold">→</span><span>Cada producto muestra imagen, nombre, categoría, precio y estado.</span></li>
                    <li class="flex items-start gap-2"><span class="text-letiarepa-gold">→</span><span>Punto <strong class="text-green-400">verde</strong> = visible en el sitio. Punto <strong class="text-white/40">gris</strong> = oculto.</span></li>
                </ul>',
        ],
        [
            'n' => 2,
            'title' => 'Cambiar el precio de un producto',
            'html' => '
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Busca el producto en la lista y haz clic en el ícono de <strong class="text-letiarepa-gold">lápiz ✏️</strong> (o "Editar" en móvil).</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>En el campo <strong class="text-white">Precio ($)</strong>, escribe el nuevo valor. Solo números, sin el signo $.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">3</span><span>Haz clic en <strong class="text-letiarepa-gold">Guardar cambios</strong>. Se actualiza de inmediato en el sitio.</span></li>
                </ol>
                <div class="mt-4 p-3 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-300 text-xs">💡 <strong>Ejemplo:</strong> Si el producto cuesta $12 y quieres subirlo a $14, escribe <code class="bg-white/10 px-1 rounded">14</code> y guarda.</div>',
        ],
        [
            'n' => 3,
            'title' => 'Cambiar el nombre o la descripción',
            'html' => '
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Haz clic en el ícono de <strong class="text-letiarepa-gold">lápiz ✏️</strong> del producto.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>Modifica el campo <strong class="text-white">Nombre</strong> y/o <strong class="text-white">Descripción</strong>.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">3</span><span>Haz clic en <strong class="text-letiarepa-gold">Guardar cambios</strong>.</span></li>
                </ol>',
        ],
        [
            'n' => 4,
            'title' => 'Cambiar la imagen de un producto',
            'html' => '
                <p class="mb-3">Hay dos formas de cambiar una imagen:</p>
                <div class="space-y-3">
                    <div class="p-4 rounded-xl border border-letiarepa-gold/20 bg-white/[0.02]">
                        <p class="text-letiarepa-gold text-xs font-bold uppercase tracking-wider mb-2">✅ Recomendado — Mismo nombre de archivo</p>
                        <ol class="space-y-2 text-sm text-white/70">
                            <li class="flex gap-2"><span class="text-letiarepa-gold shrink-0">1.</span> En "Imágenes actuales" (panel derecho), anota el nombre del archivo actual (ej: <code class="bg-white/10 px-1 rounded text-xs">Tequeños-2.jpg</code>).</li>
                            <li class="flex gap-2"><span class="text-letiarepa-gold shrink-0">2.</span> Guarda tu nueva foto con <strong class="text-white">exactamente el mismo nombre</strong>.</li>
                            <li class="flex gap-2"><span class="text-letiarepa-gold shrink-0">3.</span> Súbela en la sección "Reemplazar / Agregar imágenes" y guarda.</li>
                        </ol>
                        <div class="mt-3 p-2 rounded-lg bg-green-500/10 border border-green-500/20 text-green-300 text-xs">✅ El enlace nunca cambia, el sitio siempre la muestra correctamente.</div>
                    </div>
                    <div class="p-4 rounded-xl border border-white/10 bg-white/[0.02]">
                        <p class="text-white/60 text-xs font-bold uppercase tracking-wider mb-2">➕ Alternativa — Nombre nuevo</p>
                        <p class="text-sm text-white/60">Si subes un archivo con nombre diferente, se agrega como imagen adicional y el sitio la mostrará en carrusel.</p>
                    </div>
                </div>',
        ],
        [
            'n' => 5,
            'title' => 'Cambiar la categoría de un producto',
            'html' => '
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Entra a editar el producto.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>En el campo <strong class="text-white">Categoría</strong>, selecciona la nueva del menú desplegable.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">3</span><span>Guarda. El producto aparecerá en la nueva sección del menú.</span></li>
                </ol>
                <div class="mt-4 p-3 rounded-xl bg-yellow-500/10 border border-yellow-500/20 text-yellow-300 text-xs">⚠️ Si cambias la categoría y subes imagen nueva, se guardará en la carpeta de la nueva categoría.</div>',
        ],
        [
            'n' => 6,
            'title' => 'Activar o desactivar un producto',
            'html' => '
                <p class="mb-3 text-white/70 text-sm">Oculta temporalmente un producto sin eliminarlo. Útil cuando un plato no está disponible.</p>
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Entra a editar el producto.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>Marca o desmarca <strong class="text-white">"Producto activo (visible en el menú)"</strong>.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">3</span><span>Guarda. Si está desmarcado, desaparece del sitio hasta que lo reactives.</span></li>
                </ol>',
        ],
        [
            'n' => 7,
            'title' => 'Crear un producto nuevo',
            'html' => '
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Haz clic en <strong class="text-letiarepa-gold">+ Nuevo producto</strong>.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>Completa: <strong class="text-white">Nombre, Precio, Descripción y Categoría</strong>.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">3</span><span>Sube al menos <strong class="text-white">una imagen</strong>.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">4</span><span>Haz clic en <strong class="text-letiarepa-gold">Crear producto</strong>. Aparece de inmediato en el sitio.</span></li>
                </ol>',
        ],
        [
            'n' => 8,
            'title' => 'Eliminar un producto',
            'html' => '
                <p class="mb-3 text-white/70 text-sm">Solo elimina si estás seguro. Esta acción no se puede deshacer.</p>
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-red-500/20 text-red-400 text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Haz clic en el ícono de <strong class="text-red-400">papelera 🗑️</strong> (o "Eliminar" en móvil).</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-red-500/20 text-red-400 text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>Confirma en la ventana que aparece.</span></li>
                </ol>
                <div class="mt-4 p-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-300 text-xs">⚠️ Si solo quieres ocultarlo temporalmente, usa <strong>desactivar</strong> en lugar de eliminar.</div>',
        ],
        [
            'n' => 9,
            'title' => 'Eliminar una imagen de un producto',
            'html' => '
                <ol class="space-y-3">
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">1</span><span>Entra a editar el producto.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">2</span><span>En <strong class="text-white">"Imágenes actuales"</strong>, verás todas las fotos del producto.</span></li>
                    <li class="flex items-start gap-3"><span class="w-6 h-6 rounded-full bg-letiarepa-gold/20 text-letiarepa-gold text-xs flex items-center justify-center shrink-0 font-bold">3</span><span>Haz clic en la <strong class="text-red-400">X</strong> junto a la imagen y confirma.</span></li>
                </ol>
                <div class="mt-4 p-3 rounded-xl bg-yellow-500/10 border border-yellow-500/20 text-yellow-300 text-xs">💡 La imagen con <strong class="text-letiarepa-gold">★ Principal</strong> es la que aparece primero. Si la eliminas, el sistema usará la siguiente automáticamente.</div>',
        ],
    ];
    @endphp

    @foreach($sections as $s)
    <div class="border border-white/10 rounded-2xl overflow-hidden">
        <button onclick="toggleSection({{ $s['n'] }})"
            class="w-full flex items-center gap-4 p-5 text-left hover:bg-white/[0.02] transition-colors">
            <span class="w-8 h-8 rounded-xl bg-letiarepa-gold/15 text-letiarepa-gold text-sm font-black flex items-center justify-center shrink-0">
                {{ $s['n'] }}
            </span>
            <span class="flex-1 text-white font-semibold text-sm">{{ $s['title'] }}</span>
            <svg id="icon-{{ $s['n'] }}" class="w-4 h-4 text-white/30 transition-transform duration-200 shrink-0"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div id="section-{{ $s['n'] }}" class="hidden px-5 pb-5 text-white/70 text-sm leading-relaxed border-t border-white/5 pt-4">
            {!! $s['html'] !!}
        </div>
    </div>
    @endforeach

    {{-- Resumen rápido --}}
    <div class="border border-letiarepa-gold/20 rounded-2xl p-6 bg-white/[0.02]">
        <h3 class="text-letiarepa-gold font-bold text-sm uppercase tracking-widest mb-4">📋 Resumen rápido</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            @foreach([
                ['Cambiar precio',   'Editar → campo Precio → Guardar'],
                ['Cambiar nombre',   'Editar → campo Nombre → Guardar'],
                ['Cambiar imagen',   'Editar → subir mismo nombre → Guardar'],
                ['Ocultar producto', 'Editar → desmarcar "Activo" → Guardar'],
                ['Nuevo producto',   'Botón + Nuevo producto → llenar campos → Crear'],
                ['Eliminar producto','Ícono papelera → Confirmar'],
            ] as [$accion, $pasos])
            <div class="flex items-start gap-3 p-3 rounded-xl bg-white/[0.03] border border-white/5">
                <span class="text-letiarepa-gold text-xs mt-0.5 shrink-0">→</span>
                <div>
                    <p class="text-white text-xs font-semibold">{{ $accion }}</p>
                    <p class="text-white/40 text-[11px] mt-0.5">{{ $pasos }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="text-center pb-4">
        <a href="{{ route('admin.products.index') }}"
           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-bold text-sm uppercase tracking-widest transition-all">
            Ir a Productos
        </a>
    </div>

</div>

<script>
function toggleSection(n) {
    const content = document.getElementById('section-' + n);
    const icon    = document.getElementById('icon-' + n);
    const hidden  = content.classList.toggle('hidden');
    icon.style.transform = hidden ? '' : 'rotate(180deg)';
}
</script>
@endsection
