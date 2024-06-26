<?php
// di file ini adalah buatan saya sendiri

require 'functions.php';

//mengambil id dari get
$id = $_GET["id"];

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");

$row = mysqli_fetch_assoc($result);


if (isset($_POST["kirim"])) {

    // cek data apakah berhasil di ubah atau tidak
    if (($_POST) > 0) {
        echo "<script>
            alert('Data berhasil di ubah');
            document.location.href = 'index.php';    
        </script>";
    } else {
        echo "<script>
    alert('Data berhasil di ubah');
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
    <title>ubah data mahasiswa</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li><input type="text" name="nim" placeholder="NIM:" required value="<?= $row["nim"]; ?>"></li>
            <li><input type="text" name="nama" placeholder="Nama:" required value="<?= $row["nama"]; ?>"></li>
            <li><input type="text" name="email" placeholder="email:" value="<?= $row["email"]; ?>"></li>
            <li><input type="text" name="jurusan" placeholder="Jurusan:" value="<?= $row["jurusan"]; ?>"></li>
            <li><input type="text" name="gambar" placeholder="Gambar:" value="<?= $row["gambar"]; ?>"></li>
            <li><button type="submit" name="kirim">Ubah Data!</button></li>
        </ul>
    </form>

    <a href="index.php">kembali ke daftar mahasiswa</a>

</body>

</html>