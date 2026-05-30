<section data-tab-section="catering" class="hidden transition-opacity duration-300">
    <div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-12 lg:gap-16 items-start">
        <aside class="flex flex-col gap-6 sticky top-24 select-none">
            <div class="flex flex-col items-start mb-2">
                <span class="font-nexa text-letiarepa-gold text-2xl font-black leading-none uppercase tracking-widest">EVENTOS &</span>
                <h2 class="text-white text-8xl font-black leading-[0.8] tracking-tighter uppercase">CATERING</h2>
                <p class="font-nexa text-[11px] text-letiarepa-gold tracking-widest mt-4 lowercase">¿ quieres marcar la diferencia en los paladares de tus invitados ?</p>
            </div>
            <hr class="border-white/10 w-full my-2">
            <div class="relative w-full group">
                <input type="text" placeholder="¿ Buscas algo en específico ?" class="w-full bg-transparent border border-letiarepa-gold/50 rounded-xl py-2.5 px-4 text-xs text-white/70 placeholder-letiarepa-gold/40 focus:outline-none focus:border-letiarepa-gold transition-all">
                <svg class="w-4 h-4 text-letiarepa-gold absolute right-4 top-1/2 -translate-y-1/2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" /></svg>
            </div>
            <hr class="border-white/10 w-full my-2">
            <div class="flex flex-col gap-4">
                @foreach ($cateringMenu as $pkg)
                    <div class="flex flex-col">
                        <button onclick="selectCateringPackage('{{ $pkg['id'] }}')" id="btn-pkg-{{ $pkg['id'] }}" class="w-full flex items-center justify-between group transition-all">
                            <span class="text-3xl tracking-widest uppercase {{ $loop->first ? 'text-letiarepa-gold font-black' : 'text-transparent' }}" style="{{ !$loop->first ? '-webkit-text-stroke: 1px #CC9438;' : '' }}">{{ $pkg['nombre'] }}</span>
                            <span class="text-2xl text-letiarepa-gold font-bold">{{ $loop->first ? '-' : '+' }}</span>
                        </button>
                        <div id="details-pkg-{{ $pkg['id'] }}" class="{{ $loop->first ? 'block' : 'hidden' }} mt-4 pl-4 space-y-2">
                            @foreach ($pkg['items'] as $item)
                                <p class="text-letiarepa-gold font-nexa text-[13px] uppercase tracking-wider">- {{ $item }}</p>
                            @endforeach
                            <div class="mt-8 space-y-4">
                                <div class="flex items-center gap-4">
                                    <button onclick="addToCart('{{ $pkg['id'] }}', '{{ $pkg['nombre'] }}', {{ $pkg['precio'] }}, 'letiarepa/images/cateringheader.png')" class="flex items-center gap-3 px-4 py-2 rounded-xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[10px] uppercase hover:bg-letiarepa-gold/10 transition-all">
                                        <span>AGREGAR AL<br>CARRITO</span>
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                    </button>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">CANTIDAD</span>
                                        <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                            <button onclick="changeQty('{{ $pkg['id'] }}', -1)" class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                            <input type="number" id="qty-{{ $pkg['id'] }}" value="1" min="1" readonly class="h-10 min-w-0 text-center text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                            <button onclick="changeQty('{{ $pkg['id'] }}', 1)" class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="checkoutWhatsApp()" class="w-full py-4 bg-letiarepa-gold text-black font-nexa font-black text-2xl rounded-2xl uppercase shadow-lg shadow-letiarepa-gold/20">ORDENAR AHORA !!!</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
        <div class="relative flex items-center justify-center min-h-[600px]">
            <img src="/letiarepa/images/catering-ifografia.png" alt="Bandeja de Catering" class="w-full max-w-[650px] object-contain drop-shadow-[0_35px_50px_rgba(0,0,0,0.8)] z-10">
        </div>
    </div>
</section>