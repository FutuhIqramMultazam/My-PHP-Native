<?php
require 'functions.php';

// mengambil data dari id
$id = $_GET['id'];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0]; // perhatikan 0 nya, karena di function ini menggunakan asosiatif

if (isset($_POST["kirim"])) {

    // cek data apakah berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil di ubah');
            document.location.href = 'index.php';    
        </script>";
    } else {
        echo "<script>
    alert('Data gagal di ubah');
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
    <title>Ubah data mahasiswa</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
            <li><input type="text" name="nim" placeholder="NIM:" required value="<?= $mhs['nim']; ?>"></li>
            <li><input type="text" name="nama" placeholder="Nama:" required value="<?= $mhs['nama']; ?>"></li>
            <li><input type="text" name="email" placeholder="email:" value="<?= $mhs['email']; ?>"></li>
            <li><input type="text" name="jurusan" placeholder="Jurusan:" value="<?= $mhs['jurusan']; ?>"></li>
            <li>
                <img src="img/<?= $mhs['gambar']; ?>" alt="<?= $mhs['nama']; ?>" width="40px">
                <br>
                <input type="file" name="gambar">
            </li>
            <li><button type="submit" name="kirim">Ubah Data!</button></li>
        </ul>
    </form>

    <a href="index.php">kembali ke daftar mahasiswa</a>

</body>

</html>