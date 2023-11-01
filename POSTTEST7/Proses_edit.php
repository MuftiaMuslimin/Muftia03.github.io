<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_bahan = $_POST['jenis_bahan'];
    $harga_barang = $_POST['harga_barang'];

    $sql = "UPDATE pemesanan SET nama_barang=?, jenis_bahan=?, harga_barang=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdii", $nama_barang, $jenis_bahan, $harga_barang, $id);
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
