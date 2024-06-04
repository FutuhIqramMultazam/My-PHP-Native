<?php
require 'functions.php';

// ambil data dari table mahasiswa
$mahasiswa = query("SELECT * FROM mahasiswa");
// ambil data (fetch) mahasiswa dari object result,, contoh sintak nya ada di bawah ini
// mysqli_fetch_row() mengembalikan array numerik
// mysqli_fetch_assoc() mengembalikan array associative
// mysqli_fetch_array() mengembalikan keduanya
// mysqli_fetch_object()
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar mahasiswa</title>
    <style>
        /* body{
            background-color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
        h1 {
            margin-top: -7px;
            padding-top: 10px;
            margin-bottom: 10px;
          
        }
        hr{
            margin-bottom: 20px;
        } */
        .atas{
            background-color: silver;
        }
        /* .konten{
            margin: auto;
            background-color: white;
            text-align: center;
        }
        .tabel{
            margin: auto;
            display: inline-block;
            margin-bottom: 20px;
        } */
    </style>
  </head>
  <body>
    <div class="konten">
      <h1>Daftar Mahasiswa</h1>
      <div class="tabel">
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
          <?php foreach($mahasiswa as $row): ?>
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
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </body>
</html>
