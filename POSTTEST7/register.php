<?php

require "koneksi.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($pass === $cpassword) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

        if ($result) {
            if (mysqli_fetch_assoc($result)) {
                echo "
                <script> 
                alert('username telah digunakan');
                document.location.href = 'register.php';
                </script>
                ";
            } else {
                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$pass')";
                $insert_result = mysqli_query($conn, $sql);

                if ($insert_result) {
                    echo "
                        <script> 
                        alert('registrasi berhasil');
                        document.location.href = 'login.php';
                        </script>
                    ";
                } else {
                    echo "
                    <script> 
                    alert('registrasi gagal');
                    document.location.href = 'register.php';
                    </script>
                    ";
                }
            }
        } else {
            echo "Error in the query: " . mysqli_error($conn);
        }
    } else {
        echo "
                <script> 
                alert('password tidak sama');
                document.location.href = 'regisuser.php';
                </script>
                ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrasi</title>
</head>


<body>
    <div class="form">
        <div class="form-container">
            <h1>Masuk</h1><hr>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" class="textfield">
                <input type="password" name="password" placeholder="Password" class="textfield">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" autocomplete="off" class="textfield" required> <br>
                <button type="submit" name="register" class="login-btn">Register</button>
            </form>
        </div>
    </div>
</body>

</html>