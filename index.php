<?php
session_start();
define('WEBROOT',str_replace('index.php', "", $_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));

include 'Controlleurs/category.php';
include 'Controlleurs/main.php';
include 'Controlleurs/file.php';
include 'Controlleurs/folder.php';
include 'Controlleurs/tag.php';
if(isset($_GET['p'])){
	$params = explode('/', $_GET['p']); 
	//die(print_r($params));
	$_SESSION['action'] = '';
	$action = $params[0];
	$d = preg_split("#[-]+#", $action);
	// var_dump($d);die();
	$n = count($d);   
	if ($n > 1) 
	{
		$action = $d[0];
	}
	//url pour le login
	if($_GET['p']=='login'){
		login();
	}  
	
	//url pour le dashboard
	else if($_GET['p']=='dashboard')
	{
		dashboard();
	}
	//url pour creer ub dossier
	else if($_GET['p']=='foldercreate')
	{
		createFolder();
	}
	//url pour tous les dossiers
	else if($_GET['p']=='folderall')
	{
		Folders();
	}
	//url pour la categorie
	else if($_GET['p']=='categories')
	{
		Category();
	}
	else if($_GET['p']=='catact')
	{
		CategoryA();
	}
	else if($_GET['p']=='catdes')
	{
		CategoryD();
	}
	//url pour le file
	else if($_GET['p']=='files')
	{
		Files();
		
	}
	//recupere le data dun fichier
	else if($_GET['p']=='file')
	{
		FileId();
	}
	
	//recupere le data dun fichier
	else if($_GET['p']=='editFile')
	{
		FileEdit();
	}
	//recupere un fichier
	else if($_GET['p']=='trash')
	{
		allTrashed();
	}
	
	//recupere un fichier
	else if($_GET['p']=='tags')
	{
		Tags();
	}

	//recupere un fichier
	else if($_GET['p']=='search')
	{
		Search();
	}
	//pour la page non trouvee
	else{
		error404();
	}	
}
else{
	login();
}
?>