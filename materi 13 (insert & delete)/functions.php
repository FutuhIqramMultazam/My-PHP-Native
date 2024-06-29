<?php
// menghubungkan ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]); // htmlspecialchars berfungsi untuk menangkal orang jail ketika memasukan input di form yang aneh aneh
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "INSERT INTO mahasiswa (nama,nim,email,jurusan,gambar) VALUES ('$nama', '$nim', '$email', '$jurusan', '$gambar')"; // ada kesalahan ketika insert query, seharusnya sebelum values itu mendeklarasi atau memberitahu kepada mysqli apa saja yang akan di insert, harusnya seperti ini "mahasiswa (nama, nim) VALUES ('$nama',''$nim); 

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
