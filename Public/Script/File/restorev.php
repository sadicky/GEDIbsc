<?php
require_once('../../../Models/file.class.php');
$file = new File();

$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $restore = $file->backVersion($id);
}
	
?>