<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order - HijrahWater</title>
    <link rel="stylesheet" href="css/order.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <img src="../img/logo.jpg" alt="Hijrah Water Logo" class="logo-image" />
        <a class="name">HijrahWater</a>
      </div>
      <ul class="nav-list" id="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="pages/about.php">About Us</a></li>
        <li><a href="pages/contact.php">Contact</a></li>
      </ul>
    </nav>

    <!-- Form Pemesanan -->
    <div class="content">
      <h1>Form Pemesanan Isi Ulang/Galon</h1>

      <form id="orderForm" method="POST" action="bukti_pembayaran.php">
        <label for="orderId">ID:</label>
        <input type="text" id="orderId" name="orderId" required />

        <label for="receiverName">Nama Penerima:</label>
        <input type="text" id="receiverName" name="receiverName" required />

        <label for="receiverAddress">Alamat Penerima:</label>
        <input type="text" id="receiverAddress" name="receiverAddress" required />

        <label for="receiverPhone">Nomor Telepon:</label>
        <input type="tel" id="receiverPhone" name="receiverPhone" required />

        <label for="paymentMethod">Metode Pembayaran:</label>
        <select id="paymentMethod" name="paymentMethod" required onchange="toggleQRField()">
          <option value="">-- Pilih --</option>
          <option value="Cash">Cash</option>
          <option value="Debit">Debit</option>
          <option value="QRIS">QRIS</option>
        </select>

        <!-- Upload Bukti Pembayaran, hanya tampil jika pilih QRIS -->
        <div id="qrisUpload" style="display:none;">
          <label for="qrisReceipt">Upload Bukti Pembayaran (QRIS):</label>
          <input type="file" id="qrisReceipt" name="qrisReceipt" accept="image/*" />
          <img id="qrisImage" src="" alt="QRIS Payment" style="display:none; max-width: 200px; margin-top: 10px;" />
        </div>

        <button type="submit">Pesan</button>
      </form>

      <h2>Riwayat Pemesanan</h2>
      <ul id="orderHistory"></ul>
    </div>

    <!-- JavaScript untuk menangani tampilan dan upload QRIS -->
    <script>
      function toggleQRField() {
        const paymentMethod = document.getElementById('paymentMethod').value;
        const qrisField = document.getElementById('qrisUpload');
        const qrisImage = document.getElementById('qrisImage');
        
        if (paymentMethod === 'QRIS') {
          qrisField.style.display = 'block'; // Tampilkan upload QRIS
        } else {
          qrisField.style.display = 'none'; // Sembunyikan upload QRIS
          qrisImage.style.display = 'none'; // Sembunyikan gambar QRIS jika tidak diperlukan
        }
      }

      // Fungsi untuk menampilkan gambar QRIS jika sudah diupload
      document.getElementById('qrisReceipt').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('qrisImage').style.display = 'block';
            document.getElementById('qrisImage').src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    </script>
  </body>
</html>
