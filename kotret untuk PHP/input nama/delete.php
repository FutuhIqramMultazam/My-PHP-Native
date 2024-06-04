<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_to_delete = $_POST['id'];

    // Hapus record
    $stmt = $conn->prepare("DELETE FROM input_nama WHERE id = ?");
    $stmt->bind_param("i", $id_to_delete);

    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Data berhasil dihapus'); 
        window.location.href = 'index.php';</script>"; // Pesan sukses dan redirect menggunakan JavaScript
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Hapus header Location karena tidak diperlukan dengan redirect menggunakan JavaScript
    // header('Location: index.php');
    exit();
}
?>
