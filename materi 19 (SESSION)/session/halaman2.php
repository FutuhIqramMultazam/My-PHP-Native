<?php
session_start();

// echo "Ini hasil dari superglobal variable session = ", $_SESSION["nama"];

if (isset($_SESSION["nama"])) {
    echo "variable ada isinya: ", $_SESSION["nama"];
} else {
    echo "variable tidak ada isinya";
}

echo "<br><a href='halaman1.php'>kembali</a>";
