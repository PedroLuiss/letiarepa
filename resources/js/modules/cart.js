let cart = [];

function loadCart() {
    try {
        const stored = localStorage.getItem('letiarepa_cart');
        cart = stored ? JSON.parse(stored) : [];
    } catch (e) {
        cart = [];
    }
    updateCartBadge();
}

function saveCart() {
    localStorage.setItem('letiarepa_cart', JSON.stringify(cart));
    updateCartBadge();
}

export function addToCart(id, nombre, precio, imagen, optionName = null) {
    const index = cart.findIndex(item => item.id === id && item.option === optionName);
    const inputQty = parseInt(document.getElementById(`qty-${id}`)?.value || 1);

    if (index > -1) {
        cart[index].cantidad += inputQty;
    } else {
        cart.push({
            id: id,
            nombre: nombre,
            precio: parseFloat(precio),
            imagen: imagen,
            option: optionName,
            cantidad: inputQty
        });
    }

    const input = document.getElementById(`qty-${id}`);
    if (input) input.value = 1;

    saveCart();
    toggleCart(true);
}

export function changeQty(productId, delta) {
    const input = document.getElementById(`qty-${productId}`);
    if (input) {
        let val = parseInt(input.value) || 1;
        val += delta;
        if (val < 1) val = 1;
        input.value = val;
    }
}

function updateCartQuantity(id, optionName, delta) {
    const index = cart.findIndex(item => item.id === id && item.option === optionName);
    if (index > -1) {
        cart[index].cantidad += delta;
        if (cart[index].cantidad <= 0) {
            cart.splice(index, 1);
        }
        saveCart();
        renderCart();
    }
}

function removeFromCart(id, optionName) {
    const index = cart.findIndex(item => item.id === id && item.option === optionName);
    if (index > -1) {
        cart.splice(index, 1);
        saveCart();
        renderCart();
    }
}

function updateCartBadge() {
    const badge = document.getElementById('cart-badge');
    const totalItems = cart.reduce((total, item) => total + item.cantidad, 0);

    if (totalItems > 0) {
        badge.textContent = totalItems;
        badge.classList.remove('hidden');
    } else {
        badge.classList.add('hidden');
    }
}

export function toggleCart(open) {
    const sidebar = document.getElementById('cart-sidebar');
    const overlay = document.getElementById('cart-overlay');

    if (open) {
        renderCart();
        sidebar.classList.remove('translate-x-full');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
    } else {
        sidebar.classList.add('translate-x-full');
        overlay.classList.add('opacity-0', 'pointer-events-none');
    }
}

function renderCart() {
    const listContainer = document.getElementById('cart-items');
    const subtotalText = document.getElementById('cart-subtotal');

    if (cart.length === 0) {
        listContainer.innerHTML = `
            <div class="flex flex-col items-center justify-center py-20 text-center gap-4">
                <svg class="w-16 h-16 text-white/10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                <p class="text-sm font-nexa text-white/50">Tu carrito está vacío</p>
                <button onclick="toggleCart(false)" class="text-xs font-nexa text-letiarepa-gold font-bold tracking-widest hover:underline uppercase">VER NUESTRO MENÚ</button>
            </div>
        `;
        subtotalText.textContent = "$0.00";
        return;
    }

    let html = "";
    let subtotal = 0;

    cart.forEach(item => {
        const itemTotal = item.precio * item.cantidad;
        subtotal += itemTotal;

        const optionLabel = item.option
            ? `<span class="text-[10px] bg-letiarepa-gold/10 border border-letiarepa-gold/20 text-letiarepa-gold px-1.5 py-0.5 rounded uppercase font-nexa">${item.option}</span>`
            : "";

        html += `
            <div class="flex items-center gap-4 bg-white/5 p-3 rounded-xl border border-white/5">
                <img src="/${item.imagen}" alt="${item.nombre}" class="w-16 h-16 object-contain rounded bg-white/5 p-1 flex-shrink-0" onerror="this.src='/letiarepa/images/arepas/AREPA-REINA-PEPIADA-MINIATURA.png'" />
                <div class="flex-1">
                    <div class="flex items-start justify-between gap-2">
                        <h4 class="text-xs text-white tracking-wider leading-tight">${item.nombre}</h4>
                        <button onclick="removeFromCart('${item.id}', ${item.option ? `'${item.option}'` : 'null'})" class="text-white/40 hover:text-red-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                    <div class="mt-1.5 flex items-center gap-2">
                        ${optionLabel}
                        <span class="text-[11px] font-nexa text-letiarepa-gold/80 font-bold">$${item.precio.toFixed(2)}</span>
                    </div>
                    <div class="flex items-center justify-between mt-3">
                        <div class="flex items-center border border-white/20 rounded bg-black/40">
                            <button onclick="updateCartQuantity('${item.id}', ${item.option ? `'${item.option}'` : 'null'}, -1)" class="px-2 py-0.5 text-xs font-bold text-white/60 hover:text-white">-</button>
                            <span class="w-8 text-center text-xs font-nexa font-bold text-white">${item.cantidad}</span>
                            <button onclick="updateCartQuantity('${item.id}', ${item.option ? `'${item.option}'` : 'null'}, 1)" class="px-2 py-0.5 text-xs font-bold text-white/60 hover:text-white">+</button>
                        </div>
                        <span class="text-xs font-nexa font-bold text-white">$${itemTotal.toFixed(2)}</span>
                    </div>
                </div>
            </div>
        `;
    });

    listContainer.innerHTML = html;
    subtotalText.textContent = `$${subtotal.toFixed(2)}`;
}

export function addToCartSimple(id, nombre, precio, imagen) {
    const index = cart.findIndex(item => item.id === id && item.option === null);
    if (index > -1) {
        cart[index].cantidad += 1;
    } else {
        cart.push({ id, nombre, precio: parseFloat(precio), imagen, option: null, cantidad: 1 });
    }
    saveCart();
    toggleCart(true);
}

export function checkoutWhatsApp() {
    if (cart.length === 0) return;

    let message = "¡Hola Leti Arepa Orlando! 🥟🇻🇪\nMe gustaría realizar el siguiente pedido para retiro:\n\n";
    let subtotal = 0;

    cart.forEach(item => {
        const totalItem = item.precio * item.cantidad;
        subtotal += totalItem;
        const optionString = item.option ? ` (${item.option})` : "";
        message += `• *${item.cantidad}x* ${item.nombre}${optionString} — *$${totalItem.toFixed(2)}*\n`;
    });

    message += `\n─────────────────────────\n`;
    message += `💰 *Total del Pedido: $${subtotal.toFixed(2)}*\n`;
    message += `─────────────────────────\n\n`;
    message += `Por favor, confírmenme el pedido y las instrucciones de retiro. ¡Muchas gracias!`;

    const whatsappNumber = document.querySelector('meta[name="whatsapp-number"]')?.content || '584141578602';
    const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

    cart = [];
    saveCart();
    renderCart();
    toggleCart(false);

    window.open(whatsappUrl, '_blank');
}

// Expose to window for onclick handlers
window.addToCart = addToCart;
window.addToCartSimple = addToCartSimple;
window.changeQty = changeQty;
window.toggleCart = toggleCart;
window.updateCartQuantity = updateCartQuantity;
window.removeFromCart = removeFromCart;
window.checkoutWhatsApp = checkoutWhatsApp;

document.addEventListener('DOMContentLoaded', () => {
    loadCart();
});
