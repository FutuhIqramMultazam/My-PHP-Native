<?php
session_start();

echo "Ini hasil dari superglobal variable session = ", $_SESSION["nama"];

echo "<br><a href='halaman1.php'>kembali</a>";
