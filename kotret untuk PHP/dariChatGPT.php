<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <style>
        /* CSS untuk styling tabel */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Form Absensi</h2>
    <!-- Form untuk mengambil data absensi -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <!-- Tabel untuk menampilkan input kehadiran untuk setiap mata kuliah dan minggu -->
        <table>
            <tr>
                <th>Mata Kuliah</th>
                <!-- Looping untuk menampilkan kolom minggu -->
                <?php for ($i = 1; $i <= 8; $i++) {
                    echo "<th>Minggu $i</th>";
                } ?>
            </tr>
            <?php
            // Array asosiatif untuk daftar mata kuliah
            $matkul = array(
                "Kalkulus" => "kalkulus",
                "Sistem Informasi Manajemen" => "sim",
                "Pengantar Matematika" => "pm",
                "PKN" => "pkn",
                "Bahasa Indonesia" => "bi",
                "PAI" => "pai"
            );

            // Looping untuk menampilkan baris tabel untuk setiap mata kuliah
            foreach ($matkul as $mk => $kode) {
                echo "<tr><td>$mk</td>";
                // Looping untuk menampilkan input checkbox untuk setiap minggu
                for ($j = 1; $j <= 8; $j++) {
                    echo "<td><input type='checkbox' name='absen[$kode][$j]' value='1'></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Memeriksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root"; // Sesuaikan dengan username MySQL Anda
        $password = ""; // Sesuaikan dengan password MySQL Anda
        $dbname = "phpdasar";

        // Membuat koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Mengambil data dari form
        $nama = $_POST["nama"];
        $absen = $_POST["absen"];

        // Membuat query untuk memasukkan data kehadiran ke database
        $sql = "INSERT INTO absensi (nama, ";
        foreach ($matkul as $kode) {
            for ($i = 1; $i <= 8; $i++) {
                $sql .= "minggu_$i_$kode, ";
            }
        }
        $sql = rtrim($sql, ", ") . ") VALUES ('$nama', ";

        // Looping untuk memeriksa setiap input checkbox yang telah dicentang
        foreach ($matkul as $kode) {
            for ($i = 1; $i <= 8; $i++) {
                if (isset($absen[$kode][$i])) {
                    $sql .= "1, ";
                } else {
                    $sql .= "0, ";
                }
            }
        }
        $sql = rtrim($sql, ", ") . ")";

        // Menjalankan query untuk memasukkan data ke database
        if ($conn->query($sql) === TRUE) {
            echo "Data absensi berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Menutup koneksi ke database
        $conn->close();
    }
    ?>
</body>
</html>
