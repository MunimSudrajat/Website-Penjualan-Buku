<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Ambil data buku dari JSON
$dataFile = '../data/buku.json';
$books = [];

if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $books = json_decode($jsonData, true);
}

// --- Pagination setup ---
$perPage = 10; // jumlah buku per halaman
$totalBooks = count($books);
$totalPages = ceil($totalBooks / $perPage);

// Halaman saat ini
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;
if ($currentPage > $totalPages) $currentPage = $totalPages;

// Hitung indeks awal data yang ditampilkan
$startIndex = ($currentPage - 1) * $perPage;

// Ambil subset buku untuk halaman ini
$booksToShow = array_slice($books, $startIndex, $perPage);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | BOOKStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
   <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }


        .main-content {
            padding: 2rem;
        }

        .welcome-section {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-text h2 {
            font-weight: 700;
            color: #000;
            margin-bottom: 0.5rem;
        }

        .welcome-text p {
            color: #6c757d;
            margin: 0;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .user-info-box {
            text-align: right;
        }

        .user-info-box .username {
            font-weight: 600;
            color: #000;
            display: block;
            margin-bottom: 0.25rem;
        }

        .user-info-box .member-date {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .logout-btn {
            background-color: #000;
            border-color: #000;
            color: #fff;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #333;
            border-color: #333;
        }

        .dashboard-card {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 1.5rem;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .icon-blue {
            background-color: rgba(30, 64, 175, 0.1);
            color: #1e40af;
        }

        .icon-green {
            background-color: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .icon-purple {
            background-color: rgba(147, 51, 234, 0.1);
            color: #9333ea;
        }

        .icon-orange {
            background-color: rgba(249, 115, 22, 0.1);
            color: #f97316;
        }

        .card-title {
            font-weight: 600;
            color: #000;
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: #000;
        }

        .card-subtitle {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: #000;
        }

        .table-container {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .table th {
            border: none;
            font-weight: 600;
            color: #343a40;
            padding: 1rem;
        }

        .table td {
            border: none;
            padding: 1rem;
            color: #343a40;
            border-bottom: 1px solid #e9ecef;
        }

        .badge {
            padding: 0.35rem 0.65rem;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-success {
            background-color: rgba(34, 197, 94, 0.2);
            color: #15803d;
        }

        .badge-warning {
            background-color: rgba(249, 115, 22, 0.2);
            color: #b45309;
        }

        .badge-danger {
            background-color: rgba(239, 68, 68, 0.2);
            color: #b91c1c;
        }

        .icon-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }
        .icon-btn i {
            font-size: 1.5rem; /* ukuran ikon */
        }

        @media (max-width: 768px) {
            .welcome-section {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }

            .user-section {
                flex-direction: column;
            }

            .user-info-box {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
  <?php include './Includes/navbar.php'; ?>


    <!-- Main Content -->
 <div class="container mt-5">
    <h2 class="mb-4 fw-bold">📚 Daftar Buku</h2>
    <div class="row">
        <?php if (!empty($booksToShow)): ?>
            <?php foreach ($booksToShow as $book): ?>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="<?php echo $book['gambar']; ?>" class="card-img-top" alt="<?php echo $book['judul']; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $book['judul']; ?></h5>
                            <p class="text-muted mb-1"><?php echo $book['penulis']; ?></p>
                            <p class="fw-bold mb-2">Rp<?php echo number_format($book['harga'], 0, ',', '.'); ?></p>

                            <!-- Tombol ikon di bawah -->
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-auto">
                                <!-- Tombol detail -->
                                <a href="detailBuku.php?id=<?php echo $book['id']; ?>" 
                                   class="btn btn-outline-dark btn-sm d-flex align-items-center justify-content-center icon-btn"
                                   title="Lihat Detail">
                                    <i class="bi bi-eye fs-4"></i>
                                </a>

                                <!-- Tombol tambah ke keranjang -->
                             <button 
                                class="btn btn-dark btn-sm d-flex align-items-center justify-content-center icon-btn" 
                                title="Tambah ke Keranjang" 
                                data-id="<?php echo $book['id']; ?>"
                                data-title="<?php echo htmlspecialchars($book['judul']); ?>"
                                data-price="<?php echo $book['harga']; ?>"
                                onclick="tambahKeKeranjang(<?php echo $book['id']; ?>)">
                                <i class="bi bi-cart-plus fs-4"></i>
                            </button>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada data buku yang tersedia.</p>
        <?php endif; ?>
    </div>

     <!-- =======================
         PAGINATION NAVIGATION
    ======================= -->
    <?php if ($totalPages > 1): ?>
        <nav aria-label="Navigasi halaman buku">
            <ul class="pagination justify-content-center mt-4">
                <!-- Tombol Sebelumnya -->
                <li class="page-item <?php if ($currentPage <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">← Sebelumnya</a>
                </li>

                <!-- Nomor Halaman -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Tombol Berikutnya -->
                <li class="page-item <?php if ($currentPage >= $totalPages) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Berikutnya →</a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>


    <!-- footer start-->
   <?php include 'includes/footer.php'; ?>


    <!-- footer end -->
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function tambahKeKeranjang(id) {
        alert("Buku dengan ID " + id + " telah ditambahkan ke keranjang!");
    }

    function tambahKeKeranjang(id) {
     alert("Buku dengan ID " + id + " telah ditambahkan ke keranjang!");
    }
    </script>

    <script src="../assets/js/modalCheckout.js"></script>
</body>

</html>