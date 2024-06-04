<?php 
// Superglobals adalah variable global milik php yang sebenarnya adalah array asosiatif
/* super globals itu di antaranya ada:
    $_GET
    $_POST  
    $_REQUEST
    $_SESSION
    $_COOKIE
    $_SERVER
    $_ENV
    */
    $datadiri=[
        ["nama" => "futuh",
        "usia" => "20",
        "email" => "icam@gmail.com",
        "gambar" => "futuh.jpg",
        "jk" => "pria"],
        [
        "nama" => "fadilah",
        "usia"=> "21",
        "email"=> "fadilah@gmail.com",
        "gambar" => "ayang.jpg",
        "jk" => "wanita"],
        [
        "nama" => "mamah",
        "usia"=> "40",
        "email"=> "emponsumiati@gmail.com",
        "gambar" => "mamah empon.jpg",
        "jk" => "wanita"]
        ];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>materi 9 GET</title>
    <style>
        
        body{
            background-color: black;
            margin: 0;
        }
        h1{
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 10px;
            margin-bottom: 0;
            /* background-color: silver; */
            /* border-radius: 10px 10px 0 0; */
            /* margin-top: 0; */
        }
        p {
            /* background-color: silver; */
            margin-top: 0;
            font-family: Arial, Helvetica, sans-serif;
            padding-bottom: 10px;

        }
        img{
            width: 100px;
            margin: 20px auto;
            border: 2px solid black;
            /* border-radius: 15px; */
            box-shadow: 0 7px 10px black;
            transition: 0.5s;
        }
        img:hover{
            width: 150px;
        }
        .kepala {
            background-color: silver;
            margin: auto;
        }
        .konten{
            background-color: white;
            text-align: center;
            margin: auto;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: -20px;
            
        }
        input{
            padding: 8px;
            border-radius: 8px;
            border: 1px solid grey;
            transition: 0.2s;
        }
        button{
        border:1px solid black;
        border-radius: 5px;
        padding: 5px;
        background-color: grey;
        transition: 0.2s;
        color:white;
        font-size: 17px;
        margin: 10px;
        width: 85%;
    }
        button:hover{
        box-shadow: 4px 4px 7px black;
        font-size: 20px;
    }
        button:active{
        background-color: chartreuse;
        color: black;
    }
    </style>
</head>
<body>
    <div class="konten">
        <div class="kepala">
            <h1>Daftar Keluarga</h1>
            <p>(klik salah satu foto di bawah ini)</p>
        </div>
    
    
        <?php foreach($datadiri as $dd): ?>
           
            <a href="halaman2.php?nama=<?= $dd["nama"]; ?>&usia=<?= $dd ["usia"];?>&email=<?= $dd["email"];?>&gambar=<?= $dd["gambar"];?>&jk=<?= $dd["jk"];?>"><img src="img/<?= $dd["gambar"];?>" ></a>
           
        <?php endforeach; ?>
    <form action="halaman2.php" method="get">
        <h2>Tambah Personil?</h2>
        <input type="text" name="nama" placeholder="Masukan Nama:">
        <input type="text" name="usia" placeholder="Masukan Umur:">
        <input type="text" name="jk" placeholder="Pria / Wanita:">
        <input type="text" name="gambar" placeholder="masukan nama gambar:">
        <input type="email" name="email" placeholder="Masukan email:"><br>
        <a href=""><button name="masuk">Tambah?</button></a>
    </form>
    </div>
</body>
</html>