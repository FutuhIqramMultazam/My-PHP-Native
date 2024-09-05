$(document).ready(function () {
  // even di jquery (on) ketika input search di ketik
  $("#keyword").on("keyup", function () {
    // memanggil ajax dan mengirim datanya
    $("#container").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val());
  });
});
