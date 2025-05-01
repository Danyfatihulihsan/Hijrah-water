<?php
session_start();
require_once '../config/koneksi.php';

// Validasi session admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    $nama = trim($_POST['nama']);
    $harga = (int)$_POST['harga'];
    
    // Validasi file upload
    if (empty($nama) || $harga <= 0) {
        $error = "Nama produk dan harga harus diisi dengan benar";
    } elseif (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != UPLOAD_ERR_OK) {
        $error = "Gambar produk harus diupload";
    } else {
        // Validasi tipe file
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['gambar']['type'];
        
        if (in_array($file_type, $allowed_types)) {
            // Generate nama file unik
            $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
            $gambar = uniqid('prod_') . '.' . $ext;
            $target_file = "../assets/products/" . $gambar;
            
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                // Gunakan prepared statement untuk mencegah SQL injection
                $stmt = $conn->prepare("INSERT INTO produk (nama_produk, gambar, harga) VALUES (?, ?, ?)");
                $stmt->bind_param("ssi", $nama, $gambar, $harga);
                
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Produk berhasil ditambahkan";
                    header("Location: produk.php");
                    exit;
                } else {
                    $error = "Gagal menyimpan data produk";
                    // Hapus file yang sudah diupload jika gagal menyimpan ke database
                    unlink($target_file);
                }
                $stmt->close();
            } else {
                $error = "Gagal mengupload gambar";
            }
        } else {
            $error = "Format gambar tidak didukung (hanya JPEG, PNG, GIF)";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Hijrah Water</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="admin-container">
        <h2>Tambah Produk</h2>
        
        <?php if (!empty($error)): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data" class="product-form">
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" id="harga" name="harga" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="gambar">Gambar Produk</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
                <small>Format: JPEG, PNG, GIF (Max 2MB)</small>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-submit">Simpan</button>
                <a href="produk.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>