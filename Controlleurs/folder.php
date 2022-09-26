<?php

    //creer un folder
	function createFolder(){
		require_once('Models/folder.class.php');
		$getFolder= new Folder();		
		$getF = $getFolder->getFolders();
	    include('Vues/Folder/create.php');
    }

	
    //creer un folder
	function Folders(){
		require_once('Models/folder.class.php');
		$getFolder= new Folder();		
		$getF = $getFolder->getFolders();
	    include('Vues/Folder/folders.php');
    }
    
