<?php
session_start();

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
        $total += $item['price'];
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
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="../index.php">
            <svg class="bi bi-book-fill me-2" fill="currentColor" height="24" viewBox="0 0 16 16" width="24"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z">
                </path>
            </svg>
            BOOKStore
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Katalog</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pesanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Favorit</a></li>
            </ul>

            <!-- Search Bar -->
            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari buku..." aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <!-- Icon Keranjang dan User -->
            <div class="d-flex align-items-center gap-2">
                <!-- Icon Keranjang -->
                <a href="checkout.php" class="btn btn-outline-dark position-relative">
                    <i class="bi bi-cart3"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger small">2</span>
                </a>

                <!-- Dropdown User -->
                <div class="dropdown">
                    <button class="btn btn-link text-dark text-decoration-none dropdown-toggle" type="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

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
                                    <img src="../assets/images/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" width="50" class="rounded">
                                    <div>
                                        <strong><?php echo $item['title']; ?></strong><br>
                                        <small>Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></small>
                                    </div>
                                </div>
                                <span class="badge bg-secondary">1x</span>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
