//reccupere nombre de case a cocher
function setProfilUser()
{ 
    var nombrePage = $("input:checkbox:checked").length;
    if ($('#profile_name').val() == '' || nombrePage == 0) 
    {
        alert('Verifier si vous avez entre le profil \n ou si vous avez aumoin attribuer un droit');
        swal({   
                        title: "Echec!",   
                        text: "Verifier si vous avez entrez le profil \n ou si vous avez au moins attribuer un droit", 
                        //type:"success",  
                        timer: 3000,   
                        showConfirmButton: false 
                   });
    }
    else
    {
        $("#form-profil-user").submit();

    }
}

//case à cocher pour les droits d'acces
function cocherUneLigneOnCreerProfilUser(i)
{
    if (document.getElementById(i).checked == true) 
    {
        document.getElementById("l"+i).checked = true;
        document.getElementById("c"+i).checked = true;
        document.getElementById("m"+i).checked = true;
        document.getElementById("s"+i).checked = true;
    }
    else
    {
        document.getElementById("l"+i).checked = false;
        document.getElementById("c"+i).checked = false;
        document.getElementById("m"+i).checked = false;
        document.getElementById("s"+i).checked = false;
    }
}

function refreshPage()  
{
    location.reload();
}

//Ajouter un user
$(document).ready(function () {

    $(document).on('click', '#save_user', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Users/addUser.php",
            method: 'POST',
            data: $("#form_user").serialize(),
            success: function (data) {
                $("#message")
                    .html(data)
                    .slideDown();
                $("#users").modal("hide");
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

//Nouveau profil
    $(document).on('click', '.valider', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Users/addProfile.php",
            method: 'POST',
            data: $("#formProfil").serialize(),
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
    });


//Update user
    $(document).on('click', '.update_user', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Users/update_user.php",
            method: 'POST',
            data: $("#form_update_user").serialize(),
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
    });
    //addgroup
     $(document).on('click', '.save_grp', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Users/adGroup.php",
            method: 'POST',
            data: $("#formgroup").serialize(),
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
    });
     //recupere data group before update
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
     //update group
     $(document).on('click', '#save_grp', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Public/Script/Users/updateGroup.php",
            method: 'POST',
            data: $("#form_Editgroup").serialize(),
            success: function (data) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    showConfirmButton: false,
                    timer: 1500
                });
            
              //setInterval(refreshPage, 1000);
            }
        });
    });


    });

function getprofilPermission(profil)
{
    var droit = $('#droit').val();
    if (profil == "") 
    {
        //alert('choisissez le profil');
        swal({   
            title: "",   
            text: "choisissez le profil", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
       });
    }
    else
    {
        var userName = $('#userName').val();
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                document.getElementById("reponse").innerHTML = this.responseText;
                
            }
        };
        xhttp.open("POST","Public/Modals/Users/getProfil.php?profil="+profil+"&droit="+droit+"&userName="+userName,true);
        xhttp.send();
        bote  
    }
}
function update_permission(idpermission,lire,creer,modifier,supprimer,i)
{   
    var userName = $('#userName').val();
    var page_accept = 0;

   // alert(idpermission+' '+lire+' '+creer+' '+modifier+' '+supprimer+userName+page_accept);

    if (lire == '' || creer == '' || modifier == '' || supprimer == '') 
    {
        swal({   
            title: "",   
            text: "Veillez preciser les droits", 
            type:"success",  
            timer: 3000,   
            showConfirmButton: false 
       });
    }
  
    else
    {
        if (lire == 1) page_accept = 1;
        if (creer == 1) page_accept = 1;
        if (modifier == 1) page_accept = 1;
        if (supprimer == 1) page_accept = 1;
        var profil_id = $('#profile_name').val();
        var droit = $('#droit').val();
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                var msg = document.getElementById('msg'+i);
                //msg.style.color = 'red';
                location.reload();
                document.getElementById('reponse').innerHTML = this.responseText;
                msg.innerHTML = this.responseText;
                swal({   
                    title: "",   
                    text: "", 
                    type:"success",  
                    timer: 3000,   
                    showConfirmButton: false 
               });
            }
        };
        xhttp.open("GET","ajax/Users/update_permission.php?idpermission="+idpermission+"&lire="+lire+"&creer="+creer+"&modifier="+modifier+"&supprimer="+supprimer+"&page_accept="+page_accept+"&profil_id="+profil_id+"&droit="+droit+"&userName="+userName,true);
        xhttp.send();
    }
}
function changempmot_de_passe(nomss,confirmer,nouveaupassword)
{
    var userName = $('#userName').val();
    //alert(nomss+' '+confirmer+' '+nouveaupassword);
    if(nomss == "" || confirmer == "" || nouveaupassword == "")
    {
        //alert('veuillez remplir tout le champ svp');
         swal({   
            title: "",   
            text: "veuillez remplir tout le champ svp", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
         });
    }
    if (confirmer != nouveaupassword ) 
    {
        //alert('Veillez vonfirmer le mot de passe svp');
        swal({   
            title: "",   
            text: "Veillez vonfirmer le mot de passe svp", 
            type:"error",  
            timer: 3000,   
            showConfirmButton: false 
         });
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                var rep = String(this.responseText).trim();
                if (rep == '') 
                {
                    document.location.href = $('#WEBROOT').val()+"deconnexion";
                }
                else
                    swal({title: "",   
                        text: "Une erreur s'est produite!",
                        type:"error",   
                        timer: 3000,   
                        showConfirmButton: false 
                    });
            }
        };
        xhttp.open("GET","ajax/Utilisateur/change_mot_depasse.php?nomss="+nomss+"&nouveaupassword="+nouveaupassword+"&userName="+userName,true);
        xhttp.send();
    }
}
function modif_detailprofil(identifiant,nomuser,prenomuser,adresmail,loginuser)
{
    var userName = $('#userName').val();
    //alert(identifiant+'/'+nomuser+'/'+prenomuser+'/'+adresmail+'/'+loginuser);
    if(identifiant == "" || nomuser == "" || prenomuser == "" || adresmail == "" || loginuser == "")
    {
        alert('veuillez remplir tout le champ svp');
    }
    else
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4) 
            {
                //document.getElementById("rep").innerHTML = this.responseText;
                var rep = String(this.responseText).trim();
                if (rep == '') 
                {
                    document.location.reload();
                    swal({title: "",   
                          text: "Modification reussie!",
                          type:"success",   
                          timer: 3000,   
                          showConfirmButton: false 
                      });
                }
                else
                    swal({title: "",   
                            text: "Une erreur s'est produite!",
                            type:"error",   
                            timer: 3000,   
                            showConfirmButton: false 
                        });
            }
        };
        xhttp.open("GET","ajax/Utilisateur/modifier_detail_profiluser.php?identifiant="+identifiant+"&nomuser="+nomuser+"&prenomuser="+prenomuser+"&adresmail="+adresmail+"&loginuser="+loginuser+"&userName="+userName,true);
        xhttp.send();
    }
}