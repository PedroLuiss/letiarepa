// ─── Búsqueda global (AJAX) desde el header ──────────────────────
const globalSearchInput = document.getElementById('nav-search');
const globalSearchDropdown = document.getElementById('global-search-dropdown');

let searchDebounceTimer = null;
let lastSearchQuery = '';

const FALLBACK_IMAGE = '/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png';

function escapeHtml(str) {
    if (str == null) return '';
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

function showSearchDropdown() {
    if (!globalSearchDropdown) return;
    globalSearchDropdown.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-[-6px]');
    globalSearchDropdown.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
}

function hideSearchDropdown() {
    if (!globalSearchDropdown) return;
    globalSearchDropdown.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-6px]');
    globalSearchDropdown.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
}

function groupResultsByType(results) {
    const groups = {
        restaurant: { label: window.__i18n?.menu || 'Menú', items: [] },
        frozen: { label: window.__i18n?.frozen || 'Congelados', items: [] },
        catering: { label: window.__i18n?.catering || 'Catering', items: [] },
    };

    results.forEach(r => {
        if (groups[r.type]) {
            groups[r.type].items.push(r);
        }
    });

    return Object.values(groups).filter(g => g.items.length > 0);
}

function renderSearchResults(data) {
    if (!globalSearchDropdown) return;

    const results = data.results || [];

    if (results.length === 0) {
        globalSearchDropdown.innerHTML = `
            <div class="bg-[#0f0f0f] border border-letiarepa-gold/30 rounded-xl shadow-2xl overflow-hidden">
                <div class="px-4 py-6 text-center">
                    <p class="text-letiarepa-gold font-nexa text-xs uppercase tracking-widest mb-1">${escapeHtml(data.query || '')}</p>
                    <p class="text-white/50 font-nexa text-[11px]">${window.__i18n?.noResults || 'No se encontraron productos'}</p>
                </div>
            </div>
        `;
        showSearchDropdown();
        return;
    }

    const groups = groupResultsByType(results);

    const groupsHtml = groups.map(group => `
        <div class="search-result-group">
            <div class="px-4 py-2 border-b border-white/5 bg-black/40">
                <span class="font-nexa text-[9px] tracking-[0.2em] font-bold text-letiarepa-gold/80 uppercase">${escapeHtml(group.label)}</span>
            </div>
            ${group.items.map(item => `
                <button type="button"
                    class="search-result-item w-full flex items-center gap-3 px-4 py-3 text-left hover:bg-letiarepa-gold/10 transition-colors border-b border-white/5 last:border-b-0"
                    data-type="${escapeHtml(item.type)}"
                    data-slug="${escapeHtml(item.slug)}"
                    data-name="${escapeHtml(item.name)}"
                    data-price="${escapeHtml(item.price)}"
                    data-image="${escapeHtml(item.image)}">
                    <img src="/${escapeHtml(item.image)}" alt=""
                        class="w-10 h-10 object-contain rounded bg-black/40 shrink-0"
                        onerror="this.src='${FALLBACK_IMAGE}'" />
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-nexa text-[11px] uppercase tracking-wider truncate">${escapeHtml(item.name)}</p>
                        ${item.description ? `<p class="text-white/40 font-nexa text-[10px] truncate">${escapeHtml(item.description)}</p>` : ''}
                    </div>
                    <div class="shrink-0 text-right">
                        <span class="text-letiarepa-gold font-nexa font-black text-xs">$${parseFloat(item.price || 0).toFixed(0)}</span>
                    </div>
                </button>
            `).join('')}
        </div>
    `).join('');

    globalSearchDropdown.innerHTML = `
        <div class="bg-[#0f0f0f] border border-letiarepa-gold/40 rounded-xl shadow-2xl overflow-hidden max-h-[480px] overflow-y-auto search-dropdown-scroll">
            <div class="px-4 py-2 border-b border-letiarepa-gold/20 bg-letiarepa-gold/5 flex items-center justify-between">
                <span class="font-nexa text-[9px] tracking-[0.2em] font-bold text-letiarepa-gold uppercase">${results.length} ${window.__i18n?.results || 'resultados'}</span>
                <button type="button" id="search-close-btn" class="text-white/40 hover:text-white text-xs leading-none">✕</button>
            </div>
            ${groupsHtml}
        </div>
    `;

    // Bind click handlers for results
    globalSearchDropdown.querySelectorAll('.search-result-item').forEach(btn => {
        btn.addEventListener('click', () => {
            const type = btn.dataset.type;
            const slug = btn.dataset.slug;
            const name = btn.dataset.name;
            const price = parseFloat(btn.dataset.price);
            const image = btn.dataset.image;

            hideSearchDropdown();
            if (globalSearchInput) globalSearchInput.value = '';

            if (type === 'restaurant' || type === 'frozen') {
                if (window.switchTab) {
                    window.switchTab(type);
                }
                if (window.openFrozenModal) {
                    window.openFrozenModal(slug, name, price, image);
                }
            } else if (type === 'catering') {
                if (window.switchTab) {
                    window.switchTab('catering');
                }
            }
        });
    });

    const closeBtn = document.getElementById('search-close-btn');
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            hideSearchDropdown();
        });
    }

    showSearchDropdown();
}

async function performGlobalSearch(query) {
    try {
        const url = `${window.__searchUrl || '/search'}?q=${encodeURIComponent(query)}`;
        const response = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
        });

        if (!response.ok) {
            hideSearchDropdown();
            return;
        }

        const data = await response.json();
        renderSearchResults(data);
    } catch (err) {
        hideSearchDropdown();
    }
}

function handleGlobalSearchInput(value) {
    const query = (value || '').trim();

    if (searchDebounceTimer) {
        clearTimeout(searchDebounceTimer);
    }

    if (query.length < 2) {
        lastSearchQuery = '';
        hideSearchDropdown();
        return;
    }

    if (query === lastSearchQuery) {
        return;
    }

    searchDebounceTimer = setTimeout(() => {
        lastSearchQuery = query;
        performGlobalSearch(query);
    }, 300);
}

// ─── Búsqueda client-side de las secciones (sin cambios) ─────────
function handleSectionSearch(query) {
    query = query.toLowerCase().trim();
    const cards = document.querySelectorAll('[data-product-card]');

    cards.forEach(card => {
        const title = card.getAttribute('data-product-name').toLowerCase();
        const desc = card.getAttribute('data-product-desc').toLowerCase();

        if (title.includes(query) || desc.includes(query)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

window.handleSearch = handleSectionSearch;
window.handleGlobalSearch = handleGlobalSearchInput;

document.addEventListener('DOMContentLoaded', () => {
    // Global search (header)
    if (globalSearchInput) {
        globalSearchInput.addEventListener('input', (e) => {
            handleGlobalSearchInput(e.target.value);
        });

        globalSearchInput.addEventListener('focus', (e) => {
            if (e.target.value && e.target.value.trim().length >= 2) {
                handleGlobalSearchInput(e.target.value);
            }
        });
    }

    // Close dropdown on outside click
    document.addEventListener('click', (e) => {
        if (!globalSearchDropdown || !globalSearchInput) return;
        if (globalSearchDropdown.contains(e.target)) return;
        if (globalSearchInput.contains(e.target)) return;
        hideSearchDropdown();
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && globalSearchDropdown) {
            hideSearchDropdown();
            globalSearchInput?.blur();
        }
    });

    // Section searches (sin cambios - filtrado client-side)
    const mobileSearch = document.getElementById('mobile-search');
    if (mobileSearch) {
        mobileSearch.addEventListener('input', (e) => {
            handleSectionSearch(e.target.value);
        });
    }

    const sidebarSearch = document.getElementById('sidebar-search');
    if (sidebarSearch) {
        sidebarSearch.addEventListener('input', (e) => {
            handleSectionSearch(e.target.value);
        });
    }
});
