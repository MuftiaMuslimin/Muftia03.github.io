<?php
$servername = "POSTTEST5";
$user = "MM_ADVERTISING";
$pass = "12345" ;
$db = "mm_advertising";

$conn = mysqli_connect($servername, $user, $pass, $db);

if (!$conn) {
    die("Gagal Terhubung". mysqli_connect_error());
}
echo "connected successfully";
?>
