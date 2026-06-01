<!-- Overlay con un desenfoque más elegante -->
<div id="cart-overlay" onclick="toggleCart(false)"
    class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-500">
</div>

<aside id="cart-sidebar"
    class="fixed right-0 top-0 bottom-0 z-50 w-full sm:w-[450px] bg-[#0f0f0f] border-l-2 border-[#c29545]/30 shadow-[0_0_50px_rgba(0,0,0,0.8)] translate-x-full transition-transform duration-500 ease-out flex flex-col">

    <!-- HEADER: Estilo "Catering" -->
    <div class="relative p-8 border-b border-white/5 bg-gradient-to-b from-black to-transparent">
        <div class="flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-[10px] text-[#c29545] tracking-[4px] font-bold">ORLANDO, FL</span>
                <h3
                    class="text-3xl font-['Chakra_Petch'] font-bold italic uppercase tracking-tighter text-black [-webkit-text-stroke:1px_#c29545]">
                    TU PEDIDO
                </h3>
            </div>
            <button onclick="toggleCart(false)" class="group relative p-3 rounded-full overflow-hidden transition-all"
                aria-label="Cerrar">
                <div class="absolute inset-0 bg-[#c29545] opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <svg class="w-6 h-6 text-white/50 group-hover:text-[#c29545] group-hover:rotate-90 transition-all duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- CUERPO: Lista de items con scroll estilizado -->
    <div id="cart-items" class="flex-1 overflow-y-auto p-6 space-y-6 scrollbar-thin scrollbar-thumb-[#c29545]/20">
        <!-- Ejemplo de cómo deberían verse los items (se inyectan vía JS) -->
        <!--
        <div class="flex gap-4 group">
            <div class="w-20 h-20 bg-white/5 rounded-lg overflow-hidden border border-white/10 group-hover:border-[#c29545]/50 transition-colors"></div>
            <div class="flex-1">
                <h4 class="text-white font-bold">AREPA PELÚA</h4>
                <p class="text-white/40 text-xs">Carne mechada y queso amarillo</p>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-[#c29545] font-bold">$12.50</span>
                </div>
            </div>
        </div>
        -->
    </div>

    <!-- FOOTER: Resumen y Acción -->
    <div class="p-8 bg-[#0a0a0a] border-t border-white/5 shadow-[0_-10px_40px_rgba(0,0,0,0.5)]">
        <div class="flex items-end justify-between mb-8">
            <div class="flex flex-col">
                <span class="text-[10px] text-white/40 tracking-widest uppercase mb-1 font-bold">Total estimado</span>
                <div class="flex items-baseline gap-1">
                    <span class="text-white/30 text-sm font-bold">$</span>
                    <span id="cart-subtotal"
                        class="text-4xl font-['Chakra_Petch'] font-bold text-white tracking-tighter">0.00</span>
                </div>
            </div>
            <div class="h-10 w-[1px] bg-white/10 mx-4"></div>
            <div class="text-right">
                <span class="text-[10px] text-[#c29545] block font-bold uppercase tracking-widest">Entrega</span>
                <span class="text-white text-xs">A domicilio / Pick-up</span>
            </div>
        </div>

        <!-- Botón WhatsApp Rediseñado -->
        <button onclick="checkoutWhatsApp()"
            class="group relative w-full overflow-hidden rounded-none py-5 bg-white text-black font-['Chakra_Petch'] font-black italic tracking-tighter text-lg transition-all hover:scale-[1.02] active:scale-95">
            <!-- Efecto de brillo al pasar el mouse -->
            <div
                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700">
            </div>

            <div class="flex items-center justify-center gap-3 relative z-10">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.963C16.59 1.98 14.116.953 11.487.953c-5.442 0-9.866 4.372-9.87 9.802 0 1.714.463 3.39 1.337 4.888l-.99 3.625 3.693-.97z" />
                </svg>
                <span>COMPLETAR EN WHATSAPP</span>
            </div>
        </button>

        <p class="mt-6 text-[9px] text-center text-white/30 uppercase tracking-[2px]">
            Finaliza tu compra de forma segura <br> con nuestro equipo de atención.
        </p>
    </div>
</aside>
