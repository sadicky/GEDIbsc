<?php
require_once('../../../Models/tag.class.php');
$tags = new Tag();

$id=$_POST['id'];
$tags->deleteTags($id);
$idtag = $tags->killTag($id,$idf);
?>