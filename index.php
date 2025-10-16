<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Bookstore Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&amp;display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
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
    }

    .nav-link:hover {
      color: #000;
    }

    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBGq-Zpsxm8PzEBUUu5Qq6bINQHHyjjEnrY5nL_c3WTl8_WpQNGx4lljkmFtt_h8GK4TJoWEZsjbkoNbWTq2C3WTlNWZ2k4IWQkiN3ZwWtY8aDf7IdBOM1F-khYLbvtt8QHfWSBD1wCMb8OMOMwz4PVJt_E1wZPE_hmIuxnSLtS6G_1szBrJIRsN94fV37ByHRSK8_pzbMZ7-F1n5buzGfpE7Zt1plbIsJH3aP1JVmTxadD-z7tjcKBZ1CncFchvXWl6vCtjqmEH7Q") center/cover no-repeat;
      color: #fff;
      padding: 10rem 0;
    }

    .hero-section h1 {
      font-weight: 900;
      font-size: 3.5rem;
      letter-spacing: -0.05em;
    }

    .hero-section p {
      font-size: 1.125rem;
    }

    .card {
      border: none;
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-img-top {
      aspect-ratio: 3 / 4;
      object-fit: cover;
      border-radius: 0.5rem;
    }

    .card-title {
      font-weight: 600;
    }

    .card-text {
      color: #6c757d;
    }

    .section-title {
      font-weight: 700;
    }

    .book-club-section {
      background-color: #f0f0f0;
      border-radius: 0.5rem;
    }

    .book-club-section h2 {
      font-weight: 900;
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

    .featured-books .card {
      min-width: 240px;
    }

    .featured-books .row {
      flex-wrap: nowrap;
      overflow-x: auto;
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .featured-books .row::-webkit-scrollbar {
      display: none;
    }

    .btn-primary {
      background-color: #000;
      border-color: #000;
      font-weight: 700;
      padding: 0.75rem 1.5rem;
    }

    .btn-primary:hover {
      background-color: #333;
      border-color: #333;
    }

    .btn-outline-dark {
      font-weight: 700;
    }

    .btn-light {
      background-color: rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 255, 255, 0.2);
      color: #fff;
      font-weight: 700;
    }

    .btn-light:hover {
      background-color: rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.3);
      color: #fff;
    }
  </style>
</head>

<body class="bg-light">
  
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <svg class="bi bi-book-fill me-2" fill="currentColor" height="24" viewBox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
        </svg>
        Bookstore
      </a>
      <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a aria-current="page" class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
        </ul>
          <div class="d-flex">
          <a href="pages/login.php" class="btn btn-outline-dark me-2">Sign In</a>
          <button class="btn btn-dark">
            <svg class="bi bi-search" fill="currentColor" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>
  
  <main>
    <section class="hero-section text-center">
      <div class="container">
        <h1 class="display-3 fw-bolder">Discover Your Next Great Read</h1>
        <p class="lead col-lg-8 mx-auto">Explore our curated collection of books, from timeless classics to the latest bestsellers. Find your next adventure today.</p>
        <button class="btn btn-light btn-lg mt-4">Shop Now</button>
      </div>
    </section>
    <section class="py-5 featured-books">
      <div class="container-fluid">
        <h2 class="section-title mb-4 px-3">Featured Books</h2>
        <div class="row pb-4">
          <div class="col">
            <div class="card h-100">
              <img alt="The Secret Garden" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdoBlKuoBDLLzCdktqWwp4RA9ujupK5sKuI9xbs1ZaHv7AdWQ5e55tyhKSaOHZvEfJLcbOWI0LkBDZcrurj4jzwrR---3-OpRJvAkaR26GNzLiukFdk04Q3nZ2uFhGxnhrqnxq6K5Ouo5DhVAkhZc92QI26ZSvK5JtYbH2ibHoW8UFtARXiAPzsdZI6-jgotKcrZ6qBASAzKvOsDrFT6F9GvnRto1NRUzPg3Jhja7PFuMv7o-l1FJ76Jil5bnhin64d896c0ytVvY" />
              <div class="card-body">
                <h5 class="card-title">The Secret Garden</h5>
                <p class="card-text">Frances Harper</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="The Great Escape" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzVoBLEAlW7w-x78CB6Ym30yuu91Zr6XmAd0CxWL65b98mX2EfjtNazpXJwwZAY-_R_GTl9cZE4LdtNhPflKAQqtH93D4w3mI3Sv1NMHYA4PzeYwr7wAbsZTvbs0ewQ8N4czmDBU1VFcpibzaU6EL2KVOqYxgcAtGBA1OUMnqVV6GQFrsdPyB_pkG02nZxh8-xgtkSx74iXcMete5Zsfwnw-4UM084lAjSzWOcBEy4WGgQGfCKQ_ir5slSj0jSCSfAqzYZuocAeMo" />
              <div class="card-body">
                <h5 class="card-title">The Great Escape</h5>
                <p class="card-text">Arthur Blake</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="The Silent Observer" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBiXxQbUzpll5uNzuSApdD0yTLekB8bSL9rj2FwH7jWSoNOpUJwet-Vg_T5AeOjlgIbjFRbO8x0cZ7XQgUP6sMJxmOiwaGGuHFhpI92_3HyOCdreslR2srDiMNe3D-8K6FBwxU7Oj8Xbkrrtcqi8tvlHd_STlVIS7WGmpFuN36C2hKCHlOIXG9kCQVFEtNhN_-DVwVlYYfeZwiaQTNzjQlrkhvMtOPRg7X-3QGG9EtGgp0DjQFMIMcAlOKY2LSJl9NyoYVoj0Fgp-c" />
              <div class="card-body">
                <h5 class="card-title">The Silent Observer</h5>
                <p class="card-text">Olivia Reed</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="The Last Voyage" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_kQek_1y7WDU1m7hJUo-EQYohp7YTVhAYVoZFxW-xDPuL5ahdN8Vk7Eqy6qUj477auvRDPcYg_0cMmiUMM2UtMqJi5wLlYo6kr69fTnZcemgvxSQ7kb14D3Y5NhsJ_OnxNFCev7MTQjMS2LCtSd1WvNe5Z0e-LF_TFL3Jx1CM6R3cQ8MrwQqIFaLoQhSARD1OrW2UJw0Q1If-qARLXWbG4GAv4Vc_Hze0QhhXDeyWdFd2B3Y8u4fqlnTJJdg8qObErAt7fy_SKWs" />
              <div class="card-body">
                <h5 class="card-title">The Last Voyage</h5>
                <p class="card-text">Ethan Cole</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="The Secret Garden" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdoBlKuoBDLLzCdktqWwp4RA9ujupK5sKuI9xbs1ZaHv7AdWQ5e55tyhKSaOHZvEfJLcbOWI0LkBDZcrurj4jzwrR---3-OpRJvAkaR26GNzLiukFdk04Q3nZ2uFhGxnhrqnxq6K5Ouo5DhVAkhZc92QI26ZSvK5JtYbH2ibHoW8UFtARXiAPzsdZI6-jgotKcrZ6qBASAzKvOsDrFT6F9GvnRto1NRUzPg3Jhja7PFuMv7o-l1FJ76Jil5bnhin64d896c0ytVvY" />
              <div class="card-body">
                <h5 class="card-title">The Secret Garden</h5>
                <p class="card-text">Frances Harper</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <div class="container">
        <h2 class="section-title mb-4">New Arrivals</h2>
        <div class="row row-cols-2 row-cols-md-4 g-4">
          <div class="col">
            <div class="card h-100">
              <img alt="Whispers of the Past" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0wztpovdBoO55nngNtn5No9Qo-Jnu0VUyM30cmDLOvYsuR7yD2YKKKuaT6XzMglEy_6QjBsBdwCff3XeTL773YdE38HANevH8DelO_lehaM0uG1XbJOE96O7_SFdgPHQ-2JR8sKzBY_O5cz6iKQLh1neJVty7M3V2vp-8Rh3xJ-XmFuZhNRGTC7C0hoQRW7T_3oDxw2Bl6TU7dJg7UqpY2msR13b1t8XWZuChKHigIqRQTZppIU1FqgJqH7s-jrO9MAdEeZuFdi4" />
              <div class="card-body">
                <h5 class="card-title">Whispers of the Past</h5>
                <p class="card-text">A historical fiction novel by Clara Bennett</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="Echoes of Tomorrow" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDY_krqNBaDOzJr6Xr8Vyu4CYasxzIOeF4hk9i1059_ZIv6SJ6qUntMGM9QBv95srVx9JRP5n20MCJb6ImOhPs82I3vQjnASPrScIXNFRyGmmIM8zMrzCfc5MOvqOLi0cj6ANQfUxeNQcdAeOrVlLsHmy3K4XJbf0MGn-abypqAbzZPbVUb6ZTA1dKP1DG81dj-ONDU-M44zPCRxWrU-HD-h3moSrwHvn1-XH5aTdHcFNAR67dJoLLQcQjNF_Uyylnw7aLfzzIsBH0" />
              <div class="card-body">
                <h5 class="card-title">Echoes of Tomorrow</h5>
                <p class="card-text">A science fiction thriller by Daniel Hayes</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="The Forgotten Path" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBao9VMvcbeyvWmGv27ATK7DPgOM-Z4CGRvv9xB8PEozdJQCmfSijDDZrxFFDCk5piB0sLc3daI6rf0yQOhuwFnuI0MhSufZbtgxJsv_Ocfwpyo66VCvmqXnDl-Tc1FprbiTauoJ6lqq0nXN9_nwo-AvC2ivGIL_JFwwjLflYGnz53Sz0jZ3kwJhxOJ6lrDcysw4pPVLO_om_rcaMTrI11S5GoRxHYwNGJF2oy7oRSnTqiqWT5GeIHaBWuDolQ2BVSfIMwT8OOspBE" />
              <div class="card-body">
                <h5 class="card-title">The Forgotten Path</h5>
                <p class="card-text">An adventure novel by Sophia Carter</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img alt="Beneath the Silent Stars" class="card-img-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzRqV3PiA_wNsF2cpAHbi7d1t1NNPVlPqzzC0_I93k2MVgaVx771yLurYJiiFnwhlLTKiXmRPNOnsWF6qVbyDlkFGreC7kvlwFie-Df9YSLI8YS6VtuQUZBmI5XAsyYuBRBOfFAPJZyKuX2KOIWHDGAgeBDjxHS5l7YDdOpDAkTJlPClcwhPr5s3kQZpuakHGW2rqKwNL-IttdTWmHkD6SJakNOQAHUuZJPUeA6HJrhBc1MRlMMzvmypYrGSlS8Qc8IxvqkzpgyGk" />
              <div class="card-body">
                <h5 class="card-title">Beneath the Silent Stars</h5>
                <p class="card-text">A romance novel by Noah Parker</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <div class="container">
        <div class="p-5 text-center book-club-section">
          <h2 class="display-5">Join Our Book Club</h2>
          <p class="lead col-lg-8 mx-auto">Get exclusive access to new releases, author interviews, and special offers.</p>
          <button class="btn btn-primary btn-lg mt-4">Join Now</button>
        </div>
      </div>
    </section>
  </main>
  
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>