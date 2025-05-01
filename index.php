<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hijrah Water</title>
  <link rel="stylesheet" href="css/index.css" />
</head>
<body>
  <nav class="navbar">
    <div class="logo">
      <img src="img/logo.jpg" alt="Hijrah Water Logo" class="logo-image" />
      <a class="name">Hijrah Water</a>
    </div>
    <div class="menu-icon" id="menu-icon">&#9776;</div>
    <ul class="nav-list" id="nav-list">
      <li><a href="pages/about.php">About Us</a></li>
      <li><a href="pages/contact.php">Contact Us</a></li>
      <li><a href="admin/loginregister.php">Login</a></li>
    </ul>
  </nav>

  <div class="content">
    <h1>Selamat datang di Hijrah Water!</h1>
    <p>Kami menyediakan layanan isi ulang air minum berkualitas dan terpercaya.</p>

    <a href="produk.php" class="order-button">Pesan Sekarang</a>
  </div>
  <footer style="background-color: #003366; color: white; padding: 40px 20px; margin-top: 50px;">
  <div style="display: flex; flex-wrap: wrap; justify-content: space-between; max-width: 1200px; margin: auto;">
    
    <!-- Tentang Kami -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
      <h3>Hijrah Water</h3>
      <p>Hijrah Water adalah penyedia air minum isi ulang yang bersih, sehat, dan halal. Kami melayani area sekitar dengan profesional dan harga terjangkau.</p>
    </div>

    <!-- Layanan -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
      <h4>Layanan</h4>
      <ul style="list-style: none; padding: 0;">
        <li><a href="/products.php" style="color: #fff;">Lihat Produk</a></li>
        <li><a href="/order.php" style="color: #fff;">Pemesanan</a></li>
        <li><a href="/pages/about.php" style="color: #fff;">Tentang Kami</a></li>
        <li><a href="/pages/contact.php" style="color: #fff;">Kontak</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
      <h4>Kontak Kami</h4>
      <p>📍 Jl. Sehat No. 123, Kota Hijrah</p>
      <p>📞 0812-3456-7890</p>
      <p>✉️ hijrahwater@gmail.com</p>
    </div>

    <!-- Sosial Media -->
    <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
      <h4>Ikuti Kami</h4>
      <p>
        <a href="#" style="color: white; text-decoration: none;">Facebook</a><br>
        <a href="#" style="color: white; text-decoration: none;">Instagram</a><br>
        <a href="#" style="color: white; text-decoration: none;">WhatsApp</a>
      </p>
    </div>

  </div>

  <div style="text-align: center; margin-top: 20px; border-top: 1px solid #777; padding-top: 15px;">
    <p>&copy; <?= date('Y'); ?> Hijrah Water. All rights reserved.</p>
  </div>
</footer>

  
 
  </script>
</body>
</html>
