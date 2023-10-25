<?php
// Koneksi ke database
include 'koneksi.php';

$sql = "SELECT * FROM pemesanan";
$result = mysqli_query($conn, $sql);
?>

<a href="file_gallery.php">Lihat File yang Sudah Diunggah</a>

<?php
// Koneksi ke database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jenis_bahan = $_POST['jenis_bahan'];
    $harga_barang = $_POST['harga_barang'];
    

    // Insert the submitted data into the database
    $insertQuery = "INSERT INTO pemesanan (nama_barang, jenis_bahan, harga_barang) VALUES ('$nama_barang', '$jenis_bahan', $harga_barang)";
    if (mysqli_query($conn, $insertQuery)) {
        header('Location: your-page.php'); // Redirect back to your page
        exit();
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>

</table>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        #date-time {
            background-color: #fff;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px;
            font-size: 24px;
            box-shadow: 2px 2px 5px #999;
        }
    </style>
    <script>
        function displayDateTime() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
            const dateTime = new Date().toLocaleString('id-ID', options);

            const dateTimeElement = document.getElementById('date-time');
            dateTimeElement.textContent = dateTime;
        }

        // Panggil fungsi displayDateTime() setiap detik
        setInterval(displayDateTime, 1000);
    </script>
</head>
<body>
    <h1>Dashboard</h1>
    <div id="date-time">Mengambil waktu...</div>
</body>
</head>
<body>
    <p id="date-time"></p>
</body>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Di Toko Hijab</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        form {
            margin: 20px 0;
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h2>Daftar Data Di MM ADVERTISING</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama barang</th>
                <th>Jenis bahan</th>
                <th>Harga Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            include 'koneksi.php';

            // Query SQL untuk mengambil data hijab
            $sql = "SELECT * FROM pemesanan";
            $result = mysqli_query($conn, $sql);

            // Perulangan untuk menampilkan data hijab dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama_barang'] . "</td>";
                echo "<td>" . $row['jenis_bahan'] . "</td>";
                echo "<td>" . $row['harga_barang'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn-edit'><button>Edit</button></a>";
                echo "&nbsp;"; // Menambahkan spasi di sini
                echo "<a href='delete.php?id=" . $row['id'] . "' class='btn-delete'><button>Hapus</button></a>";
                echo "</td>";
                echo "</tr>";
            }
            
            
            // Tutup koneksi ke database
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <h2>Tambah Data Barang</h2>
    <form method="post" action="process.php">
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required>
        </div>
        <div class="form-group">
            <label for="jenis_bahan">Jenis Bahan:</label>
            <input type="text" id="jenis_bahan" name="jenis_bahan" required>
        </div>
        <div class="form-group">
            <label for="harga_barang">Harga Barang:</label>
            <input type="number" id="harga_barang" name="harga_barang" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Barang:</label>
            <input type="file" id="gambar" name="gambar">
        </div>
        <button type="submit">Tambah Data</button>
    </form>
</body>
</html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Hijab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Data Barang</h1>
    <a href="tambah.php">Tambah Data</a>
    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jenis Bahan</th>
            <th>Harga Barang</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM pemesanan";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nama_barang"] . "</td>";
            echo "<td>" . $row["jenis_bahan"] . "</td>";
            echo "<td>" . $row["harga_barang"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='hapus.php?id=" . $row["id"] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
<!-- popup -->
<script>
        alert("HALLO GUYS! WELCOME TO MM Advertising");
      </script>
      <!-- akhir popup -->

    <header>
        <div class="container">
            <h1>MM ADVERTISING</h1>
            </div>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang-saya">Tentang Saya</a></li>
                <li><a href="#MM ADVERTISING">MM ADVERTISING</a></li>
                <li><a href="#daftar-barang">Daftar barang</a></li>
                <div class="theme-switch">
                    <label for="theme-toggle">Dark Mode</label>
                    <input type="checkbox" id="theme-toggle">
            </ul>
    
        </div>
    </nav>

    <main>
        <section id="beranda" class="section">
            <div class="container">
                <h2>Selamat datang di MM ADVERTISING!</h2>
                <p>Kami Bangga Menjadi Mitra Anda.</p>
            </div>
        </section>

        <section id="tentang-saya" class="section">
            <div class="container">
                <h2>Tentang Saya</h2>
                <div class="about-me">
                    <img src="tia.jpg.jpeg" alt="Foto Saya">
                    <p>Ini adalah halaman tentang saya. Saya adalah pemilik MM ADVERTISING ini.</p>
                </div>
            </div>
        </section>

        <section id="MM-ADVERTISING" class="section">
            <div class="container">
                <h2>MM ADVERTISING</h2>
                <p>Lokasi toko kami: Jl. Pelita, kota Samarinda</p>
                <p>Contact person: 0852 8341 7718</p>

                <!-- AddEventListener -->
      <button id="btn-info">pelajari lebih lanjut</button>
      <p id="info" style="display: none;">silahkan kontak langsung di instagram kita ya @mm_advertising dan Whatsapp 085288991345</p>
      <!-- akhir AddEventListener -->

      <!-- manipulasi dom -->
      <div id="elemen" style="display: block;">menu dapat berubah sewaktu waktu</div>
  
      <button onclick="toggleElemen()">sembunyikan</button>
  
      <script>
          function toggleElemen() {
              // Mengambil elemen dengan ID 'elemen'
              var elemen = document.getElementById('elemen');
  
              // Memeriksa apakah elemen saat ini tersembunyi atau ditampilkan
              if (elemen.style.display === 'none') {
                  // Jika tersembunyi, tampilkan elemen
                  elemen.style.display = 'block';
              } else {
                  // Jika ditampilkan, sembunyikan elemen
                  elemen.style.display = 'none';
          }
        }
      </script>
      <!-- akhir manipulasi dom -->

            </div>
        </section>

        <section id="daftar-barang" class="section">
            <div class="container">
                <h2>Daftar barang</h2>
                <div class="barang-list">
                    <img src="barang 1.png" alt="barang 1">
                    <img src="barang 2.png" alt="barang 2" width="350px">
                    <img src="barang 3.png" alt="barang 3">
                </div>
                <p>Kami menyediakan berbagai jenis Spanduk, X Banner, dan Stiker yang beragam.</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 MM ADVERTISING</p>
        </div>
    </footer>
    <script src="script.js">
    
    </script>
</body>
</html>