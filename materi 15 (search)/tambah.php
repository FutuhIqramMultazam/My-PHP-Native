<?php
require 'functions.php';

if (isset($_POST["kirim"])) {

    // cek data apakah berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil di tambahkan');
            document.location.href = 'index.php';    
        </script>";
    } else {
        echo "<script>
    alert('Data gagal di tambahkan');
    document.location.href = 'index.php';    
    </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data mahasiswa</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li><input type="text" name="nim" placeholder="NIM:" required></li>
            <li><input type="text" name="nama" placeholder="Nama:" required></li>
            <li><input type="text" name="email" placeholder="email:"></li>
            <li><input type="text" name="jurusan" placeholder="Jurusan:"></li>
            <li><input type="text" name="gambar" placeholder="Gambar:"></li>
            <li><button type="submit" name="kirim">Tambah Data!</button></li>
        </ul>
    </form>

    <a href="index.php">kembali ke daftar mahasiswa</a>

</body>

</html>