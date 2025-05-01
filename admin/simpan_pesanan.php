<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "air_biru"; // Ganti sesuai nama database kamu

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$orderId = $_POST['orderId'];
$name = $_POST['receiverName'];
$address = $_POST['receiverAddress'];
$phone = $_POST['receiverPhone'];
$payment = $_POST['paymentMethod'];

$sql = "INSERT INTO orders (order_id, receiver_name, receiver_address, receiver_phone, payment_method)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $orderId, $name, $address, $phone, $payment);

if ($stmt->execute()) {
  echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href='order.php';</script>";
} else {
  echo "Gagal menyimpan pesanan: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
