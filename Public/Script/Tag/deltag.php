<?php
require_once('../../../Models/tag.class.php');
require_once('../../../Models/file.class.php');	
$getFile= new File();	
$tags = new Tag();

$id=$_POST['id'];
$idf=$_POST['idf'];

$idtag = $tags->killTag($id,$idf);
// $delTag=$tags->deleteTags($id);
?>