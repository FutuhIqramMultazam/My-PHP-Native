<?php
if (isset($_POST["masuk"])){
    if ($_POST["nama"]=="icam" && $_POST["sandi"]=="123"){
        header("Location:user.php");
        exit;
        }
else{
    $salah=true;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>Forum data diri</h1>

    <?php if(isset($salah)):?>
    <p style="color:red;">nama dan password yang anda masukan salah</p>
    <?php endif;?>
    <ul>
        <form action="" method="post">
            <li><label for="nama">Masukan nama:</label></li>
            <li><input type="text" name="nama" id="nama"></li>
            <li><label for="sandi">Masukan password</label></li>
            <li><input type="password" name="sandi" id="sandi"></li>
            <br>
            <button type="submit" name="masuk">Kirim booyyy</button>
        </form>
    </ul>
</body>
</html>