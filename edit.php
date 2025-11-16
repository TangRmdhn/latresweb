<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$query  = "SELECT * FROM film WHERE id_film = $id";
$result = mysqli_query($koneksi, $query);
$data   = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 1) {
    die("Data tidak ditemukan...");
}

if (isset($_POST['perbarui'])) {
    $judul     = htmlspecialchars($_POST['judul']);
    $sutradara = htmlspecialchars($_POST['sutradara']);
    $harga     = $_POST['harga'];


    $query_update = "UPDATE film SET 
                        judul_film = '$judul',
                        sutradara = '$sutradara',
                        harga_tiket = '$harga'
                     WHERE id_film = $id";
    
    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
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
                        <h4 class="mb-0 fw-bold">Edit Film</h4>
                        <small class="opacity-75">Perbarui informasi film</small>
                    </div>

                    <div class="card-body p-4">
                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">ID Film</label>
                                <input type="text" class="form-control bg-light" value="<?= $data['id_film']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label text-muted">Judul Film</label>
                                <input type="text" class="form-control" name="judul" id="judul" 
                                       value="<?= $data['judul_film']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sutradara" class="form-label text-muted">Sutradara</label>
                                <input type="text" class="form-control" name="sutradara" id="sutradara" 
                                       value="<?= $data['sutradara']; ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="harga" class="form-label text-muted">Harga Tiket (Rp)</label>
                                <input type="number" class="form-control" name="harga" id="harga" 
                                       value="<?= $data['harga_tiket']; ?>" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" name="perbarui" class="btn btn-success px-4">Perbarui</button>
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