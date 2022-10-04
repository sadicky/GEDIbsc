function refreshPage() {
  location.reload();
}

//Ajouter un tag
$(document).ready(function () {
  $(document).on("click", ".validatetag", function (event) {
    event.preventDefault();
    $.ajax({
      url: "Public/Script/Tag/addtag.php",
      method: "POST",
      data: $("#formtag").serialize(),
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
  });

  
    //supprimer un tag
    $(document).on("click", ".deletetag", function (event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var idf = $("#idf").val();
    if (confirm("Voulez-vous supprimer ce tag ? ")) {        
          $.ajax({
              url: "Public/Script/Tag/deltag.php",
              method: "POST",
              data: {id:id,idf:idf},
              success: function (data) {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Success',
                  showConfirmButton: false,
                  timer: 1500
                });              
                setInterval(refreshPage, 1000);
             }
          });
      };
  });

  
    //supprimer un tag
    $(document).on("click", ".delete", function (event) {
      event.preventDefault();
      var id = $(this).attr("id");
    if (confirm("Voulez-vous supprimer ce tag ? ")) {        
          $.ajax({
              url: "Public/Script/Tag/deltag2.php",
              method: "POST",
              data: {id:id},
              success: function (data) {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Success',
                  showConfirmButton: false,
                  timer: 1500
                });              
                setInterval(refreshPage, 1000);
             }
          });
      };
  });

  //Recuperer les data de la categorie avant la modification
  $(".view_data").click(function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/Script/Tag/viewtagbeforedit.php",
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
      url: "Public/Script/Tag/edittag.php",
      method: "POST",
      data: $("#formedittag").serialize(),
      success: function (data) {
        $("#tagModal").modal("hide");
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Success",
          showConfirmButton: false,
          timer: 1500,
        });
        // setInterval(refreshPage, 1000);
      },
    });
    return false;
  });
});
