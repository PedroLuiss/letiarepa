@props(['number', 'title'])

<div class="border border-white/10 rounded-2xl overflow-hidden">
    <button onclick="toggleSection({{ $number }})"
        class="w-full flex items-center gap-4 p-5 text-left hover:bg-white/[0.02] transition-colors">
        <span class="w-8 h-8 rounded-xl bg-letiarepa-gold/15 text-letiarepa-gold text-sm font-black flex items-center justify-center shrink-0">
            {{ $number }}
        </span>
        <span class="flex-1 text-white font-semibold text-sm">{{ $title }}</span>
        <svg id="icon-section-{{ $number }}" class="w-4 h-4 text-white/30 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div id="section-{{ $number }}" class="hidden px-5 pb-5 text-white/70 text-sm leading-relaxed border-t border-white/5 pt-4">
        {{ $slot }}
    </div>
</div>

<script>
function toggleSection(n) {
    const content = document.getElementById('section-' + n);
    const icon = document.getElementById('icon-section-' + n);
    const isHidden = content.classList.contains('hidden');
    content.classList.toggle('hidden', !isHidden);
    icon.style.transform = isHidden ? 'rotate(180deg)' : '';
}
</script>
