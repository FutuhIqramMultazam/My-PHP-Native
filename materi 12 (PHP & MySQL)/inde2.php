<?php
// menghubungkan ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari table mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa ")

// ambil data (fetch) mahasiswa dari object result,, contoh sintak nya ada di bawah ini
// mysqli_fetch_row() mengembalikan array numerik
// mysqli_fetch_assoc() mengembalikan array associative
// mysqli_fetch_array() mengembalikan keduanya
// mysqli_fetch_object()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mahasiswa</title>
    <style>
        .atas{
            background-color: silver;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr class="atas">
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i=1; ?>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $i ?></td>
        <td><a href="">Ubah |</a><a href=""> Hapus</a></td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="40px"></td>
        <td><?= $row["nim"];?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["jurusan"];?></td>
    </tr>
    <?php $i++; ?>
    <?php endwhile; ?>
    </table>
   
</body>
</html>