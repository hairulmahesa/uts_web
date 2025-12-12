<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname="db_penjualan_barang";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: ".$conn->connect_error);
}
echo "Koneksi berhasil!";
?>