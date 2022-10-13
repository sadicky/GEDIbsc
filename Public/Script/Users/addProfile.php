<?php
require_once('../../../Models/user.class.php');
 

$user = new Users();

 date_default_timezone_set("Africa/Bujumbura");
 $date_creation = date("Y-m-d H:i:s");
    
    
    $profil_name =htmlspecialchars(trim($_POST['profile']));
   
     $add = $user->setProfil_user($profil_name);
      if(!empty($add))
      {
    	   echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
      }
      else
      {
    	   echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
    	}


 
?>


   