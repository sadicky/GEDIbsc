<?php

    //recuperer tous les documents
	function Files(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		$getCategory= new Category();		
		$getFile= new File();		
		$getFolder= new Folder();		
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$files = $getFile->getFiles();
	    include('Vues/File/files.php');
    }

	function FileId(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		$getCategory= new Category();	
		$id = $_GET['id'];
		$getFile= new File();		
		$getFolder= new Folder();		
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$file =  $getFile->getTheFile($id);
		$file2 =  $getFile->getTheFile2($id);
	    include('Vues/File/file.php');
    }


	//TRASH

	function allTrashed(){
		require_once('Models/file.class.php');
		$getFile= new File();		
		$list= $getFile->getAllTrash();
	    include('Vues/Trash/alltrash.php');
	}
    