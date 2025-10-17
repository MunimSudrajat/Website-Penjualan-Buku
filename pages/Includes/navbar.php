  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top">
      <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="Dashboard.php">
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
                  <!-- <li class="nav-item"><a class="nav-link" href="../category.php">Kategori</a></li> -->
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Kategori
                      </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Komik</a></li>
                          <li><a class="dropdown-item" href="#">Keuangan</a></li>
                          <li><a class="dropdown-item" href="#">Pendidikan</a></li>
                          <li><a class="dropdown-item" href="#">Novel</a></li>
                      </ul>
                  </li>
              </ul>

              <!-- Search Bar -->
              <form class="d-flex me-3" role="search">
                  <input class="form-control me-2" type="search" placeholder="Cari buku..." aria-label="Search" style="width: 500px;">
                  <button class="btn btn-outline-dark" type="submit">
                      <i class="bi bi-search"></i>
                  </button>
              </form>

              <!-- Icon Keranjang dan User -->
              <div class="d-flex align-items-center gap-2">
                  <!-- Icon Keranjang -->
                  <!-- Icon Keranjang di Navbar -->
                  <a href="#" class="btn btn-outline-dark position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                      <i class="bi bi-cart3"></i>
                      <span id="cart-count"
                          class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger small">0</span>
                  </a>


                  <!-- Dropdown User -->
                  <div class="dropdown">
                      <button class="btn btn-link text-dark text-decoration-none dropdown-toggle" type="button"
                          id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-person-circle fs-5"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                          <li><a class="dropdown-item" href="../profil.php">Profil</a></li>
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

  <!-- Modal Keranjang -->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title fw-bold" id="cartModalLabel">🛒 Keranjang Belanja</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <ul id="cart-items" class="list-group mb-3"></ul>
                  <p class="fw-bold text-end">Total: Rp<span id="cart-total">0</span></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-dark" id="checkout-btn">Lanjut ke Checkout</button>

              </div>
          </div>
      </div>
  </div>