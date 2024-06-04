<?php
// koneksi ke data base
$conn = mysqli_connect("localhost","root","","phpdasar");

// ambil data dari table
$result = mysqli_query($conn,"SELECT * FROM absensi");

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
    <title>Absensi Futuh Iqram Multazam</title>
    <style>
        h1{
            font-family: Arial, Helvetica, sans-serif;
        }
      th {
        background-color: silver;
      }
      
    </style>
  </head>
  <body>
    <h1>Absensi Futuh Iqram Multazam</h1>
    <table border="1px" cellpadding="10px" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Matakuliah</th>
        <th>Minggu ke 1</th>
        <th>Minggu ke 2</th>
        <th>Minggu ke 3</th>
        <th>Minggu ke 4</th>
        <th>Minggu ke 5</th>
        <th>Minggu ke 6</th>
        <th>Minggu ke 7</th>
        <th>Minggu ke 8</th>
      </tr>
      <?php $i = 1; ?>
      <!-- mengambil data menggunakan mysqli_fetch_assoc -->
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr> <!-- di tag ini kita mulai masukin data dari database -->
        <td><?= $i;?></td>
        <td><?= $row["matakuliah"];?></td>
        <td><?= $row["m1"];?></td>
        <td><?= $row["m2"];?></td>
        <td><?= $row["m3"];?></td>
        <td><?= $row["m4"];?></td>
        <td><?= $row["m5"];?></td>
        <td><?= $row["m6"];?></td>
        <td><?= $row["m7"];?></td>
        <td><?= $row["m8"];?></td>
      </tr>
      <?php $i++; ?>
      <?php  endwhile; ?>
    </table>
  </body>
</html>
