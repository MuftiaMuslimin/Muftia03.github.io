<?php
include 'koneksi.php';

// READ
if (isset($_GET['read'])) {
    $sql = "SELECT * FROM advertising";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Nama Barang</th><th>Jenis Bahan</th><th>Harga</th><th>Aksi</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nama"] . "</td><td>" . $row["jenis"] . "</td><td>" . $row["harga"] . "</td><td><a href='?edit=" . $row["id"] . "'>Edit</a> | <a href='?delete=" . $row["id"] . "'>Hapus</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data.";
    }
}

// CREATE
if (isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO advertising (nama, jenis, harga) VALUES ('$nama', '$jenis', '$harga')";
    if ($conn->query($sql) === true) {
        header("Location: ?read");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// EDIT
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM advertising WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $jenis = $row['jenis'];
        $harga = $row['harga'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "UPDATE advertising SET nama='$nama', jenis='$jenis', harga='$harga' WHERE id=$id";
    if ($conn->query($sql) === true) {
        header("Location: ?read");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM advertising WHERE id=$id";
    if ($conn->query($sql) === true) {
        header("Location: ?read");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Advertising</title>
</head>
<body>
    <!-- Form Create -->
    <h2>Tambah Data</h2>
    <form method="post" action="?create">
        <label for="nama">Nama Barang:</label>
        <input type="text" name="nama" required>
        <label for="jenis">Jenis Bahan:</label>
        <input type="text" name="jenis" required>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" required>
        <input type="submit" name="create" value="Tambah">
    </form>

    <!-- Form Edit -->
    <?php if (isset($_GET['edit'])) : ?>
    <h2>Edit Data</h2>
    <form method="post" action="?update">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nama">Nama Barang:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required>
        <label for="jenis">Jenis Bahan:</label>
        <input type="text" name="jenis" value="<?php echo $jenis; ?>" required>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="<?php echo $harga; ?>" required>
        <input type="submit" name="update" value="Simpan Perubahan">
    </form>
    <?php endif; ?>

    <a href="?read">Lihat Data</a>
</body>
</html>
