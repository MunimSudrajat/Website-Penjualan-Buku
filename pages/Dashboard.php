<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// array data buku (contoh dummy)
$books = [
    [
        "id" => 1,
        "title" => "Belajar PHP untuk Pemula",
        "author" => "Fajar Rahman",
        "price" => 85000,
        "image" => "https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/gprexnl69l.jpg",
        "description" => "Panduan lengkap belajar bahasa pemrograman PHP dari dasar hingga mahir."
    ],
    [
        "id" => 2,
        "title" => "Algoritma dan Pemrograman",
        "author" => "Rina Santoso",
        "price" => 99000,
        "image" => "https://cdn.gramedia.com/uploads/items/9786021514917_algoritma-dan-pemrograman-dalam-bahasa-pascal_-c_-dan-c_-edisi-keenam.jpg",
        "description" => "Pelajari logika dan algoritma pemrograman secara sistematis dan mudah dipahami."
    ],
    [
        "id" => 3,
        "title" => "Desain Web Modern",
        "author" => "Andi Kurniawan",
        "price" => 125000,
        "image" => "https://ebooks.gramedia.com/ebook-covers/30922/big_covers/GRAMEDIANA98280_B.jpg",
        "description" => "Buku ini membahas HTML, CSS, dan Bootstrap untuk membangun website modern."
    ],
    [
        "id" => 4,
        "title" => "Artificial Intelligence Dasar",
        "author" => "Siti Handayani",
        "price" => 150000,
        "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq7teMiC5QVizL9GibX3weTRIVSsTj-EVdQA&s",
        "description" => "Pengenalan konsep dasar kecerdasan buatan dan penerapannya di dunia nyata."
    ]
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | BOOKStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #343a40;
            font-weight: 500;
            margin: 0 0.5rem;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #000;
        }
        .navbar .form-control {
            border-radius: 50px;
            padding-left: 15px;
        }

        .navbar .btn-outline-dark {
            border-radius: 50px;
        }

        .navbar .bi-cart3 {
            font-size: 1.2rem;
        }

        .navbar .badge {
            font-size: 0.65rem;
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

        .footer {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .footer a {
            color: #6c757d;
            text-decoration: none;
        }

        .footer a:hover {
            color: #000;
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


    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">📚 Daftar Buku</h2>
        <div class="row">
            <?php foreach ($books as $book): ?>
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="../assets/images/<?php echo $book['image']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $book['title']; ?></h5>
                            <p class="text-muted mb-1"><?php echo $book['author']; ?></p>
                            <p class="fw-bold mb-2">Rp<?php echo number_format($book['price'], 0, ',', '.'); ?></p>
                            <a href="detail_buku.php?id=<?php echo $book['id']; ?>" class="btn btn-dark mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- footer start-->
    <footer class="py-5 footer">
        <div class="container text-center">
        <ul class="nav justify-content-center pb-3 mb-3">
            <li class="nav-item"><a class="nav-link px-2" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link px-2" href="#">Privacy Policy</a></li>
            <li class="nav-item"><a class="nav-link px-2" href="#">Terms of Service</a></li>
        </ul>
        <div class="d-flex justify-content-center gap-4 mb-4">
            <a href="#">
            <svg class="bi bi-twitter" fill="currentColor" height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.142 0-.282-.008-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
            </svg>
            </a>
            <a href="#">
            <svg class="bi bi-instagram" fill="currentColor" height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.703.01 5.556 0 5.829 0 8s.01 2.444.048 3.297c.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.556 15.99 5.829 16 8 16s2.444-.01 3.297-.048c.852-.04 1.433-.174 1.942-.372.526-.205.972-.478 1.417-.923.445-.444.718-.891.923-1.417.198-.51.333-1.09.372-1.942C15.99 10.444 16 10.171 16 8s-.01-2.444-.048-3.297c-.04-.852-.174-1.433-.372-1.942a3.916 3.916 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.942-.372C10.444.01 10.171 0 8 0zm0 1.442c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.282.24.705.275 1.485.039.843.047 1.096.047 3.232s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.232s.008-2.389.046-3.232c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.843-.038 1.096-.047 3.232-.047zM8 4.938a3.062 3.062 0 1 0 0 6.125 3.062 3.062 0 0 0 0-6.125zm0 4.687a1.625 1.625 0 1 1 0-3.25 1.625 1.625 0 0 1 0 3.25zm4.938-5.733a.938.938 0 1 0-1.876 0 .938.938 0 0 0 1.876 0z"></path>
            </svg>
            </a>
            <a href="#">
            <svg class="bi bi-facebook" fill="currentColor" height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0 0 3.603 0 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
            </svg>
            </a>
        </div>
        <p class="text-muted">© 2024 Bookstore. All rights reserved.</p>
        </div>
    </footer>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>