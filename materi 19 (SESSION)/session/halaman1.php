<?php

if (isset($_POST["buka"])) {
    session_start();
    $_SESSION["nama"] = "Futuh Iqram Multazam";
}

if (isset($_POST["tutup"])) {
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <button type="submit" name="buka">Buka session</button>
        <button type="submit" name="tutup">Tutup session</button>
    </form>
    <a href="halaman2.php">halaman 2</a>
</body>

</html>