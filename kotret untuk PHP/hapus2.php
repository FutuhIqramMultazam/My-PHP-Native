<?php
$id = $_GET["id"];

$conn = mysqli_connect("localhost","root","","phpdasar");

$result = mysqli_query( $conn,"DELETE FROM keluarga WHERE id = $id");

if ($result > 0){
    echo "<script>
    alert('data berhasil di hapus');
    document.location.href = 'kotret2.php';    
</script>";
} else {
    echo "<script>
    alert('Data gagal di hapus');
    document.location.href = 'kotret2.php';    
</script>";
}
?>