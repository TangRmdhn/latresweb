<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM film WHERE id_film = '$id'";


    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }
} else {

    header("Location: index.php");
    exit;
}
?>