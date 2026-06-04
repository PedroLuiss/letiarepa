const PER_PAGE = 4;
let restaurantCurrentPage = 1;

function getVisibleRestaurantCards() {
    const grid = document.getElementById('restaurant-grid');
    if (!grid) return [];
    return Array.from(grid.querySelectorAll('[data-product-card]')).filter(c => c.style.display !== 'none');
}

function renderPaginationNav(totalPages, currentPage) {
    const nav = document.getElementById('restaurant-pagination');
    if (!nav) return;

    if (totalPages <= 1) {
        nav.classList.add('opacity-0', 'pointer-events-none');
        nav.innerHTML = '';
        return;
    }

    nav.classList.remove('opacity-0', 'pointer-events-none');

    const baseBtn = 'flex items-center justify-center min-w-[38px] h-[38px] border rounded-lg font-nexa-bold font-black cursor-pointer transition-all duration-200 select-none';
    const activeBtn = 'bg-letiarepa-gold text-letiarepa-black border-letiarepa-gold shadow-lg shadow-letiarepa-gold/20';
    const inactiveBtn = 'bg-transparent text-letiarepa-gold border-letiarepa-gold/60 hover:bg-letiarepa-gold/10 hover:border-letiarepa-gold active:scale-95';
    const arrowBtn = 'bg-transparent text-letiarepa-gold border-letiarepa-gold/60 hover:bg-letiarepa-gold/10 hover:border-letiarepa-gold active:scale-95 text-lg leading-none';
    const disabledBtn = 'opacity-25 cursor-default hover:bg-transparent hover:border-letiarepa-gold/60 active:scale-100';

    let html = '';

    const prevDisabled = currentPage <= 1;
    html += `<button class="${arrowBtn} ${prevDisabled ? disabledBtn : ''}" ${prevDisabled ? 'disabled' : ''} onclick="window.goToRestaurantPage(${currentPage - 1})" aria-label="Anterior">&larr;</button>`;

    for (let i = 1; i <= totalPages; i++) {
        html += `<button class="${baseBtn} ${i === currentPage ? activeBtn : inactiveBtn}" onclick="window.goToRestaurantPage(${i})">${i}</button>`;
    }

    const nextDisabled = currentPage >= totalPages;
    html += `<button class="${arrowBtn} ${nextDisabled ? disabledBtn : ''}" ${nextDisabled ? 'disabled' : ''} onclick="window.goToRestaurantPage(${currentPage + 1})" aria-label="Siguiente">&rarr;</button>`;

    nav.innerHTML = html;
}

function showRestaurantPage(page) {
    const cards = getVisibleRestaurantCards();
    if (cards.length === 0) {
        renderPaginationNav(0, 0);
        return;
    }

    const totalPages = Math.ceil(cards.length / PER_PAGE);
    const safePage = Math.max(1, Math.min(page, totalPages));
    const start = (safePage - 1) * PER_PAGE;
    const pageCards = cards.slice(start, start + PER_PAGE);
    const leavingCards = cards.filter(c => !pageCards.includes(c));

    const needsEnter = pageCards.map(c => c.classList.contains('pagination-hidden'));
    const visiblyLeaving = leavingCards.filter(c => !c.classList.contains('pagination-hidden'));

    if (visiblyLeaving.length === 0 && needsEnter.every(v => !v)) {
        restaurantCurrentPage = safePage;
        renderPaginationNav(totalPages, safePage);
        return;
    }

    visiblyLeaving.forEach(c => {
        void c.offsetHeight;
        c.classList.add('pagination-leave');
    });

    setTimeout(() => {
        visiblyLeaving.forEach(c => {
            c.classList.add('pagination-hidden');
            c.classList.remove('pagination-leave');
        });

        pageCards.forEach(c => {
            c.classList.remove('pagination-hidden');
            c.classList.remove('pagination-enter');
        });

        void pageCards[0]?.offsetHeight;

        pageCards.forEach((c, i) => {
            if (!needsEnter[i]) return;
            c.style.animationDelay = `${i * 70}ms`;
            c.classList.add('pagination-enter');
        });

        if (needsEnter.some(v => v)) {
            setTimeout(() => {
                pageCards.forEach(c => {
                    c.style.animationDelay = '';
                    c.classList.remove('pagination-enter');
                });
            }, 600 + pageCards.length * 70);
        }
    }, 220);

    restaurantCurrentPage = safePage;
    renderPaginationNav(totalPages, safePage);
}

export function initRestaurantPagination() {
    restaurantCurrentPage = 1;
    showRestaurantPage(1);
}

export function goToRestaurantPage(page) {
    const cards = getVisibleRestaurantCards();
    const totalPages = Math.ceil(cards.length / PER_PAGE);
    if (page < 1 || page > totalPages) return;
    showRestaurantPage(page);
}

window.initRestaurantPagination = initRestaurantPagination;
window.goToRestaurantPage = goToRestaurantPage;

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(initRestaurantPagination, 150);
});
