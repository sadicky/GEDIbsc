<?php

    //creer un folder
	function createFolder(){
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');		
		include 'Language/config.php';
		$getFile= new File();	
		$getFolder= new Folder();		
		$getF = $getFolder->getFolders();
		//les fichiers de la corbeille
		$files = $getFile->getFiles();
		$list= $getFile->getAllTrash();
	    include('Vues/Folder/create.php');
    }

	
    //creer un folder
	function Folders(){
		require_once('Models/folder.class.php');
		require_once('Models/file.class.php');		
		include 'Language/config.php';
		$getFile= new File();	
		$getFolder= new Folder();		
		$getF = $getFolder->getFolders();
		//les fichiers de la corbeille
		$list= $getFile->getAllTrash();
		$files = $getFile->getFiles();
	    include('Vues/Folder/folders.php');
    }
    
