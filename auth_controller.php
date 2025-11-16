<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirmpassword'];


    if ($password !== $confirm) {
        echo "<script>alert('Konfirmasi password tidak cocok!'); window.location='register.php';</script>";
        exit;
    }


    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Username sudah terdaftar!'); window.location='register.php';</script>";
        exit;
    }



    $query = "INSERT INTO users (nama_lengkap, username, password) VALUES ('$nama', '$username', '$password')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $query  = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
    
        if ($password === $row['password']) {
        
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            
            header("Location: index.php");
            exit;
        }
    }


    echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
}
?>