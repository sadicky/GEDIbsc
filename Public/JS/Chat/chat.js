function refreshPage() {
    location.reload();
}

//Ajouter une chatlist
$(document).ready(function () {

$(document).on('click', '#chatlist', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Chat/addChat.php",
            method: 'POST',
            data: $("#formchart").serialize(),
            success: function (data) {
                $("#message")
                    .html(data)
                    .slideDown();
                $("#add_chatroom").modal("hide");
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
    });
    //editer chat li
    // $(document).on("click", ".chatlist", function (event) {
    //     event.preventDefault();
    //     //var id = $(this).attr("id");
    //   if (confirm("Voulez-vous edi ? ")) {        
    //         $.ajax({
    //             url: "Public/Script/Chat/eddchat.php",
    //             method: "POST",
    //             data: {id: id},
    //             success: function (data) {
    //                             Swal.fire({
    //                                 position: 'top-end',
    //                                 icon: 'success',
    //                                 title: 'Success',
    //                                 showConfirmButton: false,
    //                                 timer: 1500
    //                             });
    //                setInterval(refreshPage, 1000);
    //                }
    //         });
    //     };
    // });



    
});