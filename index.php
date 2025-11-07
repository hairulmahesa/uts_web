<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];

// Data produk
$kode_barang = ["B001", "B002", "B003", "B004", "B005"];
$nama_barang = ["Sabun", "Sampo", "Sikat Gigi", "Pasta Gigi", "Tisu"];
$harga_barang = [5000, 15000, 10000, 12000, 8000];

// Simulasi pembelian acak
$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

for ($i = 0; $i < count($kode_barang); $i++) {
    $beli[$i] = rand(0, 1); // 0 = tidak beli, 1 = beli
    if ($beli[$i] == 1) {
        $jumlah[$i] = rand(1, 5);
        $total[$i] = $harga_barang[$i] * $jumlah[$i];
        $grandtotal += $total[$i];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - POLGAN MART</title>
    <style>
        body { font-family: Arial; background: #eef; }
        .header { background: #007bff; color: white; padding: 10px; text-align: center; }
        table { border-collapse: collapse; width: 80%; margin: 20px auto; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #007bff; color: white; }
        .footer { text-align: center; margin-top: 20px; }
        a { text-decoration: none; color: white; background: red; padding: 5px 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>POLGAN MART</h2>
        <p>Selamat datang, <b><?= $username; ?></b></p>
        <a href="logout.php">Logout</a>
    </div>

    <table>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        foreach ($kode_barang as $i => $kode) {
            if ($beli[$i] == 1) {
                echo "<tr>
                        <td>$kode</td>
                        <td>{$nama_barang[$i]}</td>
                        <td>Rp " . number_format($harga_barang[$i], 0, ',', '.') . "</td>
                        <td>{$jumlah[$i]}</td>
                        <td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>
                      </tr>";
            }
        }
        ?>
        <tr>
            <th colspan="4">Grand Total</th>
            <th>Rp <?= number_format($grandtotal, 0, ',', '.'); ?></th>
        </tr>
    </table>

    <div class="footer">
        <p>Terima kasih telah berbelanja di POLGAN MART</p>
    </div>
</body>
</html>