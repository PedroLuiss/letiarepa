<div id="mobile-nav" class="fixed inset-0 z-50 bg-letiarepa-black/95 backdrop-blur-lg flex flex-col justify-between p-6 transition-all duration-300 opacity-0 pointer-events-none translate-y-[-10px]">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <span class="text-xl text-letiarepa-gold tracking-widest">{{ __('site.brand_mobile') }}</span>
            <button onclick="toggleMobileNav(false)" class="p-2 rounded-full bg-white/5 text-white">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="mt-4 flex flex-col gap-1">
            <div class="flex items-center gap-3 w-full">
                <span class="font-nexa text-[10px] tracking-[0.2em] font-bold text-letiarepa-gold select-none uppercase">{{ __('nav.search') }}</span>
                <input type="text" id="mobile-search" class="flex-1 bg-transparent border-t-0 border-x-0 border-b border-letiarepa-gold text-[11px] text-white focus:ring-0 p-0 pb-1 focus:outline-none focus:border-t-0 focus:border-x-0 focus:border-b focus:border-letiarepa-gold" />
                <svg class="w-4 h-4 text-letiarepa-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" /></svg>
            </div>
        </div>
        <nav class="flex flex-col gap-5 mt-6">
            <a href="#" onclick="switchTab('restaurant'); toggleMobileNav(false); return false;" class="font-nexa text-base tracking-widest font-bold uppercase text-white hover:text-letiarepa-gold">{{ __('nav.restaurant') }}</a>
            <a href="#" onclick="switchTab('catering'); toggleMobileNav(false); return false;" class="font-nexa text-base tracking-widest font-bold uppercase text-white hover:text-letiarepa-gold">{{ __('nav.catering') }}</a>
            <a href="#" onclick="switchTab('frozen'); toggleMobileNav(false); return false;" class="font-nexa text-base tracking-widest font-bold uppercase text-white hover:text-letiarepa-gold">{{ __('nav.frozen_short') }}</a>
            <a href="#equipo" onclick="toggleMobileNav(false);" class="font-nexa text-base tracking-widest font-bold uppercase text-white hover:text-letiarepa-gold">{{ __('nav.team_long') }}</a>
            <a href="#contacto" onclick="toggleMobileNav(false);" class="font-nexa text-base tracking-widest font-bold uppercase text-white hover:text-letiarepa-gold">{{ __('nav.contact') }}</a>
        </nav>
    </div>
    <div class="border-t border-white/10 pt-6 flex flex-col items-center gap-2">
        <p class="text-xs text-white/50">{{ __('site.brand_aria') }}</p>
        <p class="text-[10px] text-white/35">{{ __('site.tagline') }}</p>
    </div>
</div>
