let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Jalankan saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    updateCartBadge();
    tampilkanKeranjang();
});

// Tambah ke keranjang
function tambahKeKeranjang(id) {
    const btn = document.querySelector(`[data-id='${id}']`);
    const title = btn.dataset.title;
    const price = parseInt(btn.dataset.price);
    const image = btn.dataset.image;

    const existingItem = cart.find(item => item.id === id);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ id, title, price, image, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartBadge();
}

// Update badge di navbar
function updateCartBadge() {
    const count = cart.reduce((sum, item) => sum + item.quantity, 0);
    const badge = document.getElementById('cart-count');
    if (badge) badge.textContent = count;
}

// Tampilkan isi keranjang di modal
function tampilkanKeranjang() {
    const list = document.getElementById('cart-items');
    const totalElem = document.getElementById('cart-total');
    list.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
        list.innerHTML = '<li class="list-group-item text-center text-muted">Keranjang kosong</li>';
    } else {
        cart.forEach(item => {
            total += item.price * item.quantity;
            list.innerHTML += `
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" alt="${item.title}" width="40" class="me-2 rounded">
                        <div>
                            <strong>${item.title}</strong><br>
                            <small>Rp${item.price.toLocaleString('id-ID')}</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary me-1" onclick="kurangiJumlah(${item.id})">−</button>
                        <span class="mx-1">${item.quantity}</span>
                        <button class="btn btn-sm btn-outline-secondary me-2" onclick="tambahJumlah(${item.id})">+</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="hapusItem(${item.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </li>
            `;
        });
    }

    totalElem.textContent = total.toLocaleString('id-ID');
}

// Fungsi tambah jumlah
function tambahJumlah(id) {
    const item = cart.find(i => i.id === id);
    if (item) {
        item.quantity++;
        simpanDanRefresh();
    }
}

// Fungsi kurangi jumlah
function kurangiJumlah(id) {
    const item = cart.find(i => i.id === id);
    if (item && item.quantity > 1) {
        item.quantity--;
    } else {
        cart = cart.filter(i => i.id !== id);
    }
    simpanDanRefresh();
}

// Fungsi hapus item
function hapusItem(id) {
    cart = cart.filter(i => i.id !== id);
    simpanDanRefresh();
}

// Simpan ulang ke localStorage & refresh tampilan modal
function simpanDanRefresh() {
    localStorage.setItem('cart', JSON.stringify(cart));
    tampilkanKeranjang();
    updateCartBadge();
}

// Checkout (kirim ke PHP)
document.getElementById('checkout-btn').addEventListener('click', () => {
    if (cart.length === 0) {
        alert('Keranjang masih kosong!');
        return;
    }

    fetch('checkout.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cart })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'checkout.php';
        } else {
            alert('Gagal memproses keranjang 😢');
        }
    })
    .catch(err => console.error(err));
});

document.getElementById('cartModal').addEventListener('show.bs.modal', tampilkanKeranjang);
