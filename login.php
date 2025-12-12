<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['ussername'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['x']) && isset($_POST['y'])) {

    $ussername = $_POST['x'];
    $ussername = $_POST['y'];

    $result =mysqli_query($conn, "SELECT * FROM users WHERE username='$ussername");

    if ($row = mysqli_fetch_assoc($result)) {

        if ($password == $row['password']) {

            $_SESSION['username'] = $row['username'];
            $_SESSION['nama']     = $row['nama_lengkap'];
            $_SESSION['role']     = $row['role'];

            header("Location: dashhboard.php");
            exit;

        } else {
            $error = "Password Salah!";
        }

    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>