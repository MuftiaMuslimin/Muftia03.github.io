<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $jenis_bahan = $_POST['jenis_bahan'];
    $harga_barang = $_POST['harga_barang'];

    $sql = "INSERT INTO pemesanan (nama_barang, jenis_bahan, harga_barang,) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdi", $nama_barang, $jenis_bahan, $harga_barang);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>
