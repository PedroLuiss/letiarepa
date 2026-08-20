function initImageCarousel(container) {
    if (container.dataset.carouselReady === 'true') return;

    const track = container.querySelector('.carousel-images-track');
    const dots = container.querySelector('.carousel-dots');
    if (!track || !dots) return;

    const images = track.querySelectorAll('.carousel-img');
    const total = images.length;
    if (total < 2) return;

    let current = 0;
    let isDragging = false;
    let startX = 0;
    let translateX = 0;
    let autoTimer = null;

    track.style.display = 'flex';
    track.style.flex = '1';
    images.forEach(img => {
        img.style.flex = '0 0 100%';
        img.style.minWidth = '100%';
        img.style.width = '100%';
        img.style.userSelect = 'none';
        img.style.webkitUserDrag = 'none';
        img.setAttribute('draggable', 'false');
        img.addEventListener('dragstart', e => e.preventDefault());
    });

    function getCardWidth() {
        return track.parentElement.offsetWidth;
    }

    function goTo(index) {
        if (index < 0) index = total - 1;
        if (index >= total) index = 0;
        current = index;
        const w = getCardWidth();
        if (w <= 0) return;
        const offset = -current * w;
        track.style.transition = 'transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        track.style.transform = `translateX(${offset}px)`;
        translateX = offset;
        updateDots();
    }

    function stopAutoplay() {
        if (autoTimer) {
            clearInterval(autoTimer);
            autoTimer = null;
        }
    }

    function startAutoplay() {
        if (container.dataset.autoplay !== 'true') return;
        const everyMs = parseInt(container.dataset.autoplayMs || '3500', 10);
        stopAutoplay();
        autoTimer = setInterval(() => {
            goTo(current + 1);
        }, Number.isNaN(everyMs) ? 3500 : everyMs);
    }

    function updateDots() {
        dots.querySelectorAll('.carousel-dot').forEach((dot, i) => {
            dot.className = `w-4 h-4 rounded-full border border-letiarepa-gold cursor-pointer transition-all duration-300 ${i === current ? 'bg-letiarepa-gold' : 'bg-transparent'}`;
        });
    }

    dots.querySelectorAll('.carousel-dot').forEach(dot => {
        dot.addEventListener('click', () => {
            goTo(parseInt(dot.dataset.index));
        });
    });

    container.addEventListener('pointerdown', e => {
        if (e.target.closest('a, button, input, textarea, select')) return;
        stopAutoplay();
        isDragging = true;
        startX = e.clientX;
        track.style.transition = 'none';
        container.setPointerCapture(e.pointerId);
    });

    container.addEventListener('pointermove', e => {
        if (!isDragging) return;
        const delta = e.clientX - startX;
        track.style.transform = `translateX(${translateX + delta}px)`;
        e.preventDefault();
    });

    container.addEventListener('pointerup', e => {
        if (!isDragging) return;
        isDragging = false;
        const delta = e.clientX - startX;
        if (Math.abs(delta) > 40) {
            if (delta > 0) goTo(current - 1);
            else goTo(current + 1);
        } else {
            goTo(current);
        }
        startAutoplay();
    });

    container.addEventListener('pointercancel', () => {
        if (isDragging) {
            isDragging = false;
            goTo(current);
            startAutoplay();
        }
    });

    container.addEventListener('mouseenter', stopAutoplay);
    container.addEventListener('mouseleave', startAutoplay);

    goTo(0);
    startAutoplay();
    container.dataset.carouselReady = 'true';
}

function initAllImageCarousels() {
    document.querySelectorAll('.carousel-images-container').forEach(initImageCarousel);
}

window.initImageCarousel = initImageCarousel;
window.initAllImageCarousels = initAllImageCarousels;

document.addEventListener('DOMContentLoaded', initAllImageCarousels);
