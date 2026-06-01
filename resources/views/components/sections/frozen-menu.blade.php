<section data-tab-section="frozen" class="hidden transition-opacity duration-300">
    <!-- Encabezado Monumental (Igual a la imagen) -->
    <div class="flex flex-col mb-16 select-none">
        <h2 class="text-letiarepa-gold text-2xl sm:text-5xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]"
            style="-webkit-text-stroke: 1.5px currentColor; text-shadow: 0 0 0.5px currentColor;">
            PRODUCTOS</h2>
        <h2 style="font-weight: 200;"
            class="font-script text-letiarepa-gold text-[160px] leading-[0.8] font-black tracking-[6px] uppercase">
            CONGELADOS</h2>
        <p class="font-nexa text-[18px] text-letiarepa-gold tracking-widest  mt-[-10px]">Ahora puedes llevar nuestros
            productos estrella para consumirlos en tu hogar cuando se te antoje !!!</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-12 lg:gap-16 items-start">

        <!-- Lado Izquierdo: Sidebar de Navegación -->
        <aside class="flex flex-col gap-3 sticky top-24 select-none">
            <hr class="border-white/35 w-full my-0">

            <!-- Buscador Estilizado -->
            <div class="relative w-full group">
                <input type="text" placeholder="¿ Buscas algo en específico ?"
                    class="w-full bg-transparent border border-letiarepa-gold/50 rounded-xl py-2.5 px-4 text-xs text-white/70 placeholder-letiarepa-gold/80 focus:outline-none focus:border-letiarepa-gold transition-all"
                    oninput="handleSearch(this.value)">
                <svg class="w-4 h-4 text-letiarepa-gold absolute right-4 top-1/2 -translate-y-1/2 opacity-50"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
                </svg>
            </div>

            <hr class="border-white/35 w-full my-0">

            <!-- Menú de Categorías Congelados -->
            <div class="flex flex-col divide-y divide-white/10">
                <!-- PROTEINAS (Estado Activo) -->
                <div class="py-4 pt-1">
                    <div class="w-full flex items-center justify-between mb-3">
                        <span
                            class="text-letiarepa-gold text-2xl sm:text-1xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]"
                            style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">PROTEINAS</span>
                        <span class="text-2xl text-letiarepa-gold font-bold">-</span>
                    </div>
                    <div class="pl-4 space-y-2 mb-0">
                        <p class="text-[11px] text-letiarepa-gold font-black uppercase tracking-widest">PRESENTACIONES:
                        </p>
                        <p class="text-[12px] text-letiarepa-gold font-nexa uppercase opacity-80">- 1 LIBRA DE POLLO
                            MECHADO</p>
                        <p class="text-[12px] text-letiarepa-gold font-nexa uppercase opacity-80">- 1 LIBRA DE CARNE
                            MECHADA</p>
                    </div>

                    <!-- Bloque de Compra Rápida en Sidebar (Igual a la imagen) -->
                    <div class="mt-6 space-y-3">
                        <div class="grid grid-cols-[1.2fr_0.8fr] gap-3">
                            <button
                                onclick="addToCart('protein-combo', 'Combo Proteinas', 26, 'letiarepa/images/productos-congelados-header.png')"
                                class="flex items-center justify-center gap-3 px-3 py-2 rounded-xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[9px] uppercase hover:bg-letiarepa-gold/10 transition-all group/btn">
                                <span class="leading-tight text-right">AGREGAR AL<br>CARRITO</span>
                                <svg class="w-6 h-6 text-white group-hover/btn:text-letiarepa-gold transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                            <div class="flex flex-col">
                                <span
                                    class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">CANTIDAD</span>
                                <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                    <button onclick="changeQty('protein-combo', -1)"
                                        class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                    <input type="number" id="qty-protein-combo" value="1" min="1" readonly
                                        class="h-10 min-w-0 text-right text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                    <button onclick="changeQty('protein-combo', 1)"
                                        class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                </div>
                            </div>
                        </div>
                        <button onclick="checkoutWhatsApp()"
                            class="font-nexa-bold italic w-full py-2 rounded-2xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-nexa font-black text-2xl tracking-[2px] uppercase transition-all shadow-lg shadow-letiarepa-gold/20"
                            style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">
                            ORDENAR AHORA !!!
                        </button>
                    </div>
                </div>

                <!-- TEQUEÑOS (Estado Inactivo - Delineado) -->
                <div class="py-6">
                    <button onclick="showUpcomingAlert('TEQUEÑOS')"
                        class="w-full flex items-center justify-between group">
                        <span
                            class="font-nexa-bold transition-all duration-300 italic uppercase text-[26px] tracking-[4px] text-[#121212] [-webkit-text-stroke:1px_#c29545] [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)]">TEQUEÑOS</span>
                        <span
                            class="font-nexa-bold transition-all duration-300 italic uppercase text-[26px] tracking-[4px] text-[#121212] [-webkit-text-stroke:1px_#c29545] [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)]">+</span>
                    </button>
                </div>

                <!-- EMPANADAS (Estado Inactivo - Delineado) -->
                <div class="py-6">
                    <button onclick="showUpcomingAlert('EMPANADAS')"
                        class="w-full flex items-center justify-between group">
                        <span
                            class="font-nexa-bold transition-all duration-300 italic uppercase text-[26px] tracking-[4px] text-[#121212] [-webkit-text-stroke:1px_#c29545] [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)]">EMPANADAS</span>
                        <span
                            class="font-nexa-bold transition-all duration-300 italic uppercase text-[26px] tracking-[4px] text-[#121212] [-webkit-text-stroke:1px_#c29545] [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)]">+</span>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Lado Derecho: Grid de Productos Congelados -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 xl:gap-14">
            @foreach ($frozenMenu as $item)
                <div
                    class="flex flex-col border border-letiarepa-gold/40 rounded-[2.5rem] p-8 transition-all hover:bg-white/5 relative bg-transparent group overflow-hidden">

                    <!-- Imagen de Empaque Inclinada (Exacto a la imagen) -->
                    <div class="flex justify-center mb-10 relative">
                        <img src="/{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}"
                            class="w-full max-w-[240px] object-contain drop-shadow-[0_25px_45px_rgba(0,0,0,0.7)] rotate-[-12deg] group-hover:rotate-[-5deg] transition-transform duration-700">
                    </div>

                    <!-- Detalles del Producto -->
                    <div class="flex flex-col items-center text-center flex-1">
                        <div class="leading-none mb-4">
                            <span
                                class="text-letiarepa-gold text-2xl sm:text-1xl font-black italic font-nexa-bold uppercase tracking-[3px]"
                                style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">
                                {{ str_contains($item['nombre'], 'CARNE') ? 'Carne' : 'Pollo' }}
                            </span>
                            <h3 style="font-weight: 200;"
                                class="font-script text-letiarepa-gold text-[60px] leading-[0.8] font-black tracking-[1px] uppercase">
                                MECHADA</h3>
                        </div>

                        <p class="text-[17px] text-letiarepa-gold font-nexa leading-tight mb-1 opacity-90 max-w-[85%]">
                            {{ $item['descripcion'] }}
                        </p>

                        <h4 class="text-1xl mb-1 font-nexa font-black text-white uppercase tracking-[5px]"
                            style="-webkit-text-stroke: 2px currentColor; text-shadow: 0 0 0.5px currentColor;">
                            {{ $item['presentacion'] }}
                        </h4>

                        <!-- Botones de la Tarjeta -->
                        <div class="w-full space-y-4">
                            <button
                                onclick="addToCart('{{ $item['id'] }}', '{{ $item['nombre'] }}', {{ $item['precio'] }}, '{{ $item['imagen'] }}'); checkoutWhatsApp();"
                                class="font-nexa-bold italic w-full py-4 rounded-2xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-nexa font-black text-2xl tracking-[2px] uppercase transition-all shadow-lg shadow-letiarepa-gold/20"
                                style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">
                                ORDENAR AHORA !!!
                            </button>

                            <div class="grid grid-cols-[1.3fr_0.7fr] gap-4">
                                <button
                                    onclick="addToCart('{{ $item['id'] }}', '{{ $item['nombre'] }}', {{ $item['precio'] }}, '{{ $item['imagen'] }}')"
                                    class="flex items-center justify-center gap-3 px-5 py-3 rounded-2xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[11px] uppercase hover:bg-letiarepa-gold/10 transition-all group/btn">
                                    <span class="leading-tight text-right">AGREGAR AL<br>CARRITO</span>
                                    <svg class="w-9 h-9 text-white group-hover/btn:text-letiarepa-gold transition-colors"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </button>

                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">CANTIDAD</span>
                                    <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                        <button onclick="changeQty('{{ $item['id'] }}', -1)"
                                            class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                        <input type="number" id="qty-{{ $item['id'] }}" value="1"
                                            min="1" readonly
                                            class="h-10 min-w-0 text-right text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                        <button onclick="changeQty('{{ $item['id'] }}', 1)"
                                            class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
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
