<section class="relative overflow-hidden pt-16 pb-20 md:pt-10 md:pb-32">
    <div class="absolute inset-0 z-0 opacity-15 pointer-events-none"
        style="background-image: url('/letiarepa/images/BACKGROUND.png'); background-size: cover; background-position: center;">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">
            <div class="flex flex-col items-start gap-0">
                <div class="flex flex-col items-start">
                    <img src="/letiarepa/images/logo-leti-header.png" alt="{{ __('hero.title_alt') }}"
                        class="w-64 md:w-80 h-auto object-contain" />
                </div>
                <div id="hero-text-restaurant" class="relative pl-8 flex flex-col max-w-lg">
                    <div
                        class="absolute left-0 top-0 bottom-0 border border-letiarepa-gold w-[18px] flex flex-col items-center overflow-hidden bg-letiarepa-gold/5">
                        <span
                            class="text-[8px] text-letiarepa-black bg-letiarepa-gold leading-none w-full text-center py-[3px] block">▲</span>
                        <div class="flex-1 w-full relative">
                            <div class="absolute left-1/2 top-[2px] w-[13px] h-20 bg-letiarepa-gold -translate-x-1/2">
                            </div>
                        </div>
                        <span
                            class="text-[8px] text-letiarepa-black bg-letiarepa-gold leading-none w-full text-center py-[3px] block">▼</span>
                    </div>
                    <p class="text-sm md:text-lg text-white/90 font-nexa leading-relaxed tracking-wide text-justify">
                        {!! __('hero.restaurant_text', ['brand' => '<strong class="text-white font-black uppercase">Leti Arepa Orlando</strong>']) !!}
                    </p>
                </div>
                <div id="hero-text-catering" class="hidden relative pl-8 flex flex-col max-w-xl">
                    <div
                        class="absolute left-0 top-0 bottom-0 border border-letiarepa-gold w-[18px] flex flex-col items-center overflow-hidden bg-letiarepa-gold/5">
                        <span
                            class="text-[8px] text-letiarepa-black bg-letiarepa-gold leading-none w-full text-center py-[3px] block">▲</span>
                        <div class="flex-1 w-full relative">
                            <div class="absolute left-1/2 top-[2px] w-[13px] h-24 bg-letiarepa-gold -translate-x-1/2">
                            </div>
                        </div>
                        <span
                            class="text-[8px] text-letiarepa-black bg-letiarepa-gold leading-none w-full text-center py-[3px] block">▼</span>
                    </div>
                    <div class="space-y-6">
                        <p class="text-sm md:text-xl text-white/90 font-nexa leading-tight tracking-wide text-justify">
                            {!! __('hero.catering_text', ['brand' => '<strong class="text-white font-black uppercase">Leti Arepa Orlando</strong>']) !!}
                        </p>
                        <button
                            class="mt-4 px-6 py-2 bg-letiarepa-gold text-letiarepa-black font-nexa font-black italic rounded-xl text-xl tracking-wider hover:bg-letiarepa-gold/90 transition-all shadow-lg">{{ __('hero.see_less') }}</button>
                    </div>
                </div>
                <div id="hero-text-frozen" class="hidden relative pl-8 flex flex-col max-w-xl">
                    <div
                        class="absolute left-0 top-0 bottom-0 border border-letiarepa-gold w-[18px] flex flex-col items-center overflow-hidden bg-letiarepa-gold/5">
                        <span
                            class="text-[8px] text-letiarepa-black bg-letiarepa-gold leading-none w-full text-center py-[3px] block">▲</span>
                        <div class="flex-1 w-full relative">
                            <div class="absolute left-1/2 top-[2px] w-[13px] h-20 bg-letiarepa-gold -translate-x-1/2">
                            </div>
                        </div>
                        <span
                            class="text-[8px] text-letiarepa-black bg-letiarepa-gold leading-none w-full text-center py-[3px] block">▼</span>
                    </div>
                    <div class="space-y-6">
                        <p class="text-sm md:text-xl text-white/90 font-nexa leading-tight tracking-wide text-justify">
                            {!! __('hero.frozen_text', ['brand' => '<strong class="text-white font-black uppercase">Leti Arepa Orlando</strong>']) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col items-center justify-center lg:justify-end">
                <div
                    class="absolute w-[300px] h-[300px] sm:w-[450px] sm:h-[450px] rounded-full bg-letiarepa-gold/10 blur-[100px] pointer-events-none">
                </div>
                <div class="relative group flex flex-col items-center">
                    <img id="hero-img-restaurant" src="/letiarepa/images/AREPA-HEADER-1.png" alt="{{ __('hero.img_restaurant_alt') }}"
                        class="w-80 sm:w-96 lg:w-[500px] h-auto object-contain drop-shadow-[0_35px_35px_rgba(0,0,0,0.5)] transition-all duration-700" />
                    <img id="hero-img-catering" src="/letiarepa/images/cateringheader.png" alt="{{ __('hero.img_catering_alt') }}"
                        class="hidden w-80 sm:w-112 lg:w-[600px] h-auto object-contain drop-shadow-[0_45px_45px_rgba(0,0,0,0.6)] transition-all duration-700" />
                    <div id="hero-container-frozen" class="hidden flex flex-col items-center carousel-images-container w-72 sm:w-80 lg:w-[450px]" data-autoplay="true" data-autoplay-ms="3200" style="touch-action:pan-y">
                        <div class="w-full overflow-hidden rounded-2xl">
                            <div class="carousel-images-track">
                                <img src="/letiarepa/images/producto-congelado-miniatura-mechada.png" alt="{{ __('hero.img_frozen_alt') }}"
                                    class="carousel-img w-full h-auto object-contain drop-shadow-[0_35px_35px_rgba(0,0,0,0.7)] transition-all duration-700 rotate-[-5deg]" />
                                <img src="/letiarepa/images/producto-congelado-miniatura-pollo.png" alt="{{ __('hero.img_frozen_alt') }}"
                                    class="carousel-img w-full h-auto object-contain drop-shadow-[0_35px_35px_rgba(0,0,0,0.7)] transition-all duration-700 rotate-[-5deg]" />
                            </div>
                        </div>
                        <div class="carousel-dots flex gap-3 mt-8">
                            <button type="button" class="carousel-dot w-3 h-3 rounded-full bg-letiarepa-gold border border-letiarepa-gold transition-all duration-300" data-index="0" aria-label="Imagen 1"></button>
                            <button type="button" class="carousel-dot w-3 h-3 rounded-full bg-transparent border border-letiarepa-gold transition-all duration-300" data-index="1" aria-label="Imagen 2"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
