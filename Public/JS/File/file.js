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

  $(document).on("click",'.shared',function(){
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/Script/File/viewshare.php",
      method: "post",
      data: {
        id: id,
      },
      success: function (data) {
        $("#share_detail").html(data);
        $("#shareModal").modal("show"); 
    }});
    
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

    //rename  
    $(document).on("click",'.rename',function(){
    var id = $(this).attr("id");
    $.ajax({
      url: "Public/Script/File/rename.php",
      method: "post",
      data: {
        id: id,
      },
      success: function (data) {
        $("#rename_detail").html(data);
        $("#Rename").modal("show"); 
    }});    
  });


  //rename
  $(document).on("click", ".submitr", function (e) {
    e.preventDefault();
    $.ajax({
      url: "Public/Script/File/renamefile.php",
      method: "POST",
      data: $("#formren").serialize(),
      success: function (data) {
        $("#Rename").modal("hide");
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
