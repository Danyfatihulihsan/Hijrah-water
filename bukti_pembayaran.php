<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "hijrahwater"; // Ganti sesuai nama database kamu

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$orderId = $_POST['orderId'];
$name = $_POST['receiverName'];
$address = $_POST['receiverAddress'];
$phone = $_POST['receiverPhone'];
$payment = $_POST['paymentMethod'];

// Menangani upload file jika metode pembayaran QRIS
$qrisReceipt = null;
if ($payment == 'QRIS' && isset($_FILES['qrisReceipt']) && $_FILES['qrisReceipt']['error'] == UPLOAD_ERR_OK) {
  $uploadDir = "uploads/"; // Direktori untuk menyimpan file
  $uploadFile = $uploadDir . basename($_FILES['qrisReceipt']['name']);
  if (move_uploaded_file($_FILES['qrisReceipt']['tmp_name'], $uploadFile)) {
    $qrisReceipt = $uploadFile; // Menyimpan path file
  } else {
    echo "Terjadi kesalahan saat mengupload bukti pembayaran.";
    exit();
  }
}

$sql = "INSERT INTO pemesanan (id_pesanan, nama_penerima, alamat_penerima, no_telepon, metode_pembayaran, bukti_qris)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $orderId, $name, $address, $phone, $payment, $qrisReceipt);

if ($stmt->execute()) {
  echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href='order.php';</script>";
} else {
  echo "Gagal menyimpan pesanan: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
