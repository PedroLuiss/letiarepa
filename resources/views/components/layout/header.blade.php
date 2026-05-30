<header id="main-header" class="sticky top-0 z-40 w-full transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-8 xl:gap-12">
            <a href="#" onclick="switchTab('restaurant'); return false;" class="flex items-center gap-2 group">
                <img src="/letiarepa/images/isotipo.png" alt="Leti Arepa" class="w-8 h-8 object-contain" />
                <span class="font-nexa text-[11px] tracking-[0.2em] font-bold text-letiarepa-gold group-hover:text-letiarepa-gold transition-colors uppercase">LETIAREPA</span>
            </a>
            <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
                <a href="#" onclick="switchTab('restaurant'); return false;" data-tab-nav="restaurant" class="font-nexa text-[10px] tracking-[0.2em] font-bold uppercase transition-colors hover:text-letiarepa-gold text-letiarepa-gold">RESTAURANTE</a>
                <a href="#" onclick="switchTab('catering'); return false;" data-tab-nav="catering" class="font-nexa text-[10px] tracking-[0.2em] font-bold uppercase text-white/70 transition-colors hover:text-letiarepa-gold">CATTERING</a>
                <a href="#" onclick="switchTab('frozen'); return false;" data-tab-nav="frozen" class="font-nexa text-[10px] tracking-[0.2em] font-bold uppercase text-white/70 transition-colors hover:text-letiarepa-gold">PRODUCTOS CONGELADOS</a>
                <a href="#equipo" class="font-nexa text-[10px] tracking-[0.2em] font-bold uppercase text-white/70 transition-colors hover:text-letiarepa-gold">EQUIPO</a>
                <a href="#contacto" class="font-nexa text-[10px] tracking-[0.2em] font-bold uppercase text-white/70 transition-colors hover:text-letiarepa-gold">CONTACTO</a>
            </nav>
        </div>
        <div class="flex items-center gap-6">
            <div class="hidden sm:flex items-center gap-3">
                <span class="font-nexa text-[10px] tracking-[0.2em] font-bold text-letiarepa-gold select-none uppercase">BUSQUEDA</span>
                <input type="text" id="nav-search" class="w-20 xl:w-28 bg-transparent border-t-0 border-x-0 border-b border-letiarepa-gold text-[11px] text-white focus:ring-0 p-0 pb-1 focus:outline-none focus:border-t-0 focus:border-x-0 focus:border-b focus:border-letiarepa-gold" />
                <svg class="w-3.5 h-3.5 text-letiarepa-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" /></svg>
            </div>
            <div class="flex items-center gap-2">
                <img src="/letiarepa/images/ingles.png" alt="English" class="w-6 h-6 object-cover rounded-sm cursor-pointer grayscale hover:grayscale-0 transition-all opacity-80 hover:opacity-100" />
                <img src="/letiarepa/images/español.png" alt="Español" class="w-6 h-6 object-cover rounded-sm cursor-pointer grayscale-0 transition-all" />
            </div>
            <button onclick="toggleCart(true)" class="relative group" aria-label="Ver carrito">
                <svg class="w-5 h-5 text-white/80 group-hover:text-letiarepa-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                <span id="cart-badge" class="absolute -top-2 -right-2 w-4 h-4 flex items-center justify-center rounded-full bg-letiarepa-gold text-letiarepa-black font-nexa font-bold text-[9px] hidden">0</span>
            </button>
            <button onclick="toggleMobileNav(true)" class="lg:hidden text-white/80" aria-label="Abrir menú">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
        </div>
    </div>
</header>