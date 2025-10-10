<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOKstore</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lordicon -->
  <script src="https://cdn.lordicon.com/lordicon.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background-color: #0d1b2a; /* warna dongker */
    }

    .nav-link {
      color: #fff !important;
      margin: 0 10px;
    }

    .nav-link:hover {
      color: #a29bfe !important; /* warna ungu muda */
    }

    .search-box input {
      border-radius: 20px;
      border: none;
      padding: 6px 15px;
    }

    .search-box input:focus {
      outline: none;
      box-shadow: 0 0 5px #a29bfe;
    }

    .keunggulan-icon {
      font-size: 40px;
      color: #a29bfe;
    }

    .section-title {
      color: #0d1b2a;
      font-weight: bold;
    }

    footer {
      background-color: #0d1b2a;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    .kategori-card, .buku-card {
      transition: transform 0.3s ease;
    }

    .kategori-card:hover, .buku-card:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark px-4">
    <a class="navbar-brand fw-bold text-uppercase" href="#">BOOKstore</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Katalog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kategori</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
      </ul>
    </div>

    <div class="d-flex align-items-center">
      <div class="search-box me-3">
        <input type="text" placeholder="Cari buku...">
      </div>
      <lord-icon
        src="https://cdn.lordicon.com/ljvjsnvh.json"
        trigger="hover"
        style="width:35px;height:35px">
      </lord-icon>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="carouselExample" class="carousel slide mt-2" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" class="d-block w-100" height="400" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" class="d-block w-100" height="400" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" class="d-block w-100" height="400" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Keunggulan -->
  <section class="container my-5 text-center">
    <h2 class="section-title mb-4">Keunggulan Kami</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <lord-icon src="https://cdn.lordicon.com/egiwmiit.json" trigger="hover" style="width:80px;height:80px"></lord-icon>
        <h5 class="mt-3">Buku Berkualitas</h5>
        <p>Kami menyediakan berbagai buku original dengan kualitas terbaik.</p>
      </div>
      <div class="col-md-4">
        <lord-icon src="https://cdn.lordicon.com/oezixobx.json" trigger="hover" style="width:80px;height:80px"></lord-icon>
        <h5 class="mt-3">Pengiriman Cepat</h5>
        <p>Pesanan Anda akan kami proses dan kirim dengan cepat.</p>
      </div>
      <div class="col-md-4">
        <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="hover" style="width:80px;height:80px"></lord-icon>
        <h5 class="mt-3">Harga Terjangkau</h5>
        <p>Kami menawarkan harga kompetitif untuk semua kalangan.</p>
      </div>
    </div>
  </section>

  <!-- Kategori Buku -->
  <section class="container my-5">
    <h2 class="section-title text-center mb-4">Kategori Buku</h2>
    <div class="row g-4 text-center">
      <div class="col-md-3">
        <div class="card kategori-card p-3 shadow-sm">
          <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="hover" style="width:70px;height:70px"></lord-icon>
          <h6 class="mt-2">Teknologi</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card kategori-card p-3 shadow-sm">
          <lord-icon src="https://cdn.lordicon.com/wxnxiano.json" trigger="hover" style="width:70px;height:70px"></lord-icon>
          <h6 class="mt-2">Bisnis</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card kategori-card p-3 shadow-sm">
          <lord-icon src="https://cdn.lordicon.com/nobciafz.json" trigger="hover" style="width:70px;height:70px"></lord-icon>
          <h6 class="mt-2">Novel</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card kategori-card p-3 shadow-sm">
          <lord-icon src="https://cdn.lordicon.com/yyecauzv.json" trigger="hover" style="width:70px;height:70px"></lord-icon>
          <h6 class="mt-2">Pendidikan</h6>
        </div>
      </div>
    </div>
  </section>

  <!-- Contoh Buku -->
  <section class="container my-5">
    <h2 class="section-title text-center mb-4">Rekomendasi Buku</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card buku-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e" class="card-img-top" alt="Buku 1">
          <div class="card-body text-center">
            <h6 class="card-title">Atomic Habits</h6>
            <p class="text-muted">Rp 120.000</p>
            <button class="btn btn-sm btn-primary">Beli</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card buku-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" class="card-img-top" alt="Buku 2">
          <div class="card-body text-center">
            <h6 class="card-title">Rich Dad Poor Dad</h6>
            <p class="text-muted">Rp 95.000</p>
            <button class="btn btn-sm btn-primary">Beli</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card buku-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1581091870622-3b5c5e9f8f5c" class="card-img-top" alt="Buku 3">
          <div class="card-body text-center">
            <h6 class="card-title">The Psychology of Money</h6>
            <p class="text-muted">Rp 110.000</p>
            <button class="btn btn-sm btn-primary">Beli</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card buku-card shadow-sm">
          <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" class="card-img-top" alt="Buku 4">
          <div class="card-body text-center">
            <h6 class="card-title">Deep Work</h6>
            <p class="text-muted">Rp 130.000</p>
            <button class="btn btn-sm btn-primary">Beli</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tentang -->
  <section class="container my-5 text-center">
    <h2 class="section-title mb-4">Tentang BOOKstore</h2>
    <p class="text-muted px-5">
      BOOKstore adalah platform penjualan buku online yang menyediakan berbagai macam buku dari berbagai kategori. 
      Kami berkomitmen untuk memberikan pengalaman belanja yang menyenangkan dan efisien dengan pelayanan terbaik.
    </p>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 BOOKstore | All Rights Reserved</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>