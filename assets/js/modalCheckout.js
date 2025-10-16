
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Jalankan saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    updateCartBadge();
    tampilkanKeranjang();
});

// Fungsi saat klik tombol tambah ke keranjang
function tambahKeKeranjang(id) {
    const btn = document.querySelector(`[data-id='${id}']`);
    const title = btn.dataset.title;
    const price = parseInt(btn.dataset.price);

    // Cek apakah buku sudah ada di keranjang
    const existingItem = cart.find(item => item.id === id);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ id, title, price, quantity: 1 });
    }

    // Simpan ke localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Update badge
    updateCartBadge();
}

// Update jumlah di badge navbar
function updateCartBadge() {
    const count = cart.reduce((sum, item) => sum + item.quantity, 0);
    document.getElementById('cart-count').textContent = count;
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
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    ${item.title}
                    <div>
                        <span class="badge bg-secondary me-2">x${item.quantity}</span>
                        <strong>Rp${item.price.toLocaleString('id-ID')}</strong>
                    </div>
                </li>
            `;
        });
    }

    totalElem.textContent = total.toLocaleString('id-ID');
}

// Fungsi kirim data ke checkout.php
document.getElementById('checkout-btn').addEventListener('click', () => {
    if (cart.length === 0) {
        alert('Keranjang masih kosong!');
        return;
    }

    // Kirim data cart ke checkout.php (pakai fetch POST)
    fetch('checkout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ cart })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Setelah berhasil disimpan ke session, arahkan ke checkout.php
            window.location.href = 'checkout.php';
        } else {
            alert('Gagal memproses keranjang 😢');
        }
    })
    .catch(err => console.error(err));
});



// Saat modal dibuka → tampilkan isi terbaru
document.getElementById('cartModal').addEventListener('show.bs.modal', tampilkanKeranjang);