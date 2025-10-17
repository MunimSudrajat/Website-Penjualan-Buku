<?php
session_start();

// Cegah akses langsung tanpa data checkout
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart'])) {
    header("Location: ../index.php");
    exit;
}

// Ambil data checkout
$nama    = $_POST['nama'] ?? '';
$alamat  = $_POST['alamat'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$email   = $_POST['email'] ?? '';
$metode  = $_POST['metode'] ?? '';
$total   = $_POST['total'] ?? 0;

// Simpan isi keranjang sebelum dihapus
$cart = $_SESSION['cart'];

// 🧹 Bersihkan keranjang & regenerasi sesi agar benar-benar kosong
unset($_SESSION['cart']);
session_regenerate_id(true);

// Tambahkan pesan sukses untuk Dashboard
$_SESSION['message'] = "✅ Pembayaran berhasil! Keranjangmu telah dikosongkan dan pesanan segera diproses.";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - BOOKStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container text-center my-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
        <div class="text-success mb-3">
            <i class="bi bi-check-circle-fill" style="font-size: 4rem;"></i>
        </div>
        <h3 class="fw-bold">Pembayaran Berhasil!</h3>
        <p class="text-muted">Terima kasih telah berbelanja di <strong>BOOKStore</strong></p>
        <hr>

        <div class="text-start">
            <h5>📦 Detail Pesanan</h5>
            <ul class="list-group mb-3">
                <?php foreach ($cart as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= htmlspecialchars($item['title']) ?> (x<?= $item['quantity'] ?>)
                        <span>Rp<?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h6>💰 Metode Pembayaran:</h6>
            <p class="fw-bold text-success"><?= htmlspecialchars($metode) ?></p>

            <div class="text-end">
                <h5>Total: <strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></h5>
            </div>
        </div>

        <hr>
        <p class="text-muted mb-4">
            Pesanan Anda akan segera diproses dan dikirim ke alamat yang telah Anda berikan.
        </p>

        <a href="./Dashboard.php" class="btn btn-dark">
            <i class="bi bi-house"></i> Kembali ke Beranda
        </a>
    </div>
</div>

</body>
</html>