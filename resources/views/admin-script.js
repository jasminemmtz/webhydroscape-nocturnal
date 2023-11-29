$(document).ready(function () {
    $("#add").click(function () {
        $("#modalDosen").modal("show");
        $("#id").val("");
        $("#nama").val("");
        $("#pria").prop("checked", true);
        $("#usia").val("");
        $("#kode_prodi").val("");
        $("#nama_prodi").val("");
    });

    $(".edit").click(function () {
        var id = $(this).data("id");

        $.ajax({
            url: "https://asia-south1.gcp.data.mongodb-api.com/app/application-0-nuzti/endpoint/getDosenById?id=" + id,
            type: "GET",
            success: function (res) {
                var data = res[0];

                $("#modalDosen").modal("show");
                $("#id").val(data._id);
                $("#nama").val(data.nama);

                if (data.jenis_kelamin == "Pria") $("#pria").prop("checked", true);
                else $("#wanita").prop("checked", true);

                $("#usia").val(data.usia);
                $("#kode_prodi").val(data.prodi ? data.prodi.kode : "");
                $("#nama_prodi").val(data.prodi ? data.prodi.nama : "");
            },
            error: function (err) {
                console.log(err);
            },
        });
    });
});

document.getElementById("openRegistrationModal").addEventListener("click", function () {
    var registrationModal = new bootstrap.Modal(document.getElementById("registrationModal"));
    registrationModal.show();
});

document.getElementById("openLoginForm").addEventListener("click", function () {
    var loginModal = new bootstrap.Modal(document.getElementById("registrationModal"));
    loginModal.hide();
});
