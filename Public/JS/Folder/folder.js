    function refreshPage() {
        location.reload();
    }
    
    function fill_treeview() {
     
        $.ajax({
            url: "Public/Script/Folder/fetch.php",
            dataType: "json",
            success: function (data) {               
            $('#folder_jstree').jstree({ 'core' : {
                'data' : data,
                'multiple': false
            },
         });
            }
        });
    }


//Ajouter une categorie
$(document).ready(function () {
    fill_treeview();
    $(document).on('click', '.validate', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Folder/addfolder.php",
            method: 'POST',
            data: $("#formfolder").serialize(),
            success: function (data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location.href='folderall';
                fill_treeview();
            }
        });
    });
});