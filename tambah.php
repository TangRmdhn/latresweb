<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $judul     = htmlspecialchars($_POST['judul']);
    $sutradara = htmlspecialchars($_POST['sutradara']);
    $harga     = $_POST['harga'];


    $query = "INSERT INTO film (judul_film, sutradara, harga_tiket) VALUES ('$judul', '$sutradara', '$harga')";
    

    if (mysqli_query($koneksi, $query)) {
    
        echo "<script>
                alert('Film berhasil ditambahkan!');
                document.location.href = 'index.php';
              </script>";
    } else {
    
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .card-header-custom {
            background-color: #2c3e50;
            color: white;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card border-0 shadow-sm">
                    
                    <div class="card-header card-header-custom p-4">
                        <h4 class="mb-0 fw-bold">Tambah Film Baru</h4>
                        <small class="opacity-75">Isi form untuk menambahkan film</small>
                    </div>

                    <div class="card-body p-4">
                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="judul" class="form-label text-muted">Judul Film</label>
                                <input type="text" class="form-control" name="judul" id="judul" required>
                            </div>

                            <div class="mb-3">
                                <label for="sutradara" class="form-label text-muted">Sutradara</label>
                                <input type="text" class="form-control" name="sutradara" id="sutradara" required>
                            </div>

                            <div class="mb-4">
                                <label for="harga" class="form-label text-muted">Harga Tiket (Rp)</label>
                                <input type="number" class="form-control" name="harga" id="harga" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" name="simpan" class="btn btn-success px-4">Simpan</button>
                                <a href="index.php" class="btn btn-secondary px-4">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>