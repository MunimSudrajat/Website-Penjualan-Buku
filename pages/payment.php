<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: checkout.php");
    exit;
}

$nama = $_POST['nama'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$email = $_POST['email'] ?? '';
$promo = $_POST['promo'] ?? '';

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - BOOKStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .payment-logo {
            width: 80px;
            height: auto;
            margin: 10px;
            filter: drop-shadow(0 0 3px rgba(0,0,0,0.2));
            transition: transform 0.2s ease, border 0.2s ease;
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
        }
        .payment-logo:hover {
            transform: scale(1.05);
        }
        .payment-logo.selected {
            border: 3px solid #0d6efd;
            box-shadow: 0 0 8px rgba(13,110,253,0.5);
        }
        .logo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2 class="fw-bold mb-4 text-center">💳 Pilih Metode Pembayaran</h2>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm p-4">
                <form id="paymentForm">
                    <!-- PILIHAN METODE -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="metode" id="cod" value="COD" required>
                        <label class="form-check-label" for="cod">
                            <i class="bi bi-truck"></i> Bayar di Tempat (COD)
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="metode" id="qris" value="QRIS">
                        <label class="form-check-label" for="qris">
                            <i class="bi bi-qr-code"></i> QRIS (Scan QR)
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="metode" id="transfer" value="Transfer Bank">
                        <label class="form-check-label" for="transfer">
                            <i class="bi bi-bank"></i> Transfer Bank
                        </label>
                    </div>
                    <div id="bankLogos" class="logo-container d-none">
                        <?php
                        $banks = ['bca', 'bni', 'bri', 'bsi', 'mandiri'];
                        foreach ($banks as $bank): ?>
                            <img src="../assets/img/<?= $bank ?>.png" 
                                 alt="<?= strtoupper($bank) ?>" 
                                 class="payment-logo bank-logo" 
                                 data-value="<?= strtoupper($bank) ?>">
                        <?php endforeach; ?>
                    </div>

                    <div class="form-check mb-3 mt-3">
                        <input class="form-check-input" type="radio" name="metode" id="ewallet" value="E-Wallet">
                        <label class="form-check-label" for="ewallet">
                            <i class="bi bi-phone"></i> E-Wallet (Dana, OVO, Gopay)
                        </label>
                    </div>
                    <div id="ewalletLogos" class="logo-container d-none">
                        <?php
                        $wallets = ['dana', 'ovo', 'gopay'];
                        foreach ($wallets as $w): ?>
                            <img src="../assets/img/<?= $w ?>.png" 
                                 alt="<?= strtoupper($w) ?>" 
                                 class="payment-logo wallet-logo" 
                                 data-value="<?= strtoupper($w) ?>">
                        <?php endforeach; ?>
                    </div>

                    <div class="text-center mt-4">
                        <button type="button" id="lanjutBtn" class="btn btn-dark">
                            Lanjutkan <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL RINGKASAN -->
<div class="modal fade" id="ringkasanModal" tabindex="-1" aria-labelledby="ringkasanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="ringkasanLabel">Ringkasan Pesanan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h6 class="fw-bold mb-3">📦 Buku yang Dibeli</h6>
        <ul class="list-group mb-4">
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <?= htmlspecialchars($item['title']) ?>
                        <small class="text-muted d-block">
                            Rp<?= number_format($item['price'], 0, ',', '.') ?> × <?= $item['quantity'] ?>
                        </small>
                    </div>
                    <span>Rp<?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <h6 class="fw-bold mb-3">👤 Data Penerima</h6>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></li>
            <li class="list-group-item"><strong>Alamat:</strong> <?= htmlspecialchars($alamat) ?></li>
            <li class="list-group-item"><strong>Telepon:</strong> <?= htmlspecialchars($telepon) ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($email) ?></li>
            <?php if (!empty($promo)): ?>
                <li class="list-group-item"><strong>Kode Promo:</strong> <?= htmlspecialchars($promo) ?></li>
            <?php endif; ?>
        </ul>

        <h6 class="fw-bold mb-2">💰 Metode Pembayaran</h6>
        <p id="metodePembayaran" class="fs-5 text-success"></p>

        <div class="text-end mt-3">
            <h5>Total Pembayaran: <strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></h5>
        </div>
      </div>
      <div class="modal-footer">
        <a href="checkout.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
                </a>
            <form action="success.php" method="post">
            <input type="hidden" name="metode" id="metodeHidden">
            <input type="hidden" name="total" value="<?= $total ?>">
            <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
            <input type="hidden" name="alamat" value="<?= htmlspecialchars($alamat) ?>">
            <input type="hidden" name="telepon" value="<?= htmlspecialchars($telepon) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Konfirmasi Pembayaran
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const metodeInputs = document.querySelectorAll('input[name="metode"]');
const bankLogos = document.getElementById('bankLogos');
const ewalletLogos = document.getElementById('ewalletLogos');
let selectedBank = null;
let selectedWallet = null;

// Tampilkan logo sesuai pilihan utama
metodeInputs.forEach(input => {
    input.addEventListener('change', () => {
        bankLogos.classList.add('d-none');
        ewalletLogos.classList.add('d-none');
        selectedBank = null;
        selectedWallet = null;
        document.querySelectorAll('.payment-logo').forEach(img => img.classList.remove('selected'));

        if (input.value === 'Transfer Bank') {
            bankLogos.classList.remove('d-none');
        } else if (input.value === 'E-Wallet') {
            ewalletLogos.classList.remove('d-none');
        }
    });
});

// Klik logo bank
document.querySelectorAll('.bank-logo').forEach(logo => {
    logo.addEventListener('click', () => {
        document.querySelectorAll('.bank-logo').forEach(l => l.classList.remove('selected'));
        logo.classList.add('selected');
        selectedBank = logo.dataset.value;
    });
});

// Klik logo ewallet
document.querySelectorAll('.wallet-logo').forEach(logo => {
    logo.addEventListener('click', () => {
        document.querySelectorAll('.wallet-logo').forEach(l => l.classList.remove('selected'));
        logo.classList.add('selected');
        selectedWallet = logo.dataset.value;
    });
});

document.getElementById('lanjutBtn').addEventListener('click', function() {
    const metode = document.querySelector('input[name="metode"]:checked');
    if (!metode) {
        alert('Pilih salah satu metode pembayaran terlebih dahulu!');
        return;
    }

    if (metode.value === 'Transfer Bank' && !selectedBank) {
        alert('Silakan pilih salah satu bank untuk transfer!');
        return;
    }
    if (metode.value === 'E-Wallet' && !selectedWallet) {
        alert('Silakan pilih salah satu E-Wallet!');
        return;
    }

    let metodeText = metode.value;
    if (selectedBank) metodeText += ' - ' + selectedBank;
    if (selectedWallet) metodeText += ' - ' + selectedWallet;

    document.getElementById('metodePembayaran').innerText = metodeText;

    // 🔽 tambahkan ini untuk mengisi input hidden
    document.getElementById('metodeHidden').value = metodeText;

    const modal = new bootstrap.Modal(document.getElementById('ringkasanModal'));
    modal.show();
});


// Tombol lanjut
document.getElementById('lanjutBtn').addEventListener('click', function() {
    const metode = document.querySelector('input[name="metode"]:checked');
    if (!metode) {
        alert('Pilih salah satu metode pembayaran terlebih dahulu!');
        return;
    }

    // Validasi tambahan
    if (metode.value === 'Transfer Bank' && !selectedBank) {
        alert('Silakan pilih salah satu bank untuk transfer!');
        return;
    }
    if (metode.value === 'E-Wallet' && !selectedWallet) {
        alert('Silakan pilih salah satu E-Wallet!');
        return;
    }

    let metodeText = metode.value;
    if (selectedBank) metodeText += ' - ' + selectedBank;
    if (selectedWallet) metodeText += ' - ' + selectedWallet;

    document.getElementById('metodePembayaran').innerText = metodeText;

    const modal = new bootstrap.Modal(document.getElementById('ringkasanModal'));
    modal.show();
});
</script>

</body>
</html>
