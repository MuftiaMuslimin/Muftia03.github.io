<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Hijab</title>
</head>
<body>
    <h1>Edit Data Barang</h1>
    <a href="index.php">Kembali</a>
    <?php
    include 'koneksi.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM pemesanan WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            ?>
            <form method="post" action="proses_edit.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>" required>
                <br>
                <label for="jenis_bahan">Jenis Bahan:</label>
                <input type="text" name="jenis_bahan" value="<?= $row['jenis_bahan'] ?>" required>
                <br>
                <label for="harga_barang">Harga Barang:</label>
                <input type="number" name="harga_barang" value="<?= $row['harga_barang'] ?>" required>
                <br>
                <input type="submit" value="Simpan Perubahan">
            </form>
            <?php
        }
    }
    ?>
</body>
</html>