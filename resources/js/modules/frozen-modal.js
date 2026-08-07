let activeFrozenItem = null;

// Mapa de ingredientes por producto
const ingredientsMap = {
    'pabellon': ['CARNE MECHADA', 'CARAOTAS (FRIJOLES NEGROS)', 'PLÁTANOS MADUROS', 'QUESO BLANCO.', 'MANTEQUILLA'],
    'reina_pepiada': ['POLLO MECHADO', 'AGUACATE (PALTA)', 'MAYONESA', 'QUESO BLANCO.'],
    'letiarepa': ['CARNE ASADA', 'PICO DE GALLO', 'QUESO BLANCO.'],
    'pelua': ['CARNE MECHADA', 'QUESO AMARILLO.'],
    'carne_mechada_frozen': ['1 LIBRA DE CARNE MECHADA'],
    'pollo_mechado_frozen': ['1 LIBRA DE POLLO MECHADO']
};

// Sabores disponibles por producto de bebidas; imagen de respaldo cuando no hay foto propia del sabor
const flavorMap = {
    'jugos-naturales': [
        { label: 'Parchita', image: 'letiarepa/images/Bebidas/Jugo-parchita.jpg' },
        { label: 'Mango', image: 'letiarepa/images/Bebidas/Jugos.jpg' },
        { label: 'Mora', image: 'letiarepa/images/Bebidas/Jugo-Mora.jpg' },
        { label: 'Guanábana', image: 'letiarepa/images/Bebidas/Jugo-guanabana.jpg' },
        { label: 'Tamarindo', image: 'letiarepa/images/Bebidas/Jugos.jpg' },
    ],
    'sodas-internacional': [
        { label: 'Coca-Cola', image: 'letiarepa/images/Bebidas/coca-cola.jpg' },
        { label: 'Frescolita', image: 'letiarepa/images/Bebidas/coca-cola.jpg' },
        { label: 'Malta', image: 'letiarepa/images/Bebidas/coca-cola.jpg' },
    ],
};

// Slugs de bebidas: no aplica selección de ingredientes
const bebidaSlugs = ['jugos-naturales', 'chicha-venezolana', 'toddy', 'sodas-internacional'];

function setupFlavorSelector(id) {
    const wrapper = document.getElementById('modal-flavor-wrapper');
    const divider = document.getElementById('modal-flavor-divider');
    const select = document.getElementById('modal-flavor-select');
    if (!wrapper || !divider || !select) return;

    const flavors = flavorMap[id];
    if (!flavors) {
        wrapper.classList.add('hidden');
        divider.classList.add('hidden');
        select.innerHTML = '';
        return;
    }

    select.innerHTML = flavors.map(f => `<option value="${f.label}" class="bg-letiarepa-black text-white">${f.label}</option>`).join('');
    wrapper.classList.remove('hidden');
    divider.classList.remove('hidden');

    select.onchange = () => {
        const chosen = flavors.find(f => f.label === select.value);
        if (chosen) {
            document.getElementById('modal-frozen-img').src = `/${chosen.image}`;
        }
    };
    select.onchange();
}

export function openFrozenModal(id, nombre, precio, imagen) {
    activeFrozenItem = { id, nombre, precio, imagen };

    // Limpiar el nombre (remover "AREPA DE ")
    const cleanName = nombre.replace('AREPA DE ', '');
    document.getElementById('modal-frozen-name').textContent = cleanName;
    document.getElementById('modal-frozen-price').textContent = `$ ${parseFloat(precio).toFixed(0)}`;
    document.getElementById('modal-frozen-img').src = `/${imagen}`;
    document.getElementById('qty-modal').value = 1;
    setupFlavorSelector(id);

    const ingredientsWrapper = document.getElementById('modal-ingredients-wrapper');
    const ingredientsDivider = document.getElementById('modal-ingredients-divider');
    const isBebida = bebidaSlugs.includes(id);
    if (ingredientsWrapper) ingredientsWrapper.classList.toggle('hidden', isBebida);
    if (ingredientsDivider) ingredientsDivider.classList.toggle('hidden', isBebida);

    // Generar Ingredientes Dinámicos
    const container = document.getElementById('ingredients-container');
    container.innerHTML = '';
    
    const ingredients = ingredientsMap[id] || ['Ingredientes Tradicionales'];
    
    ingredients.forEach(ing => {
        container.innerHTML += `
            <label class="flex items-center gap-4 cursor-pointer group select-none py-1">
                <!-- Checkbox Personalizado: Sólido cuando está checked, transparente con borde cuando no -->
                <input type="checkbox" checked 
                    class="appearance-none w-6 h-6 border-1 border-letiarepa-gold bg-transparent checked:bg-letiarepa-gold transition-all duration-200 cursor-pointer rounded-sm">
                
                <span class="text-white font-nexa-bold text-[18px] uppercase tracking-tighter group-hover:text-letiarepa-gold transition-colors leading-none">
                    ${ing}
                </span>
            </label>
        `;
    });

    const modal = document.getElementById('frozen-modal');
    modal.classList.remove('opacity-0', 'pointer-events-none');
    document.body.style.overflow = 'hidden'; // Evitar scroll de fondo
}

export function closeFrozenModal() {
    const modal = document.getElementById('frozen-modal');
    modal.classList.add('opacity-0', 'pointer-events-none');
    document.body.style.overflow = '';
    activeFrozenItem = null;
}

export function changeQtyModal(delta) {
    const input = document.getElementById('qty-modal');
    let val = parseInt(input.value) || 1;
    val += delta;
    if (val < 1) val = 1;
    input.value = val;
    
    // Sincronizar con el input del grid principal si es necesario
    const mainQtyInput = document.getElementById(`qty-${activeFrozenItem.id}`);
    if (mainQtyInput) mainQtyInput.value = val;
}

export function addFrozenToCart() {
    if (!activeFrozenItem) return;
    const qty = parseInt(document.getElementById('qty-modal').value);

    const mainQtyInput = document.getElementById(`qty-${activeFrozenItem.id}`);
    if (mainQtyInput) {
        mainQtyInput.value = qty;
    }

    const flavorSelect = document.getElementById('modal-flavor-select');
    const optionName = flavorMap[activeFrozenItem.id] && flavorSelect?.value ? flavorSelect.value : null;

    // Aquí usamos la lógica global de cart.js
    window.addToCart(activeFrozenItem.id, activeFrozenItem.nombre, activeFrozenItem.precio, activeFrozenItem.imagen, optionName);
    closeFrozenModal();
}

function findCardById(id) {
    const grid = document.getElementById('restaurant-grid');
    if (!grid) return null;
    return grid.querySelector(`[data-product-id="${id}"]`);
}

function getVisibleSibling(card, direction) {
    let el = direction === 1 ? card.nextElementSibling : card.previousElementSibling;
    while (el) {
        if (el.matches('[data-product-card]') && el.offsetParent !== null) return el;
        el = direction === 1 ? el.nextElementSibling : el.previousElementSibling;
    }
    return null;
}

export function navigateFrozenModal(direction) {
    if (!activeFrozenItem) return;
    const currentCard = findCardById(activeFrozenItem.id);
    if (!currentCard) return;
    const nextCard = getVisibleSibling(currentCard, direction);
    if (!nextCard) return;
    const slug = nextCard.dataset.productId;
    const name = nextCard.dataset.productName;
    const price = nextCard.dataset.productPrice;
    const image = nextCard.dataset.productImage;
    if (slug && name && price != null && image) {
        openFrozenModal(slug, name, price, image);
    }
}

window.openFrozenModal = openFrozenModal;
window.closeFrozenModal = closeFrozenModal;
window.changeQtyModal = changeQtyModal;
window.addFrozenToCart = addFrozenToCart;
window.navigateFrozenModal = navigateFrozenModal;