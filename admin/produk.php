<?php
session_start();
include '../config/koneksi.php';

// Validasi session admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        img { max-width: 80px; height: auto; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .action-links a { margin-right: 5px; }
        .header-links { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Data Produk</h2>
    <div class="header-links">
        <a href="index.php">Kembali ke Dashboard</a> | 
        <a href="tambah_produk.php">Tambah Produk</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                <td><img src="../assets/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>"></td>
                <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td class="action-links">
                    <a href="edit_produk.php?id=<?= $row['id_produk'] ?>">Edit</a> |
                    <a href="hapus_produk.php?id=<?= $row['id_produk'] ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>