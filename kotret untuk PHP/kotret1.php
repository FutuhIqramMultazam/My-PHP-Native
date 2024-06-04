<?php
if (isset($_POST["kirim"])) {
    if ($_POST["nama"]=="icam" && $_POST["sandi"]=="123"){
      header("Location:http://localhost/phpdasar/belajar%20php%20dasar/input%20nama/");
      exit;
    } 
    else {
      $salah=true;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>landing page</title>
    <link rel="shortcut icon" href="tor.png">
    <style>
      body {
        background-color: grey;
        /* height: 400px; */
        background-image: url(img/pemandangan\ subuh.jpg);
        background-repeat: no-repeat;
        background-size: 100% 700px;
      }
      .wrapper{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Menggunakan tinggi viewport untuk kontainer */
      }
      .container {
        margin: auto;
        background-color: #f0f0f030;
        width: 60%;
        padding-top: 100px;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        margin-top: 150px;
        /* box-shadow: -1px 3px 7px 3px black; */
        border: 1px solid white;
      }
      form {
        margin: auto;
      }
      h3 {
        font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
        padding-bottom: 20px;
      }
      h3 a {
        text-decoration: none;
      }
      h3 a:hover {
        text-decoration: underline;
      }
      label {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 20px;
        font-weight: 4px;
      }
      input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid grey;
        width: 90%;
        margin-bottom: 10px;
        font-size: 15px;
        font-family: monospace;
        transition: 0.2s;
      }
      input:hover {
        border-bottom: 5px solid black;
      }
      input:focus {
        border-bottom: 5px solid black;
      }
      button {
        border: 1px solid black;
        border-radius: 5px;
        padding: 5px;
        background-color: #444;
        transition: 0.3s;
        color: white;
        font-size: 20px;
        width: 92%;
        margin: 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
      button:hover {
        box-shadow: 5px 5px 10px black;
        /* font-size: 30px; */
      }
      button:active {
        box-shadow: 5px 5px 10px black;
        font-size: 30px;
        background-color: darkcyan;
        cursor: progress;
      }
      .footer {
        margin-top: 30px;
        margin-bottom: -10px;
        font-family: monospace;
        font-size: 15px;
      }
      .footer a {
        text-decoration: none;
        color: black;
      }
      .footer a:hover {
        color: aqua;
      }
    </style>
  </head>
  <body>
    <?php if(isset($salah)): ?>
    <script>
      alert("password yang anda masukan salah");
    </script>
    <?php endif; ?>
    <div class="wrapper">
      <div class="container">
        <div class="header">
          <h3>Selamat datang di website kami, masuk menggunakan akun anda, jika anda belum memiliki akun, anda bisa membuatnya <a href="buat akun.php" class="buatakun">di sini</a></h3>
        </div>
        <form action="" method="post">
          <!-- <label for="nama">masukan nama:</label> -->
          <input type="text" name="nama" id="nama" placeholder="ketik nama di sini" />
          <br />
          <!-- <label for="sandi">masukan sandi:</label> -->
          <input type="password" name="sandi" id="sandi" placeholder="ketik sandi di sini" />
          <br />
          <button type="submit" name="kirim">masuk</button>
        </form>
        <div class="footer">
          <footer>copyright by : <a href="">Futuh iqram Multazam</a><br /><a href="">Whatsapp</a> | <a href="">Instagram</a></footer>
        </div>
      </div>
    </div>
  </body>
</html>
