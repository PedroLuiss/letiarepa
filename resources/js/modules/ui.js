export function toggleMobileNav(open) {
    const menu = document.getElementById('mobile-nav');
    if (open) {
        menu.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
    } else {
        menu.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
    }
}

export function toggleAccordion(id) {
    const content = document.getElementById(id);
    const icon = document.getElementById('icon-' + id);

    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.textContent = '-';
    } else {
        content.classList.add('hidden');
        icon.textContent = '+';
    }
}

export function filterRestaurantCategory(catSlug) {
    const cards = document.querySelectorAll('[data-product-card][data-product-tab="restaurant"]');

    cards.forEach(card => {
        const cardCat = card.getAttribute('data-category-slug');
        if (catSlug === 'all' || cardCat === catSlug) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

export function showUpcomingAlert(categoryName) {
    alert(`¡Muy pronto! Nuestro delicioso menú de ${categoryName} estará disponible para ordenar. ¡Gracias por tu paciencia! 🥟🇻🇪`);
}

export function selectRestaurantCategory(slug) {
    filterRestaurantCategory(slug);

    if (window.initAllImageCarousels) {
        window.initAllImageCarousels();
    }

    document.querySelectorAll('[id^="sidebar-cat-"]').forEach(el => {
        const catSlug = el.id.replace('sidebar-cat-', '');
        const icon = document.getElementById('icon-cat-' + catSlug);
        if (catSlug === slug) {
            el.className = 'text-letiarepa-gold text-2xl sm:text-1xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]';
            el.style.webkitTextStroke = '1px currentColor';
            el.style.textShadow = '0 0 0.5px currentColor';
            if (icon) {
                icon.className = 'text-letiarepa-gold text-2xl sm:text-1xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]';
                icon.style.webkitTextStroke = '1px currentColor';
                icon.style.textShadow = '0 0 0.5px currentColor';
            }
        } else {
            el.className = 'font-nexa-bold italic uppercase text-[26px] tracking-[4px] text-[#121212]';
            el.style.webkitTextStroke = '';
            el.style.textShadow = '';
            el.style.setProperty('-webkit-text-stroke', '1px #c29545');
            el.style.setProperty('text-shadow', '2px 2px 4px rgba(0,0,0,0.5)');
            if (icon) {
                icon.className = 'font-nexa-bold italic uppercase text-[26px] tracking-[4px] text-[#121212]';
                icon.style.webkitTextStroke = '';
                icon.style.textShadow = '';
                icon.style.setProperty('-webkit-text-stroke', '1px #c29545');
                icon.style.setProperty('text-shadow', '2px 2px 4px rgba(0,0,0,0.5)');
            }
        }
    });

    document.querySelectorAll('[id^="cat-"]').forEach(el => {
        const catSlug = el.id.replace('cat-', '');
        const icon = document.getElementById('icon-cat-' + catSlug);
        if (catSlug === slug) {
            el.classList.remove('hidden');
            if (icon) icon.textContent = '-';
        } else {
            el.classList.add('hidden');
            if (icon) icon.textContent = '+';
        }
    });
}

export function selectCateringPackage(pkgId) {
    document.querySelectorAll('[id^="details-pkg-"]').forEach(detail => {
        detail.classList.add('hidden');
    });
    document.getElementById(`details-pkg-${pkgId}`).classList.remove('hidden');

    document.querySelectorAll('[id^="btn-pkg-"]').forEach(btn => {
        const span = btn.querySelector('span');
        const icon = btn.querySelector('span:last-child');

        if (btn.id === `btn-pkg-${pkgId}`) {
            span.classList.remove('text-transparent');
            span.classList.add('text-letiarepa-gold', 'font-black');
            span.style.webkitTextStroke = "0px";
            
            icon.classList.remove('text-transparent');
            icon.classList.add('text-letiarepa-gold', 'font-black');
            icon.style.webkitTextStroke = "0px";
            icon.textContent = "-";
        } else {
            span.classList.add('text-transparent');
            span.classList.remove('text-letiarepa-gold', 'font-black');
            span.style.webkitTextStroke = "1px #CC9438";
            
            icon.classList.add('text-transparent');
            icon.classList.remove('text-letiarepa-gold', 'font-black');
            icon.style.webkitTextStroke = "1px #CC9438";
            icon.textContent = "+";
        }
    });

    const btn = document.getElementById(`btn-pkg-${pkgId}`);
    if (btn) {
        const imgSrc = btn.getAttribute('data-image');
        const mainImg = document.getElementById('catering-main-image');
        if (imgSrc && mainImg) {
            const skel = document.getElementById('sk-catering-main');
            if (skel) skel.classList.remove('skeleton-hidden');
            mainImg.style.opacity = '0';
            mainImg.src = imgSrc;
        }
    }
}

function loadRandomUSMap() {
    const mapContainer = document.getElementById('random-us-map');
    if (!mapContainer) return;

    const usLocations = [
        { lat: 28.5383, lng: -81.3792 }, { lat: 40.7128, lng: -74.0060 },
        { lat: 34.0522, lng: -118.2437 }, { lat: 41.8781, lng: -87.6298 },
        { lat: 29.7604, lng: -95.3698 }, { lat: 33.4484, lng: -112.0740 },
        { lat: 39.7392, lng: -104.9903 }, { lat: 47.6062, lng: -122.3321 },
        { lat: 25.7617, lng: -80.1918 }, { lat: 36.1627, lng: -86.7816 },
        { lat: 37.7749, lng: -122.4194 }, { lat: 32.7157, lng: -117.1611 },
        { lat: 30.2672, lng: -97.7431 }, { lat: 42.3601, lng: -71.0589 },
        { lat: 38.9072, lng: -77.0369 }, { lat: 33.7490, lng: -84.3880 },
        { lat: 39.9612, lng: -82.9988 }, { lat: 35.2271, lng: -80.8431 },
        { lat: 43.6532, lng: -79.3832 }, { lat: 19.4326, lng: -99.1332 }
    ];

    const randomLocation = usLocations[Math.floor(Math.random() * usLocations.length)];
    const mapUrl = `https://maps.google.com/maps?q=${randomLocation.lat},${randomLocation.lng}&z=12&output=embed`;
    const iframe = document.createElement('iframe');
    iframe.src = mapUrl;
    iframe.width = "100%";
    iframe.height = "128";
    iframe.style.border = "0";
    iframe.loading = "lazy";
    iframe.referrerPolicy = "no-referrer-when-downgrade";
    iframe.allowFullscreen = true;

    mapContainer.innerHTML = '';
    mapContainer.appendChild(iframe);

    mapContainer.addEventListener('mouseenter', () => {
        iframe.style.transform = 'scale(1.1)';
        iframe.style.transition = 'transform 0.5s ease';
    });
    mapContainer.addEventListener('mouseleave', () => {
        iframe.style.transform = 'scale(1)';
    });
}

function checkFontAwesome() {
    setTimeout(() => {
        const icons = document.querySelectorAll('.fa-brands');
        if (icons.length > 0) {
            icons.forEach(icon => {
                const computedStyle = window.getComputedStyle(icon, '::before');
                const content = computedStyle.content;
                if (content === 'none' || content === '') {
                    createSVGBackup();
                }
            });
        }
    }, 1000);
}

function createSVGBackup() {
    const socialLinks = document.querySelectorAll('a[href="#"]');
    socialLinks.forEach((link, index) => {
        const icon = link.querySelector('i');
        if (icon) {
            const iconClass = icon.className;
            let svgPath = '';
            if (iconClass.includes('instagram')) {
                svgPath = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/></svg>';
            } else if (iconClass.includes('facebook')) {
                svgPath = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>';
            } else if (iconClass.includes('twitter')) {
                svgPath = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.213c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>';
            } else if (iconClass.includes('whatsapp')) {
                svgPath = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.148-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.074-1.188-.593-2.172-1.177-3.022-2.408-.173-.248-.017-.383.133-.506.136-.115.306-.297.458-.446.151-.149.202-.248.303-.416.099-.173.05-.322-.025-.446-.074-.124-.67-1.612-.916-2.206-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.76.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.9 6.994c-.004 5.45-4.438 9.88-9.888 9.88m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.333.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.333 11.893-11.893 0-3.18-1.24-6.162-3.495-8.411"/></svg>';
            }
            if (svgPath) {
                icon.innerHTML = svgPath;
            }
        }
    });
}

// Header scroll effect
function initHeaderScroll() {
    const header = document.getElementById('main-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 60) {
            header.classList.add('bg-letiarepa-black/80', 'backdrop-blur-md', 'shadow-lg', 'shadow-black/20');
        } else {
            header.classList.remove('bg-letiarepa-black/80', 'backdrop-blur-md', 'shadow-lg', 'shadow-black/20');
        }
    }, { passive: true });
}

function filterFrozenCategory(slug) {
    const cards = document.querySelectorAll('#frozen-products-grid > [data-frozen-category]');
    cards.forEach(card => {
        if (slug === 'all' || card.dataset.frozenCategory === slug) {
            card.classList.remove('hidden');
        } else {
            card.classList.add('hidden');
        }
    });
}

function selectFrozenCategory(slug) {
    document.querySelectorAll('[id^="fsidebar-cat-"]').forEach(el => {
        const catSlug = el.id.replace('fsidebar-cat-', '');
        const icon = document.getElementById('ficon-cat-' + catSlug);
        const content = document.getElementById('fcat-' + catSlug);
        if (catSlug === slug) {
            el.className = 'text-letiarepa-gold text-2xl sm:text-1xl font-black italic font-nexa-bold uppercase leading-none tracking-[3px]';
            el.style.webkitTextStroke = '1px currentColor';
            el.style.textShadow = '0 0 0.5px currentColor';
            if (icon) {
                icon.className = 'text-2xl text-letiarepa-gold font-bold';
                icon.style.webkitTextStroke = '';
                icon.style.textShadow = '';
                icon.textContent = '-';
            }
            if (content) content.classList.remove('hidden');
        } else {
            el.className = 'font-nexa-bold italic uppercase text-[26px] tracking-[4px] text-[#121212]';
            el.style.webkitTextStroke = '';
            el.style.textShadow = '';
            el.style.setProperty('-webkit-text-stroke', '1px #c29545');
            el.style.setProperty('text-shadow', '2px 2px 4px rgba(0,0,0,0.5)');
            if (icon) {
                icon.className = 'text-2xl text-letiarepa-gold/50 font-bold group-hover:text-letiarepa-gold transition-colors font-nexa-bold italic uppercase text-[26px] tracking-[4px] text-[#121212]';
                icon.style.setProperty('-webkit-text-stroke', '1px #c29545');
                icon.style.setProperty('text-shadow', '2px 2px 4px rgba(0,0,0,0.5)');
                icon.textContent = '+';
            }
            if (content) content.classList.add('hidden');
        }
    });
    filterFrozenCategory(slug);
}

// Expose to window for onclick handlers
window.toggleMobileNav = toggleMobileNav;
window.toggleAccordion = toggleAccordion;
window.filterRestaurantCategory = filterRestaurantCategory;
window.showUpcomingAlert = showUpcomingAlert;
window.selectCateringPackage = selectCateringPackage;
window.selectRestaurantCategory = selectRestaurantCategory;
window.selectFrozenCategory = selectFrozenCategory;
window.filterFrozenCategory = filterFrozenCategory;
window.showAllFrozen = function() {
    filterFrozenCategory('all');
    const firstCat = document.querySelector('[id^="fsidebar-cat-"]');
    if (firstCat) {
        window.selectFrozenCategory(firstCat.id.replace('fsidebar-cat-', ''));
    }
};
window.showAllRestaurant = function() {
    filterRestaurantCategory('all');
    const firstCat = document.querySelector('[id^="sidebar-cat-"]');
    if (firstCat) {
        window.selectRestaurantCategory(firstCat.id.replace('sidebar-cat-', ''));
    }
};

document.addEventListener('DOMContentLoaded', () => {
    loadRandomUSMap();
    checkFontAwesome();
    initHeaderScroll();
});
