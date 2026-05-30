<section data-tab-section="restaurant" class="transition-opacity duration-300">
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-12 lg:gap-16 items-start">
        <aside class="flex flex-col p-6 sticky top-24">
            <div class="flex flex-col items-start mb-2">
                <span class="text-letiarepa-gold text-4xl block leading-none lowercase">Nuestro,</span>
                <h2 class="text-letiarepa-gold text-8xl font-black leading-[0.8] tracking-tighter uppercase">MENU</h2>
                <p class="font-nexa text-[11px] text-letiarepa-gold tracking-widest mt-2 lowercase">¿ que esperas para darte gusto ?</p>
            </div>
            <hr class="border-white/10 w-full my-2">
            <div class="relative w-full group">
                <input type="text" id="sidebar-search" placeholder="¿ Buscas algo en específico ?" class="w-full bg-transparent border border-letiarepa-gold/50 rounded-xl py-2.5 px-4 text-xs text-white/70 placeholder-letiarepa-gold/40 focus:outline-none focus:border-letiarepa-gold transition-all" oninput="handleSearch(this.value)">
                <svg class="w-4 h-4 text-letiarepa-gold absolute right-4 top-1/2 -translate-y-1/2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" /></svg>
            </div>
            <hr class="border-white/10 w-full my-2">
            <div class="flex flex-col divide-y divide-white/10">
                <div class="py-4">
                    <button onclick="toggleAccordion('cat-arepa')" class="w-full flex items-center justify-between group">
                        <span class="text-3xl font-black text-letiarepa-gold tracking-widest uppercase">AREPA</span>
                        <span id="icon-cat-arepa" class="text-2xl text-letiarepa-gold font-bold">-</span>
                    </button>
                    <div id="cat-arepa" class="flex flex-col gap-3 mt-4 pl-4 overflow-hidden transition-all duration-300">
                        <button onclick="filterRestaurantCategory('pabellon')" class="text-left font-nexa text-[13px] text-letiarepa-gold hover:text-white transition-colors uppercase tracking-widest">- PABELLON</button>
                        <button onclick="filterRestaurantCategory('reina_pepiada')" class="text-left font-nexa text-[13px] text-letiarepa-gold hover:text-white transition-colors uppercase tracking-widest">- REINA PEPIADA</button>
                        <button onclick="filterRestaurantCategory('letiarepa')" class="text-left font-nexa text-[13px] text-letiarepa-gold hover:text-white transition-colors uppercase tracking-widest">- LETIAREPA</button>
                        <button onclick="filterRestaurantCategory('pelua')" class="text-left font-nexa text-[13px] text-letiarepa-gold hover:text-white transition-colors uppercase tracking-widest">- PELUA</button>
                    </div>
                </div>
                @foreach (['PARRILLAS', 'PATACON', 'CACHAPAS', 'BURGERS', 'PEPITOS', 'APERITIVOS', 'BEBIDAS'] as $index => $cat)
                    <div class="py-4">
                        <button onclick="showUpcomingAlert('{{ $cat }}')" class="w-full flex items-center justify-between group">
                            <span class="text-3xl font-bold text-transparent tracking-widest uppercase transition-all group-hover:text-letiarepa-gold/50" style="-webkit-text-stroke: 1px #CC9438;">{{ $cat }}</span>
                            <span class="text-2xl text-letiarepa-gold/50 font-bold group-hover:text-letiarepa-gold transition-colors">+</span>
                        </button>
                    </div>
                @endforeach
                <hr class="border-white/10 w-full pt-4">
            </div>
        </aside>
        <div>
            <div id="restaurant-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8 xl:gap-12">
                @foreach ($restaurantMenu as $item)
                    <div data-product-card data-product-name="{{ $item['nombre'] }}" data-product-desc="{{ $item['descripcion'] }}" data-product-tab="restaurant" data-product-cat="{{ $item['id'] }}" class="flex flex-col border border-letiarepa-gold/60 rounded-[9px] p-6 transition-all group hover:bg-white/5 relative overflow-hidden bg-transparent">
                        <div class="flex flex-col items-center gap-6">
                            <div class="relative w-full aspect-square max-w-[326px] flex items-center justify-center">
                                <img src="/{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="w-full h-full object-contain drop-shadow-[0_20px_30px_rgba(0,0,0,0.6)] transition-transform duration-500 group-hover:scale-105" onerror="this.src='/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png'" />
                            </div>
                            <div class="flex gap-2.5">
                                @for ($i = 0; $i < $item['dots']; $i++)
                                    <span class="w-4 h-4 rounded-full border border-letiarepa-gold {{ $i === 0 ? 'bg-letiarepa-gold' : 'bg-transparent' }}"></span>
                                @endfor
                            </div>
                        </div>
                        <div class="mt-8 flex flex-col items-center text-center flex-1">
                            <div class="flex flex-col items-center leading-none mb-2">
                                <span class="font-script text-letiarepa-gold text-4xl lowercase tracking-wider">Arepa de ,</span>
                                <h3 class="text-letiarepa-gold text-6xl font-black uppercase tracking-tighter -mt-2">{{ str_replace('AREPA DE ', '', $item['nombre']) }}</h3>
                            </div>
                            <p class="text-[17px] text-letiarepa-gold font-nexa leading-tight mb-6 max-w-[90%]">{{ $item['descripcion'] }}</p>
                            <div class="mb-6"><h4 class="text-3xl font-nexa font-black text-white uppercase tracking-wider">COSTO: ${{ number_format($item['precio'], 0) }}</h4></div>
                            <div class="w-full space-y-4">
                                <button onclick="addToCart('{{ $item['id'] }}', '{{ $item['nombre'] }}', {{ $item['precio'] }}, '{{ $item['imagen'] }}'); checkoutWhatsApp();" class="w-full py-4 rounded-2xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-nexa font-black text-3xl tracking-tighter uppercase transition-all shadow-lg shadow-letiarepa-gold/20">ORDENAR AHORA !!!</button>
                                <div class="grid grid-cols-[1.3fr_0.7fr] gap-3">
                                    <button onclick="addToCart('{{ $item['id'] }}', '{{ $item['nombre'] }}', {{ $item['precio'] }}, '{{ $item['imagen'] }}')" class="flex items-center justify-between px-4 py-3 rounded-2xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[11px] uppercase hover:bg-letiarepa-gold/10 transition-colors text-left group/btn">
                                        <span class="leading-tight">AGREGAR AL<br>CARRITO</span>
                                        <svg class="w-8 h-8 text-white group-hover/btn:text-letiarepa-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
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
    </div>
</section>