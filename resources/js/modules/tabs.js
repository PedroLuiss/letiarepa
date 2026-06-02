let currentTab = 'restaurant';

function setLabelState(tabId) {
    const labels = {
        'restaurant': document.getElementById('label-restaurant'),
        'catering': document.getElementById('label-catering'),
        'frozen': document.getElementById('label-frozen')
    };

    Object.keys(labels).forEach(key => {
        const label = labels[key];
        if (label) {
            if (key === tabId) {
                label.classList.remove('text-transparent');
                label.style.webkitTextStroke = "0px #c29545";
                label.style.webkitTextStrokeWidth = "2px";
                label.style.color = "#c29545";
            } else {
                label.classList.add('text-transparent');
                label.style.webkitTextStroke = "";
                label.style.webkitTextStrokeWidth = "";
                label.style.color = "";
            }
        }
    });
}

export function initTab(tabId) {
    currentTab = tabId;

    document.querySelectorAll('[data-tab-section]').forEach(sec => {
        sec.classList.add('hidden');
    });
    const activeSec = document.querySelector(`[data-tab-section="${tabId}"]`);
    if (activeSec) {
        activeSec.classList.remove('hidden');
    }

    document.querySelectorAll('[data-tab-nav]').forEach(nav => {
        nav.classList.remove('text-letiarepa-gold');
        nav.classList.add('text-white/70');
    });
    const activeNavs = document.querySelectorAll(`[data-tab-nav="${tabId}"]`);
    activeNavs.forEach(nav => {
        nav.classList.add('text-letiarepa-gold');
        nav.classList.remove('text-white/70');
    });

    const heroTexts = ['restaurant', 'catering', 'frozen'];
    heroTexts.forEach(id => {
        const textBlock = document.getElementById(`hero-text-${id}`);
        if (textBlock) {
            if (id === tabId) {
                textBlock.classList.remove('hidden');
            } else {
                textBlock.classList.add('hidden');
            }
        }
    });

    const imgRestaurant = document.getElementById('hero-img-restaurant');
    const imgCatering = document.getElementById('hero-img-catering');
    const containerFrozen = document.getElementById('hero-container-frozen');

    if (imgRestaurant) imgRestaurant.classList.add('hidden');
    if (imgCatering) imgCatering.classList.add('hidden');
    if (containerFrozen) containerFrozen.classList.add('hidden');

    if (tabId === 'restaurant' && imgRestaurant) {
        imgRestaurant.classList.remove('hidden');
    } else if (tabId === 'catering' && imgCatering) {
        imgCatering.classList.remove('hidden');
    } else if (tabId === 'frozen' && containerFrozen) {
        containerFrozen.classList.remove('hidden');
    }

    setLabelState(tabId);

    const bannerMsg = document.getElementById('banner-message');
    const bannerTabName = document.getElementById('banner-tab-name');

    if (bannerMsg && bannerTabName) {
        if (tabId === 'restaurant') {
            bannerMsg.textContent = "¿ LISTO PARA ORDENAR ?";
            bannerTabName.textContent = "RESTAURANT";

            if (window.initAllImageCarousels) {
                window.initAllImageCarousels();
            }
            const firstCat = document.querySelector('[id^="sidebar-cat-"]');
            if (firstCat && window.selectRestaurantCategory) {
                const slug = firstCat.id.replace('sidebar-cat-', '');
                window.selectRestaurantCategory(slug);
            }
        } else if (tabId === 'catering') {
            bannerMsg.textContent = "¿ LISTO PARA AGENDAR ?";
            bannerTabName.textContent = "EVENTOS";
        } else if (tabId === 'frozen') {
            bannerMsg.textContent = "¿ LISTO PARA ORDENAR ?";
            bannerTabName.textContent = "CONGELADOS";
        }
    }
}

export function switchTab(tabId) {
    initTab(tabId);
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

export function getCurrentTab() {
    return currentTab;
}

window.switchTab = switchTab;

document.addEventListener('DOMContentLoaded', () => {
    const hash = window.location.hash;
    if (hash === '#equipo' || hash === '#contacto') {
        initTab('restaurant');
    } else {
        initTab('restaurant');
    }
});
