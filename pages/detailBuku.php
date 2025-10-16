<?php

// Ambil ID dari URL (contoh: detailBuku.php?id=2)
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Baca data dari file JSON
$bukuData = json_decode(file_get_contents('../data/buku.json'), true);

// Cari buku dengan ID yang sesuai
$bukuTerpilih = null;
foreach ($bukuData as $buku) {
  if ($buku['id'] === $id) {
    $bukuTerpilih = $buku;
    break;
  }
}

// Jika tidak ditemukan, tampilkan pesan error
if (!$bukuTerpilih) {
  echo "<div style='text-align:center; padding:50px; font-family:Poppins, sans-serif;'>
          <h2>Buku tidak ditemukan!</h2>
          <a href='../index.php' style='color:#0d1b2a; text-decoration:none;'>← Kembali ke halaman utama</a>
        </div>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($bukuTerpilih['judul']) ?> | BOOKstore</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/footer.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .book-detail {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 30px;
      margin-top: 40px;
    }

    .book-image {
      border-radius: 10px;
      width: 100%;
      object-fit: cover;
    }

    .book-title {
      color: #0d1b2a;
      font-weight: 600;
    }

    .book-info span {
      font-weight: 600;
      color: #0d1b2a;
    }

    .btn-primary {
      background-color: #0d1b2a;
      border: none;
    }

    .btn-primary:hover {
      background-color: #1b263b;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
   <?php include '../Includes/navbar.php'; ?>


  <!-- Detail Buku -->
 <div class="container">
  <!-- Tombol Kembali -->
  <div class="mb-3">
    <button class="btn btn-outline-secondary" onclick="history.back()">
      <i class="bi bi-arrow-left"></i> Kembali
    </button>
  </div>

  <div class="book-detail row align-items-center">
    <div class="col-md-4 mb-3 mb-md-0">
      <img src="<?= htmlspecialchars($bukuTerpilih['gambar']) ?>" 
           alt="<?= htmlspecialchars($bukuTerpilih['judul']) ?>" 
           class="book-image">
    </div>
    <div class="col-md-8">
      <h2 class="book-title"><?= htmlspecialchars($bukuTerpilih['judul']) ?></h2>
      <div class="book-info mt-3">
        <p><span>Penulis:</span> <?= htmlspecialchars($bukuTerpilih['penulis']) ?></p>
        <?php if (isset($bukuTerpilih['penerbit'])): ?>
          <p><span>Penerbit:</span> <?= htmlspecialchars($bukuTerpilih['penerbit']) ?></p>
        <?php endif; ?>
        <?php if (isset($bukuTerpilih['tahun'])): ?>
          <p><span>Tahun Terbit:</span> <?= htmlspecialchars($bukuTerpilih['tahun']) ?></p>
        <?php endif; ?>
        <p><span>Harga:</span> Rp <?= number_format($bukuTerpilih['harga'], 0, ',', '.') ?></p>
      </div>
      <hr>
      <h5>Deskripsi:</h5>
      <p><?= htmlspecialchars($bukuTerpilih['deskripsi']) ?></p>
      <button class="btn btn-primary mt-3" onclick="window.location.href='Checkout.php'">
        Beli Sekarang
      </button>
    </div>
  </div>
</div>


   <!-- footer start-->
   <?php include '../includes/footer.php'; ?>

    <!-- footer end -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/modalCheckout.js"></script>

</body>
</html>