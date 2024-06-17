<?php

// **belajar array**
// cara lama 
$hari=array("senin","selasa","rabu","kamis","jum'at","sabtu","minggu");

// cara baru
$bulan=["januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember"];

// cara menampilkan array
// memakai, var_dump(), print_r() 
echo "menggunakan var_dump: <br>";
var_dump($hari);
echo "<br> <br> menggunakan print_r: <br>";
print_r($bulan);

// menampilkan 1 elemen array
echo "<br><br>";
echo $hari[1]; // di sini kita bisa memakai keyword echo
echo "<br>";
echo $bulan[2];
echo "<br> <br> <br>"
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>apa aja</title>
    <style>
      div {
        background-color: grey;
        width: 100px;
        height: 100px;
        margin: 3px;
        padding: 10px;
        line-height: 100px;
        float: left;
        text-align:center;
      }
    </style>
  </head>
  <body>
    <!-- fahami juga kode di bawah ini ya ganteng -->
    <?php for($i=0;$i<count($bulan);$i++){
       echo "<div>$bulan[$i]</div>";
     }
     ?>
  </body>
</html>