<?php
$host = "localhost";
$user = "root";    
$pass = "";       
$db   = "bioskop";
$port = 3307;

$koneksi = new mysqli($host, $user, $pass, $db, $port);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>