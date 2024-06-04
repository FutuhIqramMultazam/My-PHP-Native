<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 8 asosiatif</title>
</head>
<body>
<?php
// materi kali ini tentang array associative
$datadiri=[
    ["nama" => "icam",
    "usia" => "20",
    "email" => "icam@gmail.com",
    "gambar" => "futuh.jpg"],
    [
    "nama" => "fadilah",
    "usia"=> "21",
    "email"=> "fadilah@gmail.com",
    "gambar" => "fadilah.jpg"]
    ];
//echo $datadiri["nama"]; // kita memanggil array dengan variable yang kita buat 
?>
    <?php foreach($datadiri as $dd): ?>
    <ul>
        <li><img src="img/<?= $dd["gambar"]; ?>" alt="mahasiswa" width="70px"></li>
        <li><?= $dd["nama"]; ?></li>
        <li><?= $dd["usia"]; ?></li>
        <li><?= $dd["email"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>