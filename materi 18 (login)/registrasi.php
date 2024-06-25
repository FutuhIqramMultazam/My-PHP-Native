<?php

require 'functions.php';

if (isset($_POST['register'])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User baru berhasil di tambahkan');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman registrasi</title>
</head>

<body>
    <h1>Halaman Registrasi (Membuat akun)</h1>

    <form action="" method="post">
        <ul>
            <li><input type="text" name="username" placeholder="Masukan username"></li>
            <li><input type="password" name="password" placeholder="masukan password"></li>
            <li><input type="password" name="password2" placeholder="konfigurasi password"></li>
            <li><button type="submit" name="register">Buat Akun</button></li>
        </ul>
    </form>

</body>

</html>