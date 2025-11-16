<?php
session_start();
include 'koneksi.php';

if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        
        echo "<script>alert('Login Berhasil!'); document.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Login gagal! Username atau Password salah.');</script>";
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
            <div class="row g-0"> <div class="col-md-5 d-none d-md-block">
                    <img src="film.jpg" alt="Film Roll" class="img-side rounded-start">
                </div>
                
                <div class="col-md-7">
                    <div class="card-body p-4 p-md-5">
                        
                        <h2 class="fw-bold text-custom-dark mb-0">Login</h2>
                        <p class="text-muted mb-4">Masukan usernamem dan password</p>
                        
                        <form action="" method="POST">
                            <label for="username" class="form-label text-muted">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>

                            <label for="password" class="form-label text-muted">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>

                            <button type="submit" name="btn_login" style="margin-top: 20px;" class="btn btn-primary">Login</button>

                            <p class="text-muted">Belum punya akun? <a href="register.php" class="text-decoration-none text-custom-dark fw-bold">Daftar di sini</a></small>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>