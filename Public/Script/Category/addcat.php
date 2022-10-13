<?php
require_once('../../../Models/category.class.php');
$cats = new Category();

$user = 1;
if(empty($_POST['cat'])){
  echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le nom de Catégorie SVP !
  ';
}else{
 $cat=htmlspecialchars(trim($_POST['cat']));
 $add = $cats->setCategory($cat,$user);
  if(!empty($add)){
	echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
}
  else{
	  echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
	}
}

 
?>


   