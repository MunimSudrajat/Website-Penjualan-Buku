<!-- includes/music.php -->
<audio id="bg-music" autoplay loop>
  <source src="../assets/music/background.mp3" type="audio/mpeg">
  Browser kamu tidak mendukung audio.
</audio>

<script>
  // Volume diatur agar tidak terlalu keras
  const music = document.getElementById("bg-music");
  music.volume = 0.3; // 0.0 = senyap, 1.0 = maksimal

  // Beberapa browser butuh interaksi user dulu, jadi kita atasi:
  document.addEventListener("click", () => {
    if (music.paused) music.play();
  });
</script>