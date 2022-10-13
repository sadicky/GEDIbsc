function refreshPage() {
  location.reload();
}

//Ajouter une categorie
$(document).ready(function () {
  $(document).on("click", ".validate", function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/Script/Category/addcat.php",
      method: "POST",
      data: $("#formcat").serialize(),
      success: function (data) {
        $("#message").html(data).slideDown();
        $("#Categories").modal("hide");
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
  });

  //Activer une categorie
  $(document).on("click", ".activer", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous activer cette categorie ? ")) {
      $.ajax({
        url: "Public/Script/Category/activcat.php",
        method: "POST",
        data: {
          id: id,
        },
        success: function (data) {
          setInterval(refreshPage, 1000);
        },
      });
    } else {
      return false;
    }
  });

  //Activer une categorie
  $(document).on("click", ".desactiver", function (event) {
    event.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Voulez-vous desactiver cette categorie ? ")) {
      $.ajax({
        url: "Public/Script/Category/deactivcat.php",
        method: "POST",
        data: {
          id: id,
        },
        success: function (data) {
          setInterval(refreshPage, 1000);
        },
      });
    } else {
      return false;
    }
  }); 

  //Recuperer les data de la categorie avant la modification
  $(".view_data").click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/Script/Category/viewcatbeforedit.php",
      method: "post",
      data: {
        id: id,
      },
      success: function (data) {
        $("#cat_detail").html(data);
        $("#catModal").modal("show");
      },
    });
  });

  //Modification
  $(document).on("click", ".submitb", function (e) {
    e.preventDefault();
    $.ajax({
      url: "Public/Script/Category/editcat.php",
      method: "POST",
      data: $("#formeditcat").serialize(),
      success: function (data) {
        $("#catModal").modal("hide");
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
    return false;
  });
});
