<?php 
require_once('../../../Models/category.class.php');
$cats = new Category();

if(empty($_POST['id'])){
	$id = htmlspecialchars(trim($_POST['id']));
	$cat = htmlspecialchars(trim($_POST['cat']));
    
        $Updatecat = $cats->updateCategory($cat,$id); 
        if($Updatecat){
            echo "Ajout avec succes";
        }
        else{
            echo "Erreur";
        }
  
  }
 ?>