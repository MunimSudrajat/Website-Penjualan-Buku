<?php
session_start();

// Cegah akses langsung tanpa data
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart'])) {
    header("Location: ../index.php");
    exit;
}

$nama = $_POST['nama'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$email = $_POST['email'] ?? '';
$metode = $_POST['metode'] ?? '';
$total = $_POST['total'] ?? 0;

// Setelah pembayaran, bersihkan keranjang
$cart = $_SESSION['cart'];
unset($_SESSION['cart']);
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
<body>
<div class="container text-center my-5">
    <div class="card shadow-sm p-4">
        <div class="text-success mb-3">
            <i class="bi bi-check-circle-fill" style="font-size: 4rem;"></i>
        </div>
        <h3 class="fw-bold">Pembayaran Berhasil!</h3>
        <p class="text-muted">Terima kasih telah berbelanja di <strong>BOOKStore</strong></p>
        <hr>
        <h5 class="text-start">📦 Detail Pesanan</h5>
        <ul class="list-group mb-3 text-start">
            <?php foreach ($cart as $item): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= htmlspecialchars($item['title']) ?> (x<?= $item['quantity'] ?>)
                    <span>Rp<?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <h6 class="text-start">💰 Metode Pembayaran:</h6>
        <p class="fw-bold text-success text-start"><?= htmlspecialchars($metode) ?></p>

        <div class="text-end">
            <h5>Total: <strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></h5>
        </div>

        <hr>
        <p class="text-muted">Pesanan akan segera diproses dan dikirim ke alamat Anda.</p>
        <a href="./Dashboard.php" class="btn btn-dark mt-3"><i class="bi bi-house"></i> Kembali ke Beranda</a>
    </div>
</div>
</body>
</html>
