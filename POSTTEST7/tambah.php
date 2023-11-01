<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Barang</title>
</head>
<body>
    <h1>Tambah Data Barang</h1>
    <a href="index.php">Kembali</a>
    <form method="post" action="proses_tambah.php">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" required>
        <br>
        <label for="jenis_bahan">Jenis Bahan:</label>
        <input type="text" name="jenis_bahan" required>
        <br>
        <label for="harga_barang">Harga Barang:</label>
        <input type="number" name="harga_barang" required>
        <br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
