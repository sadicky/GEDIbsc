<?php
require_once('../../../Models/category.class.php');
$cats = new Category();

$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $delete = $cats->activCat($id);
}
	
?>