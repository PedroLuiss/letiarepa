<div id="cart-overlay" onclick="toggleCart(false)" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs opacity-0 pointer-events-none transition-all duration-300"></div>
<aside id="cart-sidebar" class="fixed right-0 top-0 bottom-0 z-50 w-full sm:w-[420px] bg-[#161616] border-l border-white/10 shadow-2xl translate-x-full transition-transform duration-300 flex flex-col justify-between">
    <div class="p-6 border-b border-white/10 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-letiarepa-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            <h3 class="text-lg tracking-wider text-white">TU PEDIDO</h3>
        </div>
        <button onclick="toggleCart(false)" class="p-2 rounded-full hover:bg-white/5 text-white/70 hover:text-white transition-colors" aria-label="Cerrar carrito">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>
    <div id="cart-items" class="flex-1 overflow-y-auto p-6 space-y-4"></div>
    <div class="p-6 border-t border-white/10 bg-[#0E0E0E] space-y-4">
        <div class="flex items-center justify-between">
            <span class="text-sm font-nexa text-white/60">Subtotal del pedido:</span>
            <span id="cart-subtotal" class="text-xl text-letiarepa-gold">$0.00</span>
        </div>
        <button onclick="checkoutWhatsApp()" class="w-full py-4 rounded-xl bg-[#25D366] hover:bg-[#20BA5A] text-white font-nexa font-bold tracking-wider flex items-center justify-center gap-3 shadow-lg hover:shadow-emerald-500/10 transition-all cursor-pointer">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.963C16.59 1.98 14.116.953 11.487.953c-5.442 0-9.866 4.372-9.87 9.802 0 1.714.463 3.39 1.337 4.888l-.99 3.625 3.693-.97z" /></svg>
            ENVIAR PEDIDO POR WHATSAPP
        </button>
        <p class="text-[10px] text-center text-white/45">Serás redirigido al chat de WhatsApp oficial de Leti Arepa Orlando para finalizar tu pedido.</p>
    </div>
</aside>