<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars( $_POST['name']);

    $stmt = $conn->prepare("INSERT INTO input_nama (name) VALUES (?)");
    $stmt->bind_param("s", $name);

    if ($stmt->execute() === TRUE) {
        echo "<script>
        alert('data berhasil di tambah');
        document.location.href = 'index.php';    
    </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

   
}
?>
