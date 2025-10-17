<?php
session_start();

// Jika menerima data JSON dari fetch (localStorage)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['cart'])) {
        $_SESSION['cart'] = $data['cart']; // Simpan ke session

        echo json_encode(['success' => true]);
        exit;
    } else {
        echo json_encode(['success' => false]);
        exit;
    }
}
// Jika tombol "Tambahkan ke Keranjang" ditekan
if (isset($_POST['add_to_cart'])) {
    $item = [
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    // tambahkan ke session cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $item;

    header("Location: checkout.php");
    exit;
}

// Hitung total belanja
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BOOKStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>

 <?php include './includes/navbar.php'; ?>


<div class="container my-5">
    <h2 class="fw-bold mb-4">🛍️ Checkout</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <div class="alert alert-info">Keranjang kamu masih kosong 😅</div>
        <a href="dashboard.php" class="btn btn-dark">Kembali ke Katalog</a>
    <?php else: ?>
        <div class="row">
            <!-- Keranjang -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Daftar Buku di Keranjang</h5>
                    </div>
                   <ul class="list-group list-group-flush">
                        <?php foreach ($_SESSION['cart'] as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="<?php echo $item['image']; ?>" 
                                        alt="<?php echo $item['title']; ?>" 
                                        width="50" class="rounded">
                                    <div>
                                        <strong><?php echo $item['title']; ?></strong><br>
                                        <small>Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></small>
                                    </div>
                                </div>
                                <span class="badge bg-secondary"><?php echo $item['quantity']; ?>x</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="card-footer text-end">
                        <h5>Total: <strong>Rp<?php echo number_format($total, 0, ',', '.'); ?></strong></h5>
                    </div>
                </div>
            </div>

            <!-- Form Data Penerima -->
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Data Penerima</h5>
                    </div>
                    <div class="card-body">
                        <form action="payment.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="text" name="telepon" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode Promo (Opsional)</label>
                                <input type="text" name="promo" class="form-control" placeholder="Masukkan kode promo jika ada">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">Lanjut ke Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php include '../Includes/footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/modalCheckout.js"></script>

</body>
</html>
