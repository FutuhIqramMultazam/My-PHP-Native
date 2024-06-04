<?php
if (!isset($_GET["nama"]) || 
    !isset($_GET["usia"]) || 
    !isset($_GET["email"]) ||
    !isset($_GET["jk"]) ||
    !isset($_GET["gambar"])){
    header("Location:halaman1.php");
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>detail data</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
      }
      h1{
        text-align: center;
      }

      img{
        border-radius: 15px;
        /* box-shadow: 2px 2px 5px black; */
        border: 2px solid black;
        width: 100px;
      }
      .img {
        text-align: center;
      }
     .konten {
        width: 50%;
        background-color: white;
        margin: auto;
        padding: 5px;
        border-radius: 10px;
        margin-top: -7px;
      }

      .divul{
        background-color: silver;
        padding: 4px;
        border-radius: 10px;
        margin: 10px;
      }

      button{
        background-color: whitesmoke;
        border:1px solid black;
        border-radius: 5px;
        padding: 5px;
        background-color: grey;
        transition: 0.2s;
        color:white;
        font-size: 17px;
        margin: 10px;
    }
    button:hover{
        box-shadow: 4px 4px 7px black;
        font-size: 20px;
    }
    button:active{
        background-color: chartreuse;
        color: black;
    }
    .tombol{
        text-align: center;
    }

    </style>
  </head>
  <body>
    <div class="konten">
      <h1>Selamat Datang</h1>
      <div class="img"><img src="img/<?= $_GET["gambar"];?>" ></div>
      <br>
      <div class="divul">
      <ul>
        <li>
          Nama:
          <?= $_GET["nama"]; ?>
        </li>
        <li>
          Usia:
          <?= $_GET["usia"]; ?>
        </li>
        <li>
          Email:
          <?= $_GET["email"]; ?>
        </li>
        <li>Jenis Kelamin: <?= $_GET["jk"];?></li>
      </ul>
      </div>
      
      <div class="tombol"><a href="halaman1.php"><button type="button">Kembali ke halaman utama</button></a></div>
    </div>
  </body>
</html>
