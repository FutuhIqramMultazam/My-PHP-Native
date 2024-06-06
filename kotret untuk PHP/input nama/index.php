<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'db_config.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Input Data Nama</title>

    <!-- menambahkan fonts google jika ingin menggunakan-->
    <link rel="stylesheet" href="fonts-google.css">
    
    <style>
        
  body {
      font-family: Arial, sans-serif;
      background-color: #222; /* Warna latar belakang */
      color: #fff; /* Warna teks */
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
    }

    table {
      text-align: center;
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      color: #fff; /* Warna teks */
    }

    th,
    td {
      border: 1px solid #333; /* Ubah warna garis */
      padding: 8px;
    }

    th {
      background-color: #444; /* Warna latar belakang header */
    }

    .action-button,
    .edit-button {
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      transition: background-color 0.3s ease; /* Efek transisi */
      border-radius: 4px;
      
    }

    .edit-button {
      background-color: #2c8f30; /* Warna hijau */
    }

    .action-button {
      background-color: #cc0000; /* Warna merah tua */
    }
    
    .action-button:hover {
      background-color: #ff0000; /* Warna merah */
    }

    .edit-button:hover {
      background-color: #45a049; /* Warna hijau tua */
    }

    .input-submit {
      background-color: silver; /* Warna perak */
      color: black; /* Warna teks buton */
      border: none;
      padding: 8px 20px;
      margin-bottom: 10px;
      cursor: pointer;
      transition: 0.3s ease; /* Efek transisi */
      border-radius: 5px;
      font-weight: bold;
    }

    .input-submit:hover {
      background-color: #999; /* Warna perak tua */
    }

    input[type="text"] {
      background-color: #ffffff17; /* Warna latar belakang input */
      color: white; /* Warna teks input */
      padding: 8px 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
    }
    
    input[type="text"]:focus-visible{
        outline: none;
    }

    ::placeholder{
        color: silver;
    }
    .logout-button {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #cc0000; /* Warna merah tua */
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      transition: 0.3s ease; /* Efek transisi */
      border-radius: 4px;
    }
    
    .logout-button:hover {
      background-color: #ff0000; /* Warna merah */
    }

    .manage-users-button {
      position: absolute;
      top: 40px;
      right: 10px;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      transition: 0.3s ease; /* Efek transisi */
      border-radius: 4px;
      background-color: #0000cc; /* Warna biru tua */
    }
    
    .manage-users-button:hover {
       background-color: #0000ff; /* Warna biru */
    }

    .logout-button,
    .action-button,
    .edit-button,
    .manage-users-button,
    .input-submit{
      font-family: "work sans";
    }
    
    /* .nama{
      text-align: left;
    } */

  </style>
  </head>
  <body>
    <div class="container">
         <a href="logout.php"><button class="logout-button">Logout</button></a>
         <a href="login_manage_users.php"><button class="manage-users-button">Manage Users</button></a>
      <div class="input">
        <h2>Input Data Nama</h2>
        <form action="insert.php" method="post">
          <label for="name">Nama:</label>
          <input type="text" id="name" name="name" required placeholder="tambah data di sini"/>
          <input type="submit" class="input-submit" value="Tambah" />
        </form>

        <h2>Daftar Nama</h2>
        <form method="post" action="">
          <label for="search">Cari Nama:</label>
          <input type="text" id="search" name="search" placeholder="cari nama di sini"/>
          <input type="submit" class="input-submit" value="Cari" />
        </form>
      </div>

      <?php
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $stmt = $conn->prepare("SELECT * FROM input_nama WHERE name LIKE ?"); $searchParam = "%" . $search . "%"; $stmt->bind_param("s", $searchParam); $stmt->execute(); $result = $stmt->get_result(); ?>
    <div class="table">
      <table>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Actions</th>
        </tr>
        <?php $i=1; ?>
        <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $i; ?></td>
          <td class="nama"><?= $row["name"]; ?></td>
          <td>
            <form action="delete.php" method="post" style="display: inline">
              <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
              <input type="submit" class="action-button" value="Hapus" />
            </form>
            <form action="edit.php" method="get" style="display: inline">
              <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
              <input type="submit" class="edit-button" value="Edit" />
            </form>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
        <?php else: ?>
        <tr>
          <td colspan="3">0 results</td>
        </tr>
        <?php endif; ?>
      </table>
      </div>
      <?php
    $stmt->close(); $conn->close(); ?>
    </div>
  </body>
</html>
