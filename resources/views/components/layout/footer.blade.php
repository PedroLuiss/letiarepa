<footer id="contacto" class="relative text-letiarepa-black py-16 overflow-hidden" style="background-image: url('/letiarepa/images/footerbg.jpg'); background-size: cover; background-position: center;">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_1.8fr_1.2fr] gap-12 lg:gap-16 items-start">
            <div class="flex flex-col items-center lg:items-start">
                <h2 class="leading-[0.8] font-black ">07</h2>
                <h3 class="tracking-widest mt-2">AÑOS</h3>
                <div class="mt-6 space-y-4 max-w-[280px]">
                    <p class="font-nexa font-bold text-sm tracking-tight">- Sirviendo en Orlando y Kissimmee</p>
                    <p class="font-nexa text-[13px] leading-relaxed text-justify">- Ordena y descubre por qué somos la elección favorita de quienes buscan calidad, sabor y tradición.</p>
                </div>
            </div>
            <div class="lg:px-12">
                <h3 class="text-4xl font-black tracking-widest mb-8">SERVICIOS</h3>
                <div class="space-y-6">
                    <div class="flex gap-2">
                        <span class="text-lg leading-none">•</span>
                        <p class="text-[13px] leading-relaxed text-justify"><strong class="font-nexa font-black uppercase">Leti arepa:</strong> Nos especializamos en arepas, cachapas, pepitos y hamburguesas al estilo venezolano, preparadas con ingredientes frescos, recetas caseras y ese toque especial que nos conecta con nuestras raíces.</p>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-lg leading-none">•</span>
                        <p class="text-[13px] leading-relaxed text-justify"><strong class="font-nexa font-black uppercase">Catering:</strong> En Leti Arepa Orlando, llevamos mucho más que platos a tu evento… llevamos sabor, frescura y una experiencia que conecta a las personas alrededor de la mesa.</p>
                    </div>
                    <div class="flex gap-2">
                        <span class="text-lg leading-none">•</span>
                        <p class="text-[13px] leading-relaxed text-justify"><strong class="font-nexa font-black uppercase">Productos congelados:</strong> Sabemos lo que es llegar a casa cansado… sin tiempo, sin energía, pero con ganas de darle lo mejor a tu familia, por eso creamos Leti Arepa Frozen Foods: una solución real para tu día a día, sin sacrificar sabor, calidad ni tradición.</p>
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
                        <a href="{{ $link }}" class="w-10 h-10 flex items-center justify-center bg-letiarepa-black rounded-lg text-letiarepa-gold hover:scale-110 transition-transform shadow-lg">
                            @if ($net === 'instagram')<i class="fa-brands fa-square-instagram text-xl"></i>
                            @elseif($net === 'facebook')<i class="fa-brands fa-square-facebook text-xl"></i>
                            @elseif($net === 'twitter')<i class="fa-brands fa-square-twitter text-xl"></i>
                            @elseif($net === 'whatsapp')<i class="fa-brands fa-square-whatsapp text-xl"></i>
                            @endif
                        </a>
                    @endforeach
                </div>
                <div class="w-full max-w-[240px] rounded-2xl overflow-hidden border-2 border-letiarepa-black shadow-xl group">
                    <div id="random-us-map" class="w-full h-32 bg-gray-200 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-letiarepa-gold mx-auto mb-2"></div>
                                <p class="text-xs text-letiarepa-black font-nexa font-bold">Cargando mapa...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="font-nexa font-black text-[10px] tracking-widest uppercase">All Rights Reserved by: <span class="text-letiarepa-black">Leti Arepa Orlando</span></p>
            </div>
        </div>
    </div>
</footer>