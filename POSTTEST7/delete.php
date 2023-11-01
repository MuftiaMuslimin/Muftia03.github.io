<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM pemesanan WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
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