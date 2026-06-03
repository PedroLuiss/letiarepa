let track, viewport, dotsContainer;
let cardWidth = 0;
let currentPos = 0;
let totalCards = 0;
let visibleCount = 3;
let isDragging = false;
let startX = 0;

function getGap() {
    return window.innerWidth >= 1024 ? 56 : 40;
}

function calculateCardWidth() {
    if (!viewport || !track) return;
    const gap = getGap();
    const vpWidth = viewport.offsetWidth;
    cardWidth = (vpWidth - (visibleCount - 1) * gap) / visibleCount;
    for (let i = 0; i < track.children.length; i++) {
        const card = track.children[i];
        card.style.flex = `0 0 ${cardWidth}px`;
        card.style.maxWidth = `${cardWidth}px`;
        card.style.minWidth = `${cardWidth}px`;
        card.querySelectorAll('img').forEach(img => {
            img.style.userSelect = 'none';
            img.style.webkitUserDrag = 'none';
            img.setAttribute('draggable', 'false');
            img.addEventListener('dragstart', e => e.preventDefault());
        });
    }
    return cardWidth;
}

function getMaxPos() {
    return Math.max(0, totalCards - visibleCount);
}

function getTranslateForPos(pos) {
    const gap = getGap();
    return -(pos * (cardWidth + gap));
}

function setSliderPosition(animate) {
    if (!track) return;
    track.style.transition = animate
        ? 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)'
        : 'none';
    track.style.transform = `translateX(${getTranslateForPos(currentPos)}px)`;
    updateDots();
}

function updateDots() {
    if (!dotsContainer) return;
    const maxPos = getMaxPos();
    const count = maxPos + 1;
    let html = '';
    for (let i = 0; i < count; i++) {
        const active = i === currentPos;
        html += `<span data-dot="${i}" class="w-3.5 h-3.5 rounded-full ${active ? 'bg-letiarepa-gold' : 'border border-letiarepa-gold bg-transparent'} inline-block cursor-pointer transition-all duration-300"></span>`;
    }
    dotsContainer.innerHTML = html;
    dotsContainer.querySelectorAll('[data-dot]').forEach(el => {
        el.addEventListener('click', () => {
            goTo(parseInt(el.dataset.dot));
        });
    });
}

function goTo(pos) {
    const maxPos = getMaxPos();
    if (pos < 0) pos = maxPos;
    if (pos > maxPos) pos = 0;
    currentPos = pos;
    setSliderPosition(true);
}

function goNext() {
    goTo(currentPos + 1);
}

function goPrev() {
    goTo(currentPos - 1);
}

function dragStart(e) {
    if (e.target.closest('a, button, input, textarea, select')) return;
    isDragging = true;
    startX = e.clientX;
    viewport.setPointerCapture(e.pointerId);
    track.style.transition = 'none';
    track.style.cursor = 'grabbing';
}

function dragMove(e) {
    if (!isDragging) return;
    const deltaX = e.clientX - startX;
    track.style.transform = `translateX(${getTranslateForPos(currentPos) + deltaX}px)`;
    e.preventDefault();
}

function dragEnd(e) {
    if (!isDragging) return;
    isDragging = false;
    track.style.cursor = '';
    const deltaX = e.clientX - startX;
    if (Math.abs(deltaX) > 50) {
        if (deltaX > 0) goPrev();
        else goNext();
    } else {
        setSliderPosition(true);
    }
}

function initCarousel() {
    viewport = document.getElementById('team-carousel');
    track = document.getElementById('team-track');
    dotsContainer = document.getElementById('team-dots');
    if (!viewport || !track) return;

    totalCards = track.children.length;
    calculateCardWidth();
    setSliderPosition(false);

    viewport.addEventListener('pointerdown', dragStart);
    viewport.addEventListener('pointermove', dragMove);
    viewport.addEventListener('pointerup', dragEnd);
    viewport.addEventListener('pointercancel', dragEnd);

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            calculateCardWidth();
            setSliderPosition(false);
        }, 150);
    });
}

window.goToSlide = goTo;

document.addEventListener('DOMContentLoaded', initCarousel);
