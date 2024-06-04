<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $stmt = $conn->prepare("UPDATE input_nama SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $name, $id);

    if ($stmt->execute() === TRUE) {
        // Tampilkan pesan konfirmasi menggunakan alert
        echo "<script>alert('Data berhasil diperbarui'); 
        document.location.href = 'index.php';</script>";
        
    } else {
        echo "Error updating record: " . $stmt->error;
        header("Location:index.php");
      exit;
    }

    $stmt->close();
    $conn->close();
}
?>
