<?php
session_start();
// Validasi session dan role
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Hijrah Water</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="admin-container">
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h2>
        <div class="admin-menu">
            <ul>
                <li><a href="produk.php">Kelola Produk</a></li>
                <li><a href="pesanan.php">Data Pesanan</a></li>
                <li><a href="kontak.php">Pesan Pengunjung</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            </ul>
        </div>
    </div>
</body>
</html>