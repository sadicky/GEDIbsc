function refreshPage() {
  location.reload();
}

//Ajouter une categorie
$(document).ready(function () {
  //restorer le fichier
  $(document).on("click", ".restore", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous restorer ce fichier ? ")) {
      $.ajax({
        url: "Public/Script/Trash/restore.php",
        method: "POST",
        data: {
          id: id,
        },
        success: function (data) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Success",
            showConfirmButton: false,
            timer: 1500,
          });
          setInterval(refreshPage, 1000);
        },
      });
    }
  });

  //supprimer le fichier de la corbeille
  $(document).on("click", ".delete", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer ce fichier de la corbeille ? ")) {
      $.ajax({
        url: "Public/Script/Trash/delete.php",
        method: "POST",
        data: {
          id: id,
        },
        success: function (data) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Success",
            showConfirmButton: false,
            timer: 1500,
          });
          setInterval(refreshPage, 1000);
        },
      });
    }
  });
});
