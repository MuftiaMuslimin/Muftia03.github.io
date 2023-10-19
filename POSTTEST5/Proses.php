<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST["nama"];
    $jenis_bahan = $_POST["jenis"];
    $harga_barang = $_POST["harga"];

    echo "<h2>Data barang yang telah Diinput:</h2>";
    echo "Nama Barang: " . $nama_barang . "<br>";
    echo "Jenis Bahan: " . $jenis_bahan . "<br>";
    echo "Harga Barang: " . $harga_barang . "<br>";
}
?>

<?php
// Sertakan file koneksi ke database
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];

    $sql = "INSERT INTO nama_tabel (nama, jenis, harga) VALUES ('$nama', '$jenis', '$harga')";
    
    if ($conn->query($sql) === TRUE) {
        
        echo "Data berhasil disimpan.";
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>
