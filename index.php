<?php
session_start();
include 'koneksi.php';

// Simulasi Login (Biar nama lu muncul kayak di screenshot)
// Nanti kalau udah ada sistem login beneran, baris ini dihapus.

// Ambil data film dari database
$query = "SELECT * FROM film";
$result = mysqli_query($koneksi, $query);

// Variabel buat nampung total harga
$total_harga = 0;

if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Anda belum login!');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$query = "SELECT * FROM film";
$result = mysqli_query($koneksi, $query);

// Variabel buat nampung total harga
$total_harga = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Film Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-header-dark {
            background-color: #2c3e50; 
            color: white;
        }
        .navbar-custom {
            background-color: #2c3e50;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark navbar-custom p-3 mb-4">
        <div class="container">
            <div>
                <h3 class="mb-0 text-white fw-bold">Manajemen Film Bioskop</h3>
                <small class="text-white">
                    Selamat datang, <span class="fw-bold"><?php echo $_SESSION['nama_lengkap']; ?></span> | 
                    <a href="logout.php" class="text-white text-decoration-underline">Logout</a>
                </small>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <a href="tambah.php" class="btn btn-success mb-3">Tambah Film</a>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-header-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul Film</th>
                            <th>Sutradara</th>
                            <th>Harga Tiket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Looping data dari database
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1; // Buat nomor urut kalau id_film acak
                            while ($row = mysqli_fetch_assoc($result)) { 
                                // Tambahkan harga ke total
                                $total_harga += $row['harga_tiket'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['judul_film']; ?></td>
                            <td><?php echo $row['sutradara']; ?></td>
                            <td>
                                <?php 
                                // Format Rupiah: Rp 75.000
                                echo "Rp " . number_format($row['harga_tiket'], 0, ',', '.'); 
                                ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?= $row['id_film']; ?>" class="text-decoration-none text-primary">Edit</a> | 
                                <a href="hapus.php?id=<?= $row['id_film']; ?>" class="text-decoration-none text-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Data kosong</td></tr>";
                        }
                        ?>
                        
                        <tr class="fw-bold bg-light">
                            <td colspan="3" class="">Total Harga Tiket</td>
                            <td>
                                <?php echo "Rp " . number_format($total_harga, 0, ',', '.'); ?>
                            </td>
                            <td></td> </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>