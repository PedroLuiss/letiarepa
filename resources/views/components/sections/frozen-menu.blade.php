<section data-tab-section="frozen" class="hidden transition-opacity duration-300">
    <div class="flex flex-col mb-16 select-none">
        <h2 class="text-letiarepa-gold text-8xl font-black leading-[0.8] tracking-tighter uppercase">PRODUCTOS</h2>
        <h2 class="text-letiarepa-gold text-9xl font-black leading-[0.8] tracking-tighter uppercase ml-[-5px]">CONGELADOS</h2>
        <p class="font-nexa text-[15px] text-letiarepa-gold tracking-widest mt-6 lowercase">Ahora puedes llevar nuestros productos estrella para consumirlos en tu hogar cuando se te antoje !!!</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-12 lg:gap-16 items-start">
        <aside class="flex flex-col gap-6 sticky top-24 select-none">
            <hr class="border-white/10 w-full mb-2">
            <div class="relative w-full group">
                <input type="text" placeholder="¿ Buscas algo en específico ?" class="w-full bg-transparent border border-letiarepa-gold/50 rounded-xl py-2.5 px-4 text-xs text-white/70 placeholder-letiarepa-gold/40 focus:outline-none focus:border-letiarepa-gold transition-all">
                <svg class="w-4 h-4 text-letiarepa-gold absolute right-4 top-1/2 -translate-y-1/2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" /></svg>
            </div>
            <hr class="border-white/10 w-full my-2">
            <div class="flex flex-col divide-y divide-white/10">
                <div class="py-4">
                    <div class="w-full flex items-center justify-between mb-4">
                        <span class="text-4xl font-black text-letiarepa-gold tracking-widest uppercase">PROTEINAS</span>
                        <span class="text-2xl text-letiarepa-gold font-bold">-</span>
                    </div>
                    <div class="pl-4 space-y-2">
                        <p class="text-[11px] text-letiarepa-gold font-black uppercase tracking-widest">PRESENTACIONES:</p>
                        <p class="text-[12px] text-letiarepa-gold font-nexa uppercase opacity-80">- 1 LIBRA DE POLLO MECHADO</p>
                        <p class="text-[12px] text-letiarepa-gold font-nexa uppercase opacity-80">- 1 LIBRA DE CARNE MECHADA</p>
                    </div>
                    <div class="mt-6 space-y-3">
                        <div class="flex items-center gap-3">
                            <button onclick="addToCart('protein-pkg', 'Combo Proteinas', 26, 'letiarepa/images/productos-congelados-header.png')" class="flex-1 flex items-center justify-between px-3 py-2 rounded-xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[9px] uppercase hover:bg-letiarepa-gold/10 transition-all">
                                <span>AGREGAR AL<br>CARRITO</span>
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            </button>
                            <div class="flex flex-col">
                                <span class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">CANTIDAD</span>
                                <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                    <button onclick="changeQty('protein-pkg', -1)" class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                    <input type="number" id="qty-protein-pkg" value="1" min="1" readonly class="h-10 min-w-0 text-center text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                    <button onclick="changeQty('protein-pkg', 1)" class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                </div>
                            </div>
                        </div>
                        <button onclick="checkoutWhatsApp()" class="w-full py-3 bg-letiarepa-gold text-black font-nexa font-black text-xl rounded-xl uppercase shadow-lg">ORDENAR AHORA !!!</button>
                    </div>
                </div>
                <div class="py-6">
                    <button class="w-full flex items-center justify-between group">
                        <span class="text-4xl font-bold text-transparent tracking-widest uppercase" style="-webkit-text-stroke: 1px #CC9438;">TEQUEÑOS</span>
                        <span class="text-2xl text-letiarepa-gold/50 font-bold">+</span>
                    </button>
                </div>
                <div class="py-6">
                    <button class="w-full flex items-center justify-between group">
                        <span class="text-4xl font-bold text-transparent tracking-widest uppercase" style="-webkit-text-stroke: 1px #CC9438;">EMPANADAS</span>
                        <span class="text-2xl text-letiarepa-gold/50 font-bold">+</span>
                    </button>
                </div>
            </div>
        </aside>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 xl:gap-14">
            @foreach ($frozenMenu as $item)
                <div class="flex flex-col border border-letiarepa-gold/40 rounded-[2rem] p-8 transition-all hover:bg-white/5 relative bg-transparent group">
                    <div class="flex justify-center mb-8 relative">
                        <img src="/{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="w-full max-w-[240px] object-contain drop-shadow-[0_20px_40px_rgba(0,0,0,0.7)] rotate-[-12deg] group-hover:rotate-[-5deg] transition-transform duration-500">
                    </div>
                    <div class="flex flex-col items-center text-center flex-1">
                        <div class="leading-none mb-4">
                            <span class="font-script text-letiarepa-gold text-4xl lowercase tracking-wider">{{ str_contains($item['nombre'], 'CARNE') ? 'Carne' : 'Pollo' }}</span>
                            <h3 class="text-letiarepa-gold text-6xl font-black uppercase tracking-tighter -mt-2">MECHADA</h3>
                        </div>
                        <p class="text-[16px] text-letiarepa-gold font-nexa leading-tight mb-6 opacity-90 max-w-[90%]">{{ $item['descripcion'] }}</p>
                        <span class="font-nexa font-black text-2xl text-white mb-8 tracking-widest">{{ $item['presentacion'] }}</span>
                        <div class="w-full space-y-4">
                            <button onclick="addToCart('{{ $item['id'] }}', '{{ $item['nombre'] }}', {{ $item['precio'] }}, '{{ $item['imagen'] }}'); checkoutWhatsApp();" class="w-full py-4 bg-letiarepa-gold text-black font-nexa font-black text-3xl rounded-2xl uppercase shadow-lg shadow-letiarepa-gold/20 hover:scale-[1.02] transition-transform">ORDENAR AHORA !!!</button>
                            <div class="grid grid-cols-[1fr_1fr] gap-3">
                                <button onclick="addToCart('{{ $item['id'] }}', '{{ $item['nombre'] }}', {{ $item['precio'] }}, '{{ $item['imagen'] }}')" class="flex items-center justify-between px-3 py-2 rounded-xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[10px] uppercase hover:bg-letiarepa-gold/10 transition-all">
                                    <span class="leading-tight text-left">AGREGAR AL<br>CARRITO</span>
                                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                </button>
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">CANTIDAD</span>
                                    <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                        <button onclick="changeQty('{{ $item['id'] }}', -1)" class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                        <input type="number" id="qty-{{ $item['id'] }}" value="1" min="1" readonly class="h-10 min-w-0 text-center text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                        <button onclick="changeQty('{{ $item['id'] }}', 1)" class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>