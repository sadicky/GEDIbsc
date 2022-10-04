<?php
require_once('../../../Models/tag.class.php');
$tags = new Tag();

if(empty($_POST['tag'])){
  echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le nom de Catégorie SVP !
  ';
}else{
 $idf=htmlspecialchars(trim($_POST['id']));
 $tag=htmlspecialchars(trim($_POST['tag']));

 $tags->getTagByName($tag);

 $tags->affectTag($tags->getTagByName($tag)['ID'], $idf);
 
 $v = $getFile->getTheFile($id);
 var_dump($v);die();
 
 $tagsList = $tags->getTagByFile($v->ID);
 
}

 
?>


   