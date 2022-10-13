<?php
require_once('../../../Models/user.class.php');


$user = new Users();

 //format de date
 date_default_timezone_set("Africa/Bujumbura");

   
      $nom =htmlspecialchars(trim($_POST['nom'])); 
      $prenom = htmlspecialchars(trim($_POST['prenom'])); 
      $mail = htmlspecialchars(trim($_POST['mail'])); 
      $profil = htmlspecialchars(trim($_POST['profile']));
      //$password = htmlspecialchars(trim(password_hash($_POST['password'], PASSWORD_DEFAULT)));
       $password = htmlspecialchars(trim(($_POST['password'])); 
      $date_add_user = htmlspecialchars(trim($_POST['date_add_user']));  
         

     $add = $user->Ajout_user($nom,$prenom,$mail,$password,$profil,$date_add_user);
    // var_dump($add);die();
      if(!empty($add))
      {
    	   echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
      }
      else
      {
    	   echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
    	}
 
 
?>


   