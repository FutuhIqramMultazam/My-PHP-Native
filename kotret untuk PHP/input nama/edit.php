<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM input_nama WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    } else {
        echo "No records found";
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid request";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Nama</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #222; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 50%;
    padding: 20px;
    border-radius: 10px; /* Border radius */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow */
    background-color: #333; /* Warna latar belakang */
}

h2 {
    color: #fff; /* Warna teks */
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px; /* Border radius */
    background-color: #444; /* Warna latar belakang */
    color: #fff; /* Warna teks */
 border: none;
    box-sizing: border-box;
}
input[type="text"]:focus-visible{
    outline: none;
}
.update{
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px; /* Border radius */
    background-color: #444; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    border: none;
    box-sizing: border-box;
}
.update {
    background-color: #2c8f30;
    color: white;
    cursor: pointer;
    transition:  0.3s ease;
}

.update:hover {
    background-color: #4CAF50;
}

.batal{
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px; /* Border radius */
    background-color: #444; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    border: none;
    box-sizing: border-box;
}

.batal{
    background-color: #ff0000;
    color: white;
    cursor: pointer;
    transition:  0.3s ease;
}

.batal:hover{
    background-color: #cc0000;
}

    </style>
</head>
<body>
<div class="container">
    <h2>Edit Data Nama</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="nama" required>
        <input type="submit" value="Update" class="update">
    </form>
        <a href="index.php"><input type="submit" value="Batal" class="batal"></a>

</div>
</body>
</html>
