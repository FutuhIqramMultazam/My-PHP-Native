// ambil element
var cari = document.getElementById("cari");
var tombol = document.getElementById("tombol");
var tabel = document.getElementById("tabel");

//tambah event

cari.addEventListener("keyup", function () {
  console.log(cari.value);
});
