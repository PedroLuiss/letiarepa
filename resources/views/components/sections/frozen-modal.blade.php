<div id="frozen-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300">
    <div class="bg-[#181818] border border-white/10 rounded-2xl w-full max-w-md overflow-hidden relative shadow-2xl flex flex-col">
        <div class="p-5 border-b border-white/10 flex justify-between items-center bg-black/40">
            <span class="text-sm text-letiarepa-gold tracking-widest uppercase">OPCIONES DE COMPRA</span>
            <button onclick="closeFrozenModal()" class="text-white/60 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="p-6 space-y-6">
            <div class="flex items-start gap-4">
                <img id="modal-frozen-img" src="/letiarepa/images/arepas/detalle/AREPA-DE-PABELLON-DETALLE.png" alt="Shredded Meat" class="w-20 h-20 object-contain rounded bg-white/5 p-1 flex-shrink-0" />
                <div>
                    <h4 id="modal-frozen-name" class="text-base text-white tracking-wider uppercase leading-none">CARNE MECHADA</h4>
                    <p class="text-xs text-white/50 font-nexa mt-1 leading-relaxed">Nuestros empaques congelados vienen listos para calentar y servir en casa.</p>
                </div>
            </div>
            <div class="space-y-3">
                <span class="text-xs text-letiarepa-gold tracking-wider uppercase block">PRESENTACIONES:</span>
                <div class="space-y-2">
                    <label class="flex items-center justify-between p-3 rounded-xl border border-white/10 bg-white/5 hover:bg-white/10 cursor-pointer group transition-all">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="presentation-radio" id="p-mechada" value="1 Libra de Carne Mechada" checked class="w-4 h-4 text-letiarepa-gold border-white/30 bg-transparent focus:ring-letiarepa-gold focus:ring-offset-0" />
                            <span class="text-xs font-nexa text-white/80 group-hover:text-white uppercase">1 Libra de Carne Mechada</span>
                        </div>
                        <span class="text-xs font-nexa font-bold text-letiarepa-gold">$13.00</span>
                    </label>
                    <label class="flex items-center justify-between p-3 rounded-xl border border-white/10 bg-white/5 hover:bg-white/10 cursor-pointer group transition-all">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="presentation-radio" id="p-pollo" value="1 Libra de Pollo Mechado" class="w-4 h-4 text-letiarepa-gold border-white/30 bg-transparent focus:ring-letiarepa-gold focus:ring-offset-0" />
                            <span class="text-xs font-nexa text-white/80 group-hover:text-white uppercase">1 Libra de Pollo Mechado</span>
                        </div>
                        <span class="text-xs font-nexa font-bold text-letiarepa-gold">$13.00</span>
                    </label>
                </div>
            </div>
            <div class="space-y-2">
                <span class="text-[10px] text-white/40 tracking-wider uppercase">También disponible en:</span>
                <div class="flex items-center gap-4 bg-black/40 border border-white/5 rounded-xl p-3">
                    <div class="flex items-center gap-1 text-xs font-nexa text-[#FFCC00]"><span>🟢</span> <strong class="text-white/80 uppercase">Uber Eats</strong></div>
                    <span class="text-white/20">|</span>
                    <div class="flex items-center gap-1 text-xs font-nexa text-[#FF3008]"><span>🔴</span> <strong class="text-white/80 uppercase">Doordash</strong></div>
                </div>
            </div>
            <div class="flex items-center justify-between border-t border-white/10 pt-5 mt-4">
                <span class="text-xs font-nexa text-white/50 uppercase">COSTO DISPLAY:</span>
                <span id="modal-frozen-price" class="text-xl font-black text-letiarepa-gold">$13.00</span>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <button onclick="addFrozenToCart();" class="py-3 rounded-xl border border-letiarepa-gold/30 hover:border-letiarepa-gold hover:bg-letiarepa-gold/5 text-white font-nexa font-bold text-xs uppercase tracking-widest transition-all cursor-pointer">AL CARRITO 🛒</button>
                <button onclick="addFrozenToCart(); checkoutWhatsApp();" class="py-3 rounded-xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-letiarepa-black font-nexa font-bold text-xs uppercase tracking-widest transition-all cursor-pointer shadow-lg shadow-letiarepa-gold/10">PAGAR AHORA !!!</button>
            </div>
        </div>
    </div>
</div>