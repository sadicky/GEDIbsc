function refreshPage() {
  location.reload();
}

$(document).ready(function () {
  //supprimer un fichier
  $(document).on("click", ".delete", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer ce fichier ? ")) {
      $.ajax({
        url: "Public/Script/File/delfile.php",
        method: "POST",
        data: { id: id },
        success: function (data) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Success",
            showConfirmButton: false,
            timer: 1500,
          });
          window.location.href = "index.php?p=files";
        },
      });
    }
  });

  //restorer la version
  $(document).on("click", ".restorev", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous revenir à cette version ? ")) {
      $.ajax({
        url: "Public/Script/File/restorev.php",
        method: "POST",
        data: { id: id },
        success: function (data) {
          // Swal.fire({
          //   position: "top-end",
          //   icon: "success",
          //   title: "Success",
          //   showConfirmButton: false,
          //   timer: 1500,
          // });
          // setInterval(refreshPage, 1000);
        },
      });
    }
  });
});
