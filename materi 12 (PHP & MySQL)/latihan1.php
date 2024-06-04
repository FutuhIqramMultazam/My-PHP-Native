<?php
// koneksi ke data base
$conn = mysqli_connect("localhost","root","","phpdasar");

// ambil data dari table
$result = mysqli_query($conn,"SELECT * FROM keluarga");

// contoh ambil semua yang ada di table menggunakan while loop/ pengulangan
/* while ($klg = mysqli_fetch_assoc($result)){
    var_dump($klg);
} */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keluarga</title>
    <style>
      th {
        background-color: silver;
      }
      .imgtabel {
        width: 40px;
      }
    </style>
  </head>
  <body>
    <h1>Daftar Keluarga</h1>
    <table border="1px" cellpadding="10px" cellspacing="0">
      <tr>
        <th>id</th>
        <th>aksi</th>
        <th>gambar</th>
        <th>nama</th>
        <th>usia</th>
        <th>email</th>
        <th>gender</th>
      </tr>
      <?php $i = 1; ?>
      <!-- mengambil data menggunakan mysqli_fetch_assoc -->
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr> <!-- di tag ini kita mulai masukin data dari database -->
        <td><?= $i; ?></td>
        <td><a href="">ubah</a> | <a href="">hapus</a></td>
        <td>
          <img src="img/<?= $row["gambar"]; ?>" class="imgtabel" alt="" />
        </td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["usia"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["jenis kelamin"];?></td>
      </tr>
      <?php $i++; ?>
      <?php  endwhile; ?>
    </table>
  </body>
</html>
