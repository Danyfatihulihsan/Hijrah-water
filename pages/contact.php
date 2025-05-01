<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - HijrahWater</title>
    <link rel="stylesheet" href="../css/contact.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Feather Icons -->
  </head>
  <body class="<?php echo isset($_SESSION['username']) ? 'logged-in' : ''; ?>">
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <img src="../img/logo.jpg" alt="hijrahwater Logo" class="logo-image" />
        <a class="name">Hijrah Water</a>
      </div>
      <ul class="nav-list" id="nav-list">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../order.php">Order</a></li>
        <li><a href="../pages/about.php">About Us</a></li>
      </ul>
    </nav>

    <!-- Konten Halaman Contact -->
    <div class="container">
      <div class="login">
        <h1>Contact</h1>
        <hr />
        <form action="contact.php" method="post">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email" required />

          <label for="masukan">Masukan</label>
          <input type="text" name="masukan" id="masukan" placeholder="Ketik Masukan Anda" required />

          <button type="submit" name="kirim" class="btn">Kirim</button>
        </form>
      </div>

      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>
    </div>

    <script>
      feather.replace(); // Mengaktifkan Feather Icons
    </script>
    <script>
      // Toggle nav menu visibility on mobile
      const menuIcon = document.getElementById("menu-icon");
      const navList = document.getElementById("nav-list");

      menuIcon.addEventListener("click", () => {
        navList.classList.toggle("show");
      });

      // Hide 'Login' option if user is logged in
      const isLoggedIn = document.body.classList.contains("logged-in"); // Check if logged-in class is added
      if (isLoggedIn) {
        const loginLink = document.querySelector(".nav-list li:last-child"); // Assumes last item is 'Login'
        if (loginLink) {
          loginLink.style.display = "none";
        }
      }
    </script>
  </body>
</html>
