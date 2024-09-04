const keyword = document.getElementById("keyword");
const tombolCari = document.getElementById("tombol-cari");
const container = document.getElementById("container");

keyword.addEventListener("keyup", function () {
  // buat objek array
  let xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax nya dan ambil data
  xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
  xhr.send();
});
