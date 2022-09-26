<?php
require_once('../../../Models/folder.class.php');
$folder = new Folder();

$user = 1;

 $fold=htmlspecialchars(trim($_POST['folder']));
 $idp=htmlspecialchars(trim($_POST['idp']));
 $add = $folder->setFolder($fold,$idp,$user);
 if($add) echo "Success";
 else echo 'error';
?>


   