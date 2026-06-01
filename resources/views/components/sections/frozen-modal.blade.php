<div id="frozen-modal"
    class="fixed inset-0 z-50 flex flex-col items-center justify-start bg-black/90 opacity-0 pointer-events-none transition-all duration-300 overflow-y-auto py-8 md:py-16 px-4">

    <!-- Botón Cerrar (X) - Cambiado a fixed para que siempre esté visible al scrollear -->
    <button onclick="closeFrozenModal()"
        class="fixed top-6 right-6 text-white/60 hover:text-letiarepa-gold z-[60] transition-colors p-2">
        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Contenedor de Ancho Máximo -->
    <div class="relative w-full max-w-6xl flex flex-col items-center">

        <!-- Header de Navegación (Igual a la imagen) -->
        <div class="w-full max-w-5xl flex justify-end mb-8">
            <div class="flex bg-letiarepa-gold rounded-sm overflow-hidden shadow-lg">
                <button
                    class="px-6 py-2 text-black font-nexa font-black text-xs uppercase border-r border-black/20 hover:bg-black/10 transition-all">ATRAS</button>
                <button
                    class="px-6 py-2 bg-black text-white font-nexa font-black text-xs uppercase hover:bg-white/10 transition-all">SIGUIENTE</button>
            </div>
        </div>

        <!-- Grid de Contenido - items-start para que no se estire si un lado es más largo que el otro -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start w-full">

            <!-- LADO IZQUIERDO: Imagen (Sticky en desktop para que acompañe el scroll del texto) -->
            <div class="lg:sticky lg:top-10 flex justify-center items-center relative">
                <div
                    class="absolute w-[300px] h-[300px] md:w-[600px] md:h-[600px] bg-letiarepa-gold/5 blur-[120px] rounded-full">
                </div>
                <img id="modal-frozen-img" src="/letiarepa/images/arepas/detalle/AREPA-DE-PABELLON-DETALLE.png"
                    alt="Producto"
                    class="w-full max-w-[600px] h-auto object-contain drop-shadow-[0_45px_55px_rgba(0,0,0,0.8)] rotate-[-5deg] hover:rotate-0 transition-transform duration-700">
            </div>

            <!-- LADO DERECHO: Detalles y Selección -->
            <div class="flex flex-col items-start select-none w-full">

                <!-- Título Dinámico -->
                <div class="flex flex-col items-start leading-none mb-2">
                    <span class="font-script text-letiarepa-gold text-5xl lowercase tracking-wider mb-1">Arepa de
                        ,</span>
                    <h3 id="modal-frozen-name"
                        class="text-letiarepa-gold text-7xl md:text-8xl font-black uppercase tracking-tighter leading-[0.8]">
                        PABELLON
                    </h3>
                </div>

                <hr class="w-full border-white/20 rounded-2xl border-1 mb-2">

                <!-- Selección de Ingredientes (Dinámicos) -->
                <div class="w-full mb-2">
                    <h4
                        class="font-nexa font-black text-letiarepa-gold text-xl uppercase tracking-widest mb-6 leading-none">
                        SELECCIONA LOS <br> INGREDIENTES
                    </h4>

                    <div id="ingredients-container" class="flex flex-col gap-4">
                        <!-- Se llena vía JS -->
                    </div>
                </div>

                <hr class="w-full border-white/20 rounded-2xl border-1 mb-2">

                <!-- Precio Dinámico -->
                <div class="mb-2">
                    <h4 class="text-letiarepa-gold text-5xl font-black uppercase">
                        COSTO: <span id="modal-frozen-price" class="text-white ml-2">$ 13</span>
                    </h4>
                </div>

                <hr class="w-full border-white/20 rounded-2xl border-1 mb-3">

                <!-- Cantidad y Delivery -->
                <div class="w-full flex flex-col gap-2 mb-2 select-none">
                    <!-- SECCIÓN: CANTIDAD -->
                    <div class="flex flex-col items-start gap-2">
                        <span
                            class="text-letiarepa-gold font-nexa-bold text-xs uppercase tracking-widest leading-none">CANTIDAD</span>
                        <div
                            class="grid grid-cols-3 w-40 h-12 border border-letiarepa-gold rounded-sm overflow-hidden bg-black/20">
                            <button onclick="changeQtyModal(-1)"
                                class="flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-r border-letiarepa-gold transition-colors">-</button>
                            <input type="number" id="qty-modal" value="1" min="1" readonly
                                class="w-full text-center text-lg font-nexa-bold text-white bg-transparent border-none focus:ring-0 p-0" />
                            <button onclick="changeQtyModal(1)"
                                class="flex items-center justify-center text-white hover:bg-letiarepa-gold/20 text-xl font-bold border-l border-letiarepa-gold transition-colors">+</button>
                        </div>
                    </div>

                    <hr class="w-full border-white/20">

                    <!-- SECCIÓN: DELIVERY OPTIONS -->
                    <div class="flex flex-col gap-5">
                        <label class="flex items-center gap-4 cursor-pointer group">
                            <input type="checkbox" checked
                                class="appearance-none w-6 h-6 border-2 border-letiarepa-gold bg-transparent checked:bg-letiarepa-gold transition-all duration-200 cursor-pointer rounded-sm">
                            <span
                                class="text-letiarepa-gold font-nexa-bold text-4xl tracking-tighter group-hover:text-white transition-colors leading-none">
                                Uber Eats
                            </span>
                        </label>

                        <label class="flex items-center gap-4 cursor-pointer group">
                            <input type="checkbox"
                                class="appearance-none w-6 h-6 border-2 border-letiarepa-gold bg-transparent checked:bg-letiarepa-gold transition-all duration-200 cursor-pointer rounded-sm">
                            <div class="flex items-center gap-2">
                                <svg class="w-8 h-8 text-letiarepa-gold group-hover:text-white transition-colors fill-current"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M23.111 11.233c-.158-2.507-2.022-4.48-4.437-4.48-2.181 0-3.953 1.488-4.417 3.511h-5.02c-.378-1.574-1.802-2.73-3.488-2.73-1.956 0-3.541 1.585-3.541 3.541s1.585 3.541 3.541 3.541c1.685 0 3.109-1.156 3.488-2.73h5.02c.463 2.023 2.236 3.511 4.417 3.511 2.415 0 4.28-1.973 4.437-4.48v-.154z" />
                                </svg>
                                <span
                                    class="text-letiarepa-gold font-nexa-bold text-4xl tracking-tighter group-hover:text-white transition-colors uppercase leading-none">
                                    DOORDASH
                                </span>
                            </div>
                        </label>
                    </div>
                </div>

                <hr class="w-full border-white/20 rounded-2xl border-1 mb-3">

                <!-- Botones de Acción Final -->
                <div class="w-full space-y-4  pb-10">
                    <button onclick="addFrozenToCart()"
                        class="w-full flex items-center justify-center gap-4 px-8 py-4 rounded-full border-2 border-white text-white font-nexa font-black text-xl uppercase hover:bg-white hover:text-black transition-all group">
                        <span>AGREGAR AL CARRITO</span>
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.27.12-.41 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                        </svg>
                    </button>
                    <button onclick="addFrozenToCart(); checkoutWhatsApp();"
                        class="w-full py-5 bg-letiarepa-gold text-black font-nexa font-black text-3xl rounded-2xl uppercase shadow-xl shadow-letiarepa-gold/20 hover:scale-[1.02] transition-transform">
                        IR PAGAR AHORA !!!
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
