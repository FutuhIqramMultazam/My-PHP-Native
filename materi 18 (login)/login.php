<?php

require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek passsword
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("location:index.php");
            exit;
        }
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        .warning {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <h1>Halaman login</h1>

    <?php if (isset($error)) : ?>
        <h3 class="warning">Username atau password salah</h3>
    <?php endif; ?>

    <form action="" method="post">
        <input type="text" placeholder="masukan username" name="username">
        <input type="password" placeholder="masukan password" name="password">
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>