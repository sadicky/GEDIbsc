<?php
require_once('../../../Models/user.class.php'); 
 

$user = new Users();
    if(empty($_POST['userUpdate'])){
    
    $nom =htmlspecialchars(trim($_POST['nom']));
    $prenom =htmlspecialchars(trim($_POST['prenom']));
    $mail =htmlspecialchars(trim($_POST['mail']));
     $iduser =htmlspecialchars(trim($_POST['iduser']));
     //var_dump($_POST);die();
     $update = $user->UpdateUser($iduser,$nom,$prenom,$mail);
      if(!empty($update))
      {
    	   echo "<span class='alert alert-success alert-lg col-sm-12'>Update reussi Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
      }
      else
      {
    	   echo "<span class='alert alert-danger alert-lg col-sm-12'>error update <button type='button' class='close' data-dismiss='alert'>x</button></span>";
    	}

}
 
?>


   