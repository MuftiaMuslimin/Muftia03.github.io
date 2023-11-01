<!DOCTYPE html>
<html>
<head>
    <title>File Gallery</title>
</head>
<body>
    <h1>File Gallery</h1>

    <?php
    // Direktori tempat file-file disimpan
    $directory = 'uploads/'; // Gantilah ini dengan path direktori yang sesuai
if (is_dir($directory)) {
    $files = scandir($directory);
    foreach ($files as $file) {
        // Tampilkan file-file di sini
        if ($file != "." && $file != "..") {
            echo "<a href='$directory/$file' download>$file</a><br>";
        }
    }
} else {
    echo "Direktori tidak ditemukan atau kosong.";
}
    ?>
</body>
</html>