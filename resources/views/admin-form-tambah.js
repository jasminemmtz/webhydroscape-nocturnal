$(document).ready(function () {
  $("#add").click(function () {
    $("#tabelBuah").toggle();
    $("#formtambah").toggle();
    if ($("#formtambah").is(":visible")) {
      $("#add").text("Batalkan Tambah");
      $("#formProduk").attr("action", "save.php");
    } else {
      $("#add").text("Tambah Produk");
      $("#formProduk").attr("action", "");
    }
  });
});
