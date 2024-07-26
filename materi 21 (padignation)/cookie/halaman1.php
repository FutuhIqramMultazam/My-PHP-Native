<?php

if (isset($_GET["login"])) {
    setcookie('nama', 'futuh', time() + 60);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman 1</title>
</head>

<body>
    <form action="" method="get">
        <button type="submit" name="login">buka cookie</button>
    </form>

    <a href="halaman2.php">halaman 2</a>
</body>

</html>