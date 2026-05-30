export function handleSearch(query) {
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

window.handleSearch = handleSearch;

document.addEventListener('DOMContentLoaded', () => {
    const navSearch = document.getElementById('nav-search');
    if (navSearch) {
        navSearch.addEventListener('input', (e) => {
            handleSearch(e.target.value);
        });
    }

    const mobileSearch = document.getElementById('mobile-search');
    if (mobileSearch) {
        mobileSearch.addEventListener('input', (e) => {
            handleSearch(e.target.value);
        });
    }

    const sidebarSearch = document.getElementById('sidebar-search');
    if (sidebarSearch) {
        sidebarSearch.addEventListener('input', (e) => {
            handleSearch(e.target.value);
        });
    }
});
