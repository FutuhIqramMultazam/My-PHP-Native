<?php
// koneksi ke database 
$conn = mysqli_connect("localhost","root","","phpdasar");

// pilih tabel dari database
$result = mysqli_query($conn,"SELECT * FROM keluarga");

if (isset($_POST["kirim"])){
    
    $nama = $_POST["nama"]; 
    $usia = $_POST["usia"];
    $email = $_POST["email"];
    $jk = $_POST["jk"];
    $gambar= $_POST["gambar"];

    $query = "INSERT INTO keluarga VALUES
            ('','$nama','$usia','$email','$jk','$gambar')
            ";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
                alert('Data berhasil di tambahkan');
                document.location.href = 'kotret2.php';    
            </script>";
    } else {
        echo "gagal";
        echo "<br>";
        echo mysqli_error( $conn );
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>belajar lagi</title>
    <style>
        body{
            /* background-color: #28475e; */
            background-image: url(img/bintang.jpg);
            background-repeat: no-repeat;
            background-size: 100% 1100px;
        }
        h1{
            text-align: center;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: white;
        }
        .keluar{
            float: right;
            margin-top: -70px;   
        }
        .keluar button{
            padding: 8px;
            font-size: 18px;
            border-radius: 10px;
            border:1px solid black;
            background-color: #8a1a1a;
            color: white;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .keluar button:hover{
            cursor:pointer;
            background-color: #ad3b3b;
        }
        .keluar button:active{
            background-color: darkcyan;
            cursor: progress;
        }
        .tabel{
            border-radius: 15px;
            
        }
        table{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin: auto;
            /* width: 100%; */
         }

         table a{
            color: white ;
            padding: 4px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            background-color: #03355b;
            transition: 0.2s;
         }
         table a:hover{
            box-shadow: 3px 3px 5px black;
         }
         table a:active{
            cursor: progress;
            background-color: darkcyan;
         }
        .gambardalam{
            width: 40px;
            border: 1px solid black;
            transition: 0.4s;
        }
        .gambardalam:hover{
            cursor:zoom-in;
            /* width: 150px; */
            /* transform: scale(5); */
        }
        .gambardalam:active{
            transform: scale(5);
        }
        th {
            background-color: silver;
        }
        .tr{
            background-color: white;
        }
        td{
            text-align: center;
        }
        .jk{
            text-align: center;
        }
        .forum{
            background-color: silver;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            width: 60%;
            margin: auto;
            text-align: center;
            border-radius: 10px;
            transition: 0.3s;
        }
        .forum h2{
            padding: 10px;
            padding-top: 15px;
        }
        .forum input{
            width: 90%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: none;
            transition: 0.2s;
            font-family: monospace;
            font-size: 15px;
        }
        .forum input:hover{
            border: 1px solid black;
            border-bottom: 5px solid black;
        }
        .forum input:focus{
            border-bottom: 5px solid black;
        }
        .forum button{
            width: 90%;
            margin-bottom: 30px;
            border-radius: 5px;
            padding: 10px;
            background-color: #03355b;
            color: white;
            transition: 0.2s;
            font-size: 15px;
            margin-top: 25px;
            border: none;
        }
        .forum button:hover{
            border: 1px solid black;
             box-shadow: 5px 5px 10px black;
             cursor:pointer;
        }
        .forum button:active{
            background-color: darkcyan;
            cursor: progress;
        }
    </style>
</head>
<body>
    <h1>Daftar keluarga</h1>
    <div class="keluar">
        <form action="" method="post">
        <?php if(isset($_POST["keluar"])):?>
            <script>if(confirm("anda yakin ingin keluar?")){document.location.href='kotret1.php';}</script>
        <?php endif; ?>
        <button type="submit" name="keluar" >keluar?</button>
        </form>
    </div>
    <div class="tabel">
    <?php $num_rows = mysqli_num_rows($result); ?> <!-- jika ingin menampilkan jumlah rows harus pake ini -->
    <table  border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Email</th>
            <th>Jenis kelamin</th>
        </tr>
    <?php $i = 1; ?>
    <?php while($row = (mysqli_fetch_assoc($result))) : ?>
        <tr class="tr">
            <td><?= $i ?></td>
            <td>
                <a href="">Edit</a> |
                <a href="hapus2.php?id=<?=$row["id"];?>"> Hapus</a>
            </td>
            <td><img src="img/<?=$row["gambar"];?>" class="gambardalam" title="<?=$row["nama"];?>" ></td>
            <td><?=$row["nama"];?></td>
            <td><?=$row["usia"];?></td>
            <td><?=$row["email"];?></td>
            <td class="jk" ><?=$row["jenis kelamin"];?></td>
        </tr>
    <?php $i++; ?>
    <?php endwhile; ?>
    </table>
    </div>
    <br><br>
    <div class="forum">
    <h2>forum tambah data</h2>
        <form action="" method="post">
            <input type="text" name="nama" placeholder="nama:" required >
            <br>
            <input type="text" name="usia" placeholder="usia:">
            <br>
            <input type="text" name="email" placeholder="email:" >
            <br>
            <input type="text" name="jk" placeholder="jenis kelamin:" >
            <br>
            <input type="text" name="gambar" placeholder="gambar:" >
            <br>
            <button type="submit" name="kirim" >tambah data!</button>
        </form>
    </div>

    </body>
</html>