<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/loginregister.css" />
    <title>Hijrah Water Delivery | LOGIN REGISTRASI</title>
  </head>

  <body>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action="register.php" method="post">
          <h1>Registrasi</h1>
          <div class="social-icons">
            <a href="https://www.instagram.com/" class="icon"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://web.facebook.com/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.youtube.com/" class="icon"><i class="fa-brands fa-youtube"></i></a>
          </div>
          <span>or use your email for registeration</span>
          <input type="text" name="id" placeholder="Id" required />
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="register">Daftar</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form action="../order.php" method="post">
          <h1>Login</h1>
          <div class="social-icons">
            <a href="https://www.instagram.com/" class="icon"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://web.facebook.com/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.youtube.com/" class="icon"><i class="fa-brands fa-youtube"></i></a>
          </div>
          <span>or use your email password</span>
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="login">Login</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Selamat Datang Kembali!</h1>
            <p>Silahkan Login Untuk Mengakses Hijrah Water Delivery</p>
            <button class="hidden" id="login">Sign In</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Selamat Datang!</h1>
            <p>Silahkan Mengisi Data Untuk Mengakses Hijrah Water Delivery</p>
            <button class="hidden" id="register">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    
    <script src="../js/loginregister.js"></script>
  </body>
</html>
