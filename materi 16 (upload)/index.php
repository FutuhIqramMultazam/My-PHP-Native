<?php
require 'functions.php';

// ambil data dari table mahasiswa
$mahasiswa = query("SELECT * FROM mahasiswa");

// cari data 
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar mahasiswa</title>
  <link rel="stylesheet" href="css/bootstrap.css">
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
    .atas {
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
    <a class="btn btn-primary " href="tambah.php">tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
      <input type="text" name="keyword" autofocus autocomplete="off" placeholder="ketikan untuk mencari data di sini" size="30" class="form-control w-25 d-inline">
      <button type="submit" name="cari" class="btn btn-outline-success">Cari data</button>
    </form>
    <br>

    <div class="tabel ">
      <table class="table table-borderless">
        <tr class="atas text-black">
          <th>No.</th>
          <th>Aksi</th>
          <th>Gambar</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
          <tr>
            <td><?= $i ?></td>
            <td>
              <a class="btn btn-info btn-sm" href="ubah.php?id=<?= $row["id"]; ?>">Ubah </a> |
              <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');"> Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="40px"></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</body>

</html>