<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman 1</title>
</head>
<body>
    <form  method="post">
        <input type="text" name="nama" placeholder="masukan nama:" id="">
        <button name="submit">Kirim</button>
    </form>
    <?php if(isset($_POST["submit"])):?>
    <h1>Selamat Datang <?=$_POST["nama"];?></h1> 
    <?php endif;?>
</body>
</html>