let activeFrozenItem = null;

export function openFrozenModal(id, nombre, precio, imagen) {
    activeFrozenItem = { id, nombre, precio, imagen };

    document.getElementById('modal-frozen-name').textContent = nombre;
    document.getElementById('modal-frozen-price').textContent = `$${parseFloat(precio).toFixed(2)}`;
    document.getElementById('modal-frozen-img').src = `/${imagen}`;

    if (id.includes('pollo')) {
        document.getElementById('p-pollo').checked = true;
    } else {
        document.getElementById('p-mechada').checked = true;
    }

    const modal = document.getElementById('frozen-modal');
    modal.classList.remove('opacity-0', 'pointer-events-none');
}

export function closeFrozenModal() {
    const modal = document.getElementById('frozen-modal');
    modal.classList.add('opacity-0', 'pointer-events-none');
    activeFrozenItem = null;
}

export function addFrozenToCart() {
    if (!activeFrozenItem) return;

    const presentation = document.querySelector('input[name="presentation-radio"]:checked').value;
    window.addToCart(
        activeFrozenItem.id,
        activeFrozenItem.nombre,
        activeFrozenItem.precio,
        activeFrozenItem.imagen,
        presentation
    );
    closeFrozenModal();
}

// Expose to window for onclick handlers
window.openFrozenModal = openFrozenModal;
window.closeFrozenModal = closeFrozenModal;
window.addFrozenToCart = addFrozenToCart;
