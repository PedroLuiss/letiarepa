<section data-tab-section="catering" class="hidden transition-opacity duration-300">
    <div class="flex flex-col items-start mb-10">
        <span
            class="text-letiarepa-gold text-2xl sm:text-5xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]"
            style="-webkit-text-stroke: 1.5px currentColor; text-shadow: 0 0 0.5px currentColor;">{{ __('catering.events') }}</span>
        <h2 class="font-script text-letiarepa-gold text-[80px] sm:text-[110px] md:text-[140px] xl:text-[160px] leading-[0.8] font-black tracking-[3px] sm:tracking-[6px] uppercase">
            {{ __('catering.title') }}</h2>
        <p class="font-nexa text-[16px] text-letiarepa-gold tracking-widest mt-[-10px] lowercase">{{ __('catering.subtitle') }}</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-[240px_1fr] xl:grid-cols-[300px_1fr] gap-8 md:gap-12 lg:gap-16 items-start">
        <aside class="flex flex-col gap-3 lg:sticky lg:top-24 select-none">

            <hr class="border-white/35 w-full my-0">
            <div class="relative w-full group">
                <input type="text" placeholder="{{ __('catering.search_placeholder') }}"
                    class="w-full bg-transparent border border-letiarepa-gold/50 rounded-xl py-2.5 px-4 text-xs text-white/70 placeholder-letiarepa-gold/40 focus:outline-none focus:border-letiarepa-gold transition-all">
                <svg class="w-4 h-4 text-letiarepa-gold absolute right-4 top-1/2 -translate-y-1/2 opacity-50"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
                </svg>
            </div>
            <hr class="border-white/35 w-full my-0">
            <div class="flex flex-col gap-4">
                @foreach ($cateringPackages as $pkg)
                    <div class="flex flex-col">
                        <button onclick="selectCateringPackage('{{ $pkg->slug }}')" id="btn-pkg-{{ $pkg->slug }}"
                            data-image="/{{ $pkg->image }}"
                            class="w-full flex items-center justify-between group transition-all">
                            <span
                                class="text-3xl tracking-widest uppercase font-nexa-bold transition-all duration-300 italic uppercase text-[26px] tracking-[4px] text-[#121212] [-webkit-text-stroke:1px_#c29545] [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)] {{ $loop->first ? 'text-letiarepa-gold font-black' : 'text-transparent' }}"
                                style="{{ !$loop->first ? '-webkit-text-stroke: 1px #CC9438;' : '' }}">{{ $pkg->name }}</span>
                            <span
                                class="text-3xl tracking-widest uppercase font-nexa-bold transition-all duration-300 italic uppercase text-[26px] tracking-[4px] text-[#121212] [-webkit-text-stroke:1px_#c29545] [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)] {{ $loop->first ? 'text-letiarepa-gold font-black' : 'text-transparent' }}"
                                style="{{ !$loop->first ? '-webkit-text-stroke: 1px #CC9438;' : '' }}">{{ $loop->first ? '-' : '+' }}</span>
                        </button>
                        <div id="details-pkg-{{ $pkg->slug }}"
                            class="{{ $loop->first ? 'block' : 'hidden' }} mt-4 pl-4 space-y-2">
                            @foreach ($pkg->items as $item)
                                <p class="text-letiarepa-gold font-nexa text-[13px] uppercase tracking-wider">-
                                    {{ $item->name }}</p>
                            @endforeach
                            <div class="mt-8 space-y-4">
                                <div class="flex items-center gap-4">
                                    <button
                                        onclick="addToCart('{{ $pkg->slug }}', '{{ $pkg->name }}', {{ $pkg->price }}, '{{ $pkg->image }}')"
                                        class="flex items-right gap-3 px-2 py-2 rounded-xl border border-letiarepa-gold/60 text-white font-nexa font-bold text-[10px] uppercase hover:bg-letiarepa-gold/10 transition-all">
                                        <span class="text-right">{!! __('catering.add_to_cart', ['linebreak' => '<br>']) !!}</span>
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </button>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[10px] text-white font-black uppercase text-center mb-1 tracking-widest">{{ __('catering.quantity') }}</span>
                                        <div class="grid grid-cols-3 h-full border border-letiarepa-gold/60">
                                            <button onclick="changeQty('{{ $pkg->slug }}', -1)"
                                                class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold/60">-</button>
                                            <input type="number" id="qty-{{ $pkg->slug }}" value="1"
                                                min="1" readonly
                                                class="h-10 min-w-0 text-center text-lg font-nexa font-black text-white bg-transparent border-none focus:ring-0" />
                                            <button onclick="changeQty('{{ $pkg->slug }}', 1)"
                                                class="h-10 min-w-0 flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold/60">+</button>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="addToCart('{{ $pkg->slug }}', '{{ $pkg->name }}', {{ $pkg->price }}, '{{ $pkg->image }}'); checkoutWhatsApp();"
                                    class="font-nexa-bold italic w-full py-2 rounded-2xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-nexa font-black text-2xl tracking-[2px] uppercase transition-all shadow-lg shadow-letiarepa-gold/20"
                                    style="-webkit-text-stroke: 1px currentColor; text-shadow: 0 0 0.5px currentColor;">{{ __('catering.order_now') }}</button>
                            </div>
                        </div>
                    </div>
                    <hr class="border-white/35 w-full my-0">
                @endforeach
            </div>
        </aside>
        <div class="relative flex items-center justify-center min-h-[600px]">
            @php $firstPkg = $cateringPackages->first(); @endphp
            <div class="skeleton absolute inset-0 rounded-xl" id="sk-catering-main"></div>
            <img id="catering-main-image"
                src="/{{ $firstPkg ? $firstPkg->image : 'letiarepa/images/catering-ifografia.png' }}"
                alt="{{ __('catering.image_alt') }}"
                class="w-full max-w-[650px] object-contain drop-shadow-[0_35px_50px_rgba(0,0,0,0.8)] relative z-10 opacity-0 transition duration-500"
                onload="this.style.opacity='1'; document.getElementById('sk-catering-main')?.classList.add('skeleton-hidden')"
                onerror="this.style.opacity='1'; document.getElementById('sk-catering-main')?.classList.add('skeleton-hidden')" />
        </div>
    </div>
</section>
