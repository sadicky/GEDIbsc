<?php
require_once('../../../Models/user.class.php');
 
$user = new Users();
    
    
    $group_user = htmlspecialchars(trim($_POST['groupName']));
     $name_group = $user->setGroup_user($group_user);
      if(!empty($name_group))
      {
        
    	   echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
      }
      else
      {
    	   echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
    	}


 
?>


   