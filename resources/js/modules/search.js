// ─── Búsqueda global (AJAX) desde el header y menú móvil ────────
const searchTargets = [
    { input: document.getElementById('nav-search'), dropdown: document.getElementById('global-search-dropdown') },
    { input: document.getElementById('mobile-search'), dropdown: document.getElementById('mobile-search-dropdown') },
].filter(t => t.input && t.dropdown);

const sidebarSearchTarget = {
    input: document.getElementById('sidebar-search'),
    dropdown: document.getElementById('sidebar-search-dropdown'),
    type: 'restaurant',
};

const frozenSidebarSearchTarget = {
    input: document.getElementById('frozen-search'),
    dropdown: document.getElementById('frozen-search-dropdown'),
    type: 'frozen',
};

const cateringSidebarSearchTarget = {
    input: document.getElementById('catering-search'),
    dropdown: document.getElementById('catering-search-dropdown'),
    type: 'catering',
};

const sidebarSearchTargets = [sidebarSearchTarget, frozenSidebarSearchTarget, cateringSidebarSearchTarget]
    .filter(t => t.input && t.dropdown);

const closeTargets = sidebarSearchTargets.length > 0
    ? [...searchTargets, ...sidebarSearchTargets]
    : searchTargets;

let activeTarget = searchTargets[0] ?? null;
let searchDebounceTimer = null;
let lastSearchQuery = '';

const FALLBACK_IMAGE = '/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png';

const isSidebarTarget = target => sidebarSearchTargets.includes(target);
const isMobileResolution = () => window.matchMedia('(max-width: 1023px)').matches;

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
    if (!activeTarget || !activeTarget.dropdown) return;
    activeTarget.dropdown.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-[-6px]');
    activeTarget.dropdown.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
}

function hideSearchDropdown() {
    closeTargets.forEach(({ dropdown }) => {
        if (!dropdown) return;
        dropdown.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-6px]');
        dropdown.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
    });
}

function groupResultsByType(results, splitByCategory = false, onlyType = null) {
    const groups = {
        restaurant: { label: window.__i18n?.menu || 'Menú', items: [] },
        frozen: { label: window.__i18n?.frozen || 'Congelados', items: [] },
        catering: { label: window.__i18n?.catering || 'Catering', items: [] },
    };

    results.forEach(r => {
        if (onlyType && r.type !== onlyType) return;
        if (groups[r.type]) {
            groups[r.type].items.push(r);
        }
    });

    if (splitByCategory) {
        ['restaurant', 'frozen'].forEach(type => {
            const group = groups[type];
            if (group.items.length === 0) return;

            const byCategory = new Map();
            group.items.forEach(item => {
                const key = item.category || group.label;
                if (!byCategory.has(key)) byCategory.set(key, []);
                byCategory.get(key).push(item);
            });
            group.items = Array.from(byCategory, ([label, items]) => ({ label, items }));
        });
    }

    return Object.values(groups).filter(g => g.items.length > 0);
}

function renderSearchResults(data) {
    if (!activeTarget || !activeTarget.dropdown) return;

    const dropdown = activeTarget.dropdown;
    const results = data.results || [];

    if (results.length === 0) {
        dropdown.innerHTML = `
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

    const splitByCategory = isSidebarTarget(activeTarget);
    const groups = groupResultsByType(results, splitByCategory, splitByCategory ? activeTarget.type : null);

    const renderItem = item => `
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
                <span class="text-letiarepa-gold font-nexa font-black text-xs">$${parseFloat(item.price || 0).toFixed(2)}</span>
            </div>
        </button>
    `;

    const renderGroupItems = items => items.map(renderItem).join('');

    const groupsHtml = groups.map(group => {
        const isNested = Array.isArray(group.items) && group.items.length > 0 && typeof group.items[0] === 'object' && 'items' in group.items[0];

        if (isNested) {
            const nestedHtml = group.items.map(sub => `
                <div class="search-result-subgroup border-t border-white/5">
                    <div class="px-4 py-2 bg-black/40">
                        <span class="font-nexa text-[9px] tracking-[0.2em] font-bold text-letiarepa-gold/80 uppercase">${escapeHtml(sub.label)}</span>
                    </div>
                    ${renderGroupItems(sub.items)}
                </div>
            `).join('');

            return `
                <div class="search-result-group">
                    <div class="px-4 py-2 border-b border-white/5 bg-black/60">
                        <span class="font-nexa text-[9px] tracking-[0.2em] font-bold text-letiarepa-gold uppercase">${escapeHtml(group.label)}</span>
                    </div>
                    ${nestedHtml}
                </div>
            `;
        }

        return `
            <div class="search-result-group">
                <div class="px-4 py-2 border-b border-white/5 bg-black/40">
                    <span class="font-nexa text-[9px] tracking-[0.2em] font-bold text-letiarepa-gold/80 uppercase">${escapeHtml(group.label)}</span>
                </div>
                ${renderGroupItems(group.items)}
            </div>
        `;
    }).join('');

    dropdown.innerHTML = `
        <div class="bg-[#0f0f0f] border border-letiarepa-gold/40 rounded-xl shadow-2xl overflow-hidden max-h-[480px] overflow-y-auto search-dropdown-scroll">
            <div class="px-4 py-2 border-b border-letiarepa-gold/20 bg-letiarepa-gold/5 flex items-center justify-between">
                <span class="font-nexa text-[9px] tracking-[0.2em] font-bold text-letiarepa-gold uppercase">${results.length} ${window.__i18n?.results || 'resultados'}</span>
                <button type="button" id="search-close-btn" class="text-white/40 hover:text-white text-xs leading-none">✕</button>
            </div>
            ${groupsHtml}
        </div>
    `;

    // Bind click handlers for results
    dropdown.querySelectorAll('.search-result-item').forEach(btn => {
        btn.addEventListener('click', () => {
            const type = btn.dataset.type;
            const slug = btn.dataset.slug;
            const name = btn.dataset.name;
            const price = parseFloat(btn.dataset.price);
            const image = btn.dataset.image;

            hideSearchDropdown();
            if (activeTarget?.input) activeTarget.input.value = '';
            const wasMobile = activeTarget?.input?.id === 'mobile-search';

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

            if (wasMobile && window.toggleMobileNav) {
                window.toggleMobileNav(false);
            }
        });
    });

    const closeBtn = dropdown.querySelector('#search-close-btn');
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

    if (query.length < 1) {
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

// ─── Búsqueda del sidebar del menú: móvil = AJAX estilo header, web = filtrado client-side ──
function handleSidebarSearch(value) {
    if (isMobileResolution()) {
        if (activeTarget !== sidebarSearchTarget) {
            activeTarget = sidebarSearchTarget;
            lastSearchQuery = '';
        }
        handleGlobalSearchInput(value);
    } else {
        handleSectionSearch(value);
    }
}

// ─── Búsqueda del sidebar de congelados: móvil = AJAX, web = igual que antes ──
function handleFrozenSearch(value) {
    if (isMobileResolution()) {
        if (activeTarget !== frozenSidebarSearchTarget) {
            activeTarget = frozenSidebarSearchTarget;
            lastSearchQuery = '';
        }
        handleGlobalSearchInput(value);
    } else {
        handleSearch(value);
    }
}

// ─── Búsqueda del sidebar de catering: móvil = AJAX, web = igual que antes ──
function handleCateringSearch(value) {
    if (isMobileResolution()) {
        if (activeTarget !== cateringSidebarSearchTarget) {
            activeTarget = cateringSidebarSearchTarget;
            lastSearchQuery = '';
        }
        handleGlobalSearchInput(value);
    } else {
        handleSearch(value);
    }
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

    if (window.initRestaurantPagination) {
        window.initRestaurantPagination();
    }
}

window.handleSearch = handleSectionSearch;
window.handleGlobalSearch = handleGlobalSearchInput;
window.handleSidebarSearch = handleSidebarSearch;
window.handleFrozenSearch = handleFrozenSearch;
window.handleCateringSearch = handleCateringSearch;

document.addEventListener('DOMContentLoaded', () => {
    // Global search (header + menú móvil) — AJAX al mismo endpoint /search
    searchTargets.forEach(target => {
        const { input } = target;
        if (!input) return;

        input.addEventListener('input', (e) => {
            activeTarget = target;
            handleGlobalSearchInput(e.target.value);
        });

        input.addEventListener('focus', (e) => {
            activeTarget = target;
            if (e.target.value && e.target.value.trim().length >= 1) {
                handleGlobalSearchInput(e.target.value);
            }
        });
    });

    // Close dropdowns on outside click
    document.addEventListener('click', (e) => {
        closeTargets.forEach(target => {
            const { input, dropdown } = target;
            if (!dropdown || !input) return;
            if (dropdown.contains(e.target)) return;
            if (input.contains(e.target)) return;
            dropdown.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-6px]');
            dropdown.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
        });
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hideSearchDropdown();
            closeTargets.forEach(({ input }) => input?.blur());
        }
    });

    // Section searches (sin cambios - filtrado client-side; móvil usa el buscador global del sidebar)
    const sidebarSearch = document.getElementById('sidebar-search');
    if (sidebarSearch) {
        sidebarSearch.addEventListener('input', (e) => {
            handleSidebarSearch(e.target.value);
        });

        sidebarSearch.addEventListener('focus', (e) => {
            if (isMobileResolution() && e.target.value && e.target.value.trim().length >= 1) {
                activeTarget = sidebarSearchTarget;
                lastSearchQuery = '';
                handleGlobalSearchInput(e.target.value);
            }
        });
    }

    const frozenSearch = document.getElementById('frozen-search');
    if (frozenSearch) {
        frozenSearch.addEventListener('input', (e) => {
            handleFrozenSearch(e.target.value);
        });

        frozenSearch.addEventListener('focus', (e) => {
            if (isMobileResolution() && e.target.value && e.target.value.trim().length >= 1) {
                activeTarget = frozenSidebarSearchTarget;
                lastSearchQuery = '';
                handleGlobalSearchInput(e.target.value);
            }
        });
    }

    const cateringSearch = document.getElementById('catering-search');
    if (cateringSearch) {
        cateringSearch.addEventListener('input', (e) => {
            handleCateringSearch(e.target.value);
        });

        cateringSearch.addEventListener('focus', (e) => {
            if (isMobileResolution() && e.target.value && e.target.value.trim().length >= 1) {
                activeTarget = cateringSidebarSearchTarget;
                lastSearchQuery = '';
                handleGlobalSearchInput(e.target.value);
            }
        });
    }
});
