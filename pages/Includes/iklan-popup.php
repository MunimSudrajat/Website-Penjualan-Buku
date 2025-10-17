<!-- includes/iklan-popup.php -->
<div id="popup-iklan">
  <div class="iklan-box">
    <span class="close-btn" onclick="tutupIklan()">✖</span>
    <img src="../assets/img/iklan-gramedia.jpg" alt="Iklan Buku Gramedia">
    <h2>Promo Spesial Buku Gramedia!</h2>
    <p>Dapatkan diskon hingga <b>50%</b> untuk berbagai kategori buku menarik minggu ini.  
    Klik tombol di bawah untuk melihat koleksinya!</p>
    <a href="https://www.gramedia.com" target="_blank" class="btn-iklan">Lihat Sekarang</a>
  </div>
</div>

<script>
  // Tampilkan popup otomatis 2 detik setelah halaman dibuka
  window.onload = function() {
    setTimeout(() => {
      document.getElementById("popup-iklan").style.display = "flex";
    }, 2000);
  };

  // Fungsi menutup popup
  function tutupIklan() {
    document.getElementById("popup-iklan").style.display = "none";
  }
</script>

<style>
  /* Background gelap transparan */
  #popup-iklan {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  /* Kotak iklan */
  .iklan-box {
    background: #fff;
    width: 90%;
    max-width: 500px;
    padding: 25px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);
    position: relative;
    animation: popupAnim 0.4s ease;
  }

  /* Gambar iklan */
  .iklan-box img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
  }

  /* Tombol tutup */
  .close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    background: #ff3b3b;
    color: #fff;
    border-radius: 50%;
    cursor: pointer;
    padding: 5px 10px;
    font-weight: bold;
    font-size: 16px;
  }

  /* Tombol aksi */
  .btn-iklan {
    display: inline-block;
    background: #ffffff;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 8px;
    margin-top: 10px;
    transition: background 0.3s ease;
  }

  .btn-iklan:hover {
    background: #0056b3;
  }

  /* Animasi muncul */
  @keyframes popupAnim {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }
</style>