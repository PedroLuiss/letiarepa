@extends('admin.layout')
@section('title', 'Productos del Menú')

@section('content')

{{-- Header acciones --}}
<div class="flex flex-col sm:flex-row sm:items-center gap-3 justify-between mb-6">
    <p class="text-white/40 text-xs">{{ $items->count() }} productos en total</p>
    <a href="{{ route('admin.products.create') }}"
       class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black text-sm font-bold transition-all">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nuevo producto
    </a>
</div>

{{-- Filtros categoría --}}
<div class="flex gap-2 mb-6 flex-wrap">
    <button onclick="filterCat('all')" data-cat="all"
        class="cat-btn active px-3 py-1.5 rounded-lg text-xs uppercase tracking-wider border border-letiarepa-gold/30 text-letiarepa-gold bg-letiarepa-gold/10 transition-all">
        Todos
    </button>
    @foreach($categories as $cat)
        <button onclick="filterCat('{{ $cat->slug }}')" data-cat="{{ $cat->slug }}"
            class="cat-btn px-3 py-1.5 rounded-lg text-xs uppercase tracking-wider border border-white/10 text-white/50 hover:border-letiarepa-gold/30 hover:text-letiarepa-gold transition-all">
            {{ $cat->name }}
        </button>
    @endforeach
</div>

{{-- VISTA MÓVIL: tarjetas --}}
<div class="lg:hidden space-y-3" id="cards-mobile">
    @foreach($items as $item)
    <div class="product-row border border-letiarepa-gold/10 rounded-2xl p-4 bg-white/[0.02]" data-cat="{{ $item->category->slug }}">
        <div class="flex items-start gap-3">
            <img src="/{{ $item->image }}?v={{ time() }}" alt="{{ $item->name }}"
                 class="w-16 h-16 object-cover rounded-xl bg-white/5 shrink-0"
                 onerror="this.src='/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png'">
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2">
                    <p class="font-semibold text-white text-sm leading-tight">{{ $item->name }}</p>
                    <span class="text-letiarepa-gold font-bold text-sm shrink-0">${{ number_format($item->price, 0) }}</span>
                </div>
                <p class="text-white/30 text-xs mt-1 line-clamp-2">{{ $item->description }}</p>
                <div class="flex items-center gap-2 mt-2 flex-wrap">
                    <span class="px-2 py-0.5 rounded-md bg-letiarepa-gold/10 text-letiarepa-gold text-[10px] uppercase tracking-wider">
                        {{ $item->category->name }}
                    </span>
                    @if($item->is_available)
                        <span class="flex items-center gap-1 text-green-400 text-[10px]">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span> Activo
                        </span>
                    @else
                        <span class="flex items-center gap-1 text-white/30 text-[10px]">
                            <span class="w-1.5 h-1.5 rounded-full bg-white/20 inline-block"></span> Inactivo
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex gap-2 mt-3 pt-3 border-t border-white/5">
            <a href="{{ route('admin.products.edit', $item) }}"
               class="flex-1 flex items-center justify-center gap-2 py-2 rounded-xl border border-letiarepa-gold/30 text-letiarepa-gold text-xs font-semibold hover:bg-letiarepa-gold/10 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Editar
            </a>
            <form method="POST" action="{{ route('admin.products.destroy', $item) }}" class="flex-1"
                  onsubmit="return confirm('¿Eliminar {{ addslashes($item->name) }}?')">
                @csrf @method('DELETE')
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 py-2 rounded-xl border border-red-500/20 text-red-400 text-xs font-semibold hover:bg-red-500/10 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Eliminar
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

{{-- VISTA DESKTOP: tabla --}}
<div class="hidden lg:block border border-letiarepa-gold/10 rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-letiarepa-gold/10 bg-white/[0.02]">
                <th class="text-left px-5 py-3 text-xs text-white/40 uppercase tracking-widest font-normal w-16">Img</th>
                <th class="text-left px-5 py-3 text-xs text-white/40 uppercase tracking-widest font-normal">Nombre</th>
                <th class="text-left px-5 py-3 text-xs text-white/40 uppercase tracking-widest font-normal">Categoría</th>
                <th class="text-left px-5 py-3 text-xs text-white/40 uppercase tracking-widest font-normal">Precio</th>
                <th class="text-left px-5 py-3 text-xs text-white/40 uppercase tracking-widest font-normal">Estado</th>
                <th class="px-5 py-3 w-28"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($items as $item)
            <tr class="hover:bg-white/[0.02] transition-colors product-row" data-cat="{{ $item->category->slug }}">
                <td class="px-5 py-3">
                    <img src="/{{ $item->image }}?v={{ time() }}" alt="{{ $item->name }}"
                         class="w-12 h-12 object-cover rounded-lg bg-white/5"
                         onerror="this.src='/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png'">
                </td>
                <td class="px-5 py-3">
                    <p class="font-medium text-white">{{ $item->name }}</p>
                    <p class="text-white/30 text-xs mt-0.5 line-clamp-1">{{ $item->description }}</p>
                </td>
                <td class="px-5 py-3">
                    <span class="px-2 py-1 rounded-md bg-letiarepa-gold/10 text-letiarepa-gold text-xs uppercase tracking-wider">
                        {{ $item->category->name }}
                    </span>
                </td>
                <td class="px-5 py-3 text-letiarepa-gold font-bold">${{ number_format($item->price, 0) }}</td>
                <td class="px-5 py-3">
                    @if($item->is_available)
                        <span class="flex items-center gap-1.5 text-green-400 text-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span> Activo
                        </span>
                    @else
                        <span class="flex items-center gap-1.5 text-white/30 text-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-white/20 inline-block"></span> Inactivo
                        </span>
                    @endif
                </td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2 justify-end">
                        <a href="{{ route('admin.products.edit', $item) }}"
                           class="p-1.5 rounded-lg border border-letiarepa-gold/20 text-letiarepa-gold hover:bg-letiarepa-gold/10 transition-colors" title="Editar">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.products.destroy', $item) }}"
                              onsubmit="return confirm('¿Eliminar {{ addslashes($item->name) }}?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="p-1.5 rounded-lg border border-red-500/20 text-red-400 hover:bg-red-500/10 transition-colors" title="Eliminar">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function filterCat(slug) {
    document.querySelectorAll('.cat-btn').forEach(btn => {
        const active = btn.dataset.cat === slug;
        btn.classList.toggle('bg-letiarepa-gold/10', active);
        btn.classList.toggle('text-letiarepa-gold', active);
        btn.classList.toggle('border-letiarepa-gold/30', active);
        btn.classList.toggle('text-white/50', !active);
        btn.classList.toggle('border-white/10', !active);
    });
    document.querySelectorAll('.product-row').forEach(row => {
        row.style.display = (slug === 'all' || row.dataset.cat === slug) ? '' : 'none';
    });
}
</script>
@endsection
