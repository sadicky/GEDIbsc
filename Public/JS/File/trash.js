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
                data: {id: id},
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

    //supprimer le fichier de la corbeille
    $(document).on("click", ".delete", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
      if (confirm("Voulez-vous supprimer ce fichier de la corbeille ? ")) {        
            $.ajax({
                url: "Public/Script/Trash/delete.php",
                method: "POST",
                data: {id: id},
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



    //Activer une categorie
    // $(document).on("click", ".desactiver", function (event) {
    //     event.preventDefault();
    //     var id = $(this).attr("id");
    //     if (confirm("Voulez-vous desactiver cette categorie ? ")) {
    //         $.ajax({
    //             url: "Public/Script/Category/deactivcat.php",
    //             method: "POST",
    //             data: {
    //                 id: id
    //             },
    //             success: function (data) {
    //                 setInterval(refreshPage, 1000);
    //             }
    //         });
    //     } else {
    //         return false;
    //     }
    // });

    

    //supprimer un fichier
    $(document).on("click", ".delete", function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
      if (confirm("Voulez-vous supprimer cefichier ? ")) {        
            $.ajax({
                url: "Public/Script/File/delfile.php",
                method: "POST",
                data: {id: id},
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
    // $('.view_data').click(function () {
    //     var id = $(this).attr("id");
    //     $.ajax({
    //         url: "Public/Script/Category/viewcatbeforedit.php",
    //         method: "post",
    //         data: {
    //             id: id
    //         },
    //         success: function (data) {
    //             $('#cat_detail').html(data);
    //             $('#catModal').modal("show");
    //         }
    //     });
    // });

    //Modification   
    // $(document).on('click', '.submitb', function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url: "Public/Script/Category/editcat.php",
    //         method: "POST",
    //         data: $("#formeditcat").serialize(),
    //         success: function(data) {
    //             $("#catModal").modal('hide');
    //             Swal.fire({
    //                 position: 'top-end',
    //                 icon: 'success',
    //                 title: 'Success',
    //                 showConfirmButton: false,
    //                 timer: 1500
    //             });
    //             setInterval(refreshPage, 1000);
    //         }
    //     });
    //     return false;
    // });
    
});