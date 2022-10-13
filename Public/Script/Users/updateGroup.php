<?php
require_once('../../../Models/user.class.php'); 
 
$i ;
$user = new Users();
var_dump($_POST['group']);die();
    if(empty($_POST['group'])){
    
    $id =htmlspecialchars(trim($_POST['idgroup']));
    $nom =htmlspecialchars(trim($_POST['group']));

     //var_dump($_POST);die();
     $updateGroup = $user->UpdateGroupUser($id,$nom);
      if(!empty($updateGroup))
      {
    	   echo "<span class='alert alert-success alert-lg col-sm-12'>Update reussi Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
      }
      else
      {
    	   echo "<span class='alert alert-danger alert-lg col-sm-12'>error update <button type='button' class='close' data-dismiss='alert'>x</button></span>";
    	}

}
 
?>


   