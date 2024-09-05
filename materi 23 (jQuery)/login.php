<?php
session_start();
require 'functions.php';

//cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username from user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row["username"])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("location:index.php");
    exit;
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek passsword
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["ingat"])) {
                // buat cookie
                setcookie('id', $row["id"], time() + 60);
                setcookie('key', hash('sha256', $row["username"]), time() + 60);
            }                    // fungsi hash buat ngacak $row["username"] jadi kaya gini: contoh = 8c6976e5b541...

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
        <input type="text" placeholder="masukan username" name="username" autofocus>
        <br>
        <input type="password" placeholder="masukan password" name="password">
        <br>
        <label for="ingat"><input type="checkbox" name="ingat" id="ingat">Ingat saya?</label>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>