let activeFrozenDetailItem = null;

export function openFrozenDetailModal(card) {
    const id = card.dataset.productId;
    const nombre = card.dataset.productName;
    const precio = parseFloat(card.dataset.productPrice);
    const imagen = card.dataset.productImage;
    const descripcion = card.dataset.productDesc || '';
    const presentacion = card.dataset.productPresentation || '';

    activeFrozenDetailItem = { id, nombre, precio, imagen };

    document.getElementById('modal-frozen-detail-name').textContent = nombre;
    document.getElementById('modal-frozen-detail-price').textContent = `$ ${precio.toFixed(0)}`;
    document.getElementById('modal-frozen-detail-img').src = `/${imagen}`;
    document.getElementById('modal-frozen-detail-description').textContent = descripcion;
    document.getElementById('modal-frozen-detail-presentation').textContent = presentacion;
    document.getElementById('qty-frozen-detail').value = 1;

    const modal = document.getElementById('frozen-detail-modal');
    modal.classList.remove('opacity-0', 'pointer-events-none');
    document.body.style.overflow = 'hidden';
}

export function closeFrozenDetailModal() {
    const modal = document.getElementById('frozen-detail-modal');
    modal.classList.add('opacity-0', 'pointer-events-none');
    document.body.style.overflow = '';
    activeFrozenDetailItem = null;
}

export function changeQtyFrozenDetail(delta) {
    const input = document.getElementById('qty-frozen-detail');
    let val = parseInt(input.value) || 1;
    val += delta;
    if (val < 1) val = 1;
    input.value = val;

    if (activeFrozenDetailItem) {
        const gridInput = document.getElementById(`qty-${activeFrozenDetailItem.id}`);
        if (gridInput) gridInput.value = val;
    }
}

export function addFrozenDetailToCart() {
    if (!activeFrozenDetailItem) return;
    const qty = parseInt(document.getElementById('qty-frozen-detail').value);
    const gridInput = document.getElementById(`qty-${activeFrozenDetailItem.id}`);
    if (gridInput) gridInput.value = qty;
    window.addToCart(activeFrozenDetailItem.id, activeFrozenDetailItem.nombre, activeFrozenDetailItem.precio, activeFrozenDetailItem.imagen);
    closeFrozenDetailModal();
}

function findDetailCardById(id) {
    const grid = document.getElementById('frozen-products-grid');
    if (!grid) return null;
    return grid.querySelector(`[data-product-id="${id}"]`);
}

function getVisibleDetailSibling(card, direction) {
    let el = direction === 1 ? card.nextElementSibling : card.previousElementSibling;
    while (el) {
        if (el.hasAttribute('data-frozen-category') && el.offsetParent !== null) return el;
        el = direction === 1 ? el.nextElementSibling : el.previousElementSibling;
    }
    return null;
}

export function navigateFrozenDetailModal(direction) {
    if (!activeFrozenDetailItem) return;
    const currentCard = findDetailCardById(activeFrozenDetailItem.id);
    if (!currentCard) return;
    const nextCard = getVisibleDetailSibling(currentCard, direction);
    if (!nextCard) return;
    openFrozenDetailModal(nextCard);
}

window.openFrozenDetailModal = openFrozenDetailModal;
window.closeFrozenDetailModal = closeFrozenDetailModal;
window.changeQtyFrozenDetail = changeQtyFrozenDetail;
window.addFrozenDetailToCart = addFrozenDetailToCart;
window.navigateFrozenDetailModal = navigateFrozenDetailModal;
