<section data-tab-section="frozen" class="hidden transition-opacity duration-300">
    <!-- Encabezado Monumental (Igual a la imagen) -->
    <div class="flex flex-col mb-16 select-none">
        <h2 onclick="showAllFrozen()" class="cursor-pointer text-letiarepa-gold text-2xl sm:text-5xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]"
            style="-webkit-text-stroke: 1.5px currentColor; text-shadow: 0 0 0.5px currentColor;">
            {{ __('frozen.title') }}</h2>
        <h2 onclick="showAllFrozen()" style="font-weight: 200; cursor: pointer;"
            class="font-script text-letiarepa-gold text-[80px] sm:text-[110px] md:text-[140px] xl:text-[160px] leading-[0.8] font-black tracking-[3px] sm:tracking-[6px] uppercase">
            {{ __('frozen.subtitle') }}</h2>
        <p class="font-nexa text-[18px] text-letiarepa-gold tracking-widest  mt-[-10px]">{{ __('frozen.description') }}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-[240px_1fr] xl:grid-cols-[300px_1fr] gap-8 md:gap-12 lg:gap-16 items-start">

        <!-- Lado Izquierdo: Sidebar de Navegación -->
        <aside class="flex flex-col gap-3 lg:sticky lg:top-24 select-none">
            <hr class="border-white/35 w-full my-0">

            <!-- Buscador Estilizado -->
            <div class="relative w-full group">
                <input type="text" placeholder="{{ __('frozen.search_placeholder') }}"
                    class="w-full bg-transparent border border-letiarepa-gold/50 rounded-xl py-2.5 px-4 text-xs text-white/70 placeholder-letiarepa-gold/80 focus:outline-none focus:border-letiarepa-gold transition-all"
                    oninput="handleSearch(this.value)">
                <svg class="w-4 h-4 text-letiarepa-gold absolute right-4 top-1/2 -translate-y-1/2 opacity-50"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
                </svg>
            </div>

            <hr class="border-white/35 w-full my-0">

            <!-- Menú de Categorías Congelados (desde BD) -->
            <div class="flex flex-col divide-y divide-white/10">
                @foreach ($frozenCategories as $cat)
                    @php $isFirst = $loop->first; @endphp
                    <div class="py-4 {{ $isFirst ? 'pt-1' : '' }}">
                        <button onclick="selectFrozenCategory('{{ $cat->slug }}')"
                            class="w-full flex items-center justify-between group">
                            <span id="fsidebar-cat-{{ $cat->slug }}"
                                @if ($isFirst)
                                    class="text-letiarepa-gold text-2xl sm:text-1xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]"
                                    style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;"
                                @else
                                    class="font-nexa-bold italic uppercase text-[26px] tracking-[4px] text-[#121212]"
                                    style="-webkit-text-stroke: 1px #c29545; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);"
                                @endif>{{ $cat->name }}</span>
                            <span id="ficon-cat-{{ $cat->slug }}"
                                class="text-2xl text-letiarepa-gold/50 font-bold group-hover:text-letiarepa-gold transition-colors {{ $isFirst ? '' : 'font-nexa-bold italic uppercase text-[26px] tracking-[4px] text-[#121212]' }}"
                                style="{{ !$isFirst ? '-webkit-text-stroke: 1px #c29545; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);' : '' }}">{{ $isFirst ? '-' : '+' }}</span>
                        </button>
                        <div id="fcat-{{ $cat->slug }}"
                            class="overflow-hidden transition-all duration-300 {{ $isFirst ? '' : 'hidden' }}">
                            @if ($cat->presentationItems->count() > 0)
                                <div class="pl-4 space-y-2 mt-4 mb-0">
                                    <p class="text-[11px] text-letiarepa-gold font-black uppercase tracking-widest">{{ __('frozen.presentations') }}</p>
                                    @php
                                        $presentationProductMap = [];

                                        if ($cat->slug === 'proteinas') {
                                            $presentationProductMap = [
                                                '1 LIBRA DE CARNE MECHADA' => 'carne_mechada_frozen',
                                                '1 LIBRA DE POLLO MECHADO' => 'pollo_mechado_frozen',
                                            ];
                                        } elseif ($cat->slug === 'tequenos') {
                                            $presentationProductMap = [
                                                '6 UNIDADES' => 'tequenos-de-queso',
                                                '12 UNIDADES' => 'tequenos-de-chocolate',
                                                '24 UNIDADES' => 'tequenos-de-platano',
                                            ];
                                        } elseif ($cat->slug === 'empanadas') {
                                            $presentationProductMap = [
                                                '6 UNIDADES' => 'empanadas-de-carne',
                                                '12 UNIDADES' => 'empanadas-de-pollo',
                                                '24 UNIDADES' => 'empanadas-de-queso',
                                            ];
                                        }
                                    @endphp

                                    @foreach ($cat->presentationItems as $pi)
                                        @php
                                            $presentationName = mb_strtoupper(trim($pi->name));
                                            $presentationProductSlug = $presentationProductMap[$presentationName] ?? null;
                                        @endphp

                                        @if ($presentationProductSlug)
                                            <button id="fsidebar-item-{{ $cat->slug }}-{{ $presentationProductSlug }}"
                                                data-product-id="{{ $presentationProductSlug }}"
                                                onclick="selectFrozenPresentation('{{ $cat->slug }}', '{{ $presentationProductSlug }}')"
                                                class="w-full text-left text-[12px] text-letiarepa-gold font-nexa uppercase opacity-80 hover:opacity-100 transition-all px-1 py-0.5">- {{ $pi->name }}</button>
                                        @else
                                            <p class="text-[12px] text-letiarepa-gold font-nexa uppercase opacity-80">- {{ $pi->name }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if ($cat->has_combo)
                                <div class="mt-6 space-y-3">
                                    <div class="grid grid-cols-[1.2fr_0.8fr] gap-3">
                                        <button
                                            onclick="addToCart('{{ $cat->combo_slug }}', '{{ $cat->combo_name }}', {{ $cat->combo_price }}, '{{ $cat->combo_image }}')"
                                            class="flex items-center justify-center gap-3 px-3 py-2 rounded-xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[9px] uppercase hover:bg-letiarepa-gold/10 transition-all group/btn">
                                            <span class="leading-tight text-right">{!! __('frozen.add_to_cart', ['linebreak' => '<br>']) !!}</span>
                                            <svg class="w-6 h-6 text-white group-hover/btn:text-letiarepa-gold transition-colors"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </button>
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">{{ __('frozen.quantity') }}</span>
                                            <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                                <button onclick="changeQty('{{ $cat->combo_slug }}', -1)"
                                                    class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                                <input type="number" id="qty-{{ $cat->combo_slug }}" value="1" min="1" readonly
                                                    class="h-10 min-w-0 text-right text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                                <button onclick="changeQty('{{ $cat->combo_slug }}', 1)"
                                                    class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button onclick="addToCart('{{ $cat->combo_slug }}', '{{ $cat->combo_name }}', {{ $cat->combo_price }}, '{{ $cat->combo_image }}'); checkoutWhatsApp();"
                                        class="font-nexa-bold italic w-full py-2 rounded-2xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-nexa font-black text-2xl tracking-[2px] uppercase transition-all shadow-lg shadow-letiarepa-gold/20"
                                        style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">
                                        {{ __('frozen.order_now') }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>

        <!-- Lado Derecho: Grid de Productos Congelados -->
        <div class="flex flex-col gap-6">
            <div id="frozen-products-grid" class="grid grid-cols-1 md:grid-cols-2 gap-10 xl:gap-14">
                @foreach ($frozenProducts as $item)
                    <div data-frozen-category="{{ $item->category_slug }}"
                        data-product-id="{{ $item->slug }}"
                        data-product-name="{{ $item->name }}"
                        data-product-price="{{ $item->price }}"
                        data-product-image="{{ $item->image }}"
                        data-product-desc="{{ $item->description }}"
                        data-product-presentation="{{ $item->presentation }}"
                        class="flex flex-col border border-letiarepa-gold/40 rounded-[2.5rem] p-8 transition-all hover:bg-white/5 relative bg-transparent group overflow-hidden">

                        <!-- Imagen de Empaque Inclinada (Exacto a la imagen) -->
                        <div class="flex justify-center mb-10">
                            <div class="relative inline-block">
                                <div class="skeleton absolute inset-0 rounded-xl" id="sk-fr-{{ $item->slug }}"></div>
                                <img src="/{{ $item->image }}" alt="{{ $item->name }}"
                                    class="w-full max-w-[240px] object-contain drop-shadow-[0_25px_45px_rgba(0,0,0,0.7)] rotate-[-12deg] group-hover:rotate-[-5deg] transition duration-700 relative z-10 opacity-0"
                                    onload="this.style.opacity='1'; document.getElementById('sk-fr-{{ $item->slug }}')?.classList.add('skeleton-hidden')"
                                    onerror="this.style.opacity='1'; document.getElementById('sk-fr-{{ $item->slug }}')?.classList.add('skeleton-hidden')" />
                            </div>
                        </div>

                        <!-- Detalles del Producto -->
                        <div class="flex flex-col items-center text-center flex-1">
                            <div class="leading-none mb-4">
                                <span
                                    class="text-letiarepa-gold text-xl sm:text-lg font-black italic font-nexa-bold uppercase tracking-[3px]"
                                    style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">
                                    {{ $item->name }}
                                </span>
                            </div>

                            <p class="text-[17px] text-letiarepa-gold font-nexa leading-tight mb-1 opacity-90 max-w-[85%]">
                                {{ $item->description }}
                            </p>

                            <h4 class="text-1xl mb-1 font-nexa font-black text-white uppercase tracking-[5px]"
                                style="-webkit-text-stroke: 2px currentColor; text-shadow: 0 0 0.5px currentColor;">
                                {{ $item->presentation }}
                            </h4>

                            <!-- Botones de la Tarjeta -->
                            <div class="w-full space-y-4">
                                <button
                                    onclick="openFrozenDetailModal(this.closest('[data-frozen-category]'))"
                                    class="font-nexa-bold italic w-full py-4 rounded-2xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-nexa font-black text-2xl tracking-[2px] uppercase transition-all shadow-lg shadow-letiarepa-gold/20"
                                    style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">
                                    {{ __('frozen.order_now') }}
                                </button>

                                <div class="grid grid-cols-[1.3fr_0.7fr] gap-4">
                                    <button
                                        onclick="addToCart('{{ $item->slug }}', '{{ $item->name }}', {{ $item->price }}, '{{ $item->image }}')"
                                        class="flex items-center justify-center gap-3 px-5 py-3 rounded-2xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[11px] uppercase hover:bg-letiarepa-gold/10 transition-all group/btn">
                                        <span class="leading-tight text-right">{!! __('frozen.add_to_cart', ['linebreak' => '<br>']) !!}</span>
                                        <svg class="w-9 h-9 text-white group-hover/btn:text-letiarepa-gold transition-colors"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </button>

                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">{{ __('frozen.quantity') }}</span>
                                        <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                            <button onclick="changeQty('{{ $item->slug }}', -1)"
                                                class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                            <input type="number" id="qty-{{ $item->slug }}" value="1"
                                                min="1" readonly
                                                class="h-10 min-w-0 text-right text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                            <button onclick="changeQty('{{ $item->slug }}', 1)"
                                                class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="frozen-pagination" class="flex items-center justify-center gap-2 opacity-0 pointer-events-none transition-all duration-300"></div>
        </div>
    </div>
</section>
