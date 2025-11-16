<?php
include 'koneksi.php';

if (isset($_POST['btn_register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirmpassword'];

    if ($password == $confirm) {
        $cek = $koneksi->query("SELECT * FROM users WHERE username='$username'");
        if ($cek->num_rows > 0) {
             echo "<script>alert('Username sudah ada!');</script>";
        } else {
            $sql = "INSERT INTO users (username, password, nama_lengkap) VALUES ('$username', '$password', '$fullname')";
            if ($koneksi->query($sql) === TRUE) {
                echo "<script>alert('Daftar berhasil! Silakan login.'); document.location.href='login.php';</script>";
            } else {
                echo "Error: " . $koneksi->error;
            }
        }
    } else {
        echo "<script>alert('Konfirmasi password tidak sama!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .img-side {
      height: 100%;
      width: 100%;
      object-fit: cover;
      object-position: center;
    }
  </style>
</head>

<body>

  <div class="card" style="max-width: 100%; width: 100%;">
    <div class="row g-0">
      <div class="col-md-5 d-none d-md-block">
        <img src="film.jpg" alt="Film Roll" class="img-side rounded-start">
      </div>

      <div class="col-md-7">
        <div class="card-body p-4 p-md-5">

          <h2 class="fw-bold text-custom-dark mb-0">Register</h2>
          <p class="text-muted mb-4">Isi semua data dengan benar</p>

          <form action="" method="POST">
            <label for="fullname" class="form-label text-muted">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>

            <label for="username" class="form-label text-muted">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>

            <label for="password" class="form-label text-muted">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>

            <label for="confirmpassword" class="form-label text-muted">Konfirmasi Password</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>


            <button type="submit" name="btn_register" class="btn btn-primary">Register</button>
            <a href="login.php" class="btn btn-secondary" role="button">Kembali</a>


            <small class="text-muted">Sudah punya akun? <a href="login.php"
                class="text-decoration-none text-custom-dark fw-bold">Login di sini</a></small>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>