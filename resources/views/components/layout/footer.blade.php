<footer id="contacto" class="relative text-letiarepa-black py-16 overflow-hidden"
    style="background-image: url('/letiarepa/images/footerbg.jpg'); background-size: cover; background-position: center;">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_1.8fr_1.2fr] gap-12 lg:gap-16 items-start">
            <div class="flex flex-col items-center lg:items-start">
                <img src="/letiarepa/images/7-años-footer.png" alt="7 Años" class="w-60 h-auto" />
                <div class="mt-6 space-y-4 max-w-[280px]">
                    <p class="font-nexa font-bold text-[16px] tracking-tight">{{ __('footer.serving') }}</p>
                    <p class="font-nexa font-bold text-[16px] tracking-tighttext-justify">{{ __('footer.invitation') }}</p>
                </div>
            </div>
            <div class="lg:px-12">
                <h3 class="text-4xl font-black tracking-widest mb-3 font-nexa-bold"
                    style="-webkit-text-stroke: 3.5px currentColor; text-shadow: 0 0 0.5px currentColor;">{{ __('footer.services') }}</h3>
                <div class="space-y-6">
                    <div class="flex gap-2">
                        <span class="text-lg leading-none">•</span>
                        <p class="text-[16px] leading-5 text-justify text-black"><strong
                                class="font-nexa-bold font-black tracking-[2px]"
                                style="-webkit-text-stroke: 0.5px currentColor; text-shadow: 0 0 0.5px currentColor;">{{ __('footer.service_restaurant') }}</strong> {{ __('footer.service_restaurant_desc') }}</p>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-lg leading-none">•</span>
                        <p class="text-[16px] leading-5 text-justify text-black"><strong
                                class="font-nexa-bold font-black tracking-[2px]"
                                style="-webkit-text-stroke: 0.5px currentColor; text-shadow: 0 0 0.5px currentColor;">{{ __('footer.service_catering') }}</strong> {{ __('footer.service_catering_desc') }}</p>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-lg leading-none">•</span>
                        <p class="text-[16px] leading-5 text-justify text-black"><strong
                                class="font-nexa-bold font-black tracking-[2px]"
                                style="-webkit-text-stroke: 0.5px currentColor; text-shadow: 0 0 0.5px currentColor;">{{ __('footer.service_frozen') }}</strong> {{ __('footer.service_frozen_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center lg:items-end gap-2">
                <div class="text-center lg:text-right">
                    <img src="/letiarepa/images/logo-footer.png" alt="Leti Repa" class="w-48 h-auto mb-2 ml-auto" />
                </div>
                <div class="flex gap-4">
                    @php $socialNetworks = ['instagram' => '#', 'facebook' => '#', 'twitter' => '#', 'whatsapp' => '#']; @endphp
                    @foreach ($socialNetworks as $net => $link)
                        <a href="{{ $link }}"
                            class="w-10 h-10 flex items-center justify-center hover:scale-110 transition-transform shadow-lg">
                            @if ($net === 'instagram')
                                <img src="/letiarepa/images/icon-ig.png" alt="{{ __('social.instagram') }}" class="w-full h-full" />
                            @elseif($net === 'facebook')
                                <img src="/letiarepa/images/icon-fb.png" alt="{{ __('social.facebook') }}" class="w-full h-full" />
                            @elseif($net === 'twitter')
                                <img src="/letiarepa/images/icon-X.png" alt="{{ __('social.twitter') }}" class="w-full h-full" />
                            @elseif($net === 'whatsapp')
                                <img src="/letiarepa/images/icon-ws.png" alt="{{ __('social.whatsapp') }}" class="w-full h-full" />
                            @endif
                        </a>
                    @endforeach
                </div>
                <div
                    class="w-full max-w-[240px] rounded-2xl overflow-hidden border-2 border-letiarepa-black shadow-xl group">
                    <div id="random-us-map" class="w-full h-32 bg-gray-200 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div
                                    class="animate-spin rounded-full h-8 w-8 border-b-2 border-letiarepa-gold mx-auto mb-2">
                                </div>
                                <p class="text-xs text-letiarepa-black font-nexa font-bold">{{ __('footer.loading_map') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="font-nexa font-black text-[10px] tracking-widest uppercase">{!! __('footer.rights', ['brand_full' => 'Leti Arepa Orlando']) !!}</p>
            </div>
        </div>
    </div>
</footer>
