<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM ADVERTISING</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="post" action="Proses.php" class="form">
        <div class="form-group">
            <label for="nama">Nama barang</label>
            <div class="input-icon">
                <input type="text" id="nama" name="nama" placeholder="Contoh: Spanduk" required>
                <i class="fas fa-user"></i>
            </div>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis Bahan</label>
            <div class="input-icon">
                <input type="text" id="jenis" name="jenis" placeholder="Contoh: korcin" required>
                <i class="fas fa-text"></i>
            </div>
        </div>

        <div class="form-group">
            <label for="harga">Harga barang:</label>
            <div class="input-icon">
                <input type="number" id="harga" name="harga" required>
                <i class="fas fa-money"></i>
            </div>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
        <a href="register.php">apakah anda sudah memiliki akun? </a>
    </form>

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
                <p id="info" style="display: none;">silahkan kontak langsung di instagram kita ya @mm_advertising dan
                    Whatsapp 085288991345</p>
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