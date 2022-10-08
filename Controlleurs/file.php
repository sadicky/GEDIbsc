<?php

    //recuperer tous les documents
	function Files(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		require_once('Models/tag.class.php');
		$getT= new Tag();	
		$getCategory= new Category();		
		$getFile= new File();		
		$getFolder= new Folder();		
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$files = $getFile->getFiles();	
		$tags = $getT->getAllTags();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();
		include('Vues/File/files.php');
    }

	function FileId(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		require_once('Models/tag.class.php');
		$getT= new Tag();	
		$getCategory= new Category();	
		$id = $_GET['id'];
		$getFile= new File();		
		$getFolder= new Folder();	
		$tags = $getT->getAllTags();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();	
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$file =  $getFile->getTheFile($id);
		$file2 =  $getFile->getTheFile2($id);
		$tagsList = $getT->getTagByFile($id);
		$getVersion = $getFile->getFileVersion($id);
		$getV = $getFile->getFileV($id);
	    include('Vues/File/file.php');
    }
	
	//Edter
	function FileEdit(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		require_once('Models/tag.class.php');
		$getT= new Tag();	
		$getCategory= new Category();	
		$id = $_GET['id'];
		$getFile= new File();		
		$getFolder= new Folder();	
		$tags = $getT->getAllTags();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();	
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$file =  $getFile->getTheFile($id);
	    include('Vues/File/edit.php');
    }


	//TRASH

	function allTrashed(){
		require_once('Models/file.class.php');
		$getFile= new File();	
		//les fichiers de la corbeille	
		$list= $getFile->getAllTrash();
	    include('Vues/Trash/alltrash.php');
	}
    
	
	function Search(){
		require_once('Models/category.class.php');
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');
		require_once('Models/tag.class.php');
		$getT= new Tag();	
		$getCategory= new Category();		
		$getFile= new File();		
		$getFolder= new Folder();		
		$getC = $getCategory->getCategories();
		$getF = $getFolder->getFolders();
		$files = $getFile->getFiles();	
		$tags = $getT->getAllTags();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();
	    include('Vues/File/search.php');
	}
    